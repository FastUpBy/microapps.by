<?php
$svc_t = get_embedded_module_lang(__DIR__);
?>
<section class="wrapper" aria-labelledby="lorem-h1">
    <div class="lorem-controls">
        <div class="control-row">
            <div class="control-group">
                <label for="lorem-mode" class="block mb-2 font-semibold"><?= esc($svc_t['label_mode']) ?></label>
                <select id="lorem-mode">
                    <option value="paragraphs" selected><?= esc($svc_t['mode_paragraphs']) ?></option>
                    <option value="sentences"><?= esc($svc_t['mode_sentences']) ?></option>
                    <option value="words"><?= esc($svc_t['mode_words']) ?></option>
                </select>
            </div>
            <div class="control-group">
                <label for="lorem-count" class="block mb-2 font-semibold"><?= esc($svc_t['label_count']) ?></label>
                <input type="number" id="lorem-count" min="1" max="500" value="5" class="w-full">
            </div>
        </div>

        <div class="control-row">
            <label class="checkbox-label">
                <input type="checkbox" id="lorem-start" checked>
                <span><?= esc($svc_t['label_start_lorem']) ?></span>
            </label>
        </div>

        <div class="mt-4">
            <button type="button" id="btn-generate" class="btn-primary"><?= esc($svc_t['btn_generate']) ?></button>
            <button type="button" id="btn-copy" class="btn" disabled><?= esc($svc_t['btn_copy']) ?></button>
            <button type="button" id="btn-reset" class="btn"><?= esc($svc_t['btn_reset']) ?></button>
        </div>
    </div>

    <div id="lorem-output" class="lorem-output hidden">
        <h3 class="font-semibold mb-2"><?= esc($svc_t['res_title']) ?></h3>
        <div id="lorem-text" class="lorem-text"></div>
    </div>
</section>
<link rel="stylesheet" href="<?= asset_url('services/lorem-ipsum/style.css') ?>">
<script src="<?= asset_url('services/lorem-ipsum/script.js') ?>" defer></script>
