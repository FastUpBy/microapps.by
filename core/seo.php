<?php
// Генерация sitemap.xml и robots.txt для SEO

if (!function_exists('generate_sitemap')) {
function generate_sitemap(): string {
    $base = rtrim(site_url(), '/');
    
    if (!class_exists('RouteMap')) { require_once CORE_PATH . '/RouteMap.php'; }
    $map = RouteMap::getMap();
    
    $urls = [];

    // Root
    $urls[$base . '/'] = [ 'loc' => $base . '/', 'priority' => '1.0', 'lastmod' => date('Y-m-d') ];
    $urls[$base . '/en/'] = [ 'loc' => $base . '/en/', 'priority' => '1.0', 'lastmod' => date('Y-m-d') ];

    // Pages
    foreach ($map['pages'] as $slug => $path) {
        if ($slug === '404' || $slug === 'admin') continue;
        $urlPath = $slug === 'index' ? '/' : '/' . $slug;
        
        $mtime = file_exists($path) ? date('Y-m-d', filemtime($path)) : date('Y-m-d');
        
        $loc = $base . $urlPath;
        $urls[$loc] = [ 'loc' => $loc, 'priority' => '0.8', 'lastmod' => $mtime ];
        
        $loc_en = $base . '/en' . $urlPath;
        $urls[$loc_en] = [ 'loc' => $loc_en, 'priority' => '0.8', 'lastmod' => $mtime ];
    }

    // Services
    foreach ($map['services'] as $slug => $path) {
        if ($slug === 'admin') continue;
        $urlPath = '/' . $slug;

        // lastmod = самый свежий из index.php/lang.php/module.php — контент чаще всего меняется в lang.php
        $newestTime = 0;
        foreach (['index.php', 'lang.php', 'module.php'] as $f) {
            $fp = $path . '/' . $f;
            if (file_exists($fp)) {
                $t = filemtime($fp);
                if ($t > $newestTime) $newestTime = $t;
            }
        }
        $mtime = $newestTime > 0 ? date('Y-m-d', $newestTime) : date('Y-m-d');

        $loc = $base . $urlPath;
        $urls[$loc] = [ 'loc' => $loc, 'priority' => '0.7', 'lastmod' => $mtime ];
        
        $loc_en = $base . '/en' . $urlPath;
        $urls[$loc_en] = [ 'loc' => $loc_en, 'priority' => '0.7', 'lastmod' => $mtime ];
    }

    // Формируем XML
    $nl = PHP_EOL;
    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . $nl;
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . $nl;
    foreach ($urls as $u) {
        $xml .= '  <url>';
        $xml .= '<loc>' . htmlspecialchars($u['loc'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</loc>';
        $xml .= '<lastmod>' . htmlspecialchars($u['lastmod'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</lastmod>';
        $xml .= '<priority>' . $u['priority'] . '</priority>';
        $xml .= '</url>' . $nl;
    }
    $xml .= '</urlset>' . $nl;

    return $xml;
}
}

if (!function_exists('normalize_canonical_url')) {
function normalize_canonical_url(): void {
    if (!empty($GLOBALS['PAGE_CANONICAL'])) return;

    $uri = $_SERVER['REQUEST_URI'] ?? '/';
    $path = parse_url($uri, PHP_URL_PATH) ?: '/';
    $query = parse_url($uri, PHP_URL_QUERY) ?? '';

    if (!empty($query) || !empty($_GET)) {
        $clean = trim($path, '/');
        $parts = explode('/', $clean);

        $lang = ($parts[0] ?? '') === 'en' ? 'en' : 'ru';
        if ($lang === 'en') { array_shift($parts); }

        $slug = implode('/', $parts);
        $slug = trim($slug, '/');

        if ($lang === 'en') {
            $canonical = $slug === '' ? site_url('en') : site_url('en/' . $slug);
        } else {
            $canonical = $slug === '' ? site_url('') : site_url($slug);
        }

        $GLOBALS['PAGE_CANONICAL'] = $canonical;
    }
}
}

if (!function_exists('build_json_ld')) {
function build_json_ld(): string {
    normalize_canonical_url();
    
    $items = assemble_schema_data();

    $faqEntities = [];
    $other = [];
    foreach ($items as $it) {
        if (!is_array($it)) { $other[] = $it; continue; }
        if (!empty($it['@type']) && $it['@type'] === 'FAQPage') {
            if (!empty($it['mainEntity']) && is_array($it['mainEntity'])) {
                foreach ($it['mainEntity'] as $me) $faqEntities[] = $me;
            }
            continue;
        }
        $other[] = $it;
    }
    if (!empty($faqEntities)) {
        $seen = [];
        $merged = [];
        foreach ($faqEntities as $q) {
            if (is_array($q)) {
                $raw = (string)($q['name'] ?? $q['@id'] ?? json_encode($q));
                $norm = mb_strtolower($raw, 'UTF-8');
                $norm = preg_replace('/[^\p{L}\p{N}\s]+/u', '', $norm);
                $norm = preg_replace('/\s+/u', ' ', $norm);
                $k = trim($norm);
            } else {
                $k = md5((string)$q);
            }
            if ($k === '') { $k = md5(json_encode($q)); }
            if (isset($seen[$k])) continue;
            $seen[$k] = true;
            $merged[] = $q;
        }
        $other[] = [ '@type' => 'FAQPage', 'mainEntity' => $merged ];
    }

    $out = [
        '@context' => 'https://schema.org',
        '@graph' => $other,
    ];

    return json_ld($out);
}
}

if (!function_exists('build_faq_json_ld')) {
function build_faq_json_ld(array $faq): ?array {
    $items = [];
    foreach ($faq as $q) {
        if (!is_array($q)) continue;
        $question = $q['q'] ?? $q['вопрос'] ?? null;
        $answer = $q['a'] ?? $q['ответ'] ?? null;
        if (empty($question) || empty($answer)) continue;
        $items[] = [
            '@type' => 'Question',
            'name' => $question,
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $answer,
            ],
        ];
    }
    if (empty($items)) return null;
    return [
        '@type' => 'FAQPage',
        'mainEntity' => $items,
    ];
}
}

if (!function_exists('assemble_schema_data')) {
function assemble_schema_data(): array {
    $head = function_exists('get_head_data') ? get_head_data() : [];
    $t = $GLOBALS['PAGE_T'] ?? ($GLOBALS['PAGE_LANG'] ?? null);
    
    $siteName = $GLOBALS['config']['site_name'] ?? ($GLOBALS['PAGE_TITLE'] ?? ($head['title'] ?? ''));
    $site = [
        '@type' => 'WebSite',
        '@id' => rtrim(site_url(), '\/') . '/#website',
        'name' => $siteName,
        'url' => site_url(),
    ];
    $items = [$site];

    $current_url = $GLOBALS['PAGE_CANONICAL'] ?? ($head['canonical'] ?? site_url());
    
    $page_name = '';
    if (is_array($t)) {
        if (!empty($t['title'])) $page_name = $t['title'];
        elseif (!empty($t['content']['title'])) $page_name = $t['content']['title'];
        elseif (!empty($t['h1'])) $page_name = $t['h1'];
    }
    if (empty($page_name)) {
        $page_name = $head['title'] ?? ($GLOBALS['PAGE_TITLE'] ?? '');
    }

    $webpage = [
        '@type' => 'WebPage',
        '@id' => rtrim($current_url, '\/') . '#webpage',
        'url' => $current_url,
        'inLanguage' => $GLOBALS['CURRENT_LANG'] ?? 'ru',
        'isPartOf' => [ '@type' => 'WebSite', '@id' => rtrim(site_url(), '\/') . '/#website' ],
        'name' => $page_name,
    ];

    // Keywords → WebPage.keywords (Schema.org CreativeWork property)
    $keywords = $GLOBALS['META_KEYWORDS'] ?? ($head['keywords'] ?? ($head['meta_keywords'] ?? ''));
    if (is_array($t) && !empty($t['keywords']) && empty($keywords)) {
        $keywords = $t['keywords'];
    }
    if (!empty($keywords)) {
        $webpage['keywords'] = $keywords;
    }

    $dateMod = null;
    if (is_array($t) && !empty($t['date_modified'])) $dateMod = $t['date_modified'];

    if (!empty($dateMod)) {
        $dm = date_create($dateMod);
        $webpage['dateModified'] = $dm ? $dm->format(DATE_ATOM) : $dateMod;
    }

    $items[] = $webpage;

    $content = [];
    if (is_array($t) && !empty($t['content'])) {
        $content = $t['content'];
    } elseif (!empty($head['content']) && is_array($head['content'])) {
        $content = $head['content'];
    }
    $article = null;
    if (!empty($content) && is_array($content)) {
        $article = [
            '@type' => 'Article',
            '@id' => rtrim($current_url, '\/') . '#article',
            'headline' => $content['title'] ?? ($head['title'] ?? ($GLOBALS['PAGE_TITLE'] ?? '')),
            'inLanguage' => $GLOBALS['CURRENT_LANG'] ?? 'ru',
            'mainEntityOfPage' => [ '@type' => 'WebPage', '@id' => $current_url . '#webpage' ],
        ];

        $paragraphs = [];
        if (!empty($content['paragraphs']) && is_array($content['paragraphs'])) {
            foreach ($content['paragraphs'] as $p) {
                $text = is_array($p) ? trim((string)($p['text'] ?? '')) : trim((string)$p);
                if ($text !== '') $paragraphs[] = $text;
            }
        }
        
        $desc = $GLOBALS['PAGE_DESC'] ?? ($head['description'] ?? ($head['meta_description'] ?? ($content['meta_description'] ?? null)));
        if (!empty($desc)) {
            $article['description'] = mb_substr($desc, 0, 320);
        } elseif (!empty($paragraphs)) {
            $article['description'] = mb_substr(implode("\n\n", array_slice($paragraphs, 0, 3)), 0, 800);
        }

        $img = $head['og_image'] ?? ($GLOBALS['config']['publisher']['logo'] ?? null);
        if (empty($img)) {
            $img = 'favicon.png';
        }
        
        $parsedImg = parse_url($img);
        if (empty($parsedImg['scheme'])) {
            $img = site_url(ltrim($img, '\/'));
        }
        
        $article['image'] = [
            '@type' => 'ImageObject',
            'url' => $img,
        ];

        $article['articleSection'] = 'Utilities';

        // Keywords → Article.keywords
        if (!empty($keywords)) {
            $article['keywords'] = $keywords;
        }

        $article['speakable'] = [
            '@type' => 'SpeakableSpecification',
            'xpath' => [
                '/html/head/title',
                "/html/head/meta[@name='description']/@content",
            ],
        ];

        if (!empty($webpage['dateModified'])) {
            $article['dateModified'] = $webpage['dateModified'];
        }
        
        $authorName = null;
        if (is_array($t) && !empty($t['author'])) {
            $authorName = is_array($t['author']) ? ($t['author']['name'] ?? null) : $t['author'];
        } elseif (!empty($t['author_name'])) {
            $authorName = $t['author_name'];
        } elseif (!empty($head['author'])) {
            $authorName = is_array($head['author']) ? ($head['author']['name'] ?? null) : $head['author'];
        } elseif (!empty($GLOBALS['config']['default_author'])) {
            $authorName = $GLOBALS['config']['default_author'];
        }
        if (!empty($authorName)) {
            $publisherName = $GLOBALS['config']['publisher']['name'] ?? null;
            $isOrg = false;
            if ($publisherName && trim($authorName) === trim($publisherName)) $isOrg = true;
            if (stripos($authorName, 'team') !== false || stripos($authorName, 'studio') !== false || stripos($authorName, 'company') !== false) $isOrg = true;

            if ($isOrg) {
                $article['author'] = [
                    '@type' => 'Organization',
                    'name' => $authorName,
                    'url' => $GLOBALS['config']['base_url'] ?? site_url(),
                ];
            } else {
                $article['author'] = [ '@type' => 'Person', 'name' => $authorName ];
                if (!empty($t['author_url'])) $article['author']['url'] = $t['author_url'];
                elseif (!empty($head['author_url'])) $article['author']['url'] = $head['author_url'];
            }
        }
        
        if (!empty($GLOBALS['config']['publisher']) && is_array($GLOBALS['config']['publisher'])) {
            $pub = $GLOBALS['config']['publisher'];
            $logoUrl = $pub['logo'] ?? site_url('favicon.png');
            $logoObj = [ '@type' => 'ImageObject', 'url' => $logoUrl ];
            
            $width = null; $height = null;
            $root = defined('BASE_PATH') ? BASE_PATH : dirname(__DIR__);
            $logoPath = $logoUrl;
            $parsed = parse_url($logoUrl);
            if (empty($parsed['scheme'])) {
                $abs = rtrim($root, '\\/') . '/' . ltrim($logoPath, '\\/');
                if (file_exists($abs) && is_readable($abs)) {
                    $info = @getimagesize($abs);
                    if (!empty($info) && is_array($info)) {
                        $width = (int)($info[0] ?? 0);
                        $height = (int)($info[1] ?? 0);
                        $logoObj['url'] = site_url(ltrim($logoPath, '\\/'));
                    }
                }
            }
            if (empty($width) || empty($height)) {
                $width = $pub['logo_width'] ?? 600;
                $height = $pub['logo_height'] ?? 60;
            }
            $logoObj['width'] = (int)$width;
            $logoObj['height'] = (int)$height;

            $article['publisher'] = [
                '@type' => 'Organization',
                'name' => $pub['name'] ?? '',
                'logo' => $logoObj,
            ];
        }

        $items[] = $article;
    }

    // SoftwareApplication — только на страницах реальных сервисов (Router выставляет CURRENT_SERVICE)
    if (!empty($GLOBALS['CURRENT_SERVICE'])) {
        $appDesc = $GLOBALS['PAGE_DESC'] ?? ($head['description'] ?? ($head['meta_description'] ?? ''));
        if (empty($appDesc) && is_array($t)) {
            $appDesc = $t['desc'] ?? ($t['description'] ?? '');
        }
        $items[] = [
            '@type' => 'SoftwareApplication',
            '@id' => rtrim($current_url, '\/') . '#software',
            'name' => $page_name,
            'description' => mb_substr((string)$appDesc, 0, 320),
            'url' => $current_url,
            'applicationCategory' => 'Utility',
            'operatingSystem' => 'Any',
            'offers' => [
                '@type' => 'Offer',
                'price' => '0',
                'priceCurrency' => 'USD',
            ],
        ];
    }

    $includeFaq = false;
    if (!empty($head['include_faq_ld']) || (!empty($t['faq_ld']) && $t['faq_ld'])) $includeFaq = true;
    if (!empty($GLOBALS['config']['schema_include_faq'])) $includeFaq = (bool)$GLOBALS['config']['schema_include_faq'];

    if ($includeFaq) {
        $faq = [];
        if (is_array($t) && !empty($t['faq'])) {
            $faq = $t['faq'];
        } elseif (!empty($head['faq']) && is_array($head['faq'])) {
            $faq = $head['faq'];
        }
        if (!empty($faq) && is_array($faq)) {
            $faqLd = build_faq_json_ld($faq);
            if ($faqLd !== null) $items[] = $faqLd;
        }
    }

    $bc = [
        '@type' => 'BreadcrumbList',
        '@id' => rtrim($current_url, '\/') . '#breadcrumbs',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => $GLOBALS['config']['site_name'] ?? ($GLOBALS['PAGE_TITLE'] ?? 'Home'),
                'item' => site_url(),
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => $article['headline'] ?? ($GLOBALS['PAGE_TITLE'] ?? ''),
                'item' => $current_url,
            ],
        ],
    ];
    $items[] = $bc;

    return $items;
}
}

if (!function_exists('validate_schema_consistency')) {
function validate_schema_consistency(bool $verbose = false): array {
    $issues = [];
    $assembled = assemble_schema_data();

    $assembledHeadline = null;
    foreach ($assembled as $it) {
        if (is_array($it) && !empty($it['@type']) && $it['@type'] === 'Article') {
            $assembledHeadline = $it['headline'] ?? null;
            break;
        }
    }

    $head = function_exists('get_head_data') ? get_head_data() : [];
    $t = $GLOBALS['PAGE_T'] ?? ($GLOBALS['PAGE_LANG'] ?? null);
    $templateHeadline = null;
    if (is_array($t) && !empty($t['content']['title'])) {
        $templateHeadline = $t['content']['title'];
    } elseif (!empty($head['title'])) {
        $templateHeadline = $head['title'];
    } elseif (!empty($GLOBALS['PAGE_TITLE'])) {
        $templateHeadline = $GLOBALS['PAGE_TITLE'];
    }

    if ($assembledHeadline !== null && $templateHeadline !== null && trim($assembledHeadline) !== trim($templateHeadline)) {
        $issues[] = ['field' => 'headline', 'expected' => $assembledHeadline, 'found' => $templateHeadline];
    }

    $assembledFaqCount = 0;
    foreach ($assembled as $it) {
        if (is_array($it) && !empty($it['@type']) && $it['@type'] === 'FAQPage') {
            $assembledFaqCount = is_array($it['mainEntity']) ? count($it['mainEntity']) : 0;
            break;
        }
    }
    $templateFaqCount = 0;
    if (is_array($t) && !empty($t['faq']) && is_array($t['faq'])) $templateFaqCount = count($t['faq']);
    elseif (!empty($head['faq']) && is_array($head['faq'])) $templateFaqCount = count($head['faq']);

    if ($assembledFaqCount !== $templateFaqCount) {
        $issues[] = ['field' => 'faq_count', 'expected' => $assembledFaqCount, 'found' => $templateFaqCount];
    }

    $assembledHowCount = 0;
    foreach ($assembled as $it) {
        if (!is_array($it)) continue;
        if (!empty($it['@type']) && $it['@type'] === 'HowTo') {
            $assembledHowCount = is_array($it['step']) ? count($it['step']) : 0;
            break;
        }
        if (!empty($it['@type']) && $it['@type'] === 'Article' && !empty($it['hasPart']) && is_array($it['hasPart'])) {
            foreach ($it['hasPart'] as $part) {
                if (!is_array($part)) continue;
                if (!empty($part['@type']) && $part['@type'] === 'HowTo') {
                    $assembledHowCount = is_array($part['step']) ? count($part['step']) : 0;
                    break 2;
                }
            }
        }
    }
    $templateHowCount = 0;
    if (is_array($t) && !empty($t['howto']['steps']) && is_array($t['howto']['steps'])) $templateHowCount = count($t['howto']['steps']);
    elseif (!empty($head['howto']['steps']) && is_array($head['howto']['steps'])) $templateHowCount = count($head['howto']['steps']);
    if ($assembledHowCount !== $templateHowCount) {
        $issues[] = ['field' => 'howto_steps_count', 'expected' => $assembledHowCount, 'found' => $templateHowCount];
    }

    // Removed echo for production safety
    return ['mismatches' => $issues];
}
}

if (!function_exists('build_howto_json_ld')) {
function build_howto_json_ld(array $howto): ?array {
    $title = $howto['title'] ?? null;
    $steps = $howto['steps'] ?? [];
    if (empty($steps) || !is_array($steps)) return null;
    $items = [];
    foreach ($steps as $s) {
        if (!is_array($s)) continue;
        $name = $s['name'] ?? null;
        $text = $s['text'] ?? null;
        if (!$name && !$text) continue;
        $items[] = [
            '@type' => 'HowToStep',
            'name' => $name,
            'text' => $text,
        ];
    }
    if (empty($items)) return null;
    $out = [
        '@type' => 'HowTo',
        'name' => $title,
        'step' => $items,
    ];
    return $out;
}
}

if (!function_exists('enforce_schema_consistency')) {
function enforce_schema_consistency(): array {
    $head = function_exists('get_head_data') ? get_head_data() : [];
    $t = $GLOBALS['PAGE_T'] ?? ($GLOBALS['PAGE_LANG'] ?? null);

    $preferredTitle = null;
    if (is_array($t) && !empty($t['content']['title'])) {
        $preferredTitle = $t['content']['title'];
    } elseif (!empty($head['title'])) {
        $preferredTitle = $head['title'];
    }
    if ($preferredTitle && (!isset($GLOBALS['PAGE_TITLE']) || trim($GLOBALS['PAGE_TITLE']) !== trim($preferredTitle))) {
        $GLOBALS['PAGE_TITLE'] = $preferredTitle;
        if (function_exists('set_head')) {
            $siteName = $GLOBALS['config']['site_name'] ?? '';
            $titleOut = $preferredTitle;
            if ($siteName) {
                if (mb_stripos($titleOut, $siteName) === false) {
                    $titleOut = $titleOut . ' — ' . $siteName;
                }
            }
            set_head(['title' => $titleOut]);
        }
    }

    $preferredDesc = $head['description'] ?? ($GLOBALS['PAGE_DESC'] ?? null);
    if ($preferredDesc && (!isset($GLOBALS['PAGE_DESC']) || trim($GLOBALS['PAGE_DESC']) !== trim($preferredDesc))) {
        $GLOBALS['PAGE_DESC'] = $preferredDesc;
        if (function_exists('set_head')) set_head(['description' => $preferredDesc]);
    }

    if (!empty($GLOBALS['config']['schema_sync_faq'])) {
        if (is_array($t) && !empty($t['faq']) && is_array($t['faq'])) {
            if (empty($head['faq']) || $head['faq'] !== $t['faq']) {
                if (function_exists('set_head')) set_head(['faq' => $t['faq']]);
            }
        }
    }

    return validate_schema_consistency(false);
}
}

