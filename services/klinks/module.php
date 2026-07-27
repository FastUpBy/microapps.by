<?php

$svc_t = get_embedded_module_lang(__DIR__);
?>
<section class="wrapper" aria-labelledby="klinks-h1">

    <div class="bg-card">
        <label class="block text-sm text-muted mb-2" for="klinks_input"><?php echo esc($svc_t['label_links']) ?></label>
        <textarea id="klinks_input" rows="8" placeholder="https://example.com" class="w-full mb-3"></textarea>

        <div class="flex items-center gap-3 mb-4">
            <button type="button" id="klinks_open" class="btn--accent"><?php echo esc($svc_t['btn_open']) ?></button>
            <button type="button" id="klinks_reset" class="btn-ghost"><?php echo esc($svc_t['btn_reset']) ?></button>
            <div id="klinks_count" class="text-sm text-muted ml-auto"><?php echo esc($svc_t['res_count']) ?>: <span>0</span></div>
        </div>

        <div id="klinks_errors" class="text-sm text-red-500" aria-live="polite"></div>
    </div>
</section>

<script src="<?= asset_url('services/klinks/script.js') ?>" defer></script>
