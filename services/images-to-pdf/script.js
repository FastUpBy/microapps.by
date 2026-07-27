// Images to PDF - client-side merge tool
(function () {
    'use strict';

    const input = document.querySelector('#imagesInput');
    const dropZone = document.querySelector('#imagesInputDropZone');
    const dropText = document.querySelector('#imagesInputDropText');
    const uploadBtn = document.querySelector('#uploadBtn');
    const resetBtn = document.querySelector('#resetBtn');
    const enhanceToggle = document.querySelector('#enhanceToggle');
    const emptyHint = document.querySelector('#emptyHint');
    const reorderHint = document.querySelector('#reorderHint');
    const imageList = document.querySelector('#imageList');
    const actionsRow = document.querySelector('#actionsRow');
    const generateBtn = document.querySelector('#generateBtn');
    const statusText = document.querySelector('#statusText');
    const resultSection = document.querySelector('#resultSection');
    const downloadLink = document.querySelector('#downloadLink');
    const cardTemplate = document.querySelector('#imageCardTemplate');

    // Each entry: { id, file, img (HTMLImageElement), objectUrl, rotation }
    let items = [];
    let idCounter = 0;
    let dragSrcId = null;

    uploadBtn?.addEventListener('click', () => input?.click());

    input?.addEventListener('change', (e) => {
        const files = e.target.files;
        if (files && files.length) addFiles(files);
        input.value = '';
    });

    dropZone?.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.style.borderColor = 'var(--accent)';
    });

    dropZone?.addEventListener('dragleave', () => {
        dropZone.style.borderColor = 'var(--border)';
    });

    dropZone?.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.style.borderColor = 'var(--border)';
        const files = e.dataTransfer?.files;
        if (files && files.length) addFiles(files);
    });

    resetBtn?.addEventListener('click', reset);
    generateBtn?.addEventListener('click', generatePdf);

    function addFiles(fileList) {
        const files = Array.from(fileList).filter((f) => f.type && f.type.startsWith('image/'));
        if (!files.length) return;

        files.forEach((file) => {
            const objectUrl = URL.createObjectURL(file);
            const img = new Image();
            const entry = {
                id: 'img_' + (++idCounter),
                file,
                img,
                objectUrl,
                rotation: 0
            };
            items.push(entry);
            img.onload = () => renderList();
            img.onerror = () => {
                items = items.filter((it) => it.id !== entry.id);
                URL.revokeObjectURL(objectUrl);
                renderList();
            };
            img.src = objectUrl;
        });

        renderList();
    }

    function moveItem(id, delta) {
        const index = items.findIndex((it) => it.id === id);
        if (index === -1) return;
        const target = index + delta;
        if (target < 0 || target >= items.length) return;
        const [moved] = items.splice(index, 1);
        items.splice(target, 0, moved);
        renderList();
    }

    function reset() {
        items.forEach((it) => URL.revokeObjectURL(it.objectUrl));
        items = [];
        if (downloadLink.href) {
            URL.revokeObjectURL(downloadLink.href);
            downloadLink.removeAttribute('href');
        }
        resultSection.classList.add('hidden');
        statusText.textContent = '';
        renderList();
    }

    function renderList() {
        imageList.innerHTML = '';

        if (!items.length) {
            emptyHint.classList.remove('hidden');
            reorderHint.classList.add('hidden');
            actionsRow.classList.add('hidden');
            resultSection.classList.add('hidden');
            return;
        }

        emptyHint.classList.add('hidden');
        reorderHint.classList.remove('hidden');
        actionsRow.classList.remove('hidden');

        items.forEach((entry, index) => {
            const node = cardTemplate.content.firstElementChild.cloneNode(true);
            node.dataset.id = entry.id;

            const badge = document.createElement('span');
            badge.className = 'page-badge';
            badge.textContent = String(index + 1);
            node.appendChild(badge);

            const imgEl = node.querySelector('.thumb-img');
            imgEl.src = entry.objectUrl;
            imgEl.style.transform = 'rotate(' + entry.rotation + 'deg)';

            node.querySelector('.rotate-btn').addEventListener('click', () => {
                entry.rotation = (entry.rotation + 90) % 360;
                imgEl.style.transform = 'rotate(' + entry.rotation + 'deg)';
            });

            node.querySelector('.delete-btn').addEventListener('click', () => {
                URL.revokeObjectURL(entry.objectUrl);
                items = items.filter((it) => it.id !== entry.id);
                renderList();
            });

            const moveLeftBtn = node.querySelector('.move-left-btn');
            const moveRightBtn = node.querySelector('.move-right-btn');
            moveLeftBtn.disabled = index === 0;
            moveRightBtn.disabled = index === items.length - 1;

            moveLeftBtn.addEventListener('click', () => moveItem(entry.id, -1));
            moveRightBtn.addEventListener('click', () => moveItem(entry.id, 1));

            node.addEventListener('dragstart', () => {
                dragSrcId = entry.id;
                node.classList.add('dragging');
            });

            node.addEventListener('dragend', () => {
                node.classList.remove('dragging');
            });

            node.addEventListener('dragover', (e) => {
                e.preventDefault();
                node.classList.add('drag-over');
            });

            node.addEventListener('dragleave', () => {
                node.classList.remove('drag-over');
            });

            node.addEventListener('drop', (e) => {
                e.preventDefault();
                node.classList.remove('drag-over');
                if (!dragSrcId || dragSrcId === entry.id) return;
                const fromIndex = items.findIndex((it) => it.id === dragSrcId);
                const toIndex = items.findIndex((it) => it.id === entry.id);
                if (fromIndex === -1 || toIndex === -1) return;
                const [moved] = items.splice(fromIndex, 1);
                items.splice(toIndex, 0, moved);
                dragSrcId = null;
                renderList();
            });

            imageList.appendChild(node);
        });
    }

    // Draws the image onto a canvas honoring the chosen rotation.
    function drawRotated(img, rotation) {
        const canvas = document.createElement('canvas');
        const w = img.naturalWidth;
        const h = img.naturalHeight;
        const swapped = rotation === 90 || rotation === 270;
        canvas.width = swapped ? h : w;
        canvas.height = swapped ? w : h;

        const ctx = canvas.getContext('2d');
        ctx.save();
        if (rotation === 90) {
            ctx.translate(h, 0);
            ctx.rotate(Math.PI / 2);
        } else if (rotation === 180) {
            ctx.translate(w, h);
            ctx.rotate(Math.PI);
        } else if (rotation === 270) {
            ctx.translate(0, w);
            ctx.rotate(-Math.PI / 2);
        }
        ctx.drawImage(img, 0, 0);
        ctx.restore();

        return canvas;
    }

    // Simple auto-enhance: histogram contrast stretch + light sharpening.
    function enhanceCanvas(canvas) {
        const ctx = canvas.getContext('2d');
        const w = canvas.width;
        const h = canvas.height;
        const imageData = ctx.getImageData(0, 0, w, h);
        const d = imageData.data;

        let min = 255;
        let max = 0;
        for (let i = 0; i < d.length; i += 4) {
            for (let c = 0; c < 3; c++) {
                const v = d[i + c];
                if (v < min) min = v;
                if (v > max) max = v;
            }
        }
        const range = Math.max(1, max - min);

        for (let i = 0; i < d.length; i += 4) {
            for (let c = 0; c < 3; c++) {
                let v = ((d[i + c] - min) * 255) / range;
                v = (v - 128) * 1.08 + 128 + 6;
                d[i + c] = v < 0 ? 0 : v > 255 ? 255 : v;
            }
        }

        // Light 3x3 sharpen convolution applied on top of the stretched data.
        const src = new Uint8ClampedArray(d);
        const kernel = [0, -0.5, 0, -0.5, 3, -0.5, 0, -0.5, 0];
        for (let y = 1; y < h - 1; y++) {
            for (let x = 1; x < w - 1; x++) {
                const idx = (y * w + x) * 4;
                for (let c = 0; c < 3; c++) {
                    let sum = 0;
                    let k = 0;
                    for (let ky = -1; ky <= 1; ky++) {
                        for (let kx = -1; kx <= 1; kx++) {
                            const sIdx = ((y + ky) * w + (x + kx)) * 4 + c;
                            sum += src[sIdx] * kernel[k++];
                        }
                    }
                    d[idx + c] = sum < 0 ? 0 : sum > 255 ? 255 : sum;
                }
            }
        }

        ctx.putImageData(imageData, 0, 0);
    }

    function canvasToJpegBytes(canvas, quality) {
        return new Promise((resolve, reject) => {
            canvas.toBlob((blob) => {
                if (!blob) {
                    reject(new Error('toBlob failed'));
                    return;
                }
                blob.arrayBuffer().then((buf) => resolve(new Uint8Array(buf))).catch(reject);
            }, 'image/jpeg', quality);
        });
    }

    async function generatePdf() {
        if (!items.length) return;

        generateBtn.disabled = true;
        statusText.textContent = window.imagesToPdfLang?.processing || 'Processing...';
        resultSection.classList.add('hidden');

        try {
            const pages = [];
            const enhance = !!enhanceToggle?.checked;

            for (const entry of items) {
                const canvas = drawRotated(entry.img, entry.rotation);
                if (enhance) enhanceCanvas(canvas);
                const jpegBytes = await canvasToJpegBytes(canvas, 0.92);
                // 96 DPI px -> pt conversion (1pt = 1/72in)
                const ptW = canvas.width * 0.75;
                const ptH = canvas.height * 0.75;
                pages.push({ jpeg: jpegBytes, w: canvas.width, h: canvas.height, ptW, ptH });
            }

            const pdfBlob = buildPdf(pages);
            const url = URL.createObjectURL(pdfBlob);

            if (downloadLink.href) URL.revokeObjectURL(downloadLink.href);
            downloadLink.href = url;
            resultSection.classList.remove('hidden');
            statusText.textContent = '';
        } catch (err) {
            statusText.textContent = 'Error: ' + err.message;
        } finally {
            generateBtn.disabled = false;
        }
    }

    // Minimal PDF writer: one page per image, image embedded as a JPEG
    // (DCTDecode) XObject scaled to fill the page. No external libraries.
    function buildPdf(pages) {
        const encoder = new TextEncoder();
        const chunks = [];
        let offset = 0;
        const objOffsets = {};

        function push(data) {
            const bytes = typeof data === 'string' ? encoder.encode(data) : data;
            chunks.push(bytes);
            offset += bytes.length;
        }

        function startObj(num) {
            objOffsets[num] = offset;
            push(num + ' 0 obj\n');
        }

        function endObj() {
            push('\nendobj\n');
        }

        function pad10(n) {
            return String(n).padStart(10, '0');
        }

        push(new Uint8Array([0x25, 0x50, 0x44, 0x46, 0x2d, 0x31, 0x2e, 0x34, 0x0a])); // %PDF-1.4\n
        push(new Uint8Array([0x25, 0xe2, 0xe3, 0xcf, 0xd3, 0x0a])); // binary marker comment

        const n = pages.length;

        // obj 1: Catalog, obj 2: Pages
        startObj(1);
        push('<< /Type /Catalog /Pages 2 0 R >>');
        endObj();

        const kids = [];
        for (let i = 0; i < n; i++) kids.push((3 + i * 3) + ' 0 R');

        startObj(2);
        push('<< /Type /Pages /Kids [' + kids.join(' ') + '] /Count ' + n + ' >>');
        endObj();

        pages.forEach((page, i) => {
            const pageObj = 3 + i * 3;
            const contentObj = 4 + i * 3;
            const imageObj = 5 + i * 3;
            const content = 'q\n' + page.ptW + ' 0 0 ' + page.ptH + ' 0 0 cm\n/Im0 Do\nQ';

            startObj(pageObj);
            push(
                '<< /Type /Page /Parent 2 0 R /MediaBox [0 0 ' + page.ptW + ' ' + page.ptH + ']' +
                ' /Resources << /XObject << /Im0 ' + imageObj + ' 0 R >> >>' +
                ' /Contents ' + contentObj + ' 0 R >>'
            );
            endObj();

            startObj(contentObj);
            push('<< /Length ' + content.length + ' >>\nstream\n' + content + '\nendstream');
            endObj();

            startObj(imageObj);
            push(
                '<< /Type /XObject /Subtype /Image /Width ' + page.w + ' /Height ' + page.h +
                ' /ColorSpace /DeviceRGB /BitsPerComponent 8 /Filter /DCTDecode /Length ' + page.jpeg.length + ' >>\nstream\n'
            );
            push(page.jpeg);
            push('\nendstream');
            endObj();
        });

        const totalObjs = 2 + n * 3;
        const xrefStart = offset;
        push('xref\n');
        push('0 ' + (totalObjs + 1) + '\n');
        push('0000000000 65535 f \n');
        for (let num = 1; num <= totalObjs; num++) {
            push(pad10(objOffsets[num]) + ' 00000 n \n');
        }
        push('trailer\n');
        push('<< /Size ' + (totalObjs + 1) + ' /Root 1 0 R >>\n');
        push('startxref\n');
        push(xrefStart + '\n');
        push('%%EOF');

        return new Blob(chunks, { type: 'application/pdf' });
    }
})();
