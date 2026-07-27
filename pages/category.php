<?php
// Страница категории: упрощённо, только микроразметка. JSON-LD генерируется системой.
require_once __DIR__ . '/../nav-bar/nav-core.php';

// Current language (fallback to 'ru')
$lang = function_exists('current_lang') ? current_lang() : ($GLOBALS['CURRENT_LANG'] ?? 'ru');

// Prepare field names
$titleField = $lang === 'ru' ? 'title_ru' : 'title_en';
$descField  = $lang === 'ru' ? 'desc_ru'  : 'desc_en';

// Санитизация слага и получение группированных сервисов
$catSlug = isset($_GET['c']) ? preg_replace('~[^a-z0-9_-]~', '', $_GET['c']) : '';
$all = function_exists('nav_get_services_grouped') ? nav_get_services_grouped() : [];
if (empty($all)) {
	$all = [];
}
if ($catSlug === '' || !isset($all[$catSlug])) { $catSlug = array_key_first($all) ?: '';
}

// Determine category title/description and services list
$catTitle = '';
$catDesc = '';
$services = [];
if ($catSlug !== '' && isset($all[$catSlug])) {
	$catInfo = $all[$catSlug]['info'] ?? [];
	$catTitle = $catInfo[$titleField] ?? ($catInfo['title_en'] ?? ucfirst($catSlug));
	$catDesc  = $catInfo[$descField]  ?? '';
	$services = $all[$catSlug]['services'] ?? [];
}

// Build page title/translations for set_t
$t = [
	'ru' => [
		'title' => $catTitle,
		'h1' => $catTitle,
		'description' => $catDesc
	],
	'en' => [
		'title' => $catTitle,
		'h1' => $catTitle,
		'description' => $catDesc
	]
];

$t = $t[$lang] ?? $t['ru'];
$t = set_t($t);
get_header();
?>
<section class="my-8" itemscope itemtype="https://schema.org/CollectionPage">
	
	<?php if ($catDesc): ?><p class="text-center mb-8" itemprop="about"><?= esc($catDesc) ?></p><?php endif; ?>
	<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" itemprop="hasPart">
		<?php foreach ($services as $svc):
			$svcTitle = $svc[$titleField] ?? $svc['slug'];
			$svcDesc  = $svc[$descField] ?? '';
            $slug = $svc['slug'] ?? '';
            if (strpos($slug, 'http://') === 0 || strpos($slug, 'https://') === 0) {
                $svcUrl = $slug;
            } else {
			    $svcUrl = function_exists('lang_url') ? lang_url($slug, $lang) : site_url($slug);
            }
		?>
		<div class="card" id="svc-<?= esc($svc['slug']) ?>" itemscope itemtype="https://schema.org/SoftwareApplication" itemprop="itemListElement">
			<h3 class="text-lg font-semibold mb-2" itemprop="name"><?= esc($svcTitle) ?></h3>
			<?php if ($svcDesc): ?><p class="text-sm mb-3" itemprop="description"><?= esc($svcDesc) ?></p><?php endif; ?>
			<a href="<?= esc($svcUrl) ?>" class="btn" itemprop="url"><?= esc($lang === 'ru' ? 'Открыть' : 'Open') ?></a>
			<meta itemprop="applicationCategory" content="Utility" >
			<meta itemprop="operatingSystem" content="Any" >
		</div>
		<?php endforeach; ?>
	</div>
	<p class="text-center mt-10"><a href="<?= esc(site_url('categories')) ?>" class="underline"><?= esc($lang === 'ru' ? 'Все категории' : 'All categories') ?></a></p>
</section>
<?php get_footer(); ?>
