/**
 * Magic Wand Background Remover
 * 
 * Features:
 * - Magic Wand (Flood Fill) with tolerance
 * - Eraser with adjustable size
 * - Undo support
 * - Touch support
 * - Local processing (Canvas API)
 */

(function() {
    'use strict';

    const CONFIG = {
        maxHistory: 15,
        defaultTolerance: 20,
        defaultEraserSize: 20,
        maxCanvasWidth: 1200,
        maxCanvasHeight: 900
    };

    class BackgroundCleaner {
        constructor() {
            this.els = {
                fileInput: document.getElementById('file-input'),
                dropZone: document.getElementById('dropZone'),
                canvas: document.getElementById('main-canvas'),
                overlay: document.getElementById('overlay-canvas'),
                toleranceInput: document.getElementById('tolerance'),
                tolValue: document.getElementById('tol-value'),
                tolLabel: document.getElementById('tol-label'),
                btnDownload: document.getElementById('download-btn'),
                btnUndo: document.getElementById('undo-btn'),
                btnReset: document.getElementById('reset-btn'),
                toolWand: document.getElementById('tool-wand'),
                toolEraser: document.getElementById('tool-eraser'),
                canvasWrap: document.querySelector('.canvas-wrap'),
            };

            if (!this.els.canvas) {
                console.error('Background Cleaner: Canvas element not found.');
                return;
            }

            this.ctx = this.els.canvas.getContext('2d', { willReadFrequently: true });
            this.octx = this.els.overlay ? this.els.overlay.getContext('2d') : null;

            this.state = {
                tool: 'wand',
                tolerance: CONFIG.defaultTolerance,
                eraserSize: CONFIG.defaultEraserSize,
                isDragging: false,
                history: [],
                originalImage: null,
                hasImage: false
            };

            this.lastMousePos = null;
            this.blobUrl = null;
            this.i18n = window.SVC_I18N || {};

            this.init();
        }

        init() {
            // Sync slider value with state
            if (this.els.toleranceInput) {
                this.els.toleranceInput.value = CONFIG.defaultTolerance;
            }
            if (this.els.tolValue) {
                this.els.tolValue.textContent = CONFIG.defaultTolerance;
            }

            this.bindEvents();
            this.setTool('wand');
            this.updateUI();
        }

        bindEvents() {
            // File Input
            if (this.els.fileInput) {
                this.els.fileInput.addEventListener('change', e => this.handleFileSelect(e));
            }

            // Drag & Drop
            if (this.els.dropZone) {
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    this.els.dropZone.addEventListener(eventName, e => {
                        e.preventDefault();
                        e.stopPropagation();
                    });
                });

                this.els.dropZone.addEventListener('dragover', () => this.els.dropZone.classList.add('drag-over'));
                this.els.dropZone.addEventListener('dragleave', () => this.els.dropZone.classList.remove('drag-over'));
                this.els.dropZone.addEventListener('drop', e => {
                    this.els.dropZone.classList.remove('drag-over');
                    this.handleDrop(e);
                });
                this.els.dropZone.addEventListener('click', () => this.els.fileInput && this.els.fileInput.click());
            }

            // Tools
            if (this.els.toolWand) this.els.toolWand.addEventListener('click', () => this.setTool('wand'));
            if (this.els.toolEraser) this.els.toolEraser.addEventListener('click', () => this.setTool('eraser'));

            // Tolerance / Size Slider
            if (this.els.toleranceInput) {
                this.els.toleranceInput.addEventListener('input', e => {
                    const val = parseInt(e.target.value, 10);
                    this.updateSliderValue(val);

                    if (this.state.tool === 'eraser') {
                        this.drawEraserCursor(this.lastMousePos);
                    }
                });
            }

            // Actions
            if (this.els.btnUndo) this.els.btnUndo.addEventListener('click', () => this.undo());
            if (this.els.btnReset) this.els.btnReset.addEventListener('click', () => this.reset());
            if (this.els.btnDownload) this.els.btnDownload.addEventListener('click', () => this.download());

            // Canvas Interactions — mouse
            this.interactionTarget = this.els.overlay || this.els.canvas;

            this.interactionTarget.addEventListener('mousedown', e => this.handlePointerDown(e));
            this.interactionTarget.addEventListener('mousemove', e => this.handlePointerMove(e));
            this.interactionTarget.addEventListener('mouseleave', () => this.handlePointerLeave());
            window.addEventListener('mouseup', () => this.handlePointerUp());

            // Canvas Interactions — touch
            this.interactionTarget.addEventListener('touchstart', e => {
                e.preventDefault();
                this.handlePointerDown(e.touches[0]);
            }, { passive: false });
            this.interactionTarget.addEventListener('touchmove', e => {
                e.preventDefault();
                this.handlePointerMove(e.touches[0]);
            }, { passive: false });
            this.interactionTarget.addEventListener('touchend', e => {
                e.preventDefault();
                this.handlePointerUp();
            }, { passive: false });
            this.interactionTarget.addEventListener('touchcancel', () => this.handlePointerUp());

            // Prevent context menu on canvas
            this.interactionTarget.addEventListener('contextmenu', e => e.preventDefault());
        }

        handleFileSelect(e) {
            const file = e.target.files[0];
            if (file) this.loadImage(file);
        }

        handleDrop(e) {
            const file = e.dataTransfer.files[0];
            if (file) this.loadImage(file);
        }

        loadImage(file) {
            if (!file.type.match('image.*')) {
                alert(this.i18n.cannot_load || 'Please select an image file.');
                return;
            }

            // Revoke previous blob URL
            if (this.blobUrl) {
                URL.revokeObjectURL(this.blobUrl);
            }

            const img = new Image();
            img.onload = () => {
                this.state.originalImage = img;
                this.state.hasImage = true;
                this.state.history = [];
                this.fitCanvasToImage(img);
                this.drawImage(img);
                this.updateUI();
            };
            img.onerror = () => {
                alert(this.i18n.cannot_load || 'Cannot load image.');
            };
            this.blobUrl = URL.createObjectURL(file);
            img.src = this.blobUrl;
        }

        fitCanvasToImage(img) {
            let w = img.width;
            let h = img.height;

            const ratio = Math.min(CONFIG.maxCanvasWidth / w, CONFIG.maxCanvasHeight / h, 1);
            w = Math.round(w * ratio);
            h = Math.round(h * ratio);

            this.els.canvas.width = w;
            this.els.canvas.height = h;
            if (this.els.overlay) {
                this.els.overlay.width = w;
                this.els.overlay.height = h;
            }
        }

        drawImage(img) {
            this.ctx.clearRect(0, 0, this.els.canvas.width, this.els.canvas.height);
            this.ctx.drawImage(img, 0, 0, this.els.canvas.width, this.els.canvas.height);
        }

        saveState() {
            if (!this.state.hasImage) return;

            if (this.state.history.length >= CONFIG.maxHistory) {
                this.state.history.shift();
            }

            const imageData = this.ctx.getImageData(0, 0, this.els.canvas.width, this.els.canvas.height);
            this.state.history.push(imageData);
            this.updateUI();
        }

        undo() {
            if (this.state.history.length === 0) return;
            const previousState = this.state.history.pop();
            this.ctx.putImageData(previousState, 0, 0);
            this.updateUI();
        }

        reset() {
            if (!this.state.originalImage) return;
            this.state.history = [];
            this.drawImage(this.state.originalImage);
            this.updateUI();
        }

        setTool(tool) {
            this.state.tool = tool;

            if (this.els.toolWand) this.els.toolWand.classList.toggle('active', tool === 'wand');
            if (this.els.toolEraser) this.els.toolEraser.classList.toggle('active', tool === 'eraser');

            this.updateSliderLabel();

            if (this.octx) {
                this.octx.clearRect(0, 0, this.els.overlay.width, this.els.overlay.height);
            }
        }

        updateSliderLabel() {
            if (!this.els.tolLabel) return;

            const labelText = this.state.tool === 'wand'
                ? (this.els.tolLabel.dataset.tol || 'Tolerance')
                : (this.els.tolLabel.dataset.eraser || 'Eraser Size');

            const val = this.els.toleranceInput ? this.els.toleranceInput.value : 0;
            this.els.tolLabel.innerHTML = `${labelText}: <span id="tol-value">${val}</span>`;

            this.els.tolValue = document.getElementById('tol-value');
        }

        updateSliderValue(val) {
            if (this.state.tool === 'wand') {
                this.state.tolerance = val;
            } else {
                this.state.eraserSize = this.mapSliderToSize(val);
            }
            if (this.els.tolValue) this.els.tolValue.textContent = val;
        }

        mapSliderToSize(val) {
            return Math.max(1, Math.round((val / 255) * 100));
        }

        updateUI() {
            const hasHistory = this.state.history.length > 0;
            const hasImage = this.state.hasImage;

            if (this.els.btnUndo) this.els.btnUndo.disabled = !hasHistory;
            if (this.els.btnReset) this.els.btnReset.disabled = !hasImage;
            if (this.els.btnDownload) this.els.btnDownload.disabled = !hasImage;

            if (this.els.canvasWrap) {
                this.els.canvasWrap.style.display = hasImage ? 'block' : 'none';
            }
        }

        getPointerPos(e) {
            const rect = this.interactionTarget.getBoundingClientRect();
            const scaleX = this.els.canvas.width / rect.width;
            const scaleY = this.els.canvas.height / rect.height;
            const x = Math.floor((e.clientX - rect.left) * scaleX);
            const y = Math.floor((e.clientY - rect.top) * scaleY);
            return {
                x: Math.max(0, Math.min(x, this.els.canvas.width - 1)),
                y: Math.max(0, Math.min(y, this.els.canvas.height - 1))
            };
        }

        handlePointerLeave() {
            if (this.octx) {
                this.octx.clearRect(0, 0, this.els.overlay.width, this.els.overlay.height);
            }
        }

        handlePointerDown(e) {
            if (!this.state.hasImage) return;

            this.state.isDragging = true;
            const pos = this.getPointerPos(e);

            if (this.state.tool === 'wand') {
                this.saveState();
                this.performMagicWand(pos.x, pos.y);
                this.state.isDragging = false;
            } else if (this.state.tool === 'eraser') {
                this.saveState();
                this.performEraser(pos.x, pos.y);
            }
        }

        handlePointerMove(e) {
            const pos = this.getPointerPos(e);
            this.lastMousePos = pos;

            if (this.state.tool === 'eraser') {
                this.drawEraserCursor(pos);
                if (this.state.isDragging) {
                    this.performEraser(pos.x, pos.y);
                }
            }
        }

        handlePointerUp() {
            this.state.isDragging = false;
        }

        drawEraserCursor(pos) {
            if (!this.octx) return;
            this.octx.clearRect(0, 0, this.els.overlay.width, this.els.overlay.height);

            if (!pos) return;

            const size = this.state.eraserSize;

            this.octx.beginPath();
            this.octx.arc(pos.x, pos.y, size, 0, Math.PI * 2);
            this.octx.strokeStyle = 'white';
            this.octx.lineWidth = 2;
            this.octx.stroke();
            this.octx.beginPath();
            this.octx.arc(pos.x, pos.y, size, 0, Math.PI * 2);
            this.octx.strokeStyle = 'black';
            this.octx.lineWidth = 1;
            this.octx.stroke();
        }

        performEraser(x, y) {
            const size = this.state.eraserSize;

            this.ctx.globalCompositeOperation = 'destination-out';
            this.ctx.beginPath();
            this.ctx.arc(x, y, size, 0, Math.PI * 2);
            this.ctx.fill();
            this.ctx.globalCompositeOperation = 'source-over';
        }

        performMagicWand(startX, startY) {
            const w = this.els.canvas.width;
            const h = this.els.canvas.height;
            const imageData = this.ctx.getImageData(0, 0, w, h);
            const data = imageData.data;

            const startIdx = (startY * w + startX) * 4;
            const targetR = data[startIdx];
            const targetG = data[startIdx + 1];
            const targetB = data[startIdx + 2];
            const targetA = data[startIdx + 3];

            if (targetA === 0) return;

            const tolerance = this.state.tolerance;
            const toleranceSq = tolerance * tolerance;

            const visited = new Uint8Array(w * h);
            const stack = [startX, startY]; // flat array for performance

            const match = (idx) => {
                if (data[idx + 3] === 0) return false;
                const dr = data[idx] - targetR;
                const dg = data[idx + 1] - targetG;
                const db = data[idx + 2] - targetB;
                return (dr * dr + dg * dg + db * db) <= (toleranceSq * 3);
            };

            while (stack.length > 0) {
                const y = stack.pop();
                const x = stack.pop();
                const idx = y * w + x;

                if (visited[idx]) continue;
                visited[idx] = 1;

                const pixelIdx = idx * 4;

                if (match(pixelIdx)) {
                    data[pixelIdx + 3] = 0;

                    if (x > 0)     { stack.push(x - 1); stack.push(y); }
                    if (x < w - 1) { stack.push(x + 1); stack.push(y); }
                    if (y > 0)     { stack.push(x); stack.push(y - 1); }
                    if (y < h - 1) { stack.push(x); stack.push(y + 1); }
                }
            }

            this.ctx.putImageData(imageData, 0, 0);
        }

        download() {
            if (!this.state.hasImage) return;

            const link = document.createElement('a');
            link.download = this.i18n.default_filename || 'transparent.png';
            link.href = this.els.canvas.toDataURL('image/png');
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        new BackgroundCleaner();
    });

})();
