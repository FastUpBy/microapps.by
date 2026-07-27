<?php
// Контакты — мультиязычный набор
$lang = function_exists('current_lang') ? current_lang() : ($GLOBALS['CURRENT_LANG'] ?? 'ru');

$all = [
   'ru' => [
    'title' => 'Контакты — MicroApps.by',
    'h1' => 'Контакты и поддержка MicroApps',
    'h2' => 'Обратная связь',
    'description' => 'Свяжитесь с командой MicroApps по любым вопросам: сообщите об ошибке, предложите идею нового сервиса или обсудите партнёрство. Отвечаем в течение 24 часов.',
    'keywords' => 'контакты, обратная связь, поддержка, сообщить об ошибке, предложить идею',

    // 1. Контактные данные
    'contact_info_title' => 'Как с нами связаться',
    'contact_info' => [
        'email' => 'Электронная почта',
        'email_value' => 'support@fastup.by',
        'note' => 'Отвечаем на все письма в течение 24 часов (обычно быстрее).',
        'telegram' => 'Telegram (для быстрых вопросов)',
        'telegram_value' => '@Asmodey_dev', // <-- Добавьте ваш Telegram-ник
    ],

    // 2. Ключевое дополнение: Кто мы
    'about_team_title' => 'Кто отвечает за MicroApps',
    'about_team_text' => 'MicroApps — это проект маркетингового агентства FastUp. Все сервисы разработаны и поддерживаются нашей командой инженеров и SEO-специалистов. Мы создаём полезные инструменты для себя и делимся ими с вами.',
    // Прямая ссылка на автора платформы (укрепляет E-E-A-T)
    'about_team_link' => 'Узнать больше о FastUp', 
    'about_team_url' => 'https://fastup.by/',

    // 3. Что можно написать
    'support_title' => 'По каким вопросам нам писать',
    'support_text' => 'Мы будем рады обратной связи по любым темам. Вот что нам особенно интересно:',
    'support_list' => [
        'line1' => '🐞 Сообщить об ошибке или проблеме в работе сервиса.',
        'line2' => '💡 Предложить идею нового инструмента для платформы.',
        'line3' => '🤝 Обсудить сотрудничество или партнёрство.',
        'line4' => '📝 Поделиться общим впечатлением или отзывом.',
    ],

    // 4. Нейтральный статус (оставьте как есть, это важно для международного позиционирования)
    'neutrality_title' => 'Нейтральный статус платформы',
    'neutrality_text' => 'MicroApps — международная онлайн-платформа, не привязанная к какому-либо региону. Сервисы доступны пользователям из любой страны и работают одинаково вне зависимости от местоположения.',
],
'en' => [
    'title' => 'Contact — MicroApps',
    'h1' => 'Contact & Support',
    'h2' => 'Get in Touch',
    'description' => 'Contact the MicroApps team: report bugs, suggest new tools, or discuss partnerships. We typically respond within 24 hours.',
    'keywords' => 'contact, support, feedback, bug report, partnership, microapps',

    // 1. Contact Details
    'contact_info_title' => 'How to Reach Us',
    'contact_info' => [
        'email' => 'Email',
        'email_value' => 'support@fastup.by',
        'note' => 'We reply to all messages within 24 hours (usually sooner).',
        'telegram' => 'Telegram (for quick questions)',
        'telegram_value' => '@Asmodey_dev', // Замените на ваш актуальный Telegram
    ],

    // 2. Who We Are (Ключевой блок для доверия)
    'about_team_title' => 'Who Builds MicroApps',
    'about_team_text' => 'MicroApps is a project by FastUp, a marketing and web development agency. All tools are designed and maintained by our team of engineers and SEO specialists. We build these utilities for our own workflows and are happy to share them with you.',
    'about_team_link' => 'Learn more about FastUp',
    'about_team_url' => 'https://fastup.by/',

    // 3. What You Can Write About (Четкие сценарии обращений)
    'support_title' => 'What You Can Contact Us About',
    'support_text' => 'We welcome your feedback on any topic. Here’s what interests us most:',
    'support_list' => [
        'line1' => '🐞 Report a bug or technical issue.',
        'line2' => '💡 Suggest an idea for a new tool.',
        'line3' => '🤝 Discuss potential collaboration or partnership.',
        'line4' => '📝 Share your general feedback or testimonial.',
    ],

    // 4. Neutrality Statement (Акцент на глобальность)
    'neutrality_title' => 'Global Platform Status',
    'neutrality_text' => 'MicroApps is an international online platform with no regional affiliation. All services are accessible worldwide and perform consistently regardless of your location.',
]
];

$t = $all[$lang] ?? $all['ru'];
$t = set_t($t);
get_header();
?>

<div itemscope itemtype="https://schema.org/Organization">
    <meta itemprop="name" content="<?= esc($t['title'] ?? 'MicroApps') ?>">
    <meta itemprop="url" content="<?= esc(site_url()) ?>">

    <section class="hero">
        <h2 class="h2"><?= esc($t['h2']) ?></h2>
        <p><?= esc($t['description']) ?></p>
    </section>

    <section class="contacts section" itemprop="contactPoint" itemscope itemtype="https://schema.org/ContactPoint">
        <h2><?= esc($t['contact_info_title']) ?></h2>
        <div class="contact-item">
            <h3 itemprop="contactType"><?= esc($t['contact_info']['email']) ?>:</h3>
            <a itemprop="email" href="mailto:<?= esc($t['contact_info']['email_value']) ?>">
                <?= esc($t['contact_info']['email_value']) ?>
            </a>
            <p><?= esc($t['contact_info']['note']) ?></p>
        </div>
        <?php if (!empty($t['contact_info']['telegram'])): ?>
        <div class="contact-item">
            <h3><?= esc($t['contact_info']['telegram']) ?>:</h3>
            <a href="https://t.me/<?= esc(ltrim($t['contact_info']['telegram_value'], '@')) ?>" rel="nofollow noopener" target="_blank">
                <?= esc($t['contact_info']['telegram_value']) ?>
            </a>
        </div>
        <?php endif; ?>
    </section>

    <?php if (!empty($t['about_team_title'])): ?>
    <section class="about-team section">
        <h2><?= esc($t['about_team_title']) ?></h2>
        <p><?= esc($t['about_team_text']) ?></p>
        <?php if (!empty($t['about_team_url'])): ?>
        <p><a href="<?= esc($t['about_team_url']) ?>" rel="noopener" target="_blank"><?= esc($t['about_team_link']) ?></a></p>
        <?php endif; ?>
    </section>
    <?php endif; ?>

    <section class="neutral section">
        <h2><?= esc($t['neutrality_title']) ?></h2>
        <p><?= esc($t['neutrality_text']) ?></p>
    </section>

    <section class="support section">
        <h2><?= esc($t['support_title']) ?></h2>
        <p><?= esc($t['support_text']) ?></p>
        <?php if (!empty($t['support_list'])): ?>
        <ul class="support-list">
            <?php foreach ($t['support_list'] as $line): ?>
            <li><?= esc($line) ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </section>

</div>

<script type="application/ld+json">
<?= json_encode([
    "@context" => "https://schema.org",
    "@type" => "Organization",
    "name" => $t['title'] ?? 'MicroApps',
    "url" => site_url(),
    "contactPoint" => [
        [
            "@type" => "ContactPoint",
            "contactType" => $t['contact_info']['email'] ?? 'Customer Support',
            "email" => $t['contact_info']['email_value'] ?? '',
        ]
    ]
], JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT) ?>
</script>

<?php get_footer(); ?>