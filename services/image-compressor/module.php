<?php
// Модуль интерфейса сжатия изображений
?>
<section class="image-compressor-module wrapper">
    <div class="compressor-interface">
        <div class="upload-section">
            <?php render('dropzone'); ?>
            
            <div class="flex items-center gap-3 mt-4">
                <button type="button" id="uploadBtn" class="btn"><?= esc($t['upload_button'] ?? 'Upload image') ?></button>
                <button type="button" id="resetBtn" class="btn"><?= esc($t['reset_button'] ?? 'Reset') ?></button>
            </div>
        </div>

        <div class="compression-section my-6">
            <?php render('range'); ?>
            
            <div class="result flex flex-col mt-4" id="resultSummary">
                <p><strong><?= esc($t['original_size'] ?? 'Original:') ?></strong> <span id="originalSize"></span></p>
                <p><strong><?= esc($t['compressed_size'] ?? 'Compressed:') ?></strong> <span id="compressedSize"></span></p>
                <p><strong><?= esc($t['saved'] ?? 'Saved:') ?></strong> <span id="savedSize"></span></p>
            </div>
        </div>

        <div id="previewSection" class="hidden mt-6">
            <h3 class="mb-4"><?= esc($t['result_title'] ?? 'Result') ?></h3>

            <div class="compare-wrapper relative mb-4">
                <div class="compare-base relative w-full aspect-[4/3] bg-gray-900 border border-muted rounded-md overflow-hidden">
                    <img id="originalPreview" class="absolute inset-0 w-full h-full object-contain z-10 block" alt="Original">
                    <img id="compressedPreview" class="absolute inset-0 w-full h-full object-contain z-20 block" style="clip-path:inset(0 0 0 0);" alt="Compressed">
                    <div id="divider" role="slider" aria-valuemin="0" aria-valuemax="100" aria-valuenow="50" tabindex="0" class="absolute top-0 left-1/2 transform -translate-x-1/2 h-full w-1 cursor-ew-resize z-30 outline-none" style="background:var(--accent);">
                        <span class="absolute top-1/2 left-1/2 w-10 h-10 bg-white border-2 border-current rounded-full shadow-md cursor-pointer" style="transform: translate(-50%, -50%);"></span>
                    </div>
                </div>
            </div>
            
            <div class="flex gap-3">
                <button id="downloadBtn" class="btn">
                    <?= esc($t['download_button'] ?? 'Download') ?>
                </button>
            </div>
        </div>
    </div>
</section>
<script>
// Передаём языковые данные в JavaScript
window.imageCompressorLang = {
    placeholder: <?= json_encode($t['dropzone']['placeholder'] ?? 'Choose file...') ?>,
    dragHint: <?= json_encode($t['dropzone']['dragHint'] ?? 'Or drag & drop an image here') ?>
};
</script>
<script src="<?= asset_url('services/image-compressor/script.js') ?>" defer></script>
