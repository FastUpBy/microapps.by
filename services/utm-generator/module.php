<?php
// Получаем переводы для модуля
$svc_t = get_embedded_module_lang(__DIR__);
?>
<section class="wrapper" aria-labelledby="utm-h1">
	<form id="utm_form">
		<label class="block text-sm text-muted mb-2" for="utm_url"><?= esc($svc_t['label_url']) ?> *</label>
		<input id="utm_url" type="url" placeholder="<?= esc($svc_t['placeholder_url']) ?>" required>

		<label class="block text-sm text-muted mb-2 mt-4" for="utm_source"><?= esc($svc_t['label_source']) ?> *</label>
		<input id="utm_source" type="text" placeholder="<?= esc($svc_t['placeholder_source']) ?>" required>

		<label class="block text-sm text-muted mb-2 mt-4" for="utm_medium"><?= esc($svc_t['label_medium']) ?> *</label>
		<input id="utm_medium" type="text" placeholder="<?= esc($svc_t['placeholder_medium']) ?>" required>

		<label class="block text-sm text-muted mb-2 mt-4" for="utm_campaign"><?= esc($svc_t['label_campaign']) ?> *</label>
		<input id="utm_campaign" type="text" placeholder="<?= esc($svc_t['placeholder_campaign']) ?>" required>

		<label class="block text-sm text-muted mb-2 mt-4" for="utm_term"><?= esc($svc_t['label_term']) ?></label>
		<input id="utm_term" type="text" placeholder="<?= esc($svc_t['placeholder_term']) ?>">

		<label class="block text-sm text-muted mb-2 mt-4" for="utm_content"><?= esc($svc_t['label_content']) ?></label>
		<input id="utm_content" type="text" placeholder="<?= esc($svc_t['placeholder_content']) ?>">

		<div class="flex gap-2 mt-4">
			<button type="submit"><?= esc($svc_t['btn_generate']) ?></button>
			<button type="reset"><?= esc($svc_t['btn_reset']) ?></button>
		</div>

		<div class="mt-6">
			<label class="block text-sm text-muted mb-2"><?= esc($svc_t['res_title']) ?></label>
			<div class="bg-card border border-gray-300 dark:border-gray-700 rounded p-4 min-h-[60px] flex items-center">
				<code id="utm_result" class="text-sm break-all"><?= esc($svc_t['res_empty']) ?></code>
			</div>
			<button type="button" id="utm_copy" class="mt-2" disabled><?= esc($svc_t['btn_copy']) ?></button>
		</div>
	</form>
</section>
<script src="<?= asset_url('services/utm-generator/script.js') ?>" defer></script>
