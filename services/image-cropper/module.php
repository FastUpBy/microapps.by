<?php
$svc_t = get_embedded_module_lang(__DIR__);
?>
<div class="wrapper">
    <!-- Загрузка -->
    <div class="mb-6">
        <?php render('dropzone'); ?>
    </div>

    <!-- Рабочая область (скрыта до загрузки) -->
    <div id="cropper-workspace" class="hidden">
        
        <!-- Панель инструментов -->
        <div class="toolbar mb-4 flex flex-wrap gap-3 items-center justify-between bg-card p-3 rounded border border-border">
            <div class="flex gap-2 items-center">
                <label class="text-sm font-semibold whitespace-nowrap"><?= esc($svc_t['label_aspect']) ?>:</label>
                <select id="aspectRatio" class="p-1 rounded border border-input bg-bg text-text text-sm">
                    <option value="NaN"><?= esc($svc_t['aspect_free']) ?></option>
                    <option value="1"><?= esc($svc_t['aspect_1_1']) ?></option>
                    <option value="1.777777"><?= esc($svc_t['aspect_16_9']) ?></option>
                    <option value="1.333333"><?= esc($svc_t['aspect_4_3']) ?></option>
                </select>
            </div>

            <div class="flex gap-2 items-center">
                <label class="text-sm font-semibold">Размер:</label>
                <input id="cropWidth" type="number" min="1" class="" placeholder="W">
                <span class="text-sm">×</span>
                <input id="cropHeight" type="number" min="1" class="" placeholder="H">
                <button id="btnApplySize" class="btn">Применить</button>
            </div>
            
            <div class="flex gap-2">
                <button id="btnRotate" class="btn text-sm py-1 px-3" title="<?= esc($svc_t['btn_rotate']) ?>">
                    ↻
                </button>
                <button id="btnReset" class="btn text-sm py-1 px-3">
                    <?= esc($svc_t['btn_reset']) ?>
                </button>
            </div>
        </div>

        <!-- Контейнер Canvas -->
        <div class="canvas-container relative w-full bg-gray-800 rounded overflow-hidden mb-4 select-none" style="height: 500px;">
            <canvas id="cropCanvas" class="block mx-auto"></canvas>
            <div id="loadingOverlay" class="absolute inset-0 flex items-center justify-center bg-black/50 text-white hidden">
                Loading...
            </div>
            <div class="absolute bottom-2 right-2 text-xs text-white/70 bg-black/30 px-2 py-1 rounded pointer-events-none">
                <?= esc($svc_t['zoom_hint']) ?>
            </div>
        </div>

        <!-- Действия -->
        <div class="flex justify-center gap-4">
            <button id="btnCrop" class="btn-primary text-lg px-8 py-3 shadow-lg">
                <?= esc($svc_t['btn_crop']) ?>
            </button>
        </div>

    </div>
</div>

<link rel="stylesheet" href="<?= asset_url('services/image-cropper/style.css') ?>">
<script src="<?= asset_url('services/image-cropper/script.js') ?>" defer></script>
