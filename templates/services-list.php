<?php
// Шаблон списка доступных сервисов
// Поддержка вызова get_services_list() — берёт из $t['services']
$services = $services ?? ($t['services'] ?? []);
if (empty($services) || !is_array($services)) {
    return;
}
?>
<section class="services-list">
    <h2>Доступные сервисы</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach ($services as $service): if (!is_array($service)) continue; ?>
            <a href="<?= esc($service['url'] ?? '#') ?>" class="card">
                <?php if (!empty($service['иконка'] ?? $service['icon'])): ?>
                    <div class="service-icon"><?= $service['иконка'] ?? $service['icon'] ?></div>
                <?php endif; ?>
                <h3><?= esc($service['название'] ?? $service['name'] ?? $service['title'] ?? '') ?></h3>
                <p><?= esc($service['описание'] ?? $service['description'] ?? '') ?></p>
            </a>
        <?php endforeach; ?>
    </div>
</section>
