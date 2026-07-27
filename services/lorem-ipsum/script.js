// Lorem Ipsum Generator — client-side only
(function () {
    const WORDS = [
        'lorem', 'ipsum', 'dolor', 'sit', 'amet', 'consectetur', 'adipiscing', 'elit',
        'sed', 'do', 'eiusmod', 'tempor', 'incididunt', 'ut', 'labore', 'et', 'dolore',
        'magna', 'aliqua', 'enim', 'ad', 'minim', 'veniam', 'quis', 'nostrud',
        'exercitation', 'ullamco', 'laboris', 'nisi', 'aliquip', 'ex', 'ea', 'commodo',
        'consequat', 'duis', 'aute', 'irure', 'in', 'reprehenderit', 'voluptate',
        'velit', 'esse', 'cillum', 'fugiat', 'nulla', 'pariatur', 'excepteur', 'sint',
        'occaecat', 'cupidatat', 'non', 'proident', 'sunt', 'culpa', 'qui', 'officia',
        'deserunt', 'mollit', 'anim', 'id', 'est', 'laborum', 'at', 'vero', 'eos',
        'accusamus', 'iusto', 'odio', 'dignissimos', 'ducimus', 'blanditiis',
        'praesentium', 'voluptatum', 'deleniti', 'atque', 'corrupti', 'quos', 'dolores',
        'quas', 'molestias', 'excepturi', 'obcaecati', 'cupiditate', 'provident',
        'similique', 'mollitia', 'animi', 'perspiciatis', 'unde', 'omnis', 'iste',
        'natus', 'error', 'voluptatem', 'accusantium', 'doloremque', 'laudantium',
        'totam', 'rem', 'aperiam', 'eaque', 'ipsa', 'quae', 'ab', 'illo', 'inventore',
        'veritatis', 'quasi', 'architecto', 'beatae', 'vitae', 'dicta', 'explicabo',
        'nemo', 'ipsam', 'voluptas', 'aspernatur', 'aut', 'odit', 'fugit',
        'consequuntur', 'magni', 'ratione', 'sequi', 'nesciunt', 'neque', 'porro',
        'quisquam', 'nihil', 'impedit', 'quo', 'minus', 'quod', 'maxime', 'placeat',
        'facere', 'possimus', 'assumenda', 'repellendus', 'temporibus', 'quibusdam',
        'illum', 'soluta', 'nobis', 'eligendi', 'optio', 'cumque', 'recusandae',
        'itaque', 'earum', 'rerum', 'hic', 'tenetur', 'sapiente', 'delectus',
        'reiciendis', 'voluptatibus', 'maiores', 'alias', 'perferendis', 'doloribus',
        'asperiores', 'repellat', 'tempore', 'autem', 'quam', 'vel', 'necessitatibus',
        'saepe', 'eveniet', 'voluptates', 'repudiandae', 'recusandae', 'libero',
        'debitis', 'harum', 'quidem', 'nam', 'fuga', 'distinctio'
    ];

    const LOREM_START = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit';

    function rand(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function pick() {
        return WORDS[rand(0, WORDS.length - 1)];
    }

    function capitalize(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }

    function generateSentence() {
        const len = rand(6, 16);
        const words = [];
        for (let i = 0; i < len; i++) {
            words.push(pick());
        }
        return capitalize(words.join(' ')) + '.';
    }

    function generateParagraph() {
        const count = rand(4, 8);
        const sentences = [];
        for (let i = 0; i < count; i++) {
            sentences.push(generateSentence());
        }
        return sentences.join(' ');
    }

    function generateWords(n) {
        const words = [];
        for (let i = 0; i < n; i++) {
            words.push(pick());
        }
        return words.join(' ');
    }

    function generate(mode, count, startWithLorem) {
        let result = [];

        if (mode === 'paragraphs') {
            const max = Math.min(count, 100);
            for (let i = 0; i < max; i++) {
                result.push(generateParagraph());
            }
        } else if (mode === 'sentences') {
            const max = Math.min(count, 500);
            for (let i = 0; i < max; i++) {
                result.push(generateSentence());
            }
        } else {
            const max = Math.min(count, 5000);
            result.push(generateWords(max));
        }

        // Prepend classic opening
        if (startWithLorem && result.length > 0) {
            if (mode === 'words') {
                const words = result[0].split(' ');
                const loremWords = LOREM_START.toLowerCase().split(' ');
                const merged = loremWords.concat(words.slice(loremWords.length));
                result[0] = merged.slice(0, Math.min(count, 5000)).join(' ');
                result[0] = capitalize(result[0]);
            } else {
                // Replace start of first sentence/paragraph
                const rest = result[0].indexOf('. ');
                if (rest !== -1) {
                    result[0] = LOREM_START + '. ' + result[0].slice(rest + 2);
                } else {
                    result[0] = LOREM_START + '.';
                }
            }
        }

        return result;
    }

    // DOM
    const modeEl = document.getElementById('lorem-mode');
    const countEl = document.getElementById('lorem-count');
    const startEl = document.getElementById('lorem-start');
    const btnGen = document.getElementById('btn-generate');
    const btnCopy = document.getElementById('btn-copy');
    const btnReset = document.getElementById('btn-reset');
    const outputWrap = document.getElementById('lorem-output');
    const textEl = document.getElementById('lorem-text');

    // Update max value based on mode
    function updateMax() {
        const mode = modeEl.value;
        const limits = { paragraphs: 100, sentences: 500, words: 5000 };
        countEl.max = limits[mode];
        if (parseInt(countEl.value, 10) > limits[mode]) {
            countEl.value = limits[mode];
        }
    }

    modeEl.addEventListener('change', updateMax);

    btnGen.addEventListener('click', function () {
        const mode = modeEl.value;
        const count = Math.max(1, parseInt(countEl.value, 10) || 1);
        const startWithLorem = startEl.checked;

        const parts = generate(mode, count, startWithLorem);

        textEl.innerHTML = '';

        if (mode === 'paragraphs') {
            parts.forEach(function (p) {
                const el = document.createElement('p');
                el.textContent = p;
                textEl.appendChild(el);
            });
        } else {
            const el = document.createElement('p');
            el.textContent = parts.join(' ');
            textEl.appendChild(el);
        }

        outputWrap.classList.remove('hidden');
        btnCopy.disabled = false;
    });

    btnCopy.addEventListener('click', async function () {
        const text = textEl.innerText;
        try {
            await navigator.clipboard.writeText(text);
        } catch (e) {
            const ta = document.createElement('textarea');
            ta.value = text;
            document.body.appendChild(ta);
            ta.select();
            document.execCommand('copy');
            ta.remove();
        }
        const orig = btnCopy.textContent;
        btnCopy.textContent = '✓';
        setTimeout(function () { btnCopy.textContent = orig; }, 1500);
    });

    btnReset.addEventListener('click', function () {
        textEl.innerHTML = '';
        outputWrap.classList.add('hidden');
        btnCopy.disabled = true;
        countEl.value = 5;
        modeEl.value = 'paragraphs';
        startEl.checked = true;
        updateMax();
    });

    updateMax();
})();
