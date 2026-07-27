<?php
$lang = get_embedded_module_lang(__DIR__);
?>

<div class="wrapper">
    <div class="mb-3">
        <?php render('dropzone', [
            'id' => 'upload-input',
            'label' => $lang['label_upload'],
            'placeholder' => $lang['drop_placeholder'],
            'dragHint' => $lang['drop_hint'],
            'accept' => 'image/*'
        ]); ?>
    </div>
    <div id="main-grid" class="grid grid-cols-1 md:grid-cols-2 gap-4" style="display:none;">

        <div class="align-items-center justify-content-center" style="min-height: 400px;">
            <div id="placeholder-text" class="text-muted"><?= esc($lang['label_upload']) ?></div>
            <canvas id="editor-canvas" style="display:none;"></canvas>
        </div>
        <div class="flex flex-col">
            <div class="mb-4 d-flex justify-content-center gap-2">
                <button class="btn btn-outline-secondary" id="zoom-in"><i class="bi bi-zoom-in"></i> +</button>
                <button class="btn btn-outline-secondary" id="zoom-out"><i class="bi bi-zoom-out"></i> -</button>
                <button class="btn btn-outline-secondary" id="rotate"><i class="bi bi-arrow-clockwise"></i> 90°</button>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card-header">
                    <?= esc($lang['label_download']) ?>
                </div>
                <div class="input-group" id="download-grid" style="display:none;">
                    <select class="form-select mb-4" id="png-size">
                        <option value="16"><?= esc($lang['size_16']) ?></option>
                        <option value="32"><?= esc($lang['size_32']) ?></option>
                        <option value="48"><?= esc($lang['size_48']) ?></option>
                        <option value="64"><?= esc($lang['size_64']) ?></option>
                        <option value="128"><?= esc($lang['size_128']) ?></option>
                        <option value="180"><?= esc($lang['size_180']) ?></option>
                        <option value="192"><?= esc($lang['size_192']) ?></option>
                        <option value="512" selected><?= esc($lang['size_512']) ?></option>
                        <option value="all"><?= esc($lang['size_all']) ?></option>
                    </select>
                    <button id="btn-download-png" class="btn btn-outline-primary" disabled>
                        <?= esc($lang['btn_download_png']) ?>
                    </button>
                    <button id="btn-download-ico" class="btn btn-success ms-2" disabled>
                        <?= esc($lang['btn_download_ico']) ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?= asset_url('services/favicon-generator/script.js') ?>" defer></script>
<link rel="stylesheet" href="<?= asset_url('services/favicon-generator/style.css') ?>">