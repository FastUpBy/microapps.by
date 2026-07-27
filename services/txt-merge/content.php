<?php
// Контент-блок: строгий формат — title + paragraphs массивов вида ['text' => '...']
$content = $content ?? ($t['content'] ?? []);
if (!is_array($content) || empty($content)) {
    return;
}

$title = $content['title'] ?? $content['заголовок'] ?? '';
$paragraphs = $content['paragraphs'] ?? [];
if (!is_array($paragraphs) || empty($paragraphs)) {
    return;
}
?>
<article class="content" itemscope itemtype="https://schema.org/Article">
    <?php if ($title): ?>
        <h2 itemprop="headline"><?= esc($title) ?></h2>
    <?php endif; ?>
    <div class="wrapper" itemprop="articleBody">
    <?php foreach ($paragraphs as $item):
        $text = is_array($item) ? ($item['text'] ?? '') : '';
        if (!strlen(trim((string)$text))) continue;
    ?>
        <p><?= esc($text) ?></p>
    <?php endforeach; ?>

   
    </div>
</article>