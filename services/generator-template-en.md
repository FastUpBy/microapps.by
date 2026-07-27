# Prompt template for service generation (MicroApps CMS)

This file contains a ready-made prompt for an LLM to generate new mini-services that strictly follow the project architecture.

---

Short context (copy at the start of your request):
- Project: PHP 8.3+, simple CMS for mini-services.
- Services folder: `services/<slug>/`.
- Required files: `index.php`, `lang.php`, `module.php`, `script.js`, `style.css`.
- Global helpers: `init_service()`, `get_header()`, `get_footer()`, `this_module()`, `get_content()`, `get_howto()`, `get_faq()`, `site_url()`, `get_embedded_module_lang(__DIR__)`, `esc()`.
- Theme CSS variables and base classes exist (`bg-card`, `text-muted`, `btn`, `btn-primary`, `input`, `form-control`, etc.).

Instructions for the LLM (paste after context):

1) General requirements
- Generate the service in `services/<slug>/` with: `index.php`, `lang.php`, `module.php`, `script.js`, `style.css`.
- Do not use external frameworks (no CSS, no JS).
- Localization: require `ru` and `en` in `lang.php`.
- In `module.php` use `get_embedded_module_lang(__DIR__)` and `esc()` for output.
- Script is loaded with `defer`: `<script src="<?= site_url('services/<slug>/script.js') ?>" defer></script>`.
- Do not send user data to the server by default (handle on client with JS) when possible.
- In `index.php` assemble components. Default:
  ```php
  <?php
  $t = init_service(__DIR__);
  get_header();
  this_module();
  get_content();
  get_howto();
  get_faq();
  get_footer();
  ```
- `$t = init_service(__DIR__);` loads the language file `lang.php`.

2) `lang.php` format (required keys)
- Return array: `return [ 'ru' => [...], 'en' => [...] ];`
- **Language of values:** In `'ru' => [ ... ]` all string values must be in Russian. In `'en' => [ ... ]` all string values must be in English.
- Include 5 Q&A items in FAQ.
- Each language must have: `title`, `desc`, `keywords`, `h1`, `label_*` (for fields), `btn_*`, `res_*` (for results), `content` (with `title` and `paragraphs` array), `howto` (with `title` and `steps` array), `faq` (array of q/a).
- Example `lang.php` structure:
  ```php
  'ru' => [
    'title' => 'SEO-оптимизированный заголовок (50-60 символов)',
    'desc' => 'Описание (meta description) до 160 символов. Призыв к действию.',
    'keywords' => 'ключевые слова, через запятую',
    'h1' => 'Заголовок H1 на странице',

    'label_input' => 'Введите значение',
    'btn_calc' => 'Рассчитать',
    'btn_reset' => 'Сбросить',
    'res_result' => 'Результат:',

    'content' => [
      'title' => 'Заголовок H2 для SEO-текста',
      'paragraphs' => [
        [ 'text' => 'Абзац 1: Описание проблемы, которую решает инструмент.' ],
        [ 'text' => 'Абзац 2: Преимущества использования инструмента.' ],
        [ 'text' => 'Абзац 3: Технические детали или особенности.' ]
      ]
    ],
    'howto' => [
      'title' => 'Как пользоваться',
      'steps' => [
        [ 'name' => 'Шаг 1', 'text' => 'Описание первого действия.' ],
        [ 'name' => 'Шаг 2', 'text' => 'Описание второго действия.' ],
        [ 'name' => 'Шаг 3', 'text' => 'Получение результата.' ]
      ]
    ],
    'faq' => [
      [ 'q' => 'Вопрос 1?', 'a' => 'Ответ 1.' ],
      [ 'q' => 'Вопрос 2?', 'a' => 'Ответ 2.' ],
      [ 'q' => 'Вопрос 3?', 'a' => 'Ответ 3.' ],
      [ 'q' => 'Вопрос 4?', 'a' => 'Ответ 4.' ],
      [ 'q' => 'Вопрос 5?', 'a' => 'Ответ 5.' ],
    ]
  ],
  'en' => [
    'title' => 'SEO-optimized title (50-60 chars)',
    'desc' => 'Meta description up to 160 chars. Call to action.',
    'keywords' => 'keywords, comma-separated',
    'h1' => 'Page H1 heading',
    'label_input' => 'Enter value',
    'btn_calc' => 'Calculate',
    'btn_reset' => 'Reset',
    'res_result' => 'Result:',
    'content' => [ 'title' => 'H2 heading for SEO text', 'paragraphs' => [ ... ] ],
    'howto' => [ 'title' => 'How to use', 'steps' => [ ... ] ],
    'faq' => [ ... ]
  ],
  ```
3) `module.php` structure
- Get translations: `$svc_t = get_embedded_module_lang(__DIR__);`
- Layout must be responsive (flex/grid).
- Use theme CSS variables: `var(--bg)`, `var(--text)`, `var(--accent)`, `var(--border)`.
- Button classes: `btn`, `btn-primary`.
- Inputs: `input`, `textarea`, `select` (styled globally; add your own classes if needed).
- Example:
  ```php
  <?php
  $svc_t = get_embedded_module_lang(__DIR__);
  ?>
  <div class="wrapper">
      <div class="mb-4">
          <label for="inp" class="block mb-2 font-semibold"><?= esc($svc_t['label_input']) ?></label>
          <input type="text" id="inp" class="w-full p-2 border rounded">
      </div>

      <div class="mb-4">
          <button id="btn-action" class="btn-primary"><?= esc($svc_t['btn_calc']) ?></button>
          <button id="btn-reset" class="btn"><?= esc($svc_t['btn_reset']) ?></button>
      </div>

      <div id="result-area" class="hidden p-4 border rounded bg-card">
          <h3 class="font-bold"><?= esc($svc_t['res_result']) ?></h3>
          <div id="output"></div>
      </div>
  </div>
  <link rel="stylesheet" href="<?= site_url('services/<slug>/style.css') ?>">
  <script src="<?= site_url('services/<slug>/script.js') ?>" defer></script>
  ```

4) Component approach (available components)
- Reusable components: `dropzone`, `range`.
- Usage: `render('component_name')` — uses `$t['component_name']`.
- Override: `render('dropzone', ['id' => 'customId'])`.

`dropzone` (file upload with drag & drop):
```php
// In lang.php:
'dropzone' => [
    'id' => 'imageInput',
    'label' => 'Upload image',
    'placeholder' => 'Choose file...',
    'dragHint' => 'Or drag image here',
    'accept' => 'image/jpeg,image/jpg,image/png',
    'multiple' => false
]

// In module.php:
<?php render('dropzone'); ?>
```

`range` (slider):
```php
// In lang.php:
'range' => [
    'id' => 'qualitySlider',
    'label' => 'Quality level:',
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'value' => 80,
    'unit' => '%'
]

// In module.php:
<?php render('range'); ?>
```

5) JS and CSS
- JS: Vanilla JS. Prefer `const`/`let`, avoid `var`. Use `addEventListener`.
- CSS: SCSS-like if supported, or plain CSS with variables. Must be responsive.

6) Color variables
- --card: card background
- --text: text (for dark/light theme)
- --muted: slightly darker than card
- --accent: blue
