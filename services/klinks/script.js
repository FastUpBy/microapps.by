// KLinks — open multiple links utility (client-side only)
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('klinks_input');
    const openBtn = document.getElementById('klinks_open');
    const resetBtn = document.getElementById('klinks_reset');
    const countNode = document.querySelector('#klinks_count span');
    const errors = document.getElementById('klinks_errors');

    function parseLines(text) {
        return text.split(/\r?\n/)
            .map(s => s.trim())
            .filter(Boolean);
    }

    function validateUrl(url) {
        try {
            // Если нет протокола, добавляем https://
            if (!/^https?:\/\//i.test(url)) {
                url = 'https://' + url;
            }
            const u = new URL(url);
            return u.protocol === 'http:' || u.protocol === 'https:' ? u.href : null;
        } catch (e) {
            return null;
        }
    }

    function updateCount() {
        const lines = parseLines(input.value).map(validateUrl).filter(Boolean);
        countNode.textContent = lines.length.toLocaleString();
    }

    input.addEventListener('input', () => {
        updateCount();
        errors.textContent = '';
    });

    resetBtn.addEventListener('click', () => {
        input.value = '';
        updateCount();
        errors.textContent = '';
    });

    openBtn.addEventListener('click', () => {
        const lines = parseLines(input.value);
        if (lines.length === 0) {
            errors.textContent = 'Введите хотя бы одну ссылку.';
            return;
        }

        const valid = [];
        const invalid = [];

        for (const line of lines) {
            const v = validateUrl(line);
            if (v) valid.push(v);
            else invalid.push(line);
        }

        if (invalid.length) {
            errors.textContent = `Некорректные ссылки: ${invalid.slice(0,5).join(', ')}${invalid.length>5? ' и др.':''}`;
        } else {
            errors.textContent = '';
        }

        if (valid.length === 0) return;

        // Open links in new tabs with a small delay to avoid blocking the UI.
        // Note: popup blockers may prevent many opens; user must allow popups.
        valid.forEach((u, i) => {
            setTimeout(() => {
                try {
                    window.open(u, '_blank');
                } catch (e) {
                    // ignore
                }
            }, i * 150);
        });
    });

    // initial count
    updateCount();
});
