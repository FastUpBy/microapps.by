<?php
// Универсальный шаблон FAQ с микроразметкой Schema.org
// Принимает массив $faq или автоматически берёт из $t['faq']
$faq = $faq ?? ($t['faq'] ?? []);
if (!is_array($faq) || empty($faq)) {
    return;
}
?>
<section class="faq" id="faq" itemscope itemtype="https://schema.org/FAQPage">
    <h2 itemprop="name">FAQ</h2>
    <?php foreach ($faq as $i => $item):
        if (!is_array($item)) continue;
        $q = $item['q'] ?? $item['вопрос'] ?? '';
        $a = $item['a'] ?? $item['ответ'] ?? '';
        if (empty($q) || empty($a)) continue;
        $id = 'faq' . ($i+1);
    ?>
        <div class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
            <button class="faq-question" aria-expanded="false" aria-controls="<?= esc($id) ?>">
            <span itemprop="name"><?= esc($q) ?></span>
                <svg class="faq-icon" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true">
                    <path d="M6 9l6 6 6-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <div id="<?= esc($id) ?>" class="faq-answer" role="region" aria-hidden="true" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                <p itemprop="text"><?= esc($a) ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</section>
