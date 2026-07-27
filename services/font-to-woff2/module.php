<?php
// $t автоматически доступен из $GLOBALS['SERVICE_LANG']
?>
<div class="wrapper">
    <!-- Загрузка файла -->
    <div class="mb-4">
        <?php render('dropzone'); ?>
        <p class="text-sm text-muted mt-2"><?= esc($t['label_info']) ?></p>
    </div>

    <!-- Кнопки управления -->
    <div class="flex gap-3 mb-4 flex-wrap">
        <button id="btn-convert" class="btn-primary" disabled>
            <?= esc($t['btn_convert']) ?>
        </button>
        <button id="btn-reset" class="btn">
            <?= esc($t['btn_reset']) ?>
        </button>
    </div>

    <!-- Список файлов -->
    <div id="file-list" class="hidden mb-4"></div>

    <!-- Результат -->
    <div id="result-area" class="hidden">
        <h3 class="text-lg font-semibold mb-3"><?= esc($t['res_result']) ?></h3>
        <div id="results-container"></div>
        
        <div id="download-all-container" class="hidden mt-4">
            <button id="btn-download-all" class="btn-primary">
                <?= esc($t['btn_download_all']) ?>
            </button>
        </div>
    </div>
</div>

<!-- Подключение стилей и скриптов -->
<link rel="stylesheet" href="<?= asset_url('services/font-to-woff2/style.css') ?>">
<script>
// Передаём языковые данные в JavaScript
window.svc_t = <?= json_encode([
    'btn_convert' => $t['btn_convert'] ?? 'Convert to WOFF2',
    'btn_download' => $t['btn_download'] ?? 'Download',
    'btn_download_all' => $t['btn_download_all'] ?? 'Download All',
    'status_converting' => $t['status_converting'] ?? 'Converting...',
    'status_success' => $t['status_success'] ?? 'Done!',
    'status_error' => $t['status_error'] ?? 'Error',
    'res_original_size' => $t['res_original_size'] ?? 'Original size:',
    'res_compressed_size' => $t['res_compressed_size'] ?? 'WOFF2 size:',
    'res_saved' => $t['res_saved'] ?? 'Saved:',
    'error_no_file' => $t['error_no_file'] ?? 'Please upload a font file',
    'error_invalid_format' => $t['error_invalid_format'] ?? 'Unsupported file format',
    'error_conversion' => $t['error_conversion'] ?? 'Conversion error. Try another file.'
], JSON_UNESCAPED_UNICODE) ?>;
</script>
<script src="<?= asset_url('services/font-to-woff2/script.js') ?>" defer></script>
