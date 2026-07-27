<?php
$svc_t = get_embedded_module_lang(__DIR__);
?>
<section class="images-to-pdf-module wrapper">
    <div class="upload-section mb-4">
        <?php render('dropzone'); ?>

        <div class="flex flex-wrap items-center gap-3 mt-4">
            <button type="button" id="uploadBtn" class="btn"><?= esc($svc_t['upload_button'] ?? 'Upload images') ?></button>
            <button type="button" id="resetBtn" class="btn"><?= esc($svc_t['reset_button'] ?? 'Reset all') ?></button>
            <label class="flex items-center gap-2 text-sm ml-auto">
                <input type="checkbox" id="enhanceToggle">
                <span><?= esc($svc_t['enhance_label'] ?? 'Enhance images') ?></span>
            </label>
        </div>
    </div>

    <p id="emptyHint" class="text-muted text-sm"><?= esc($svc_t['empty_hint'] ?? 'Upload images to get started') ?></p>
    <p id="reorderHint" class="text-muted text-sm hidden mb-3"><?= esc($svc_t['reorder_hint'] ?? 'Drag cards or use ‹ › to reorder') ?></p>

    <ul id="imageList" class="image-list grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 mb-4"></ul>

    <div id="actionsRow" class="flex flex-wrap items-center gap-3 hidden">
        <button type="button" id="generateBtn" class="btn-primary px-6 py-3">
            <?= esc($svc_t['generate_button'] ?? 'Merge into PDF') ?>
        </button>
        <span id="statusText" class="text-sm text-muted"></span>
    </div>

    <div id="resultSection" class="hidden mt-4">
        <h3 class="mb-3"><?= esc($svc_t['result_title'] ?? 'Done') ?></h3>
        <a id="downloadLink" class="btn-primary inline-block px-6 py-3" download="images.pdf">
            <?= esc($svc_t['download_button'] ?? 'Download PDF') ?>
        </a>
    </div>

    <template id="imageCardTemplate">
        <li class="image-card relative rounded-md overflow-hidden border border-border bg-card" draggable="true">
            <div class="image-card-preview w-full aspect-square flex items-center justify-center overflow-hidden">
                <img class="thumb-img" alt="">
            </div>
            <div class="image-card-controls flex flex-wrap items-center justify-center gap-1 p-2">
                <button type="button" class="btn move-left-btn text-sm px-2 py-1" title="<?= esc($svc_t['move_earlier_title'] ?? 'Move earlier') ?>">‹</button>
                <button type="button" class="btn rotate-btn text-sm px-2 py-1" title="<?= esc($svc_t['rotate_title'] ?? 'Rotate') ?>">↻</button>
                <button type="button" class="btn move-right-btn text-sm px-2 py-1" title="<?= esc($svc_t['move_later_title'] ?? 'Move later') ?>">›</button>
                <button type="button" class="btn delete-btn text-sm px-2 py-1" title="<?= esc($svc_t['delete_title'] ?? 'Remove') ?>">×</button>
            </div>
        </li>
    </template>
</section>

<script>
window.imagesToPdfLang = {
    placeholder: <?= json_encode($svc_t['dropzone']['placeholder'] ?? 'Choose files...') ?>,
    dragHint: <?= json_encode($svc_t['dropzone']['dragHint'] ?? 'Or drag & drop images here') ?>,
    processing: <?= json_encode($svc_t['processing'] ?? 'Processing...') ?>
};
</script>

<link rel="stylesheet" href="<?= asset_url('services/images-to-pdf/style.css') ?>">
<script src="<?= asset_url('services/images-to-pdf/script.js') ?>" defer></script>
