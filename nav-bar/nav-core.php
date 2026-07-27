<?php
/**
 * Ядро навигации - функции для работы с сервисами и категориями
 */

// Загрузка всех данных из links.php
function nav_load_data(): array {
	$file = __DIR__ . '/links.php';
	if (!file_exists($file)) return ['pages' => [], 'services' => [], 'categories' => []];
	$data = require $file;
	if (!is_array($data)) return ['pages' => [], 'services' => [], 'categories' => []];
	return $data;
}

// Загрузка ссылок сервисов
function nav_load_links(): array {
	$data = nav_load_data();
	if (!empty($data['services']) && is_array($data['services'])) return $data['services'];
	return [];
}

// Загрузка категорий с мета-информацией
function nav_load_categories(): array {
	$data = nav_load_data();
	if (!empty($data['categories']) && is_array($data['categories'])) return $data['categories'];
	return [];
}

// Получение списка слагов категорий
function nav_get_categories(): array {
	return array_keys(nav_load_categories());
}

// Получение информации о категории
function nav_get_category_info(string $slug): ?array {
	$categories = nav_load_categories();
	return $categories[$slug] ?? null;
}

// Получение категории текущей страницы
function nav_get_current_category(): ?string {
	$currentSlug = $_GET['page'] ?? 'index';
	$links = nav_load_links();
	foreach ($links as $link) {
		if (($link['slug'] ?? '') === $currentSlug) {
			$cat = $link['category'] ?? null;
			if (is_array($cat)) {
				return $cat[0] ?? null;
			}
			return $cat;
		}
	}
	return null;
}

// Получение сервисов по категории
function nav_get_services_by_category(string $category): array {
	$links = nav_load_links();
	return array_filter($links, function($l) use ($category) {
		$cats = $l['category'] ?? '';
		if (is_array($cats)) {
			return in_array($category, $cats);
		}
		return $cats === $category;
	});
}

// Группировка всех сервисов по категориям
function nav_get_services_grouped(): array {
	$links = nav_load_links();
	$categories = nav_load_categories();
	$grouped = [];
	
	foreach ($categories as $catSlug => $catInfo) {
		$grouped[$catSlug] = [
			'info' => $catInfo,
			'services' => []
		];
	}
	
	// Добавляем сервисы в соответствующие категории
	foreach ($links as $service) {
		$cats = $service['category'] ?? 'uncategorized';
		if (!is_array($cats)) {
			$cats = [$cats];
		}
		
		foreach ($cats as $cat) {
			if (!isset($grouped[$cat])) {
				$grouped[$cat] = [
					'info' => [
						'title_ru' => ucfirst($cat),
						'title_en' => ucfirst($cat),
						'icon' => '📁'
					],
					'services' => []
				];
			}
			$grouped[$cat]['services'][] = $service;
		}
	}
	
	// Удаляем пустые категории
	return array_filter($grouped, fn($g) => !empty($g['services']));
}

// Загрузка страниц
function nav_load_pages(): array {
	$data = nav_load_data();
	if (!empty($data['pages']) && is_array($data['pages'])) {
		return $data['pages'];
	}
	
	// fallback to scanning pages folder
	$out = [];
	$dir = dirname(__DIR__) . '/pages';
	if (!is_dir($dir)) return $out;
	foreach (glob($dir . '/*.php') as $file) {
		$slug = basename($file, '.php');
		if ($slug === '404') continue;
		$label = $slug === 'index' ? 'Home' : ucfirst(str_replace(['-', '_'], ' ', $slug));
		$out[] = [ 'slug' => $slug, 'label' => $label ];
	}
	return $out;
}

// Поиск сервисов (базовый поиск для совместимости)
function nav_search(string $q): array {
	$q = mb_strtolower(trim($q));
	if ($q === '') return [];
	$res = [];
	foreach (nav_load_links() as $l) {
		$title = mb_strtolower(($l['title_ru'] ?? '') . ' ' . ($l['title_en'] ?? ''));
		if (mb_strpos($title, $q) !== false || mb_strpos($l['slug'] ?? '', $q) !== false) $res[] = $l;
	}
	return $res;
}

