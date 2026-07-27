<?php
$svc_t = get_embedded_module_lang(__DIR__);
?>
<div class="wrapper">
    <label for="js_input" class="block mb-2 font-semibold"><?php echo esc($svc_t['label_input']) ?></label>
    <textarea id="js_input" rows="10" class="w-full" placeholder="<?php echo esc($svc_t['ph_input']) ?>"></textarea>

    <div class="mt-4 mb-4 flex items-center gap-4">
        <label class="inline-flex items-center gap-2"><input type="checkbox" id="opt_comments" checked> <span><?php echo esc($svc_t['opt_comments']) ?></span></label>
        <label class="inline-flex items-center gap-2"><input type="checkbox" id="opt_whitespace" checked> <span><?php echo esc($svc_t['opt_whitespace']) ?></span></label>
        <label class="inline-flex items-center gap-2"><input type="checkbox" id="opt_aggressive"> <span><?php echo esc($svc_t['opt_aggressive']) ?></span></label>
    </div>

    <div class="mb-4">
        <button type="button" id="btn_minify" class="btn-primary"><?php echo esc($svc_t['btn_minify']) ?></button>
        <button type="button" id="btn_copy" class="btn"><?php echo esc($svc_t['btn_copy']) ?></button>
        <button type="button" id="btn_download" class="btn"><?php echo esc($svc_t['btn_download']) ?></button>
        <button type="button" id="btn_reset" class="btn"><?php echo esc($svc_t['btn_reset']) ?></button>
    </div>

    <label for="js_output" class="block mb-2 font-semibold"><?php echo esc($svc_t['label_output']) ?></label>
    <textarea id="js_output" rows="10" class="w-full" placeholder="<?php echo esc($svc_t['ph_output']) ?>" readonly></textarea>
    <small class="text-muted" id="stats"></small>
</div>
<link rel="stylesheet" href="<?= asset_url('services/js-compressor/style.css') ?>">
<!-- Terser не подключаем сразу. Будет лениво загружен при выборе агрессивного режима -->
<script src="<?= asset_url('services/js-compressor/script.js') ?>" defer></script>