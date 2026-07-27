// Счётчик символов — локальный подсчёт статистики текста
(function() {
    const $ = id => document.getElementById(id);
    const input = $('text_input');

    // Подсчёт символов с пробелами
    function countChars(text) {
        return text.length;
    }

    // Подсчёт символов без пробелов
    function countCharsNoSpace(text) {
        return text.replace(/\s/g, '').length;
    }

    // Подсчёт слов
    function countWords(text) {
        const trimmed = text.trim();
        if (!trimmed) return 0;
        return trimmed.split(/\s+/).filter(word => word.length > 0).length;
    }

    // Подсчёт предложений
    function countSentences(text) {
        const matches = text.match(/[.!?]+/g);
        return matches ? matches.length : 0;
    }

    // Подсчёт абзацев (непустые блоки текста, разделённые пустыми строками)
    function countParagraphs(text) {
        if (!text.trim()) return 0;
        const paragraphs = text.split(/\n\s*\n/).filter(p => p.trim().length > 0);
        return paragraphs.length || (text.trim() ? 1 : 0);
    }

    // Подсчёт строк
    function countLines(text) {
        if (!text) return 0;
        return text.split('\n').length;
    }

    // Обновление статистики
    function updateStats() {
        const text = input.value;
        
        $('stat_chars').textContent = countChars(text).toLocaleString();
        $('stat_chars_no_space').textContent = countCharsNoSpace(text).toLocaleString();
        $('stat_words').textContent = countWords(text).toLocaleString();
        $('stat_sentences').textContent = countSentences(text).toLocaleString();
        $('stat_paragraphs').textContent = countParagraphs(text).toLocaleString();
        $('stat_lines').textContent = countLines(text).toLocaleString();
    }

    // Обработчик ввода текста
    input.addEventListener('input', updateStats);

    // Очистка
    $('btn_clear').addEventListener('click', () => {
        input.value = '';
        updateStats();
        input.focus();
    });

    // Копирование статистики
    $('btn_copy_stats').addEventListener('click', async () => {
        const text = input.value;
        const stats = [
            `Characters (with spaces): ${countChars(text)}`,
            `Characters (no spaces): ${countCharsNoSpace(text)}`,
            `Words: ${countWords(text)}`,
            `Sentences: ${countSentences(text)}`,
            `Paragraphs: ${countParagraphs(text)}`,
            `Lines: ${countLines(text)}`
        ].join('\n');

        try {
            await navigator.clipboard.writeText(stats);
        } catch(e) {
            // Fallback для старых браузеров
            const textarea = document.createElement('textarea');
            textarea.value = stats;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            textarea.remove();
        }
    });

    // Инициализация при загрузке
    updateStats();
})();
