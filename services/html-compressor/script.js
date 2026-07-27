// HTML минификатор — локальная обработка HTML кода
(function() {
    const $ = id => document.getElementById(id);
    const input = $('html_input');
    const output = $('html_output');
    const stats = $('stats');

    // Удаление HTML комментариев (кроме условных для IE)
    function removeComments(html) {
        return html.replace(/<!--(?!\[if\s)(?!<!)[^\[][\s\S]*?-->/g, '');
    }

    // Сжатие пробелов и переносов строк
    function compressWhitespace(html) {
        // Сохраняем содержимое <pre>, <textarea>, <script>, <style>
        const preserved = [];
        let index = 0;
        
        // Заменяем содержимое специальных тегов на плейсхолдеры
        html = html.replace(/<(pre|textarea|script|style)(\s[^>]*)?>[\s\S]*?<\/\1>/gi, (match) => {
            const placeholder = `___PRESERVED_${index}___`;
            preserved.push(match);
            index++;
            return placeholder;
        });

        // Сжимаем пробелы
        html = html
            .replace(/\s+/g, ' ')                    // множественные пробелы → один
            .replace(/>\s+</g, '><')                 // убрать пробелы между тегами
            .replace(/\s+>/g, '>')                   // убрать пробелы перед закрывающей скобкой
            .replace(/<\s+/g, '<')                   // убрать пробелы после открывающей скобки
            .trim();

        // Восстанавливаем содержимое специальных тегов
        preserved.forEach((content, i) => {
            html = html.replace(`___PRESERVED_${i}___`, content);
        });

        return html;
    }

    // Удаление пустых атрибутов
    function removeEmptyAttributes(html) {
        return html
            .replace(/\s+(class|id|style|title|alt|data-[\w-]+)=""\s*/gi, ' ')
            .replace(/\s+(class|id|style|title|alt|data-[\w-]+)=''\s*/gi, ' ');
    }

    // Подсчёт статистики
    function updateStats(original, minified) {
        const origSize = new Blob([original]).size;
        const minSize = new Blob([minified]).size;
        const saved = origSize && minSize ? Math.max(0, origSize - minSize) : 0;
        const percent = origSize ? Math.round(saved / origSize * 100) : 0;
        stats.textContent = `Размер: ${origSize} → ${minSize} байт (−${saved}, ${percent}%)`;
    }

    // Минификация
    $('btn_minify').addEventListener('click', () => {
        const original = input.value || '';
        let minified = original;

        if ($('opt_comments').checked) {
            minified = removeComments(minified);
        }

        if ($('opt_whitespace').checked) {
            minified = compressWhitespace(minified);
        }

        if ($('opt_empty_attrs').checked) {
            minified = removeEmptyAttributes(minified);
        }

        output.value = minified;
        updateStats(original, minified);
    });

    // Сброс
    $('btn_reset').addEventListener('click', () => {
        input.value = '';
        output.value = '';
        stats.textContent = '';
    });

    // Копирование
    $('btn_copy').addEventListener('click', async () => {
        try {
            await navigator.clipboard.writeText(output.value || '');
        } catch(e) {
            // Fallback для старых браузеров
            const textarea = document.createElement('textarea');
            textarea.value = output.value;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            textarea.remove();
        }
    });

    // Скачивание
    $('btn_download').addEventListener('click', () => {
        const blob = new Blob([output.value || ''], { type: 'text/html' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'index.min.html';
        document.body.appendChild(link);
        link.click();
        URL.revokeObjectURL(link.href);
        link.remove();
    });
})();