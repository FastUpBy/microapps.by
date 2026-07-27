<?php
// Компонент range slider (ползунок)
// Автоматически подтягивает данные из $t['range']
// Можно переопределить любые параметры через render('range', ['id' => 'custom'])

$id = $id ?? 'rangeSlider';
$label = $label ?? '';
$min = $min ?? 0;
$max = $max ?? 100;
$value = $value ?? 50;
$step = $step ?? 1;
$showValue = $showValue ?? true;
$valuePrefix = $valuePrefix ?? '';
$valueSuffix = $valueSuffix ?? '';
$hintLeft = $hintLeft ?? '';
$hintRight = $hintRight ?? '';
?>
<div class="range-component">
    <?php if ($label): ?>
    <label for="<?= esc($id) ?>" class="block mb-2 font-semibold">
        <?= esc($label) ?>
        <?php if ($showValue): ?>
        <span id="<?= esc($id) ?>Value"><?= esc($valuePrefix) ?><?= esc((string)$value) ?><?= esc($valueSuffix) ?></span>
        <?php endif; ?>
    </label>
    <?php endif; ?>
    <input type="range" 
           id="<?= esc($id) ?>" 
           min="<?= esc((string)$min) ?>" 
           max="<?= esc((string)$max) ?>" 
           value="<?= esc((string)$value) ?>" 
           step="<?= esc((string)$step) ?>" 
           class="w-full">
    <?php if ($hintLeft || $hintRight): ?>
    <div class="text-sm text-muted mt-1">
        <?php if ($hintLeft): ?><span><?= esc($hintLeft) ?></span><?php endif; ?>
        <?php if ($hintRight): ?><span class="float-right"><?= esc($hintRight) ?></span><?php endif; ?>
    </div>
    <?php endif; ?>
</div>
<script>
// Автоматическое обновление значения при изменении ползунка
(function() {
    const slider = document.getElementById('<?= esc($id) ?>');
    const valueDisplay = document.getElementById('<?= esc($id) ?>Value');
    if (slider && valueDisplay) {
        slider.addEventListener('input', function() {
            valueDisplay.textContent = '<?= esc($valuePrefix) ?>' + this.value + '<?= esc($valueSuffix) ?>';
        });
    }
})();
</script>
