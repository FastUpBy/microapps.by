"use strict";
document.addEventListener("DOMContentLoaded", () => {
    const stage = document.getElementById("lg-stage");
    const card = document.getElementById("lg-card");
    const cssOutput = document.getElementById("lg-css");
    const status = document.getElementById("lg-status");

    const controls = {
        blur: document.getElementById("lg-blur"),
        opacity: document.getElementById("lg-opacity"),
        radius: document.getElementById("lg-radius"),
        border: document.getElementById("lg-border"),
        noise: document.getElementById("lg-noise"),
        tint: document.getElementById("lg-tint"),
        depth: document.getElementById("lg-depth")
    };

    const presets = [
        { blur: 12, opacity: 0.15, radius: 24, border: 1, noise: 20, tint: "#ffffff", depth: 50 },
        { blur: 8, opacity: 0.25, radius: 32, border: 1.5, noise: 35, tint: "#a78bfa", depth: 70 },
        { blur: 18, opacity: 0.12, radius: 20, border: 0.5, noise: 15, tint: "#60a5fa", depth: 40 },
        { blur: 5, opacity: 0.30, radius: 28, border: 2, noise: 40, tint: "#f472b6", depth: 80 },
        { blur: 15, opacity: 0.18, radius: 36, border: 1, noise: 25, tint: "#fbbf24", depth: 60 }
    ];

    const binds = {
        opacity: document.querySelector('[data-bind="lg-opacity"]'),
        noise: document.querySelector('[data-bind="lg-noise"]'),
        depth: document.querySelector('[data-bind="lg-depth"]')
    };

    const copyBtn = document.getElementById("lg-copy");
    const bgInput = document.getElementById('lgBg');
    const dropZone = document.getElementById('lgBgDropZone');

    const dragState = {
        active: false,
        pointerId: null,
        offsetX: 0,
        offsetY: 0,
        stageRect: null
    };

    let lastHighlightKey = null;
    let cachedHighlightSvg = null;

    function hexToRgb(hex) {
        const value = hex.replace('#', '').toLowerCase();
        const len = value.length;
        let r, g, b;
        
        if (len === 3) {
            r = parseInt(value[0] + value[0], 16);
            g = parseInt(value[1] + value[1], 16);
            b = parseInt(value[2] + value[2], 16);
        } else {
            r = parseInt(value.substring(0, 2), 16);
            g = parseInt(value.substring(2, 4), 16);
            b = parseInt(value.substring(4, 6), 16);
        }
        
        return [r, g, b];
    }

    function buildHighlightSvg(hex, intensity) {
        const clean = (hex || '#ffffff').replace('#', '').toLowerCase();
        const alpha = Math.max(0, Math.min(1, intensity)).toFixed(2);
        const tail = Math.max(0, intensity * 0.18).toFixed(2);
        
        const svg = `<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 320'><defs><radialGradient id='lg-hl' cx='50%' cy='50%' r='50%'><stop offset='0%' stop-color='#${clean}' stop-opacity='${alpha}'/><stop offset='70%' stop-color='#${clean}' stop-opacity='${tail}'/><stop offset='100%' stop-color='#${clean}' stop-opacity='0'/></radialGradient></defs><circle cx='160' cy='160' r='160' fill='url(#lg-hl)'/></svg>`;
        
        const encoded = svg.replace(/#/g, '%23').replace(/'/g, '%27').replace(/"/g, '%22');
        
        return `url("data:image/svg+xml;utf8,${encoded}")`;
    }

    function clamp(value, min, max) {
        return Math.min(Math.max(value, min), max);
    }

    function setCardPosition(x, y, rectOverride = null) {
        if (!stage || !card) return;
        const rect = rectOverride || stage.getBoundingClientRect();
        const maxX = Math.max(0, rect.width - card.offsetWidth);
        const maxY = Math.max(0, rect.height - card.offsetHeight);
        card.style.left = `${clamp(x, 0, maxX)}px`;
        card.style.top = `${clamp(y, 0, maxY)}px`;
    }

    function centerCard() {
        if (!stage || !card) return;
        const rect = stage.getBoundingClientRect();
        const left = (rect.width - card.offsetWidth) / 2;
        const top = rect.height * 0.25;
        setCardPosition(left, top, rect);
    }

    function startDrag(event) {
        if (!card || !stage) return;
        event.preventDefault();
        dragState.active = true;
        dragState.pointerId = event.pointerId;
        dragState.stageRect = stage.getBoundingClientRect();
        const cardRect = card.getBoundingClientRect();
        dragState.offsetX = event.clientX - cardRect.left;
        dragState.offsetY = event.clientY - cardRect.top;
        card.classList.add('is-dragging');
        card.setPointerCapture(event.pointerId);
    }

    function moveDrag(event) {
        if (!dragState.active || event.pointerId !== dragState.pointerId) return;
        const rect = dragState.stageRect;
        const x = event.clientX - rect.left - dragState.offsetX;
        const y = event.clientY - rect.top - dragState.offsetY;
        setCardPosition(x, y, rect);
    }

    function endDrag(event) {
        if (!dragState.active || event.pointerId !== dragState.pointerId) return;
        dragState.active = false;
        card.classList.remove('is-dragging');
        card.releasePointerCapture(event.pointerId);
    }

    function updateCard() {
        const blur = Number(controls.blur.value);
        const opacity = Number(controls.opacity.value);
        const radius = Number(controls.radius.value);
        const border = Number(controls.border.value);
        const noise = Number(controls.noise.value);
        const tintHex = controls.tint.value || '#ffffff';
        const depthVal = Number(controls.depth?.value || 60);
        const [r, g, b] = hexToRgb(tintHex);

        if (binds.opacity) binds.opacity.textContent = opacity.toFixed(2);
        if (binds.noise) binds.noise.textContent = `${noise}%`;
        if (binds.depth) binds.depth.textContent = depthVal.toString();

        const intensity = clamp(opacity, 0, 1);
        const highlightKey = `${tintHex.toLowerCase()}|${intensity.toFixed(2)}`;
        
        let highlightSvg;
        if (highlightKey !== lastHighlightKey) {
            highlightSvg = buildHighlightSvg(tintHex, intensity);
            lastHighlightKey = highlightKey;
            cachedHighlightSvg = highlightSvg;
        } else {
            highlightSvg = cachedHighlightSvg || buildHighlightSvg(tintHex, intensity);
        }

        const noiseOpacity = clamp(noise / 100, 0, 1);
        const noiseGradient = noiseOpacity > 0.001
            ? `url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' /%3E%3CfeColorMatrix values='0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 ${noiseOpacity.toFixed(2)} 0'/%3E%3C/filter%3E%3Crect width='200' height='200' filter='url(%23n)'/%3E%3C/svg%3E")`
            : 'none';

        card.style.setProperty('--glass-pseudo', highlightSvg);
        card.style.setProperty('--glass-noise', noiseGradient);

        const shadow = `0 8px ${Math.round(depthVal * 0.4)}px rgba(15,23,42,0.35), 0 20px ${depthVal}px rgba(15,23,42,0.45)`;

        card.style.backdropFilter = `blur(${blur}px) saturate(1.8)`;
        card.style.borderRadius = `${radius}px`;
        card.style.border = `${border}px solid rgba(${r},${g},${b},0.45)`;
        card.style.backgroundColor = `rgba(${r},${g},${b},${opacity})`;
        card.style.boxShadow = shadow;

        cssOutput.value = buildCssSnippet({
            blur, radius, border, opacity,
            r, g, b,
            highlightSvg, shadow, noiseGradient
        });
    }

    let scheduled = false;
    function scheduleUpdate() {
        if (scheduled) return;
        scheduled = true;
        requestAnimationFrame(() => {
            scheduled = false;
            updateCard();
        });
    }

    function buildCssSnippet(cfg) {
        const hasNoise = cfg.noiseGradient && cfg.noiseGradient !== '';
        
        return `/* Liquid glass card */
.glass-card {
  position: relative;
  isolation: isolate;
  overflow: hidden;
  padding: 24px;
  backdrop-filter: blur(${cfg.blur}px) saturate(1.8);
  border-radius: ${cfg.radius}px;
  border: ${cfg.border}px solid rgba(${cfg.r}, ${cfg.g}, ${cfg.b}, 0.45);
  background-color: rgba(${cfg.r}, ${cfg.g}, ${cfg.b}, ${cfg.opacity.toFixed(2)});
  box-shadow: ${cfg.shadow};
  color: #fff;
}

.glass-card::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: ${cfg.highlightSvg};
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  filter: blur(35px);
  opacity: 0.85;
  mix-blend-mode: screen;
  z-index: 0;
}
${hasNoise ? `
.glass-card::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: ${cfg.noiseGradient};
  background-size: 200px 200px;
  opacity: 0.4;
  pointer-events: none;
  z-index: 1;
}
` : ''}
.glass-card > * {
  position: relative;
  z-index: ${hasNoise ? '2' : '1'};
}`;
    }

    function copyCss() {
        if (!cssOutput.value) return;
        const text = cssOutput.value;
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).then(() => {
                showStatus(status?.dataset.copied || 'Copied');
            }).catch(() => fallbackCopy(text));
        } else {
            fallbackCopy(text);
        }
    }

    function fallbackCopy(text) {
        const temp = document.createElement('textarea');
        temp.value = text;
        temp.style.position = 'absolute';
        temp.style.left = '-9999px';
        document.body.appendChild(temp);
        temp.select();
        try {
            document.execCommand('copy');
            showStatus(status?.dataset.copied || 'Copied');
        } catch {
            showStatus(status?.dataset.error || 'Error', true);
        }
        document.body.removeChild(temp);
    }

    let statusTimer = null;
    function showStatus(message, isError = false) {
        if (!status) return;
        status.textContent = message;
        status.style.color = isError ? '#f87171' : 'var(--text)';
        clearTimeout(statusTimer);
        statusTimer = setTimeout(() => {
            status.textContent = '';
        }, 2600);
    }

    function handleFile(file) {
        if (!file || !file.type || !file.type.startsWith('image/')) {
            showStatus(status?.dataset.error || 'Invalid file', true);
            return;
        }
        const reader = new FileReader();
        reader.onload = (ev) => {
            if (!stage) return;
            stage.style.backgroundImage = `url("${ev.target.result}")`;
            stage.style.backgroundSize = 'cover';
            stage.style.backgroundPosition = 'center';
            stage.style.backgroundRepeat = 'no-repeat';
            const defaultImg = stage.querySelector('img');
            if (defaultImg) defaultImg.style.display = 'none';
            updateCard();
        };
        reader.readAsDataURL(file);
    }

    Object.values(controls).forEach(ctrl => {
        if (!ctrl) return;
        ctrl.addEventListener('input', scheduleUpdate);
        ctrl.addEventListener('change', scheduleUpdate);
    });

    copyBtn?.addEventListener('click', (e) => {
        e.preventDefault();
        copyCss();
    });

    document.querySelectorAll('[data-preset]').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const index = Number(btn.dataset.preset) - 1;
            if (presets[index]) {
                const p = presets[index];
                controls.blur.value = p.blur;
                controls.opacity.value = p.opacity;
                controls.radius.value = p.radius;
                controls.border.value = p.border;
                controls.noise.value = p.noise;
                controls.tint.value = p.tint;
                if (controls.depth) controls.depth.value = p.depth;
                updateCard();
            }
        });
    });

    if (dropZone) {
        dropZone.addEventListener('click', () => {
            if (bgInput) bgInput.click();
        });
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('drag-over');
        });
        dropZone.addEventListener('dragleave', (e) => {
            e.preventDefault();
            dropZone.classList.remove('drag-over');
        });
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('drag-over');
            const file = e.dataTransfer?.files?.[0];
            if (file) handleFile(file);
        });
    }

    if (bgInput) {
        bgInput.addEventListener('change', (e) => {
            const file = e.target.files?.[0];
            if (file) handleFile(file);
        });
    }

    card?.addEventListener('pointerdown', startDrag);
    card?.addEventListener('pointermove', moveDrag);
    card?.addEventListener('pointerup', endDrag);
    card?.addEventListener('pointercancel', endDrag);

    window.addEventListener('resize', () => {
        if (!stage || !card) return;
        dragState.stageRect = stage.getBoundingClientRect();
        const left = parseFloat(card.style.left || '0') || 0;
        const top = parseFloat(card.style.top || '0') || 0;
        setCardPosition(left, top, dragState.stageRect);
    });

    updateCard();
    centerCard();
});
