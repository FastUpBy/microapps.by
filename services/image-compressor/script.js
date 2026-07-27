// Image Compressor Script
(function() {
    'use strict';

    const input = document.querySelector('#imageInput');
    const dropZone = document.querySelector('#imageInputDropZone');
    const dropText = document.querySelector('#imageInputDropText');
    const uploadBtn = document.querySelector('#uploadBtn');
    const resetBtn = document.querySelector('#resetBtn');
    const compressionLevel = document.querySelector('#compressionSlider');
    const previewSection = document.querySelector('#previewSection');
    const originalPreview = document.querySelector('#originalPreview');
    const compressedPreview = document.querySelector('#compressedPreview');
    const originalSizeSpan = document.querySelector('#originalSize');
    const compressedSizeSpan = document.querySelector('#compressedSize');
    const savedSizeSpan = document.querySelector('#savedSize');
    const downloadBtn = document.querySelector('#downloadBtn');
    const divider = document.querySelector('#divider');

    let originalFile = null;
    let compressedBlob = null;
    
    // Сохраняем изначальное содержимое dropText при загрузке страницы
    const initialDropTextHTML = dropText?.innerHTML || '';

    // Upload button click
    uploadBtn?.addEventListener('click', () => input?.click());

    // File input change
    input?.addEventListener('change', (e) => {
        const file = e.target.files?.[0];
        if (file) handleFile(file);
    });

    // Drag & Drop
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
        const file = e.dataTransfer?.files?.[0];
        if (file) handleFile(file);
    });

    // Compression level change
    compressionLevel?.addEventListener('change', () => {
        if (originalFile) compressImage(originalFile);
    });

    // Reset button
    resetBtn?.addEventListener('click', reset);

    // Download button
    downloadBtn?.addEventListener('click', downloadCompressed);

    // Handle file processing
    function handleFile(file) {
        if (!file.type.match(/image\/(jpeg|jpg|png)/)) {
            alert('Please select a JPG or PNG image.');
            return;
        }

        originalFile = file;
        if (dropText) dropText.textContent = file.name;
        
        originalSizeSpan.textContent = formatSize(file.size);
        compressImage(file);
    }

    // Compress image
    function compressImage(file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            const img = new Image();
            img.onload = () => {
                const canvas = document.createElement('canvas');
                canvas.width = img.width;
                canvas.height = img.height;

                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0);

                // Конвертируем силу сжатия (0-100) в качество для Canvas (1.0-0.0)
                // 0% сжатия = 100% качества, 100% сжатия = 0% качества
                const compressionStrength = parseFloat(compressionLevel?.value || 80);
                const quality = 1 - (compressionStrength / 100);
                canvas.toBlob((blob) => {
                    if (!blob) return;
                    
                    compressedBlob = blob;
                    const url = URL.createObjectURL(blob);
                    
                    originalPreview.src = e.target.result;
                    compressedPreview.src = url;
                    
                    compressedSizeSpan.textContent = formatSize(blob.size);
                    const saved = file.size - blob.size;
                    const percent = ((saved / file.size) * 100).toFixed(1);
                    savedSizeSpan.textContent = `${formatSize(saved)} (${percent}%)`;
                    
                    previewSection?.classList.remove('hidden');
                    setupSlider();
                }, 'image/jpeg', quality);
            };
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }

    // Download compressed image
    function downloadCompressed() {
        if (!compressedBlob || !originalFile) return;
        
        const url = URL.createObjectURL(compressedBlob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `compressed-${originalFile.name.replace(/\.[^.]+$/, '')}.jpg`;
        a.click();
        URL.revokeObjectURL(url);
    }

    // Reset form
    function reset() {
        originalFile = null;
        compressedBlob = null;
        if (input) input.value = '';
        // Восстанавливаем изначальное содержимое dropzone
        if (dropText && initialDropTextHTML) {
            dropText.innerHTML = initialDropTextHTML;
        }
        previewSection?.classList.add('hidden');
        originalSizeSpan.textContent = '';
        compressedSizeSpan.textContent = '';
        savedSizeSpan.textContent = '';
    }

    // Format file size
    function formatSize(bytes) {
        if (bytes === 0) return '0 B';
        const k = 1024;
        const sizes = ['B', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return (bytes / Math.pow(k, i)).toFixed(2) + ' ' + sizes[i];
    }

    // Setup slider for image comparison
    function setupSlider() {
        if (!divider || !compressedPreview) return;

        let isDragging = false;

        const updatePosition = (x) => {
            const rect = compressedPreview.parentElement.getBoundingClientRect();
            const pos = Math.max(0, Math.min(x - rect.left, rect.width));
            const percent = (pos / rect.width) * 100;
            
            divider.style.left = percent + '%';
            compressedPreview.style.clipPath = `inset(0 ${100 - percent}% 0 0)`;
            divider.setAttribute('aria-valuenow', Math.round(percent));
        };

        divider.addEventListener('mousedown', () => isDragging = true);
        document.addEventListener('mouseup', () => isDragging = false);
        document.addEventListener('mousemove', (e) => {
            if (isDragging) updatePosition(e.clientX);
        });

        divider.addEventListener('touchstart', () => isDragging = true);
        document.addEventListener('touchend', () => isDragging = false);
        document.addEventListener('touchmove', (e) => {
            if (isDragging && e.touches[0]) updatePosition(e.touches[0].clientX);
        });

        divider.addEventListener('keydown', (e) => {
            const current = parseInt(divider.getAttribute('aria-valuenow') || 50);
            if (e.key === 'ArrowLeft' && current > 0) {
                const rect = compressedPreview.parentElement.getBoundingClientRect();
                updatePosition(rect.left + (rect.width * (current - 1) / 100));
            } else if (e.key === 'ArrowRight' && current < 100) {
                const rect = compressedPreview.parentElement.getBoundingClientRect();
                updatePosition(rect.left + (rect.width * (current + 1) / 100));
            }
        });
    }
})();
