<?php
/**
 * Component: CopyText
 * Компонент для отображения текста с возможностью копирования
 * 
 * Props:
 * - $label (string) — подпись сверху (опционально)
 * - $labelId (string) — ID для span внутри label (опционально, для JS-обновления)
 * - $text (string) — текст внутри блока
 * - $id (string) — уникальный ID для контейнера текста (обязательно)
 * - $btnId (string) — ID для кнопки (опционально)
 */

$label = $label ?? '';
$labelId = $labelId ?? '';
$text  = $text  ?? '';
$id    = $id    ?? 'copytext_' . rand(10000, 99999);
$btnId = $btnId ?? 'copy-' . $id;
?>

<div class="text-copy-wrapper">
    <?php if ($label): ?>
        <div class="copytext__label">
            <?php if ($labelId): ?>
                <span id="<?= esc($labelId) ?>"><?= esc($label) ?></span>
            <?php else: ?>
                <?= esc($label) ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="text-copy relative p-2 rounded-lg">
        <span class="seo-field-value" id="<?= esc($id) ?>"><?= esc($text) ?></span>
        <button class="btn--transparent btn--copytext absolute top-2 right-4" type="button" id="<?= esc($btnId) ?>" aria-label="Копировать" data-copy-target="<?= esc($id) ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6 11C6 8.172 6 6.757 6.879 5.879C7.757 5 9.172 5 12 5H15C17.828 5 19.243 5 20.121 5.879C21 6.757 21 8.172 21 11V16C21 18.828 21 20.243 20.121 21.121C19.243 22 17.828 22 15 22H12C9.172 22 7.757 22 6.879 21.121C6 20.243 6 18.828 6 16V11Z" stroke="#5D5D5D" stroke-width="1.5"/>
                <path d="M6 19C5.20435 19 4.44129 18.6839 3.87868 18.1213C3.31607 17.5587 3 16.7956 3 16V10C3 6.229 3 4.343 4.172 3.172C5.344 2.001 7.229 2 11 2H15C15.7956 2 16.5587 2.31607 17.1213 2.87868C17.6839 3.44129 18 4.20435 18 5" stroke="#5D5D5D" stroke-width="1.5"/>
            </svg>
        </button>
    </div>
</div>
