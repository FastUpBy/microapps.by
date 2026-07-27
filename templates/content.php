<?php
// Контент-блок: поддерживает paragraphs ['text' => '...'] и GEO-формат qa_items ['q' => '...', 'a' => '...']
// SEO-оптимизация: добавлена поддержка comparison_table для GEO/SGE
$content = $content ?? ($t['content'] ?? []);
if (!is_array($content) || empty($content)) {
    return;
}

$title = $content['title'] ?? $content['заголовок'] ?? '';
$paragraphs = $content['paragraphs'] ?? [];
$qaItems = $content['qa_items'] ?? [];

$hasParagraphs = is_array($paragraphs) && !empty($paragraphs);
$hasQaItems = is_array($qaItems) && !empty($qaItems);

if (!$hasParagraphs && !$hasQaItems) {
    return;
}

$comparisonTable = $content['comparison_table'] ?? null;
?>
<article class="content" itemscope itemtype="https://schema.org/Article">
    <?php if ($title): ?>
        <h2 itemprop="headline"><?= esc($title) ?></h2>
    <?php endif; ?>

    <div itemprop="author" itemscope itemtype="https://schema.org/Organization">
        <meta itemprop="name" content="MicroApps Team">
        <meta itemprop="url" content="<?= site_url() ?>">
    </div>
    <meta itemprop="publisher" content="MicroApps">

    <div class="wrapper" itemprop="articleBody">
        <?php if ($hasParagraphs): ?>
            <?php foreach ($paragraphs as $item):
                $text = is_array($item) ? ($item['text'] ?? '') : '';
                if (!strlen(trim((string)$text))) continue;
            ?>
                <p><?= esc($text) ?></p>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if ($hasQaItems): ?>
            <?php foreach ($qaItems as $item):
                $q = is_array($item) ? ($item['q'] ?? '') : '';
                $a = is_array($item) ? ($item['a'] ?? '') : '';
                if (!strlen(trim((string)$q)) || !strlen(trim((string)$a))) continue;
            ?>
                <div class="qa-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <h3 class="mb-4" itemprop="name"><?= esc($q) ?></h3>
                    <div itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
                        <p itemprop="text"><?= esc($a) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php
        // Таблица сравнения (для GEO / AI-систем) — опционально
        if ($comparisonTable && is_array($comparisonTable)):
            $headers = $comparisonTable['headers'] ?? [];
            $rows = $comparisonTable['rows'] ?? [];
            $tableTitle = $comparisonTable['title'] ?? '';

            if (!empty($headers) && !empty($rows)):
        ?>
        <div class="table-responsive" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
            <?php if ($tableTitle): ?>
                <h3 class="mb-4"><?= esc($tableTitle) ?></h3>
            <?php endif; ?>
            <table>
                <thead>
                    <tr>
                        <?php foreach ($headers as $header): ?>
                            <th><?= esc($header) ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <?php foreach ($row as $cell): ?>
                                <td><?= esc($cell) ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
            endif;
        endif;
        ?>
    </div>
</article>
<?php
$ads =false;
if ($ads): ?>
    <section class="ad" aria-label="информация о разработчике">
        <div class="baner relative w-full h-[200px] overflow-hidden px-12 py-3">
            <div class="relative z-20 flex gap-6 h-full">
                <img class="w-auto aspect-square object-cover" src="<?= site_url('assets/img/ava.webp') ?>" alt="аватар">
                <div class="p-4 flex flex-col items-center justify-center">
                    <p class="text-xl font-regular text-white"><b class="uppercase font-semibold">Привет! 👋 Я разработчик этой платформы.</b><br> Если у тебя есть предложения или хочешь себе такой же сайт, то пиши мне в телеграм.</p>
                    <a class="btn btn--accent w-full text-xl font-medium gap-6" href="https://t.me/Asmodey_inq" aria-label="Телеграм" target="_blank" rel="noopener noreferrer">Написать лично мне в ТГ<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_700_181)">
                                <path d="M11 0C8.08328 0 5.28344 1.15964 3.22266 3.2218C1.15976 5.28478 0.000590302 8.08256 0 11C0 13.9162 1.16016 16.716 3.22266 18.7782C5.28344 20.8404 8.08328 22 11 22C13.9167 22 16.7166 20.8404 18.7773 18.7782C20.8398 16.716 22 13.9162 22 11C22 8.0838 20.8398 5.28395 18.7773 3.2218C16.7166 1.15964 13.9167 0 11 0Z" fill="url(#paint0_linear_700_181)" />
                                <path d="M4.97927 10.8838C8.18646 9.48681 10.3246 8.56579 11.3936 8.12075C14.4496 6.85008 15.0838 6.62939 15.498 6.62191C15.5891 6.62045 15.7919 6.64297 15.9243 6.74996C16.0343 6.8402 16.0652 6.96223 16.0807 7.04791C16.0944 7.1335 16.1133 7.32858 16.0979 7.48086C15.9329 9.22023 15.2161 13.4411 14.8518 15.3893C14.6988 16.2137 14.3946 16.49 14.1007 16.517C13.4613 16.5758 12.9766 16.0949 12.3579 15.6894C11.3902 15.0547 10.8436 14.6597 9.90349 14.0405C8.81724 13.3248 9.52193 12.9314 10.1407 12.2885C10.3022 12.1203 13.1176 9.5602 13.1708 9.328C13.1777 9.29895 13.1846 9.19067 13.1193 9.13361C13.0557 9.07638 12.9611 9.09597 12.8924 9.11144C12.7944 9.13344 11.2493 10.1558 8.25177 12.1782C7.81349 12.4797 7.41646 12.6266 7.05896 12.6189C6.66708 12.6105 5.91083 12.3968 5.3488 12.2143C4.6613 11.9903 4.11302 11.8719 4.16115 11.4916C4.18521 11.2936 4.45849 11.0909 4.97927 10.8838Z" fill="white" />
                            </g>
                            <defs>
                                <linearGradient id="paint0_linear_700_181" x1="1100" y1="0" x2="1100" y2="2200" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#2AABEE" />
                                    <stop offset="1" stop-color="#229ED9" />
                                </linearGradient>
                                <clipPath id="clip0_700_181">
                                    <rect width="22" height="22" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
            </div>
            <img fetchpriority="high" class="absolute top-0 left-0 w-full h-full z-0 object-fill" src="<?= site_url('assets/img/baner.webp') ?>" alt="баннер">
        </div>
    </section>
<?php endif; ?>