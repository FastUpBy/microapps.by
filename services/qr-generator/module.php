<?php

$svc_t = get_embedded_module_lang(__DIR__);
?>
<section class="my-8 text-center">
    <h2 class="h2"><?= esc($svc_t['h1'] ?? $svc_t['title'] ?? 'QR Generator') ?></h2>
    <div class="content max-w-full mx-auto mb-4 flex flex-col justify-center items-center wrapper">
        <form id="qrGen" class="flex-col w-full inner-400 flex gap-3">
            <label for="qrText" class="text-left font-semibold"><?= esc($svc_t['input_label'] ?? 'Text or URL:') ?></label>
            <input type="text" id="qrText" placeholder="<?= esc($svc_t['input_placeholder'] ?? 'https://example.com') ?>" maxlength="200" >            
            <button type="submit" class="btn">
                <?= esc($svc_t['button_generate'] ?? 'Generate') ?>
            </button>
        </form>
        <div id="qrResult" class="mt-4 font-semibold text-[var(--accent)] break-all"></div>
    </div>
    <?php $pageLang = $GLOBALS['PAGE_LANG'] ? (isset($GLOBALS['PAGE_LANG']['lang']) ? $GLOBALS['PAGE_LANG']['lang'] : null) : null; ?>
</section>
<script src="<?= esc(site_url_service(__DIR__)) ?>/script.min.js" defer></script>