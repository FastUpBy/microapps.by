<?php
// Модуль интерфейса AI генератора SEO-контента
?>
<div class="wrapper">
    <form id="article-form" class="space-y-6">

        <!-- Описание статьи -->
        <div class="form-group">
            <label for="context" class="block mb-2 font-medium">
                <?= esc($t['label_context']) ?>
            </label>
            <textarea
                id="context"
                name="context"
                rows="3"
                placeholder="<?= esc($t['placeholder_context']) ?>"></textarea>
        </div>

        <!-- Заголовок статьи -->
        <div class="form-group">
            <label for="title" class="block mb-2 font-medium">
                <?= esc($t['label_title']) ?>
            </label>
            <input
                type="text"
                id="title"
                name="title"
                placeholder="<?= esc($t['placeholder_title']) ?>" >
        </div>

        <!-- Ключевые слова -->
        <div class="form-group">
            <label for="keywords" class="block mb-2 font-medium">
                <?= esc($t['label_keywords']) ?>
            </label>
            <input
                type="text"
                id="keywords"
                name="keywords"
                placeholder="<?= esc($t['placeholder_keywords']) ?>" >
        </div>

        <!-- Объём статьи -->
        <div class="form-group">
            <label for="word-count" class="block mb-2 font-medium">
                <?= esc($t['label_word_count']) ?>
            </label>
            <select
                id="word-count"
                name="word_count"
                class="w-full px-4 border rounded-lg transition-all">
                <option value="1000"><?= esc($t['option_short']) ?></option>
                <option value="2000" selected><?= esc($t['option_medium']) ?></option>
                <option value="3000" disabled><?= esc($t['option_long']) ?></option>
            </select>
        </div>

        <!-- Кнопка генерации -->
        <button
            type="submit"
            >
            <?= esc($t['btn_generate']) ?>
        </button>
    </form>
    <div id="error" class=""></div>
</div>
<section >
    <!-- Индикатор загрузки -->
    <div id="loading" class="loading-indicator hidden mt-6">
        <div class="flex flex-col items-center justify-center py-8">
            <div class="spinner mb-4"></div>
            <p id="loading-status" class="text-muted transition-opacity duration-1000 text-xl mt-6"></p>
        </div>
    </div>

    <!-- Результат генерации -->
    <div id="result" class="result-container hidden mt-6">
        <div class="rounded-lg">

            <!-- Заголовок -->
            <div class="result-item">
                <h3 class="text-lg font-semibold mb-2"><?= esc($t['res_title']) ?></h3>
                <div id="article-title" ></div>
            </div>

            <!-- Мета-описание -->
            <div class="result-item">
                <h3 class="text-lg font-semibold mb-2"><?= esc($t['res_meta']) ?></h3>
                <div id="article-meta" ></div>
            </div>

            <!-- Ключевые слова -->
            <div class="result-item">
                <h3 class="text-lg font-semibold mb-2"><?= esc($t['res_keywords']) ?></h3>
                <div id="article-keywords" ></div>
            </div>

            <!-- Контент -->
            <div class="result-item">
                <h3 class="text-lg font-semibold mb-2"><?= esc($t['res_content']) ?></h3>
                <div id="article-content" class="article-content"></div>
            </div>

            <!-- Действия -->
            <div class="flex gap-3 mt-6">
                <button
                    id="copy-article"
                    >
                    📋 <?= esc($t['btn_copy_text'] ?? 'Копировать текст') ?>
                </button>
                <button
                    id="copy-html"
                    >
                    📄 <?= esc($t['btn_copy_html'] ?? 'Копировать HTML') ?>
                </button>
            </div>
        </div>
    </div>
</section>

<script src="<?= asset_url('services/seo-content-generate/script.js') ?>" defer></script>
<link rel="stylesheet" href="<?= asset_url('services/seo-content-generate/style.css') ?>">