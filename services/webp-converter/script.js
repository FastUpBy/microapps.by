// WebP Converter Script
(function() {
    const imageInput = document.getElementById('imageInput');
    const qualitySlider = document.getElementById('qualitySlider');
    const qualityValue = document.getElementById('qualitySliderValue');
    const previewSection = document.getElementById('previewSection');
    const originalPreview = document.getElementById('originalPreview');
    const webpPreview = document.getElementById('webpPreview');
    const divider = document.getElementById('divider');
    const downloadAvifBtn = document.getElementById('downloadAvifBtn');
    const originalSizeSpan = document.getElementById('originalSize');
    const webpSizeSpan = document.getElementById('webpSize');
    const savedSizeSpan = document.getElementById('savedSize');
    const downloadBtn = document.getElementById('downloadBtn');
    const uploadBtn = document.getElementById('uploadBtn');
    const dropZone = document.getElementById('imageInputDropZone');
    const dropText = document.getElementById('imageInputDropText');
    const batchSection = document.getElementById('batchSection');
    const resetBtn = document.getElementById('resetBtn');
    const filesTableBody = document.getElementById('filesTableBody');
    const downloadAllBtn = document.getElementById('downloadAllBtn');

    let originalFile = null;
    let webpBlob = null;
    let currentMode = 'single';
    let batchFiles = [];
    let totalOrig = 0;
    let totalWebp = 0;
    let totalSaved = 0;

    // Check AVIF support and hide button if not supported
    const supportsAvif = (() => {
        const canvas = document.createElement('canvas');
        canvas.width = 1;
        canvas.height = 1;
        const ctx = canvas.getContext('2d');
        ctx.fillRect(0, 0, 1, 1);
        try {
            canvas.toBlob(() => {}, 'image/avif');
            return true;
        } catch {
            return false;
        }
    })();
    if (!supportsAvif && downloadAvifBtn) {
        downloadAvifBtn.style.display = 'none';
    }

    // Safety: ensure required elements exist
    if (!imageInput || !qualitySlider || !previewSection || !originalPreview || !webpPreview || !divider || !originalSizeSpan || !webpSizeSpan || !savedSizeSpan || !downloadBtn || !dropZone) {
        console.error('WebP converter: required DOM elements not found');
        return;
    }

    // Initialize displayed strength (slider shows compression strength)
    // qualityValue updates are handled by the range component

    function setMode(mode) {
        currentMode = mode;
        if (mode === 'batch') {
            previewSection.classList.add('hidden');
            batchSection.classList.remove('hidden');
        } else {
            batchSection.classList.add('hidden');
            // previewSection will be shown on file upload
        }
        updateResultSummary(mode);
    }

    function updateResultSummary(mode) {
        const resultSummary = document.getElementById('resultSummary');
        if (!resultSummary) return;
        if (mode === 'batch') {
            resultSummary.innerHTML = `
                <p><strong>${window.t ? window.t['total_original'] || 'Общий оригинал:' : 'Общий оригинал:'}</strong> <span id="totalOrigSpan">${formatBytes(totalOrig)}</span></p>
                <p><strong>${window.t ? window.t['total_compressed'] || 'Общий сжатый:' : 'Общий сжатый:'}</strong> <span id="totalWebpSpan">${formatBytes(totalWebp)}</span></p>
                <p><strong>${window.t ? window.t['total_saved'] || 'Общая экономия:' : 'Общая экономия:'}</strong> <span id="totalSavedSpan">${formatBytes(totalSaved)}</span></p>
            `;
        } else {
            resultSummary.innerHTML = `
                <p><strong>${window.t ? window.t['original_size'] || 'Исходный размер:' : 'Исходный размер:'}</strong> <span id="originalSize">${originalFile ? formatBytes(originalFile.size) : ''}</span></p>
                <p><strong>${window.t ? window.t['compressed_size'] || 'Размер после сжатия:' : 'Размер после сжатия:'}</strong> <span id="webpSize">${webpBlob ? formatBytes(webpBlob.size) : ''}</span></p>
                <p><strong>${window.t ? window.t['saved'] || 'Сэкономлено:' : 'Сэкономлено:'}</strong> <span id="savedSize">${originalFile && webpBlob ? formatBytes(Math.max(0, originalFile.size - webpBlob.size)) : ''}</span></p>
            `;
        }
    }

    // Update displayed strength and convert (strength 0..100 -> quality = 1 - strength/100)
    qualitySlider.addEventListener('input', function() {
        const strength = Math.min(100, Math.max(0, parseInt(this.value, 10)));
        // qualityValue updates are handled by the range component
        const quality = 1 - (strength / 100);
        if (currentMode === 'batch') {
            let completed = 0;
            const total = batchFiles.length;
            totalOrig = 0;
            totalWebp = 0;
            totalSaved = 0;
            batchFiles.forEach((item, index) => {
                convertToWebP(item.file, quality, (blob) => {
                    item.webpBlob = blob;
                    item.webpSize = blob.size;
                    updateTableRow(index, item.webpSize);
                    totalOrig += item.origSize;
                    totalWebp += item.webpSize;
                    totalSaved += item.origSize - item.webpSize;
                    completed++;
                    if (completed === total) {
                        updateResultSummary('batch');
                    }
                });
            });
        } else if (originalFile) {
            convertToWebP(originalFile, quality);
        }
    });

    // Wire upload button (visible) to hidden file input
    if (uploadBtn) {
        uploadBtn.addEventListener('click', function() {
            imageInput.click();
        });
    }

    // Reset button
    if (resetBtn) {
        resetBtn.addEventListener('click', resetAll);
    }

    // Download all converted files as a single ZIP archive
    if (downloadAllBtn) {
        downloadAllBtn.addEventListener('click', async function() {
            if (!batchFiles.length) return;
            downloadAllBtn.disabled = true;
            try {
                const usedNames = new Set();
                const entries = batchFiles.map(item => {
                    let name = item.file.name.replace(/\.(png|jpg|jpeg)$/i, '.webp');
                    let unique = name;
                    let n = 1;
                    while (usedNames.has(unique)) {
                        unique = name.replace(/\.webp$/i, `_${n}.webp`);
                        n++;
                    }
                    usedNames.add(unique);
                    return { name: unique, blob: item.webpBlob };
                });
                const zipBlob = await buildZip(entries);
                const url = URL.createObjectURL(zipBlob);
                const a = document.createElement('a');
                a.href = url;
                a.download = 'webp-images.zip';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            } catch (err) {
                console.error('ZIP build error', err);
            } finally {
                downloadAllBtn.disabled = false;
            }
        });
    }

    // Simple drag & drop support
    if (dropZone) {
        dropZone.addEventListener('dragover', function(e) {
            e.preventDefault();
            dropZone.classList.add('drag-over');
        });
        dropZone.addEventListener('dragleave', function() {
            dropZone.classList.remove('drag-over');
        });
        dropZone.addEventListener('drop', function(e) {
            e.preventDefault();
            dropZone.classList.remove('drag-over');
            const files = Array.from(e.dataTransfer.files).filter(f => f.type.match('image/(png|jpeg|jpg)'));
            if (files.length === 1) {
                setMode('single');
                handleFile(files[0]);
            } else if (files.length > 1) {
                setMode('batch');
                handleBatchFiles(files);
            }
        });
    }

    // Handle file upload
    imageInput.addEventListener('change', function(e) {
        const files = Array.from(e.target.files);
        
        // Если уже в batch режиме (есть файлы в таблице), добавляем все файлы в batch
        if (currentMode === 'batch' || files.length > 1) {
            setMode('batch');
            handleBatchFiles(files);
        } else if (files.length === 1) {
            // Только если это первый файл и режим single
            setMode('single');
            handleFile(files[0]);
        }
    });

    // Divider drag logic (mouse, touch, keyboard)
    // Настоящая шторка: оригинал снизу, результат сверху, divider двигает clip-path webpPreview слева
    function setDividerByClientX(clientX) {
        const rect = originalPreview.getBoundingClientRect();
        let pct = ((clientX - rect.left) / rect.width) * 100;
        pct = Math.max(0, Math.min(100, pct));
        // Обрезаем webpPreview слева, чтобы слева был оригинал, справа — результат
        webpPreview.style.clipPath = `inset(0 0 0 ${pct}%)`;
        divider.style.left = pct + '%';
        divider.setAttribute('aria-valuenow', Math.round(pct));
    }

    let dragging = false;
    divider.addEventListener('mousedown', function(e) {
        e.preventDefault();
        dragging = true;
        document.body.style.userSelect = 'none';
    });
    document.addEventListener('mousemove', function(e) {
        if (!dragging) return;
        setDividerByClientX(e.clientX);
    });
    document.addEventListener('mouseup', function() {
        if (dragging) {
            dragging = false;
            document.body.style.userSelect = '';
        }
    });

    // Touch support
    divider.addEventListener('touchstart', function(e) {
        dragging = true;
    }, {passive: true});
    document.addEventListener('touchmove', function(e) {
        if (!dragging) return;
        const t = e.touches[0];
        setDividerByClientX(t.clientX);
    }, {passive: true});
    document.addEventListener('touchend', function() { dragging = false; });

    // Keyboard accessibility
    divider.addEventListener('keydown', function(e) {
        const step = e.shiftKey ? 10 : 1;
        let val = parseInt(divider.getAttribute('aria-valuenow') || '50', 10);
        if (e.key === 'ArrowLeft' || e.key === 'ArrowDown') {
            val = Math.max(0, val - step);
        } else if (e.key === 'ArrowRight' || e.key === 'ArrowUp') {
            val = Math.min(100, val + step);
        } else {
            return;
        }
        const rect = originalPreview.getBoundingClientRect();
        const clientX = rect.left + (val / 100) * rect.width;
        setDividerByClientX(clientX);
        e.preventDefault();
    });

    function handleFile(file) {
        if (!file.type || (!file.type.match('image/png') && !file.type.match('image/jpeg'))) {
            alert('Please select a PNG or JPG image');
            return;
        }
        originalFile = file;
        const strength = Math.min(100, Math.max(0, parseInt(qualitySlider.value, 10)));
        const quality = 1 - (strength / 100);
        convertToWebP(file, quality);
    }

    function handleBatchFiles(files) {
        // Не очищаем batchFiles и таблицу — добавляем к существующим
        // batchFiles = [];
        // filesTableBody.innerHTML = '';
        // totalOrig = 0;
        // totalWebp = 0;
        // totalSaved = 0;
        let completed = 0;
        const totalFiles = files.length;
        files.forEach(file => {
            if (!file.type.match('image/(png|jpeg|jpg)')) return;
            const strength = parseInt(qualitySlider.value, 10);
            const quality = 1 - (strength / 100);
            convertToWebP(file, quality, (blob) => {
                const origSize = file.size;
                const webpSize = blob.size;
                batchFiles.push({file, webpBlob: blob, origSize, webpSize});
                addTableRow(file.name, origSize, webpSize, batchFiles.length - 1);
                totalOrig += origSize;
                totalWebp += webpSize;
                totalSaved += origSize - webpSize;
                completed++;
                if (completed === totalFiles) {
                    updateResultSummary('batch');
                }
            });
        });
    }

    function addTableRow(name, origSize, webpSize, index) {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="border border-muted p-2">${name}</td>
            <td class="border border-muted p-2">${formatBytes(origSize)}</td>
            <td class="border border-muted p-2">${formatBytes(webpSize)}</td>
            <td class="border border-muted p-2">
                <button class="btn delete-btn" data-index="${index}">${window.t ? window.t['delete'] || 'Удалить' : 'Удалить'}</button>
                <button class="btn download-btn" data-index="${index}">${window.t ? window.t['download_button'] || 'Скачать' : 'Скачать'}</button>
            </td>
        `;
        filesTableBody.appendChild(row);
        row.querySelector('.delete-btn').addEventListener('click', () => {
            const item = batchFiles[index];
            totalOrig -= item.origSize;
            totalWebp -= item.webpSize;
            totalSaved -= item.origSize - item.webpSize;
            batchFiles.splice(index, 1);
            row.remove();
            // Update indices
            const rows = filesTableBody.querySelectorAll('tr');
            rows.forEach((r, i) => {
                r.querySelector('.delete-btn').dataset.index = i;
                r.querySelector('.download-btn').dataset.index = i;
            });
            updateResultSummary('batch');
        });
        row.querySelector('.download-btn').addEventListener('click', () => {
            const item = batchFiles[index];
            if (item) {
                const url = URL.createObjectURL(item.webpBlob);
                const a = document.createElement('a');
                a.href = url;
                a.download = item.file.name.replace(/\.(png|jpg|jpeg)$/i, '.webp');
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            }
        });
    }

    function updateTableRow(index, webpSize) {
        const rows = filesTableBody.querySelectorAll('tr');
        if (rows[index]) {
            const cells = rows[index].querySelectorAll('td');
            if (cells[2]) cells[2].textContent = formatBytes(webpSize);
        }
    }

    // Convert image to WebP
    function convertToWebP(file, quality, callback) {
        try {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = new Image();
                img.onload = function() {
                    const canvas = document.createElement('canvas');
                    canvas.width = img.width;
                    canvas.height = img.height;
                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0);

                    // Convert to WebP
                    if (!canvas.toBlob) {
                        console.error('canvas.toBlob is not supported in this browser');
                        return;
                    }
                    canvas.toBlob(function(blob) {
                        if (!blob) {
                            console.error('Conversion to WebP returned null blob');
                            return;
                        }
                        if (callback) {
                            callback(blob);
                        } else {
                            webpBlob = blob;

                            // Display previews
                            originalPreview.src = e.target.result;
                            try {
                                webpPreview.src = URL.createObjectURL(blob);
                                // ensure overlay image matches dimensions
                                webpPreview.onload = function() {
                                    // default: divider на середине, результат обрезан слева на 50%
                                    webpPreview.style.clipPath = 'inset(0 0 0 50%)';
                                    divider.style.left = '50%';
                                    divider.setAttribute('aria-valuenow', '50');
                                };
                            } catch (err) {
                                console.error('Cannot create object URL for blob', err);
                            }

                            // Calculate sizes
                            const originalSize = file.size || 0;
                            const webpSize = blob.size || 0;
                            const saved = Math.max(0, originalSize - webpSize);
                            const savedPercent = originalSize ? ((saved / originalSize) * 100).toFixed(1) : '0.0';

                            // Update result summary for single mode
                            const resultSummary = document.getElementById('resultSummary');
                            if (resultSummary) {
                                resultSummary.innerHTML = `
                                    <p><strong>${window.t ? window.t['original_size'] || 'Исходный размер:' : 'Исходный размер:'}</strong> <span id="originalSize">${formatBytes(originalSize)}</span></p>
                                    <p><strong>${window.t ? window.t['compressed_size'] || 'Размер после сжатия:' : 'Размер после сжатия:'}</strong> <span id="webpSize">${formatBytes(webpSize)}</span></p>
                                    <p><strong>${window.t ? window.t['saved'] || 'Сэкономлено:' : 'Сэкономлено:'}</strong> <span id="savedSize">${formatBytes(saved)} (${savedPercent}%)</span></p>
                                `;
                            }

                            // Show preview section (remove Tailwind 'hidden' class if present)
                            previewSection.classList.remove('hidden');
                        }
                    }, 'image/webp', quality);
                };
                img.onerror = function() {
                    console.error('Image load error');
                };
                img.src = e.target.result;
            };
            reader.onerror = function(err) {
                console.error('FileReader error', err);
            };
            reader.readAsDataURL(file);
        } catch (err) {
            console.error('convertToWebP error', err);
        }
    }

    // Download WebP
    downloadBtn.addEventListener('click', function() {
        if (!webpBlob || !originalFile) return;

        const url = URL.createObjectURL(webpBlob);
        const a = document.createElement('a');
        a.href = url;
        a.download = originalFile.name.replace(/\.(png|jpg|jpeg)$/i, '.webp');
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    });

    // Convert to AVIF and download (guard if button missing)
    if (downloadAvifBtn) {
        downloadAvifBtn.addEventListener('click', function() {
            if (!originalFile) return;
            console.log('Starting AVIF conversion...');
            convertToAvif(originalFile, function(avifBlob) {
                if (!avifBlob) {
                    console.error('AVIF blob is null');
                    alert('AVIF conversion is not supported in this browser.');
                    return;
                }
                console.log('AVIF blob created, size:', avifBlob.size);
                const url = URL.createObjectURL(avifBlob);
                const a = document.createElement('a');
                a.href = url;
                a.download = originalFile.name.replace(/\.(png|jpg|jpeg)$/i, '.avif');
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            });
        });
    }

    // Convert to AVIF using canvas.toBlob if supported
    function convertToAvif(file, cb) {
        try {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = new Image();
                img.onload = function() {
                    const canvas = document.createElement('canvas');
                    canvas.width = img.width;
                    canvas.height = img.height;
                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0);
                    if (!canvas.toBlob) {
                        console.error('canvas.toBlob is not supported');
                        cb(null);
                        return;
                    }
                    // try AVIF mime
                    try {
                        canvas.toBlob(function(blob) {
                            cb(blob);
                        }, 'image/avif', 0.8);
                    } catch (err) {
                        console.error('AVIF conversion failed', err);
                        cb(null);
                    }
                };
                img.onerror = function() {
                    console.error('Image load error for AVIF');
                    cb(null);
                };
                img.src = e.target.result;
            };
            reader.onerror = function() { cb(null); };
            reader.readAsDataURL(file);
        } catch (err) {
            console.error('convertToAvif error', err);
            cb(null);
        }
    }

    function resetAll() {
        imageInput.value = '';
        originalFile = null;
        webpBlob = null;
        batchFiles = [];
        totalOrig = 0;
        totalWebp = 0;
        totalSaved = 0;
        previewSection.classList.add('hidden');
        batchSection.classList.add('hidden');
        filesTableBody.innerHTML = '';
        setMode('single');
        qualitySlider.value = 20;
        // qualityValue updates are handled by the range component
        updateResultSummary('single');
    }

    // Minimal ZIP (STORE method, no compression — files are already compressed)
    function crc32(buf) {
        let crc = ~0;
        for (let i = 0; i < buf.length; i++) {
            crc ^= buf[i];
            for (let j = 0; j < 8; j++) {
                crc = (crc >>> 1) ^ (0xEDB88320 & -(crc & 1));
            }
        }
        return (~crc) >>> 0;
    }

    function dosDateTime(d) {
        const time = ((d.getHours() & 0x1F) << 11) | ((d.getMinutes() & 0x3F) << 5) | ((Math.floor(d.getSeconds() / 2)) & 0x1F);
        const date = (((d.getFullYear() - 1980) & 0x7F) << 9) | (((d.getMonth() + 1) & 0xF) << 5) | (d.getDate() & 0x1F);
        return { time, date };
    }

    async function buildZip(entries) {
        const encoder = new TextEncoder();
        const { time, date } = dosDateTime(new Date());
        const parts = [];
        const centralParts = [];
        let offset = 0;

        for (const entry of entries) {
            const nameBytes = encoder.encode(entry.name);
            const data = new Uint8Array(await entry.blob.arrayBuffer());
            const crc = crc32(data);
            const size = data.length;

            const local = new Uint8Array(30 + nameBytes.length);
            const ldv = new DataView(local.buffer);
            ldv.setUint32(0, 0x04034b50, true);
            ldv.setUint16(4, 20, true);
            ldv.setUint16(6, 0, true);
            ldv.setUint16(8, 0, true);
            ldv.setUint16(10, time, true);
            ldv.setUint16(12, date, true);
            ldv.setUint32(14, crc, true);
            ldv.setUint32(18, size, true);
            ldv.setUint32(22, size, true);
            ldv.setUint16(26, nameBytes.length, true);
            ldv.setUint16(28, 0, true);
            local.set(nameBytes, 30);

            parts.push(local, data);

            const central = new Uint8Array(46 + nameBytes.length);
            const cdv = new DataView(central.buffer);
            cdv.setUint32(0, 0x02014b50, true);
            cdv.setUint16(4, 20, true);
            cdv.setUint16(6, 20, true);
            cdv.setUint16(8, 0, true);
            cdv.setUint16(10, 0, true);
            cdv.setUint16(12, time, true);
            cdv.setUint16(14, date, true);
            cdv.setUint32(16, crc, true);
            cdv.setUint32(20, size, true);
            cdv.setUint32(24, size, true);
            cdv.setUint16(28, nameBytes.length, true);
            cdv.setUint16(30, 0, true);
            cdv.setUint16(32, 0, true);
            cdv.setUint16(34, 0, true);
            cdv.setUint16(36, 0, true);
            cdv.setUint32(38, 0, true);
            cdv.setUint32(42, offset, true);
            central.set(nameBytes, 46);
            centralParts.push(central);

            offset += local.length + data.length;
        }

        const centralOffset = offset;
        const centralSize = centralParts.reduce((s, p) => s + p.length, 0);

        const end = new Uint8Array(22);
        const edv = new DataView(end.buffer);
        edv.setUint32(0, 0x06054b50, true);
        edv.setUint16(4, 0, true);
        edv.setUint16(6, 0, true);
        edv.setUint16(8, entries.length, true);
        edv.setUint16(10, entries.length, true);
        edv.setUint32(12, centralSize, true);
        edv.setUint32(16, centralOffset, true);
        edv.setUint16(20, 0, true);

        return new Blob([...parts, ...centralParts, end], { type: 'application/zip' });
    }

    // Format bytes to readable size
    function formatBytes(bytes) {
        if (!bytes) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        const value = bytes / Math.pow(k, i);
        return (Math.round(value * 100) / 100) + ' ' + sizes[i];
    }
})();
