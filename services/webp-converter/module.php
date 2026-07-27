<?php
// Модуль интерфейса конвертера WebP
// $t автоматически доступен из $GLOBALS['SERVICE_LANG']
?>
    <div class="converter-interface wrapper">
        <div class="upload-section">
            <?php render('dropzone'); ?>
            
            <div class="flex items-center gap-3 mt-4">
                <button type="button" id="uploadBtn" class="btn"><?= esc($t['upload_button'] ?? 'Upload image') ?></button>
                <button type="button" id="resetBtn" class="btn"><?= esc($t['reset_button'] ?? 'Reset') ?></button>
            </div>
        </div>

        <div class="quality-section my-6">
            <?php render('range'); ?>
            <div class="result flex flex-col mt-4" id="resultSummary">
                <p><strong><?= esc($t['original_size'] ?? 'Original:') ?></strong> <span id="originalSize"></span></p>
                <p><strong><?= esc($t['compressed_size'] ?? 'Compressed:') ?></strong> <span id="webpSize"></span></p>
                <p><strong><?= esc($t['saved'] ?? 'Saved:') ?></strong> <span id="savedSize"></span>
                </p>
            </div>
        </div>

        <div id="batchSection" class="hidden mt-6">
            <h3 class="mb-4"><?= esc($t['result_title'] ?? 'Результат') ?></h3>
            <div class="flex items-center gap-3 mb-4">
                <button type="button" id="downloadAllBtn" class="btn"><?= esc($t['download_all_button'] ?? 'Скачать всё (ZIP)') ?></button>
            </div>
            <table id="filesTable" class="w-full border-collapse border border-muted">
                <thead>
                    <tr class="bg-muted">
                        <th class="border border-muted p-2 text-left"><?= esc($t['file_name'] ?? 'Имя файла') ?></th>
                        <th class="border border-muted p-2 text-left"><?= esc($t['original_size'] ?? 'Оригинал') ?></th>
                        <th class="border border-muted p-2 text-left"><?= esc($t['compressed_size'] ?? 'Сжатый') ?></th>
                        <th class="border border-muted p-2 text-left"><?= esc($t['actions'] ?? 'Действия') ?></th>
                    </tr>
                </thead>
                <tbody id="filesTableBody">
                </tbody>
            </table>
        </div>

        <div id="previewSection" class="hidden mt-6">
            <h3 class="mb-4"><?= esc($t['result_title'] ?? 'Result') ?></h3>

            <div class="compare-wrapper relative mb-4" style="--thumb-size:6px;">
                <div class="compare-base relative w-full aspect-[4/3] bg-gray-900 border border-muted rounded-md overflow-hidden">
                    <img id="originalPreview" src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="absolute inset-0 w-full h-full object-contain z-10 block" alt="Original" decoding="async">
                    <img id="webpPreview" src="data:image/gif;base64,R0lGODlhAQABAAAAACwAAAAAAQABAAA=" class="absolute inset-0 w-full h-full object-contain z-20 block" style="clip-path:inset(0 0 0 0);" alt="Compressed" decoding="async">
                    <div id="divider" role="slider" aria-valuemin="0" aria-valuemax="100" aria-valuenow="50" tabindex="0" class="absolute top-0 left-1/2 transform -translate-x-1/2 h-full w-1 cursor-ew-resize z-30 outline-none" style="background:var(--accent);">
                        <span class="absolute top-1/2 left-1/2  w-10 h-10 bg-white border-2 border-current rounded-full shadow-md cursor-pointer" style="transform: translate(-50%, -50%);"></span>
                    </div>
                </div>
            </div>
            <div class="flex gap-3">
                <button id="downloadBtn" class="">
                    <?= esc($t['download_button'] ?? 'Download') ?>
                </button>
                <button id="downloadAvifBtn" class="">
                    <?= esc($t['download_avif'] ?? 'Download AVIF') ?>
                </button>
            </div>
        </div>
    </div>
<script src="<?= asset_url('services/webp-converter/script.js') ?>" defer></script>