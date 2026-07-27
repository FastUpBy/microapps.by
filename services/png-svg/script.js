// PNG → SVG converter logic
(() => {
    const root = document.getElementById('pngSvgRoot');
    if (!root) return;

    const i18n = safeParse(root.dataset.i18n);
    const fileInput = document.getElementById('pngInput');
    const uploadBtn = document.getElementById('uploadBtn');
    const convertBtn = document.getElementById('convertBtn');
    const resetBtn = document.getElementById('resetBtn');
    const copyBtn = document.getElementById('copyBtn');
    const downloadBtn = document.getElementById('downloadBtn');
    const detailSlider = document.getElementById('detailSlider');
    const statusText = document.getElementById('statusText');
    const svgPreview = document.getElementById('svgPreview');
    const svgOutput = document.getElementById('svgOutput');
    const shapeCount = document.getElementById('shapeCount');
    const colorCount = document.getElementById('colorCount');
    const svgSize = document.getElementById('svgSize');
    const dropZone = document.getElementById('pngInputDropZone');
    const dropText = document.getElementById('pngInputDropText');

    const previewPlaceholder = svgPreview ? svgPreview.innerHTML : '';
    const defaultStatus = statusText ? statusText.textContent : '';
    const MAX_DIMENSION = 512;

    let currentFile = null;
    let currentSvg = '';
    let isProcessing = false;

    function safeParse(json) {
        if (!json) return {};
        try {
            return JSON.parse(json);
        } catch (err) {
            console.warn('png-svg: cannot parse i18n payload', err);
            return {};
        }
    }

    function formatBytes(bytes) {
        if (!bytes) return '0 B';
        const units = ['B', 'KB', 'MB'];
        const exponent = Math.min(Math.floor(Math.log(bytes) / Math.log(1024)), units.length - 1);
        const value = bytes / Math.pow(1024, exponent);
        return `${value.toFixed(exponent === 0 ? 0 : 1)} ${units[exponent]}`;
    }

    function updateStatus(message) {
        if (statusText) {
            statusText.textContent = message;
        }
    }

    function resetState() {
        currentFile = null;
        currentSvg = '';
        isProcessing = false;
        if (fileInput) fileInput.value = '';
        if (svgOutput) svgOutput.value = '';
        if (svgPreview) svgPreview.innerHTML = previewPlaceholder;
        if (shapeCount) shapeCount.textContent = '0';
        if (colorCount) colorCount.textContent = '0';
        if (svgSize) svgSize.textContent = '0 B';
        if (dropText) dropText.classList.remove('has-file');
        updateStatus(defaultStatus);
        toggleActions(false);
    }

    function toggleActions(enabled) {
        [copyBtn, downloadBtn].forEach((btn) => {
            if (!btn) return;
            btn.disabled = !enabled;
            btn.classList.toggle('opacity-60', !enabled);
        });
    }

    async function handleFiles(files) {
        if (!files || !files.length) return;
        const file = files[0];
        if (!file.type || !file.type.includes('png')) {
            alert(i18n.filetype || 'Only PNG files are supported.');
            return;
        }
        currentFile = file;
        updateStatus(`${file.name} (${formatBytes(file.size)})`);
        if (dropText) dropText.classList.add('has-file');
        await runConversion();
    }

    async function runConversion(auto = false) {
        if (!currentFile || isProcessing) {
            if (!currentFile && !auto) {
                alert(i18n.convertFirst || 'Upload a PNG first.');
            }
            return;
        }
        if (!detailSlider) return;
        isProcessing = true;
        toggleActions(false);
        updateStatus(i18n.processing || 'Converting…');
        try {
            const step = Math.max(2, parseInt(detailSlider.value, 10) || 6);
            const { svg, stats } = await rasterToSvg(currentFile, step);
            currentSvg = svg;
            if (svgOutput) svgOutput.value = svg;
            if (svgPreview) svgPreview.innerHTML = svg;
            if (shapeCount) shapeCount.textContent = stats.shapes.toLocaleString();
            if (colorCount) colorCount.textContent = stats.colors.toLocaleString();
            if (svgSize) svgSize.textContent = formatBytes(stats.size);
            toggleActions(true);
            updateStatus(i18n.ready || 'Done.');
        } catch (err) {
            console.error('png-svg: conversion failed', err);
            updateStatus(i18n.error || 'Conversion failed.');
        } finally {
            isProcessing = false;
        }
    }

    async function rasterToSvg(file, step) {
        const dataUrl = await readFileAsDataURL(file);
        const img = await loadImage(dataUrl);
        const scale = Math.min(1, MAX_DIMENSION / Math.max(img.width || 1, img.height || 1));
        const width = Math.max(1, Math.round((img.width || 1) * scale));
        const height = Math.max(1, Math.round((img.height || 1) * scale));

        const canvas = document.createElement('canvas');
        canvas.width = width;
        canvas.height = height;
        const ctx = canvas.getContext('2d', { willReadFrequently: true });
        if (!ctx) throw new Error('Canvas context unavailable');
        ctx.drawImage(img, 0, 0, width, height);
        const { data } = ctx.getImageData(0, 0, width, height);

        const rects = [];
        const colors = new Set();
        let shapes = 0;

        for (let y = 0; y < height; y += step) {
            const blockH = Math.min(step, height - y);
            for (let x = 0; x < width; x += step) {
                const blockW = Math.min(step, width - x);
                const sample = sampleBlock(data, width, x, y, blockW, blockH);
                if (sample.alpha < 0.03) continue;
                const rect = buildRect(x, y, blockW, blockH, sample);
                rects.push(rect);
                colors.add(`${sample.color}|${sample.alpha.toFixed(2)}`);
                shapes++;
            }
        }

        const svg = `<?xml version="1.0" encoding="UTF-8"?>\n<svg xmlns="http://www.w3.org/2000/svg" width="${width}" height="${height}" viewBox="0 0 ${width} ${height}" shape-rendering="crispEdges">${rects.join('')}</svg>`;
        const blob = new Blob([svg], { type: 'image/svg+xml' });
        return { svg, stats: { shapes, colors: colors.size, size: blob.size } };
    }

    function sampleBlock(data, width, startX, startY, blockW, blockH) {
        let r = 0;
        let g = 0;
        let b = 0;
        let a = 0;
        let count = 0;
        for (let y = 0; y < blockH; y++) {
            for (let x = 0; x < blockW; x++) {
                const idx = ((startY + y) * width + (startX + x)) * 4;
                r += data[idx];
                g += data[idx + 1];
                b += data[idx + 2];
                a += data[idx + 3];
                count++;
            }
        }
        if (count === 0) return { color: '#000000', alpha: 0 };
        const alpha = a / (count * 255);
        return {
            color: rgbToHex(Math.round(r / count), Math.round(g / count), Math.round(b / count)),
            alpha: Math.min(1, Math.max(0, alpha))
        };
    }

    function buildRect(x, y, width, height, sample) {
        const opacity = sample.alpha >= 0.995 ? '' : ` fill-opacity="${sample.alpha.toFixed(2)}"`;
        return `<rect x="${x}" y="${y}" width="${width}" height="${height}" fill="${sample.color}"${opacity}/>`;
    }

    function rgbToHex(r, g, b) {
        return `#${toHex(r)}${toHex(g)}${toHex(b)}`;
    }

    function toHex(value) {
        const clamped = Math.max(0, Math.min(255, value | 0));
        return clamped.toString(16).padStart(2, '0');
    }

    function readFileAsDataURL(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = () => resolve(reader.result);
            reader.onerror = () => reject(reader.error || new Error('File reading failed'));
            reader.readAsDataURL(file);
        });
    }

    function loadImage(src) {
        return new Promise((resolve, reject) => {
            const img = new Image();
            img.onload = () => resolve(img);
            img.onerror = () => reject(new Error('Image decode error'));
            img.src = src;
        });
    }

    if (dropZone) {
        dropZone.addEventListener('dragover', (event) => {
            event.preventDefault();
            dropZone.classList.add('drag-over');
        });
        dropZone.addEventListener('dragleave', () => dropZone.classList.remove('drag-over'));
        dropZone.addEventListener('drop', (event) => {
            event.preventDefault();
            dropZone.classList.remove('drag-over');
            handleFiles(event.dataTransfer.files);
        });
    }

    if (fileInput) {
        fileInput.addEventListener('change', (event) => handleFiles(event.target.files));
    }

    if (uploadBtn && fileInput) {
        uploadBtn.addEventListener('click', () => fileInput.click());
    }

    if (convertBtn) {
        convertBtn.addEventListener('click', () => runConversion());
    }

    if (resetBtn) {
        resetBtn.addEventListener('click', resetState);
    }

    if (copyBtn) {
        copyBtn.addEventListener('click', async () => {
            if (!currentSvg) {
                alert(i18n.convertFirst || 'Upload a PNG first.');
                return;
            }
            try {
                await navigator.clipboard.writeText(currentSvg);
                updateStatus(i18n.copySuccess || 'SVG copied.');
            } catch (err) {
                console.error('png-svg: clipboard error', err);
                updateStatus(i18n.error || 'Conversion failed.');
            }
        });
    }

    if (downloadBtn) {
        downloadBtn.addEventListener('click', () => {
            if (!currentSvg || !currentFile) {
                alert(i18n.convertFirst || 'Upload a PNG first.');
                return;
            }
            const blob = new Blob([currentSvg], { type: 'image/svg+xml' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = currentFile.name.replace(/\.png$/i, '.svg');
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        });
    }

    if (detailSlider) {
        detailSlider.addEventListener('change', () => {
            if (currentFile && !isProcessing) {
                runConversion(true);
            }
        });
    }

    toggleActions(false);
})();
