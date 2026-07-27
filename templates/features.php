<?php
// Шаблон блока преимуществ/возможностей
// Поддерживаем две формы: get_features($features) или get_features() — берет из $t
$features = $features ?? ($t['features'] ?? []);
if (empty($features) || !is_array($features)) {
    return;
}
?>
<section>
    <h2>Преимущества платформы</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach ($features as $feature): if (!is_array($feature)) continue; ?>
            <div class="card">
                <?php if (!empty($feature['иконка'] ?? $feature['icon'])): ?>
                    <div class="feature-icon"><?= $feature['иконка'] ?? $feature['icon'] ?></div>
                <?php endif; ?>
                <h3><?= esc($feature['заголовок'] ?? $feature['title'] ?? '') ?></h3>
                <p><?= esc($feature['описание'] ?? $feature['description'] ?? '') ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
