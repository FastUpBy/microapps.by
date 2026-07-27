document.addEventListener('DOMContentLoaded', () => {
    const canvas = document.getElementById('editor-canvas');
    const ctx = canvas.getContext('2d');
    const uploadInput = document.getElementById('upload-input');
    const dropZone = document.getElementById('upload-inputDropZone');
    const placeholderText = document.getElementById('placeholder-text');
    
    // Controls (may be absent depending on layout)
    const btnZoomIn = document.getElementById('zoom-in');
    const btnZoomOut = document.getElementById('zoom-out');
    const btnRotate = document.getElementById('rotate');
    const btnDownloadIco = document.getElementById('btn-download-ico');
    const btnDownloadPng = document.getElementById('btn-download-png');
    const pngSizeSelect = document.getElementById('png-size');

    // Previews
    const preview16 = document.getElementById('preview-16');
    const preview32 = document.getElementById('preview-32');
    const preview48 = document.getElementById('preview-48');
    const previewTab = document.getElementById('preview-tab');

    // State
    let image = null;
    let rotation = 0;
    let scale = 1;
    let offsetX = 0;
    let offsetY = 0;
    let isDragging = false;
    let lastMouseX = 0;
    let lastMouseY = 0;
    
    // Constants
    const CROP_SIZE = 256; // Internal working size for crop area
    
    // Initialize canvas size
    function resizeCanvas() {
        const container = canvas.parentElement;
        canvas.width = container.clientWidth;
        canvas.height = container.clientHeight;
        if (image) draw();
    }
    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();

    // Upload
    function handleFile(file) {
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = (event) => {
                const img = new Image();
                img.onload = () => {
                    image = img;
                    resetView();
                    placeholderText.style.display = 'none';
                    // show canvas and controls
                    canvas.style.display = '';
                    const downloadGrid = document.getElementById('download-grid');
                    if (downloadGrid) downloadGrid.style.display = '';
                    const mainGrid = document.getElementById('main-grid');
                    if (mainGrid) mainGrid.style.display = '';
                    // ensure canvas is sized after it becomes visible
                    resizeCanvas();
                    btnDownloadIco.disabled = false;
                    btnDownloadPng.disabled = false;
                    draw();
                };
                img.src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    if (uploadInput) {
        uploadInput.addEventListener('change', (e) => {
            handleFile(e.target.files[0]);
        });
    }

    if (dropZone) {
        dropZone.addEventListener('click', () => uploadInput.click());
        
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.style.borderColor = 'var(--bs-primary)';
            dropZone.style.backgroundColor = 'rgba(var(--bs-primary-rgb), 0.1)';
        });

        dropZone.addEventListener('dragleave', (e) => {
            e.preventDefault();
            dropZone.style.borderColor = '';
            dropZone.style.backgroundColor = '';
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.style.borderColor = '';
            dropZone.style.backgroundColor = '';
            handleFile(e.dataTransfer.files[0]);
        });
    }

    function resetView() {
        rotation = 0;
        // Fit image to crop area initially
        const minDim = Math.min(image.width, image.height);
        scale = CROP_SIZE / minDim;
        offsetX = 0;
        offsetY = 0;
    }

    // Controls
    if (btnZoomIn) btnZoomIn.addEventListener('click', () => { scale *= 1.1; draw(); });
    if (btnZoomOut) btnZoomOut.addEventListener('click', () => { scale /= 1.1; draw(); });
    if (btnRotate) btnRotate.addEventListener('click', () => { rotation = (rotation + 90) % 360; draw(); });

    // Mouse / Touch Interaction (guard canvas presence)
    if (canvas) {
        canvas.addEventListener('mousedown', startDrag);
        canvas.addEventListener('touchstart', (e) => startDrag(e.touches[0]));
    }
    window.addEventListener('mousemove', drag);
    window.addEventListener('touchmove', (e) => drag(e.touches[0]));
    window.addEventListener('mouseup', endDrag);
    window.addEventListener('touchend', endDrag);

    function startDrag(e) {
        if (!image) return;
        isDragging = true;
        lastMouseX = e.clientX;
        lastMouseY = e.clientY;
    }

    function drag(e) {
        if (!isDragging) return;
        const dx = e.clientX - lastMouseX;
        const dy = e.clientY - lastMouseY;
        lastMouseX = e.clientX;
        lastMouseY = e.clientY;
        
        offsetX += dx;
        offsetY += dy;
        draw();
    }

    function endDrag() {
        isDragging = false;
    }

    function draw() {
        if (!image) return;

        // Clear
        ctx.fillStyle = '#212529'; // Dark bg
        ctx.fillRect(0, 0, canvas.width, canvas.height);

        const cx = canvas.width / 2;
        const cy = canvas.height / 2;

        // Draw Image
        ctx.save();
        ctx.translate(cx + offsetX, cy + offsetY);
        ctx.rotate(rotation * Math.PI / 180);
        ctx.scale(scale, scale);
        ctx.drawImage(image, -image.width / 2, -image.height / 2);
        ctx.restore();

        // Draw Overlay (Darken outside crop area)
        ctx.fillStyle = 'rgba(0, 0, 0, 0.5)';
        ctx.beginPath();
        ctx.rect(0, 0, canvas.width, canvas.height);
        
        // Cut out the crop hole
        const cropX = cx - CROP_SIZE / 2;
        const cropY = cy - CROP_SIZE / 2;
        
        ctx.moveTo(cropX, cropY);
        ctx.lineTo(cropX + CROP_SIZE, cropY);
        ctx.lineTo(cropX + CROP_SIZE, cropY + CROP_SIZE);
        ctx.lineTo(cropX, cropY + CROP_SIZE);
        ctx.lineTo(cropX, cropY);
        ctx.closePath();
        
        ctx.fill('evenodd');

        // Draw Crop Border
        ctx.strokeStyle = '#fff';
        ctx.lineWidth = 2;
        ctx.strokeRect(cropX, cropY, CROP_SIZE, CROP_SIZE);

        updatePreviews();
    }

    function getCroppedCanvas(size) {
        const c = document.createElement('canvas');
        c.width = size;
        c.height = size;
        const cx = c.getContext('2d');

        // We need to map the crop area from the main canvas to this new canvas
        // The crop area is centered at (canvas.width/2, canvas.height/2) with size CROP_SIZE
        // We need to apply the same transformations (translate, rotate, scale) but relative to the crop center
        
        cx.translate(size / 2, size / 2);
        
        // Apply user transformations
        // The offset in the main canvas is relative to the center.
        // We need to scale the offset because we are drawing into a different sized canvas?
        // No, we should draw the image with the same transformations but scaled down/up to fit 'size' instead of 'CROP_SIZE'
        
        const ratio = size / CROP_SIZE;
        
        cx.translate(offsetX * ratio, offsetY * ratio);
        cx.rotate(rotation * Math.PI / 180);
        cx.scale(scale * ratio, scale * ratio);
        
        cx.drawImage(image, -image.width / 2, -image.height / 2);
        
        return c;
    }

    function updatePreviews() {
        const c16 = getCroppedCanvas(16);
        const c32 = getCroppedCanvas(32);
        const c48 = getCroppedCanvas(48);
        if (preview16) preview16.src = c16.toDataURL();
        if (preview32) preview32.src = c32.toDataURL();
        if (preview48) preview48.src = c48.toDataURL();
        if (previewTab) previewTab.src = c16.toDataURL();
    }

    // Download Handlers
    if (btnDownloadPng) {
        btnDownloadPng.addEventListener('click', async () => {
            const val = pngSizeSelect ? pngSizeSelect.value : '512';
            if (val === 'all') {
                // produce ZIP with multiple PNG sizes
                const sizes = [16, 32, 48, 64, 128, 180, 192, 512];
                const files = [];
                for (const size of sizes) {
                    const c = getCroppedCanvas(size);
                    const blob = await new Promise(resolve => c.toBlob(resolve, 'image/png'));
                    const arr = new Uint8Array(await blob.arrayBuffer());
                    files.push({ name: `favicon-${size}x${size}.png`, data: arr });
                }
                const zipBuffer = createZip(files);
                const zipBlob = new Blob([zipBuffer], { type: 'application/zip' });
                await downloadBlob(zipBlob, 'favicons.zip');
            } else {
                const size = parseInt(val);
                const c = getCroppedCanvas(size);
                const blob = await new Promise(resolve => c.toBlob(resolve, 'image/png'));
                await downloadBlob(blob, `favicon-${size}x${size}.png`);
            }
        });
    }

    if (btnDownloadIco) {
        btnDownloadIco.addEventListener('click', async () => {
            const val = pngSizeSelect ? pngSizeSelect.value : 'all';
            // When user selected 'all' -> produce a ZIP containing PNGs and ICO
            const sizes = [16, 32, 48, 64, 128];
            if (val === 'all') {
                const files = [];
                const icoImages = [];
                for (const size of sizes) {
                    const c = getCroppedCanvas(size);
                    const blob = await new Promise(resolve => c.toBlob(resolve, 'image/png'));
                    const arr = new Uint8Array(await blob.arrayBuffer());
                    files.push({ name: `favicon-${size}x${size}.png`, data: arr });
                    icoImages.push({ width: size, height: size, data: arr.buffer });
                }

                // try to create ICO (may fail in some environments)
                let icoBuffer = null;
                try {
                    icoBuffer = createIco(icoImages);
                } catch (e) {
                    console.warn('ICO creation failed, will skip ICO in ZIP', e);
                }

                if (icoBuffer) {
                    const icoArr = new Uint8Array(icoBuffer);
                    files.unshift({ name: 'favicon.ico', data: icoArr });
                }

                const zipBuffer = createZip(files);
                const zipBlob = new Blob([zipBuffer], { type: 'application/zip' });
                await downloadBlob(zipBlob, 'favicons.zip');
            } else {
                // specific size -> produce single-size ICO (1 image) if possible
                const size = parseInt(val);
                const c = getCroppedCanvas(size);
                const blob = await new Promise(resolve => c.toBlob(resolve, 'image/png'));
                const arr = new Uint8Array(await blob.arrayBuffer());
                // Build ICO with single PNG image
                const icoBuffer = createIco([{ width: size, height: size, data: arr.buffer }]);
                const icoBlob = new Blob([icoBuffer], { type: 'image/x-icon' });
                await downloadBlob(icoBlob, `favicon-${size}x${size}.ico`);
            }
        });
    }

    // Helper to download a Blob safely.
    // If the page is served over HTTP (insecure), some browsers warn when loading blob: URLs.
    // In that case we convert the blob to a data: URL via FileReader and use that instead.
    // Otherwise we use URL.createObjectURL and revoke it shortly after.
    function downloadBlob(blob, filename) {
        return new Promise((resolve) => {
            const link = document.createElement('a');
            link.download = filename || '';

            if (location.protocol === 'http:') {
                const fr = new FileReader();
                fr.onload = () => {
                    link.href = fr.result;
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    resolve();
                };
                fr.readAsDataURL(blob);
            } else {
                const url = URL.createObjectURL(blob);
                link.href = url;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                // revoke after a short delay to ensure download starts
                setTimeout(() => URL.revokeObjectURL(url), 4000);
                resolve();
            }
        });
    }

    // --- ZIP writer (store - no compression) ---
    function crc32(buf) {
        const table = crc32.table || (crc32.table = (function() {
            const t = new Uint32Array(256);
            for (let i = 0; i < 256; i++) {
                let c = i;
                for (let k = 0; k < 8; k++) c = ((c & 1) ? (0xEDB88320 ^ (c >>> 1)) : (c >>> 1));
                t[i] = c >>> 0;
            }
            return t;
        })());
        let crc = 0xFFFFFFFF;
        for (let i = 0; i < buf.length; i++) crc = (crc >>> 8) ^ table[(crc ^ buf[i]) & 0xFF];
        return (crc ^ 0xFFFFFFFF) >>> 0;
    }

    function writeUint32LE(arr, offset, value) {
        arr[offset] = value & 0xFF;
        arr[offset+1] = (value >>> 8) & 0xFF;
        arr[offset+2] = (value >>> 16) & 0xFF;
        arr[offset+3] = (value >>> 24) & 0xFF;
    }

    function writeUint16LE(arr, offset, value) {
        arr[offset] = value & 0xFF;
        arr[offset+1] = (value >>> 8) & 0xFF;
    }

    function createZip(files) {
        const fileEntries = [];
        const centralDir = [];
        let offset = 0;

        const encoder = new TextEncoder();

        for (const f of files) {
            const nameBuf = encoder.encode(f.name);
            const data = f.data;
            const crc = crc32(data);
            const compSize = data.length;
            const uncompSize = data.length;

            // local file header
            const localHeader = new Uint8Array(30 + nameBuf.length);
            // signature
            writeUint32LE(localHeader, 0, 0x04034b50);
            writeUint16LE(localHeader, 4, 20); // version needed
            writeUint16LE(localHeader, 6, 0); // flags
            writeUint16LE(localHeader, 8, 0); // compression 0 = store
            writeUint16LE(localHeader, 10, 0); // mod time
            writeUint16LE(localHeader, 12, 0); // mod date
            writeUint32LE(localHeader, 14, crc);
            writeUint32LE(localHeader, 18, compSize);
            writeUint32LE(localHeader, 22, uncompSize);
            writeUint16LE(localHeader, 26, nameBuf.length);
            writeUint16LE(localHeader, 28, 0); // extra
            localHeader.set(nameBuf, 30);

            fileEntries.push(localHeader);
            fileEntries.push(data);

            // central directory header
            const cent = new Uint8Array(46 + nameBuf.length);
            writeUint32LE(cent, 0, 0x02014b50);
            writeUint16LE(cent, 4, 0); // version made by
            writeUint16LE(cent, 6, 20); // version needed
            writeUint16LE(cent, 8, 0); // flags
            writeUint16LE(cent, 10, 0); // compression
            writeUint16LE(cent, 12, 0); // mod time
            writeUint16LE(cent, 14, 0); // mod date
            writeUint32LE(cent, 16, crc);
            writeUint32LE(cent, 20, compSize);
            writeUint32LE(cent, 24, uncompSize);
            writeUint16LE(cent, 28, nameBuf.length);
            writeUint16LE(cent, 30, 0); // extra
            writeUint16LE(cent, 32, 0); // comment
            writeUint16LE(cent, 34, 0); // disk
            writeUint16LE(cent, 36, 0); // int attrs
            writeUint32LE(cent, 38, 0); // ext attrs
            writeUint32LE(cent, 42, offset); // local header offset
            cent.set(nameBuf, 46);

            centralDir.push(cent);

            offset += localHeader.length + data.length;
        }

        // calculate total size
        let totalSize = 0;
        for (const part of fileEntries) totalSize += part.length;
        let centralSize = 0;
        for (const c of centralDir) centralSize += c.length;

        const endSize = 22;
        const zip = new Uint8Array(totalSize + centralSize + endSize);
        let ptr = 0;
        for (const part of fileEntries) {
            zip.set(part, ptr); ptr += part.length;
        }
        const centralStart = ptr;
        for (const c of centralDir) { zip.set(c, ptr); ptr += c.length; }

        // end of central directory
        writeUint32LE(zip, ptr, 0x06054b50); ptr += 4;
        writeUint16LE(zip, ptr, 0); ptr += 2; // disk
        writeUint16LE(zip, ptr, 0); ptr += 2; // disk with central
        writeUint16LE(zip, ptr, centralDir.length); ptr += 2; // entries this disk
        writeUint16LE(zip, ptr, centralDir.length); ptr += 2; // total entries
        writeUint32LE(zip, ptr, centralSize); ptr += 4; // central size
        writeUint32LE(zip, ptr, centralStart); ptr += 4; // central offset
        writeUint16LE(zip, ptr, 0); ptr += 2; // comment len

        return zip.buffer;
    }

    function createIco(images) {
        const headerSize = 6;
        const entrySize = 16;
        let offset = headerSize + (entrySize * images.length);
        
        let totalSize = offset;
        images.forEach(img => totalSize += img.data.byteLength);
        
        const buffer = new ArrayBuffer(totalSize);
        const view = new DataView(buffer);
        const bytes = new Uint8Array(buffer);
        
        // Header
        view.setUint16(0, 0, true); // Reserved
        view.setUint16(2, 1, true); // Type (1 = ICO)
        view.setUint16(4, images.length, true); // Count
        
        let currentEntryOffset = headerSize;
        let currentImageOffset = offset;
        
        images.forEach(img => {
            // Entry
            // Width/height: 0 means 256 in ICO spec
            view.setUint8(currentEntryOffset, img.width >= 256 ? 0 : img.width);
            view.setUint8(currentEntryOffset + 1, img.height >= 256 ? 0 : img.height);
            view.setUint8(currentEntryOffset + 2, 0); // Colors
            view.setUint8(currentEntryOffset + 3, 0); // Reserved
            view.setUint16(currentEntryOffset + 4, 1, true); // Planes
            view.setUint16(currentEntryOffset + 6, 32, true); // BPP
            view.setUint32(currentEntryOffset + 8, img.data.byteLength, true); // Size
            view.setUint32(currentEntryOffset + 12, currentImageOffset, true); // Offset
            
            // Image Data
            const imgData = new Uint8Array(img.data);
            bytes.set(imgData, currentImageOffset);
            
            currentEntryOffset += entrySize;
            currentImageOffset += img.data.byteLength;
        });
        
        return buffer;
    }
});
