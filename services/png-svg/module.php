<?php
// Модуль конвертера PNG → SVG
$t = $t ?? get_embedded_module_lang(__DIR__);
$i18n = [
    'filetype' => $t['msg_filetype'] ?? 'Only PNG files are supported.',
    'convertFirst' => $t['msg_convert_first'] ?? 'Upload a PNG first.',
    'copySuccess' => $t['msg_copy_success'] ?? 'SVG copied.',
    'error' => $t['msg_error'] ?? 'Something went wrong.',
    'processing' => $t['msg_processing'] ?? 'Processing…',
    'ready' => $t['msg_ready'] ?? 'All done.'
];
?>
<section
    id="pngSvgRoot"
    class="png-svg-module wrapper"
    data-i18n='<?= esc(json_encode($i18n, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)) ?>'
>
    <div class="png-svg-grid">
        <div class="png-svg-panel">
            <?php render('dropzone'); ?>
            <div class="mt-4">
                <button type="button" id="uploadBtn" class="btn">
                    <?= esc($t['btn_upload'] ?? 'Upload PNG') ?>
                </button>
            </div>
            <div class="mt-6">
                <?php render('range'); ?>
            </div>
            <div class="flex flex-wrap gap-3 mt-6">
                <button type="button" id="convertBtn" class="btn">
                    <?= esc($t['btn_convert'] ?? 'Convert') ?>
                </button>
                <button type="button" id="resetBtn" class="btn btn-ghost">
                    <?= esc($t['btn_reset'] ?? 'Reset') ?>
                </button>
            </div>
            <p id="statusText" class="text-sm text-muted mt-4" aria-live="polite">
                <?= esc($t['res_empty'] ?? '') ?>
            </p>
        </div>
        <div class="png-svg-panel">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-lg font-semibold">
                        <?= esc($t['res_title'] ?? '') ?>
                    </h3>
                    <p class="text-sm text-muted">
                        <?= esc($t['label_stats'] ?? '') ?>
                    </p>
                </div>
                <div class="text-right">
                    <div class="text-sm">
                        <?= esc($t['res_shapes'] ?? 'Shapes') ?>: <span id="shapeCount">0</span>
                    </div>
                    <div class="text-sm">
                        <?= esc($t['res_colors'] ?? 'Colors') ?>: <span id="colorCount">0</span>
                    </div>
                    <div class="text-sm">
                        <?= esc($t['res_size'] ?? 'Size') ?>: <span id="svgSize">0 B</span>
                    </div>
                </div>
            </div>
            <div class="space-y-4">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-medium">
                            <?= esc($t['label_preview'] ?? 'Preview') ?>
                        </span>
                        <div class="flex gap-2">
                            <button type="button" id="downloadBtn" class="btn btn-ghost text-sm">
                                <?= esc($t['btn_download'] ?? 'Download SVG') ?>
                            </button>
                            <button type="button" id="copyBtn" class="btn btn-ghost text-sm">
                                <?= esc($t['btn_copy'] ?? 'Copy SVG') ?>
                            </button>
                        </div>
                    </div>
                    <div id="svgPreview" class="svg-preview" aria-live="polite" aria-label="<?= esc($t['label_preview'] ?? 'Preview') ?>">
                        <p class="text-sm text-muted">
                            <?= esc($t['res_empty'] ?? '') ?>
                        </p>
                    </div>
                </div>
                <div>
                    <label for="svgOutput" class="font-medium block mb-2">
                        <?= esc($t['label_code'] ?? 'SVG code') ?>
                    </label>
                    <textarea id="svgOutput" class="w-full" rows="8" readonly placeholder="<?= esc($t['placeholder_svg'] ?? '') ?>"></textarea>
                </div>
            </div>
        </div>
    </div>
</section>
<link rel="stylesheet" href="<?= asset_url('services/png-svg/style.css') ?>">
<script src="<?= asset_url('services/png-svg/script.js') ?>" defer></script>
