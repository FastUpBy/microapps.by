<?php
$lang = function_exists('current_lang') ? current_lang() : ($GLOBALS['CURRENT_LANG'] ?? 'ru');

$t = [
    'ru' => [
        'title' => 'Политика конфиденциальности — MicroApps',
        'h1' => 'Политика конфиденциальности',
        'desc' => 'Как MicroApps собирает, использует и защищает ваши данные. Коротко и понятно.',
        'content' => [
            ['title' => '1. Введение', 'text' => 'Мы уважаем вашу приватность. Эта политика объясняет, какие данные мы можем собирать, зачем и как мы их используем.'],
            ['title' => '2. Какие данные мы собираем', 'text' => 'Мы можем собирать следующие данные: техническая информация (IP, User-Agent), данные формы (если вы отправляете обратную связь), файлы логов и агрегированные статистики использования. Мы не требуем обязательной регистрации для использования большинства инструментов.'],
            ['title' => '3. Использование данных', 'text' => 'Данные используются для улучшения сервиса: диагностика проблем, аналитика использования, предотвращение злоупотреблений и персонализация базовых функций (например, локаль). Мы не продаём ваши персональные данные третьим лицам.'],
            ['title' => '4. Cookies и трекеры', 'text' => 'Мы используем только необходимые cookies для работы сайта и, при включении аналитики, ограниченные аналитические cookies. Вы можете отключать некоторые cookies в настройках браузера.'],
            ['title' => '5. Хранение и безопасность', 'text' => 'Мы храним данные минимально необходимое время и применяем стандартные меры безопасности для защиты от несанкционированного доступа.'],
            ['title' => '6. Третьи стороны', 'text' => 'Некоторые сервисы (например, Google Analytics или провайдеры оплаты) могут собирать данные в соответствии со своими политиками. Ссылки на эти политики размещены в соответствующих разделах сайта.'],
            ['title' => '7. Права пользователя', 'text' => 'Вы имеете право запросить удаление или экспорт своих данных, а также задать вопросы по обработке. Для этого свяжитесь с нами через страницу контактов.'],
            ['title' => '8. Обновления политики', 'text' => 'Политика может обновляться. Дата последнего обновления указана внизу страницы.']
        ],
        'updated' => date('Y-m-d')
    ],
    'en' => [
        'title' => 'Privacy Policy — MicroApps',
        'h1' => 'Privacy Policy',
        'desc' => 'How MicroApps collects, uses and protects your data — short and clear.',
        'content' => [
            ['title' => '1. Introduction', 'text' => 'We respect your privacy. This policy explains what data we may collect, why and how we use it.'],
            ['title' => '2. Data we collect', 'text' => 'We may collect technical information (IP, User-Agent), form submissions (if you send feedback), server logs and aggregated usage statistics. Registration is not required for most tools.'],
            ['title' => '3. How we use data', 'text' => 'Data is used to improve the service: diagnose issues, analytics, prevent abuse and provide basic personalization (e.g., locale). We do not sell personal data to third parties.'],
            ['title' => '4. Cookies and trackers', 'text' => 'We use essential cookies for site functionality and limited analytics cookies when analytics is enabled. You can disable some cookies in your browser.'],
            ['title' => '5. Storage and security', 'text' => 'We retain data only as long as necessary and apply standard security measures to protect it from unauthorized access.'],
            ['title' => '6. Third parties', 'text' => 'Some services (e.g., Google Analytics or payment providers) may collect data according to their policies. Links to those policies are provided where relevant.'],
            ['title' => '7. Your rights', 'text' => 'You can request deletion or export of your data, and ask questions about processing. Contact us via the contact page.'],
            ['title' => '8. Policy updates', 'text' => 'This policy may be updated. The last updated date is shown at the bottom of the page.']
        ],
        'updated' => date('Y-m-d')
    ]
];

$t = $t[$lang] ?? $t['ru'];
set_t($t);
get_header();
?>
<main class="page">    <section class="content-block" itemscope itemtype="https://schema.org/CreativeWork">
        <?php foreach ($t['content'] as $block): ?>
            <article class="policy-section">
                <h2><?= esc($block['title']) ?></h2>
                <p><?= esc($block['text']) ?></p>
            </article>
        <?php endforeach; ?>      
    </section>  
</main>

<?php get_footer(); ?>