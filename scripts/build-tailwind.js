const fs = require('fs');
const postcss = require('postcss');
const tailwind = require('tailwindcss');
const autoprefixer = require('autoprefixer');

const input = './assets/css/tailwind.css';
const output = './assets/css/tailwind.build.css';

(async () => {
  try {
    const css = fs.readFileSync(input, 'utf8');
    const result = await postcss([tailwind('./tailwind.config.js'), autoprefixer]).process(css, { from: input });
    fs.writeFileSync(output, result.css);
    console.log('Tailwind build complete:', output);
  } catch (err) {
    console.error('Build failed:', err);
    process.exit(1);
  }
})();
