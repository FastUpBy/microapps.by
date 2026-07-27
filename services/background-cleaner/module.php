<?php
// $t автоматически доступен из $GLOBALS['SERVICE_LANG']
?>
<section class="magic-wand wrapper">
	<div class="tool-card">
		<h2 id="svc-title"><?= htmlspecialchars($t['h1'] ?? 'Magic Wand Background Remover'); ?></h2>
		<p id="svc-desc"><?= htmlspecialchars($t['description'] ?? 'Remove background from images locally in browser.'); ?></p>

		<div class="controls">
			<input id="file-input" type="file" accept="image/*" style="display:none">
			<div id="dropZone" class="w-full p-5 mb-4 border-2 border-dashed rounded-md text-center" style="border-color:var(--accent); background:var(--bg); cursor:pointer;">
				<div id="dropText" class="text-muted">
					<?= htmlspecialchars($t['drop_choose'] ?? 'Choose a PNG or JPG file...'); ?>
					<div class="text-sm mt-2 text-muted"><?= htmlspecialchars($t['drop_hint'] ?? 'Or drag & drop an image here'); ?></div>
				</div>
			</div>

			<div class="control-row tool-switch-row mb-6" style="align-items:center;gap:12px">
				<div class="tool-switch mb-4" style="display:flex;gap:8px;align-items:center">
					<strong><?= htmlspecialchars($t['tool_switch_label'] ?? 'Tool'); ?>:</strong>
					<button id="tool-wand" class="tool-btn active" type="button"><?= htmlspecialchars($t['tool_wand'] ?? 'Magic Wand'); ?></button>
					<button id="tool-eraser" class="tool-btn" type="button"><?= htmlspecialchars($t['tool_eraser'] ?? 'Eraser'); ?></button>
				</div>
				<div style="flex:1">
					<label class="mb-1" id="tol-label" for="tolerance" data-tol="<?= htmlspecialchars($t['tolerance_label'] ?? 'Tolerance'); ?>" data-eraser="<?= htmlspecialchars($t['eraser_size_label'] ?? 'Eraser'); ?>"><?= htmlspecialchars($t['tolerance_label'] ?? 'Tolerance'); ?>: <span id="tol-value">20</span></label>
					<input class="range" id="tolerance" type="range" min="0" max="255" value="20" step="1">
				</div>
			</div>

			<div class="buttons mb-6">
				<button id="download-btn" disabled><?= htmlspecialchars($t['download_button'] ?? 'Download PNG'); ?></button>
				<button id="undo-btn" disabled><?= htmlspecialchars($t['undo_button'] ?? 'Undo'); ?></button>
				<button id="reset-btn" disabled><?= htmlspecialchars($t['reset_button'] ?? 'Reset'); ?></button>
			</div>
		</div>

		<div class="canvas-wrap checkerboard" style="display:none">
			<canvas id="main-canvas"></canvas>
			<canvas id="overlay-canvas"></canvas>
		</div>
	<p class="hint"><?= htmlspecialchars($t['hint'] ?? 'Click on canvas to remove contiguous area of similar color.'); ?></p>
	</div>

	<script>
		// Localized strings for the front-end
		window.SVC_I18N = {
			upload_button: <?= json_encode($t['upload_button'] ?? 'Upload image') ?>,
			download_button: <?= json_encode($t['download_button'] ?? 'Download PNG') ?>,
			reset_button: <?= json_encode($t['reset_button'] ?? 'Reset') ?>,
			undo_button: <?= json_encode($t['undo_button'] ?? 'Undo') ?>,
			drop_choose: <?= json_encode($t['drop_choose'] ?? 'Choose a PNG or JPG file...') ?>,
			drop_hint: <?= json_encode($t['drop_hint'] ?? 'Or drag & drop an image here') ?>,
			tolerance_label: <?= json_encode($t['tolerance_label'] ?? 'Tolerance') ?>,
			eraser_size_label: <?= json_encode($t['eraser_size_label'] ?? 'Eraser size') ?>,
			tool_wand: <?= json_encode($t['tool_wand'] ?? 'Magic Wand') ?>,
			tool_eraser: <?= json_encode($t['tool_eraser'] ?? 'Eraser') ?>,
			tool_switch_label: <?= json_encode($t['tool_switch_label'] ?? 'Tool') ?>,
			cannot_load: <?= json_encode($t['cannot_load'] ?? ($t['cannot_load'] ?? 'Cannot load image')) ?>,
			default_filename: <?= json_encode($t['default_filename'] ?? 'transparent.png') ?>
		};
	</script>
	<link rel="stylesheet" href="<?= asset_url('services/background-cleaner/style.css') ?>">
	<script src="<?= asset_url('services/background-cleaner/script.js') ?>" defer></script>


</section>