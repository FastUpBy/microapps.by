<?php
// Компонент dropZone для загрузки файлов
// Автоматически подтягивает данные из $t['dropzone']
// Можно переопределить любые параметры через render('dropzone', ['id' => 'custom'])

$id = $id ?? 'fileInput';
$label = $label ?? '';
$placeholder = $placeholder ?? 'Choose file...';
$dragHint = $dragHint ?? 'Or drag & drop a file here';
$accept = $accept ?? 'image/*';
$multiple = $multiple ?? false;
?>
<div class="dropzone-component">
    <?php if ($label): ?>
    <label for="<?= esc($id) ?>" class="upload-label block mb-2 font-semibold">
        <?= esc($label) ?>
    </label>
    <?php endif; ?>
    <div id="<?= esc($id) ?>DropZone" class="w-full p-5 mb-4 border-2 border-dashed rounded-md text-center" style="border-color:var(--accent); background:var(--bg);">
        <div id="<?= esc($id) ?>DropText" class="text-muted cursor-pointer">
            <?= esc($placeholder) ?>
            <?php if ($dragHint): ?>
            <div class="text-sm mt-2 text-muted"><?= esc($dragHint) ?></div>
            <?php endif; ?>
        </div>
    </div>
    <input type="file" 
           id="<?= esc($id) ?>" 
           accept="<?= esc($accept) ?>" 
           <?= $multiple ? 'multiple' : '' ?> 
           class="hidden">
</div>
