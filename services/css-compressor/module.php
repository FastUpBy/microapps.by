<?php
$svc_t = get_embedded_module_lang(__DIR__);
?>
<section class="wrapper" aria-labelledby="css-compressor-h1">
    <div>
        <label for="css_input" class="block mb-2 font-semibold"><?php echo esc($svc_t['label_input']) ?></label>
        <textarea id="css_input" rows="10" placeholder="<?php echo esc($svc_t['ph_input']) ?>"></textarea>

        <div class="mt-4 mb-4 flex items-center gap-4">
            <label class="inline-flex items-center gap-2">
                <input type="checkbox" id="opt_comments" checked>
                <span><?php echo esc($svc_t['opt_comments']) ?></span>
            </label>
            <label class="inline-flex items-center gap-2">
                <input type="checkbox" id="opt_whitespace" checked>
                <span><?php echo esc($svc_t['opt_whitespace']) ?></span>
            </label>
        </div>

        <div class="mb-4">
            <button type="button" id="btn_minify" class="btn-primary"><?php echo esc($svc_t['btn_minify']) ?></button>
            <button type="button" id="btn_copy" class="btn"><?php echo esc($svc_t['btn_copy']) ?></button>
            <button type="button" id="btn_download" class="btn"><?php echo esc($svc_t['btn_download']) ?></button>
            <button type="button" id="btn_reset" class="btn"><?php echo esc($svc_t['btn_reset']) ?></button>
        </div>

        <label for="css_output" class="block mb-2 font-semibold"><?php echo esc($svc_t['label_output']) ?></label>
        <textarea id="css_output" rows="10" placeholder="<?php echo esc($svc_t['ph_output']) ?>" readonly></textarea>
        <small class="text-muted" id="stats"></small>
    </div>
</section>
<link rel="stylesheet" href="<?= asset_url('services/css-compressor/style.css') ?>">
<script src="<?= asset_url('services/css-compressor/script.js') ?>" defer></script>
