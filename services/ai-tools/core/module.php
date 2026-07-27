<?php
if (empty($serviceDir)) {
	$current = $GLOBALS['CURRENT_SERVICE'] ?? null;
	if ($current && defined('SERVICES_PATH')) {
		$serviceDir = rtrim(SERVICES_PATH, '\\/') . '/' . $current;
	}
}
$svc_t = get_embedded_module_lang($serviceDir);
$slug = basename($serviceDir ?: (__DIR__ . '/..'));
$module_lang = [];
$current_lang = $GLOBALS['CURRENT_LANG'] ?? null;
if (!$current_lang && function_exists('current_lang')) {
	$current_lang = current_lang();
}
if (!$current_lang) {
	$current_lang = 'ru';
}
// If URL contains /en/ prefix, prefer 'en'
if (isset($_SERVER['REQUEST_URI'])) {
	$uri = $_SERVER['REQUEST_URI'];
	$clean = trim(explode('?', $uri)[0], '/');
	if ($clean === 'en' || str_starts_with($clean, 'en/')) {
		$current_lang = 'en';
	}
}
if ($serviceDir) {
	$langFile = rtrim($serviceDir, '\\/') . '/lang.php';
	if (file_exists($langFile)) {
		$langs = require $langFile;
		$module_lang = $langs[$current_lang] ?? $langs['ru'] ?? [];
	}
}
?>
<div class="wrapper" >
    <form id="ai_form">
        <?php
        $inputs = $svc_t['inputs'] ?? [['name'=>'task', 'label'=>$svc_t['label_input'] ?? $svc_t['label_task'] ?? 'Ввод', 'placeholder'=>$svc_t['placeholder_input'] ?? $svc_t['placeholder_task'] ?? 'Введите текст...', 'type'=>'textarea']];
        if (!empty($svc_t['label_context'])) {
            $inputs[] = ['name'=>'context', 'label'=>$svc_t['label_context'], 'placeholder'=>$svc_t['placeholder_context'], 'type'=>'textarea'];
        }
        foreach ($inputs as $field):
            $name = $field['name'];
            $label = $field['label'];
            $placeholder = $field['placeholder'];
            $type = $field['type'] ?? 'textarea';
        ?>
        <label class="block text-sm text-muted mb-2" for="<?= esc($name) ?>"><?= esc($label) ?> *</label>
        <?php if ($type === 'textarea'): ?>
        <textarea id="<?= esc($name) ?>" name="<?= esc($name) ?>" placeholder="<?= esc($placeholder) ?>" rows="4" ></textarea>
        <?php else: ?>
        <input type="text" id="<?= esc($name) ?>" name="<?= esc($name) ?>" placeholder="<?= esc($placeholder) ?>" >
        <?php endif; ?>
        <?php endforeach; ?>

        <div class="flex gap-2 mt-4">
            <button type="submit" id="generate_btn"><?= esc($svc_t['btn_generate'] ?? 'Сгенерировать') ?></button>
            <button type="reset"><?= esc($svc_t['btn_reset'] ?? 'Сброс') ?></button>
        </div>

    </form>
    <div class="mt-6 text-center text-muted" id="status">
        <?= esc($svc_t['res_empty'] ?? 'Введите данные и нажмите «Сгенерировать»') ?>
    </div>
</div>
<section class="wrapper mt-6" id="results" style="display: none;" aria-labelledby="results-h2">
	<h2 id="results-h2"><?= esc($svc_t['res_title'] ?? 'Результат') ?></h2>
    <div class="seo-variant-card" id="result_fields">
        <!-- Поля результата заполняются динамически через JS -->
    </div>
</section>




<script>
	window.aiToolConfig = {
		api: "/api/ai-tools",
		slug: "<?= esc($slug) ?>",
		lang: {
			<?php
			// Prefer module/service/page in order: module defaults ($svc_t) -> SERVICE_LANG -> PAGE_LANG
			$g_service = $GLOBALS['SERVICE_LANG'] ?? [];
			$g_page = $GLOBALS['PAGE_LANG'] ?? [];
			$pick = function($k, $fallback) use ($svc_t, $g_service, $g_page, $module_lang) {
				if (isset($module_lang[$k])) return $module_lang[$k];
				if (isset($svc_t[$k])) return $svc_t[$k];
				if (isset($g_service[$k])) return $g_service[$k];
				if (isset($g_page[$k])) return $g_page[$k];
				return $fallback;
			};
			?>
			btn_copy: "<?= esc($pick('btn_copy', 'Копировать')) ?>",
			label_result: "<?= esc($pick('label_result', 'Результат')) ?>",
			label_query: "<?= esc($pick('label_query', 'Запрос')) ?>",
			label_explanation: "<?= esc($pick('label_explanation', 'Объяснение')) ?>",
			label_formula: "<?= esc($pick('label_formula', 'Формула')) ?>",
			label_title: "<?= esc($pick('label_title', 'Title')) ?>",
			label_description: "<?= esc($pick('label_description', $svc_t['label_desc'] ?? 'Description')) ?>",
			label_tos: "<?= esc($pick('label_tos', 'Условия использования')) ?>",
			res_empty: "<?= esc($pick('res_empty', 'Введите данные и нажмите «Сгенерировать»')) ?>",
			res_title: "<?= esc($pick('res_title', 'Результат')) ?>",
			generating: "<?= esc($pick('generating', 'Генерация...')) ?>",
			error_api: "<?= esc($pick('error_api', 'Ошибка при генерации. Попробуйте позже.')) ?>",
			error_empty: "<?= esc($pick('error_empty', 'Поле не может быть пустым.')) ?>"
		}
	};
</script>
<script src="<?= esc(asset_url('services/ai-tools/core/script.js')) ?>" defer></script>
<link rel="stylesheet" href="<?= esc(asset_url('services/ai-tools/core/style.css')) ?>">
