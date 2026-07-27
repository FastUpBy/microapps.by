<?php
$t = get_embedded_module_lang(__DIR__);
?>
<div class="wrapper liquid-glass">
    <form class="lg-panel grid grid-cols-1 md:grid-cols-2 gap-3" aria-label="Controls">
        <div class="lg-preview" aria-live="polite">
            <div class="lg-stage overflow-hidden relative" id="lg-stage">
                <link rel="preload" as="style" href="<?= esc(asset_url('services/liquid-glass/style.css')); ?>" fetchpriority="high">
                <link rel="preload" as="image" href="<?= esc(site_url('services/liquid-glass/canva.webp')); ?>" fetchpriority="high">
                <img class="absolute size-full object-cover object-center inset-0" src="<?= esc(site_url('services/liquid-glass/canva.webp')); ?>" alt="Background" fetchpriority="high" loading="eager" width="558" height="360">
                <div class="lg-card lg-ghost-btn" id="lg-card" tabindex="0"></div>
            </div>
        </div>
        <div class="panel md:row-span-3">
            <div class="lg-field">
                <label for="lg-blur"><?= esc($t['label_blur']); ?></label>
                <input type="range" id="lg-blur" min="0" max="40" value="5">
            </div>
            <div class="lg-field">
                <label for="lg-opacity"><?= esc($t['label_opacity']); ?>: <span data-bind="lg-opacity">0.6</span></label>
                <input type="range" id="lg-opacity" min="0" max="1" value="0.2" step="0.05">
            </div>
            <div class="lg-field">
                <label for="lg-radius"><?= esc($t['label_radius']); ?></label>
                <input type="range" id="lg-radius" min="4" max="48" value="24">
            </div>
            <div class="lg-field">
                <label for="lg-border"><?= esc($t['label_border']); ?></label>
                <input type="range" id="lg-border" min="0" max="4" value="1" step="0.5">
            </div>
            <div class="lg-field">
                <label for="lg-noise"><?= esc($t['label_noise']); ?>: <span data-bind="lg-noise">30%</span></label>
                <input type="range" id="lg-noise" min="0" max="100" value="30">
            </div>
            <div class="lg-field">
                <label for="lg-tint"><?= esc($t['label_tint']); ?></label>
                <input type="color" id="lg-tint" value="#ffffff">
            </div>
            <div class="lg-field">
                <label for="lg-depth"><?= esc($t['label_depth']); ?>: <span data-bind="lg-depth">60</span></label>
                <input type="range" id="lg-depth" min="0" max="100" value="5" step="1">
            </div>
            <div class="lg-field mt-4 glass-card">
                <label><?= esc($t['label_background']); ?></label>
                <?php render('dropzone', ['id' => 'lgBg']); ?>
            </div>
        </div>
        <div class="lg-field">
            <label><?= esc($t['label_presets']); ?></label>
            <div class="grid grid-cols-5 gap-2">
                <button type="button" class="btn-ghost text-xs" data-preset="1">1</button>
                <button type="button" class="btn-ghost text-xs" data-preset="2">2</button>
                <button type="button" class="btn-ghost text-xs" data-preset="3">3</button>
                <button type="button" class="btn-ghost text-xs" data-preset="4">4</button>
                <button type="button" class="btn-ghost text-xs" data-preset="5">5</button>
            </div>
        </div>
        <div class="flex flex-col gap-3">
            <div class="lg-actions grid-cols-2 gap-3 grid">
                <button type="button" id="lg-copy" class="btn-ghost"><?= esc($t['btn_copy']); ?></button>
            </div>
            <div class="output flex flex-col gap-2">
                <label for="lg-css" class="text-sm text-muted uppercase tracking-wide"><?= esc($t['res_css']); ?></label>
                <textarea id="lg-css" rows="6" readonly class="lg-code" aria-label="CSS snippet"></textarea>
                <div class="text-xs" id="lg-status" aria-live="polite" data-copied="<?= esc($t['res_copied']); ?>" data-error="<?= esc($t['res_error']); ?>"></div>
            </div>
        </div>
    </form>
    <link rel="stylesheet" href="<?= asset_url('services/liquid-glass/style.css'); ?>">
    <script src="<?= asset_url('services/liquid-glass/script.js'); ?>" defer></script>
</div>