<?php
// Подключаем конфигурацию
if (!defined('DEEPSEEK_API_KEY')) {
    require_once __DIR__ . '/config.php';
}

// Функция для логирования ошибок
function logError($message, $context = [])
{
    $logEntry = [
        'timestamp' => date('Y-m-d H:i:s'),
        'message' => $message,
        'context' => $context
    ];

    // Логируем в корень сайта
    $logFile = __DIR__ . '/error.log';
    file_put_contents($logFile, json_encode($logEntry, JSON_UNESCAPED_UNICODE) . "\n", FILE_APPEND);
}

// Функция для отправки запроса к DeepSeek API с поддержкой рассуждающей модели
function sendDeepSeekRequest($messages, $maxTokens = 4000, $useReasoner = false, $stream = false)
{
    // Используем стандартную модель для стабильности
    $model = 'deepseek-chat';

    $data = [
        'model' => $model,
        'messages' => $messages,
        'max_tokens' => $maxTokens,
        'temperature' => 0.7
    ];

    $ch = curl_init(DEEPSEEK_API_URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . DEEPSEEK_API_KEY
    ]);

    // Убираем ограничения для максимальной производительности
    curl_setopt($ch, CURLOPT_TIMEOUT, 0); // Без таймаута
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); // Без таймаута подключения
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'AI-Content-Generator/1.0');

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);

    if ($curlError) {
        logError('cURL Error', ['error' => $curlError, 'http_code' => $httpCode]);
        return false;
    }

    if ($httpCode !== 200) {
        logError('DeepSeek API Error', ['http_code' => $httpCode, 'response' => $response]);

        // Обработка различных кодов ошибок
        switch ($httpCode) {
            case 500:
                return 'Сервис ИИ временно недоступен. Попробуйте через несколько минут.';
            case 401:
                return 'Ошибка авторизации API. Обратитесь к администратору.';
            case 429:
                return 'Превышен лимит запросов. Попробуйте через минуту.';
            case 400:
                return 'Некорректный запрос. Проверьте введенные данные.';
            default:
                return "Ошибка сервиса (код: $httpCode). Попробуйте позже.";
        }
    }

    $decodedResponse = json_decode($response, true);
    if (!$decodedResponse || !isset($decodedResponse['choices'][0]['message']['content'])) {
        logError('Invalid DeepSeek API Response', ['response' => $response]);
        return false;
    }

    return $decodedResponse['choices'][0]['message']['content'];
}

// Генерация статьи
function generateArticle($context, $title, $keywords, $wordCount)
{
    // Обрабатываем параметр wordCount
    $wordCountText = '';
    if (is_numeric($wordCount)) {
        $wordCountText = "приблизительно {$wordCount} символов, + - 500 символов";
    } else {
        $wordCountText = $wordCount;
    }

    // Базовый промпт с требованиями (как в чате)
    $basePrompt = "Ты профессиональный копирайтер и SEO-специалист. Твоя задача - создавать качественные статьи.

ОБЩИЕ ТРЕБОВАНИЯ:
1. Создай качественный, полезный контент ТОЧНО указанного размера
2. Используй естественную плотность ключевых слов (1-2%)
3. Структурируй текст с помощью H2 и H3 заголовков
4. Добавь списки и абзацы для лучшей читаемости
5. Контент должен быть уникальным и информативным
6. ВАЖНО: следи за объемом текста - он должен соответствовать указанному количеству символов
7. В подходящих местах добавь комментарии для изображений в формате: 
   <!-- ИЗОБРАЖЕНИЕ: Описание изображения для поиска | alt=\"описание для alt атрибута\" -->
8. весь текст должен быть на русском только если это не английские названия брендов или аббревиатуры
9. Статьи делаются с учётом SEO-оптимизации под google. тоесть надо быть осторожным с переспамом ключами и водой.

   ФОРМАТ ОТВЕТА:
Верни результат ТОЛЬКО в формате JSON без дополнительного текста:
{
    \"title\": \"итоговый заголовок статьи\",
    \"meta_description\": \"мета-описание 150-160 символов\",
    \"keywords\": \"ключевые слова через запятую\",
    \"content\": \"полный текст статьи с HTML разметкой (используй теги h2, h3, p, ul, li) и комментариями для изображений\",
    \"word_count\": количество_символов_в_статье,
    \"image_suggestions\": [
        {
            \"position\": \"описание места в статье\",
            \"description\": \"описание изображения для поиска\",
            \"alt\": \"alt текст для изображения\"
        }
    ]
}";

    // Конкретные параметры для этой статьи
    $taskPrompt = "\n\nЗАДАНИЕ ДЛЯ ЭТОЙ СТАТЬИ:";

    if (!empty($title)) {
        $taskPrompt .= "\nЗаголовок: {$title}";
    } else {
        $taskPrompt .= "\nСгенерируй привлекательный заголовок";
    }

    if (!empty($keywords)) {
        $taskPrompt .= "\nКлючевые слова: {$keywords}";
    } else {
        $taskPrompt .= "\nСгенерируй релевантные ключевые слова";
    }

    if (!empty($context)) {
        $taskPrompt .= "\nТема/Описание: {$context}";
    }

    $taskPrompt .= "\nОбъём: {$wordCountText}";

    // Используем системное сообщение для базового промпта (сохраняет контекст)
    $messages = [
        ['role' => 'system', 'content' => $basePrompt],  // Константа с требованиями
        ['role' => 'user', 'content' => $taskPrompt]     // Только конкретное задание
    ];

    // Используем максимальные возможности для качественной генерации
    $response = sendDeepSeekRequest($messages, 5000, false, false);

    if (!$response) {
        return false;
    }

    // Если ответ - строка с ошибкой, передаем её пользователю
    if (is_string($response) && strpos($response, 'Сервис') !== false) {
        return $response;
    }

    // Пытаемся извлечь JSON из ответа
    $jsonStart = strpos($response, '{');
    $jsonEnd = strrpos($response, '}');

    if ($jsonStart !== false && $jsonEnd !== false) {
        $jsonString = substr($response, $jsonStart, $jsonEnd - $jsonStart + 1);
        $result = json_decode($jsonString, true);

        if ($result && isset($result['title'], $result['meta_description'], $result['content'])) {
            // Если ключевые слова не были переданы, но сгенерированы
            if (empty($keywords) && isset($result['keywords'])) {
                $result['generated_keywords'] = $result['keywords'];
            }

            // Обрабатываем комментарии для изображений
            if (isset($result['content'])) {
                $result['content'] = processImageComments($result['content']);
            }

            return $result;
        }
    }

    logError('Failed to parse article generation response', ['response' => $response]);
    return false;
}

// Обработка комментариев для изображений
function processImageComments($content)
{
    // Находим все комментарии для изображений
    $pattern = '/<!-- ИЗОБРАЖЕНИЕ: ([^|]+)\|([^>]+) -->/';

    $processedContent = preg_replace_callback($pattern, function ($matches) {
        $description = trim($matches[1]);
        $altText = trim(str_replace('alt="', '', str_replace('"', '', $matches[2])));

        return '<div class="image-placeholder">
                    <p >
                        📷 <strong>Рекомендуется изображение:</strong><br>
                        <span style="font-size: 14px;">' . htmlspecialchars($description) . '</span><br>
                        <span style="font-size: 12px;">Alt: "' . htmlspecialchars($altText) . '"</span>
                    </p>
                </div>';
    }, $content);

    return $processedContent;
}

// Сохранение статьи
function saveArticle($title, $content, $metaDescription, $keywords)
{
    // Проверяем и создаем папку data
    $dataDir = __DIR__ . '/data';
    if (!file_exists($dataDir)) {
        if (!mkdir($dataDir, 0755, true)) {
            logError('Failed to create data directory', ['dir' => $dataDir]);
            return false;
        }
    }

    // Проверяем права на запись
    if (!is_writable($dataDir)) {
        logError('Data directory is not writable', ['dir' => $dataDir]);
        return false;
    }

    $articles = [];
    if (file_exists(ARTICLES_FILE)) {
        $content_file = file_get_contents(ARTICLES_FILE);
        if ($content_file !== false) {
            $articles = json_decode($content_file, true) ?: [];
        }
    }

    $article = [
        'id' => uniqid(),
        'title' => $title,
        'content' => $content,
        'meta_description' => $metaDescription,
        'keywords' => $keywords,
        'created_at' => date('Y-m-d H:i:s'),
        'character_count' => mb_strlen(strip_tags($content), 'UTF-8')
    ];

    $articles[] = $article;

    $result = file_put_contents(ARTICLES_FILE, json_encode($articles, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

    if ($result === false) {
        logError('Failed to save article to file', ['file' => ARTICLES_FILE]);
        return false;
    }

    return $result;
}

// Получение сохранённых статей
function getArticles()
{
    if (!file_exists(ARTICLES_FILE)) {
        return [];
    }

    $content = file_get_contents(ARTICLES_FILE);
    if ($content === false) {
        logError('Failed to read articles file', ['file' => ARTICLES_FILE]);
        return [];
    }

    if (empty(trim($content))) {
        return [];
    }

    $articles = json_decode($content, true);
    if ($articles === null && json_last_error() !== JSON_ERROR_NONE) {
        logError('Invalid JSON in articles file', [
            'file' => ARTICLES_FILE,
            'error' => json_last_error_msg(),
            'content_preview' => substr($content, 0, 200)
        ]);
        return [];
    }

    return $articles ?: [];
}

// Удаление статьи
function deleteArticle($id)
{
    if (!file_exists(ARTICLES_FILE)) {
        return false;
    }

    $articles = json_decode(file_get_contents(ARTICLES_FILE), true) ?: [];
    $articles = array_filter($articles, function ($article) use ($id) {
        return $article['id'] !== $id;
    });

    return file_put_contents(ARTICLES_FILE, json_encode(array_values($articles), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
}

// SEO анализ
function analyzeSEO($text, $keywords)
{
    $keywordsList = array_map('trim', explode(',', $keywords));

    // Анализируем HTML структуру
    $htmlAnalysis = analyzeHTMLStructure($text);

    // Очищаем текст от HTML для подсчета слов
    $cleanText = strip_tags($text);
    $textLower = mb_strtolower($cleanText, 'UTF-8');

    // Правильный подсчет слов для русского языка
    $wordCount = countWordsRussian($cleanText);

    $analysis = [
        'word_count' => $wordCount,
        'char_count' => mb_strlen($cleanText, 'UTF-8'),
        'keyword_density' => [],
        'readability_score' => calculateReadabilityScore($cleanText),
        'html_structure' => $htmlAnalysis,
        'warnings' => []
    ];

    // Анализ плотности ключевых слов
    foreach ($keywordsList as $keyword) {
        $keyword = trim($keyword);
        if (empty($keyword)) continue;

        $keywordLower = mb_strtolower($keyword, 'UTF-8');
        $occurrences = substr_count($textLower, $keywordLower);
        $density = $wordCount > 0 ? ($occurrences / $wordCount) * 100 : 0;

        $analysis['keyword_density'][$keyword] = [
            'occurrences' => $occurrences,
            'density' => round($density, 2)
        ];

        if ($density > 3) {
            $analysis['warnings'][] = "Плотность ключевого слова '{$keyword}' слишком высокая: {$density}%";
        }
    }

    return $analysis;
}

// Анализ HTML структуры
function analyzeHTMLStructure($html)
{
    $structure = [
        'h1_count' => substr_count($html, '<h1'),
        'h2_count' => substr_count($html, '<h2'),
        'h3_count' => substr_count($html, '<h3'),
        'p_count' => substr_count($html, '<p'),
        'ul_count' => substr_count($html, '<ul'),
        'ol_count' => substr_count($html, '<ol'),
        'img_count' => substr_count($html, '<img'),
        'has_structure' => (substr_count($html, '<h2') > 0 || substr_count($html, '<h3') > 0)
    ];

    return $structure;
}

// Правильный подсчет слов для русского языка
function countWordsRussian($text)
{
    // Убираем лишние пробелы и переносы
    $text = preg_replace('/\s+/', ' ', trim($text));

    // Разбиваем по словам (учитываем русские символы)
    preg_match_all('/[а-яё\w]+/ui', $text, $matches);

    return count($matches[0]);
}

// Упрощённый расчёт индекса читаемости Флеша-Кинкейда
function calculateReadabilityScore($text)
{
    $sentences = preg_split('/[.!?]+/', $text);
    $sentences = array_filter($sentences, function ($s) {
        return trim($s) !== '';
    });
    $sentenceCount = count($sentences);

    $words = str_word_count($text);
    $syllables = 0;

    // Упрощённый подсчёт слогов для русского языка
    $wordList = str_word_count($text, 1);
    foreach ($wordList as $word) {
        $syllables += max(1, preg_match_all('/[аеёиоуыэюя]/ui', $word));
    }

    if ($sentenceCount == 0 || $words == 0) {
        return 0;
    }

    // Адаптированная формула для русского языка
    $score = 206.835 - (1.3 * ($words / $sentenceCount)) - (60.1 * ($syllables / $words));

    return max(0, min(100, round($score, 1)));
}

// Генерация текста анализа SEO
function generateSEOAnalysisText($analysis, $title = '', $description = '')
{
    $html = '<div class="seo-analysis">';

    // Основные метрики
    $html .= '<h3>📊 Основные метрики</h3>';
    $html .= '<ul>';
    $html .= '<li>Количество слов: ' . $analysis['word_count'] . '</li>';
    $html .= '<li>Количество символов: ' . $analysis['char_count'] . '</li>';
    $html .= '<li>Индекс читаемости: ' . $analysis['readability_score'] . '/100 ';
    if ($analysis['readability_score'] >= 60) {
        $html .= '<span style="color: green;">✅ Хорошо</span>';
    } elseif ($analysis['readability_score'] >= 30) {
        $html .= '<span style="color: orange;">⚠️ Удовлетворительно</span>';
    } else {
        $html .= '<span style="color: red;">❌ Сложно для чтения</span>';
    }
    $html .= '</li>';
    $html .= '</ul>';

    // HTML структура
    if (isset($analysis['html_structure'])) {
        $struct = $analysis['html_structure'];
        $html .= '<h3>🏗️ Структура контента</h3>';
        $html .= '<ul>';
        $html .= '<li>H1 заголовков: ' . $struct['h1_count'] . ' ';
        if ($struct['h1_count'] == 1) {
            $html .= '<span style="color: green;">✅ Оптимально</span>';
        } elseif ($struct['h1_count'] == 0) {
            $html .= '<span style="color: red;">❌ Отсутствует</span>';
        } else {
            $html .= '<span style="color: orange;">⚠️ Слишком много</span>';
        }
        $html .= '</li>';

        $html .= '<li>H2 заголовков: ' . $struct['h2_count'] . ' ';
        if ($struct['h2_count'] >= 2) {
            $html .= '<span style="color: green;">✅ Хорошо</span>';
        } elseif ($struct['h2_count'] == 1) {
            $html .= '<span style="color: orange;">⚠️ Мало</span>';
        } else {
            $html .= '<span style="color: red;">❌ Отсутствуют</span>';
        }
        $html .= '</li>';

        $html .= '<li>H3 заголовков: ' . $struct['h3_count'] . '</li>';
        $html .= '<li>Абзацев: ' . $struct['p_count'] . '</li>';
        $html .= '<li>Списков: ' . ($struct['ul_count'] + $struct['ol_count']) . '</li>';
        $html .= '<li>Изображений: ' . $struct['img_count'] . ' ';
        if ($struct['img_count'] == 0) {
            $html .= '<span style="color: orange;">⚠️ Рекомендуется добавить</span>';
        } else {
            $html .= '<span style="color: green;">✅ Есть</span>';
        }
        $html .= '</li>';
        $html .= '</ul>';
    }

    // Анализ заголовка
    if ($title) {
        $titleLength = mb_strlen($title, 'UTF-8');
        $html .= '<h3>📝 Заголовок страницы</h3>';
        $html .= '<p>Длина: ' . $titleLength . ' символов ';
        if ($titleLength < 30) {
            $html .= '<span style="color: orange;">⚠️ Слишком короткий</span>';
        } elseif ($titleLength > 60) {
            $html .= '<span style="color: red;">❌ Слишком длинный</span>';
        } else {
            $html .= '<span style="color: green;">✅ Оптимальный</span>';
        }
        $html .= '</p>';
    }

    // Анализ мета-описания
    if ($description) {
        $descLength = mb_strlen($description, 'UTF-8');
        $html .= '<h3>📄 Мета-описание</h3>';
        $html .= '<p>Длина: ' . $descLength . ' символов ';
        if ($descLength < 120) {
            $html .= '<span style="color: orange;">⚠️ Слишком короткое</span>';
        } elseif ($descLength > 160) {
            $html .= '<span style="color: red;">❌ Слишком длинное</span>';
        } else {
            $html .= '<span style="color: green;">✅ Оптимальное</span>';
        }
        $html .= '</p>';
    }

    // Анализ ключевых слов
    $html .= '<h3>🔑 Плотность ключевых слов</h3>';
    if (!empty($analysis['keyword_density'])) {
        $html .= '<ul>';
        foreach ($analysis['keyword_density'] as $keyword => $data) {
            $html .= '<li><strong>' . htmlspecialchars($keyword) . '</strong>: ';
            $html .= $data['occurrences'] . ' раз (' . $data['density'] . '%) ';

            if ($data['density'] < 0.5) {
                $html .= '<span style="color: orange;">⚠️ Слишком низкая</span>';
            } elseif ($data['density'] > 3) {
                $html .= '<span style="color: red;">❌ Слишком высокая</span>';
            } else {
                $html .= '<span style="color: green;">✅ Оптимальная</span>';
            }
            $html .= '</li>';
        }
        $html .= '</ul>';
    } else {
        $html .= '<p style="color: orange;">⚠️ Ключевые слова не указаны</p>';
    }

    // Предупреждения
    if (!empty($analysis['warnings'])) {
        $html .= '<h3>⚠️ Предупреждения</h3>';
        $html .= '<ul style="color: red;">';
        foreach ($analysis['warnings'] as $warning) {
            $html .= '<li>' . htmlspecialchars($warning) . '</li>';
        }
        $html .= '</ul>';
    }

    // Рекомендации
    $html .= '<h3>💡 Рекомендации</h3>';
    $html .= '<ul>';

    if ($analysis['word_count'] < 300) {
        $html .= '<li>Увеличьте объём контента до минимум 300 слов</li>';
    }

    if ($analysis['readability_score'] < 60) {
        $html .= '<li>Упростите текст для лучшей читаемости (используйте короткие предложения)</li>';
    }

    if (isset($analysis['html_structure'])) {
        $struct = $analysis['html_structure'];

        if ($struct['h2_count'] < 2) {
            $html .= '<li>Добавьте больше H2 заголовков для лучшей структуры</li>';
        }

        if ($struct['img_count'] == 0) {
            $html .= '<li>Добавьте изображения с описательными alt-атрибутами</li>';
        }

        if (($struct['ul_count'] + $struct['ol_count']) == 0) {
            $html .= '<li>Используйте списки для улучшения читаемости</li>';
        }
    }

    $highDensityFound = false;
    foreach ($analysis['keyword_density'] as $keyword => $data) {
        if ($data['density'] > 3) {
            $highDensityFound = true;
            break;
        }
    }

    if ($highDensityFound) {
        $html .= '<li>Снизьте плотность ключевых слов, используйте синонимы</li>';
    }

    $html .= '</ul>';
    $html .= '</div>';

    return $html;
}

// Сохранение сообщения чата
function saveChatMessage($message, $response, $chatId = '1')
{
    if (!file_exists('data')) {
        mkdir('data', 0755, true);
    }

    $chatFile = "data/chat_{$chatId}.json";
    $chat = [];
    if (file_exists($chatFile)) {
        $chat = json_decode(file_get_contents($chatFile), true) ?: [];
    }

    $chat[] = [
        'user_message' => $message,
        'ai_response' => $response,
        'timestamp' => date('Y-m-d H:i:s')
    ];

    // Ограничиваем историю чата последними 50 сообщениями
    if (count($chat) > 50) {
        $chat = array_slice($chat, -50);
    }

    return file_put_contents($chatFile, json_encode($chat, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
}

// Получение истории чата
function getChatHistory($chatId = '1')
{
    $chatFile = "data/chat_{$chatId}.json";
    if (!file_exists($chatFile)) {
        return [];
    }

    $chat = json_decode(file_get_contents($chatFile), true) ?: [];
    $history = [];

    // Преобразуем формат для отображения
    foreach ($chat as $entry) {
        $history[] = [
            'role' => 'user',
            'content' => $entry['user_message'],
            'timestamp' => $entry['timestamp']
        ];
        $history[] = [
            'role' => 'assistant',
            'content' => $entry['ai_response'],
            'timestamp' => $entry['timestamp']
        ];
    }

    return $history;
}

// Отправка сообщения в чат
function sendChatMessage($message, $chatId = '1')
{
    // Получаем историю чата для контекста
    $chatHistory = getChatHistoryForContext($chatId);

    // Формируем сообщения с контекстом
    $messages = [];

    // Добавляем системный промт
    $messages[] = [
        'role' => 'system',
        'content' => 'Ты полезный ИИ-ассистент. Отвечай на русском языке кратко и по делу. Поддерживай контекст беседы. Используй рассуждения для более точных ответов.'
    ];

    // Добавляем историю предыдущих сообщений (последние 10 пар)
    foreach ($chatHistory as $entry) {
        $messages[] = ['role' => 'user', 'content' => $entry['user_message']];
        $messages[] = ['role' => 'assistant', 'content' => $entry['ai_response']];
    }

    // Добавляем текущее сообщение
    $messages[] = ['role' => 'user', 'content' => $message];

    // Используем рассуждающую модель для чата
    $response = sendDeepSeekRequest($messages, 1500, true, false);

    // Если получили сообщение об ошибке сервера, возвращаем его как есть
    if (is_string($response) && strpos($response, 'сервис временно недоступен') !== false) {
        return $response;
    }

    return $response;
}

// Получение истории чата для контекста (сырой формат)
function getChatHistoryForContext($chatId = '1')
{
    $chatFile = "data/chat_{$chatId}.json";
    if (!file_exists($chatFile)) {
        return [];
    }

    $chat = json_decode(file_get_contents($chatFile), true) ?: [];

    // Берем только последние 10 пар сообщений для контекста
    return array_slice($chat, -10);
}

// Сохранение метаданных чатов (названия)
function saveChatMetadata($chatId, $name)
{
    if (!file_exists('data')) {
        mkdir('data', 0755, true);
    }

    $metaFile = 'data/chats_meta.json';
    $metadata = [];

    if (file_exists($metaFile)) {
        $metadata = json_decode(file_get_contents($metaFile), true) ?: [];
    }

    $metadata[$chatId] = [
        'name' => $name,
        'created_at' => isset($metadata[$chatId]['created_at']) ? $metadata[$chatId]['created_at'] : date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];

    return file_put_contents($metaFile, json_encode($metadata, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
}

// Получение метаданных всех чатов
function getAllChatsMetadata()
{
    $metaFile = 'data/chats_meta.json';
    if (!file_exists($metaFile)) {
        return [];
    }

    return json_decode(file_get_contents($metaFile), true) ?: [];
}

// Удаление чата и его файлов
function deleteChat($chatId)
{
    $success = true;

    // Удаляем файл истории чата
    $chatFile = "data/chat_{$chatId}.json";
    if (file_exists($chatFile)) {
        $success = $success && unlink($chatFile);
    }

    // Удаляем из метаданных
    $metaFile = 'data/chats_meta.json';
    if (file_exists($metaFile)) {
        $metadata = json_decode(file_get_contents($metaFile), true) ?: [];
        unset($metadata[$chatId]);
        $success = $success && file_put_contents($metaFile, json_encode($metadata, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }

    return $success;
}
