// CSS минификатор — локальная обработка CSS кода
(function() {
    const $ = id => document.getElementById(id);
    const input = $('css_input');
    const output = $('css_output');
    const stats = $('stats');

    // Удаление комментариев из CSS
    function removeComments(css) {
        return css.replace(/\/\*[\s\S]*?\*\//g, '');
    }

    // Сжатие пробелов и переносов строк
    function compressWhitespace(css) {
        return css
            .replace(/\s+/g, ' ')                    // множественные пробелы → один
            .replace(/\s*([{}:;,>+~])\s*/g, '$1')    // убрать пробелы вокруг спецсимволов
            .replace(/;\}/g, '}')                    // убрать лишнюю ; перед }
            .trim();
    }

    // Базовая оптимизация (цвета, нули, дроби)
    function basicOptimize(css) {
        // #ffffff → #fff (сокращение hex)
        css = css.replace(/#([0-9a-fA-F])\1([0-9a-fA-F])\2([0-9a-fA-F])\3\b/gi, '#$1$2$3');
        
        // rgb(255,255,255) → #fff
        css = css.replace(/rgb\s*\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*\)/gi, (match, r, g, b) => {
            const toHex = num => parseInt(num).toString(16).padStart(2, '0');
            const hex = `#${toHex(r)}${toHex(g)}${toHex(b)}`;
            // Попытка сократить hex
            if (/^#([0-9a-f])\1([0-9a-f])\2([0-9a-f])\3$/i.test(hex)) {
                return hex.replace(/^#([0-9a-f])\1([0-9a-f])\2([0-9a-f])\3$/i, '#$1$2$3');
            }
            return hex;
        });

        // 0.5 → .5 для значений
        css = css.replace(/\b0+\.(\d+)/g, '.$1');
        
        // Удаление единиц измерения у нулевых значений: 0px → 0
        css = css.replace(/\b0(px|em|rem|%|vh|vw|pt|cm|mm|in|pc|ex|ch)\b/gi, '0');

        return css;
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

        minified = basicOptimize(minified);

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
        const blob = new Blob([output.value || ''], { type: 'text/css' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'style.min.css';
        document.body.appendChild(link);
        link.click();
        URL.revokeObjectURL(link.href);
        link.remove();
    });
})();