<?php

$svc_t = get_embedded_module_lang(__DIR__);
?>
<div class="wrapper">
	<label class="block text-sm text-muted mb-2"><?php echo esc($svc_t['label_amount']) ?></label>
	<input id="pc_amount" type="number" placeholder="1000">

	<label class="block text-sm text-muted mb-2"><?php echo esc($svc_t['label_percent']) ?></label>
	<input id="pc_percent" type="number" placeholder="15">
	<div class="mt-4 mb-1 flex gap-4">
		<button type="button" id="pc_calculate" aria-disabled="true"><?php echo esc($svc_t['btn']) ?></button>
		<button type="button" id="pc_reset" aria-label="<?= esc($svc_t['btn_reset']) ?>"><?php echo esc($svc_t['btn_reset']) ?></button>
	</div>
	<small class="calc-hint">		Результат обновляется автоматически</small>

	<div id="pc_result" class="text-left text-lg text-muted">
		<p class="mb-1"><strong><?php echo esc($svc_t['res_add']) ?>:</strong> <span id="pc_add"></span></p>
		<p class="mb-1"><strong><?php echo esc($svc_t['res_sub']) ?>:</strong> <span id="pc_sub"></span></p>
		<p class=""><strong><?php echo esc($svc_t['res_of']) ?>:</strong> <span id="pc_of"></span></p>
	</div>
</div>
<script src="<?= asset_url('services/perc-calculator/script.js') ?>" defer></script>