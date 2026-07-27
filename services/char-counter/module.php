<?php
$svc_t = get_embedded_module_lang(__DIR__);
?>
<section class="wrapper" aria-labelledby="char-counter-h1">
    <div>
        <label for="text_input" class="block mb-2 font-semibold"><?php echo esc($svc_t['label_input']) ?></label>
        <textarea id="text_input" rows="8" placeholder="<?php echo esc($svc_t['ph_input']) ?>"></textarea>

        <div class="stats-grid" id="stats_grid">
            <div class="stat-card">
                <span class="stat-value" id="stat_chars">0</span>
                <span class="stat-label"><?php echo esc($svc_t['stat_chars']) ?></span>
            </div>
            <div class="stat-card">
                <span class="stat-value" id="stat_chars_no_space">0</span>
                <span class="stat-label"><?php echo esc($svc_t['stat_chars_no_space']) ?></span>
            </div>
            <div class="stat-card">
                <span class="stat-value" id="stat_words">0</span>
                <span class="stat-label"><?php echo esc($svc_t['stat_words']) ?></span>
            </div>
            <div class="stat-card">
                <span class="stat-value" id="stat_sentences">0</span>
                <span class="stat-label"><?php echo esc($svc_t['stat_sentences']) ?></span>
            </div>
            <div class="stat-card">
                <span class="stat-value" id="stat_paragraphs">0</span>
                <span class="stat-label"><?php echo esc($svc_t['stat_paragraphs']) ?></span>
            </div>
            <div class="stat-card">
                <span class="stat-value" id="stat_lines">0</span>
                <span class="stat-label"><?php echo esc($svc_t['stat_lines']) ?></span>
            </div>
        </div>

        <div class="mt-4">
            <button type="button" id="btn_clear" class="btn"><?php echo esc($svc_t['btn_clear']) ?></button>
            <button type="button" id="btn_copy_stats" class="btn"><?php echo esc($svc_t['btn_copy_stats']) ?></button>
        </div>
    </div>
</section>
<link rel="stylesheet" href="<?= asset_url('services/char-counter/style.css') ?>">
<script src="<?= asset_url('services/char-counter/script.js') ?>" defer></script>
