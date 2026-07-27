document.getElementById('qrGen').addEventListener('submit', function(e) {
    e.preventDefault();
    const text = document.getElementById('qrText').value.trim();
    const resultDiv = document.getElementById('qrResult');
    
    if (!text) {
        document.getElementById('qrText').classList.add('input-error');
        const timer = setTimeout(() => {
            document.getElementById('qrText').classList.remove('input-error');
        }, 2000);
        return;
    }
    
    // Создаём canvas для композиции
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');
    const size = 300;
    canvas.width = size;
    canvas.height = size;
    
    const qrUrl = `https://api.qrserver.com/v1/create-qr-code/?size=${size}x${size}&data=${encodeURIComponent(text)}`;
    const qrImg = new Image();
    qrImg.crossOrigin = 'anonymous';
    
    qrImg.onload = function() {
        // Рисуем QR-код
        ctx.drawImage(qrImg, 0, 0, size, size);
        
        // Рисуем белый круг в центре
        const centerX = size / 2;
        const centerY = size / 2;
        const radius = 32;
        
        ctx.fillStyle = '#ffffff';
        ctx.beginPath();
        ctx.arc(centerX, centerY, radius, 0, Math.PI * 2);
        ctx.fill();
        
        // Рисуем логотип MicroApps (упрощённая иконка)
        const logoSize = 48;
        const logoX = centerX - logoSize / 2;
        const logoY = centerY - logoSize / 2;
        
        // Круг обводка
        ctx.strokeStyle = '#4da6ff';
        ctx.lineWidth = 3;
        ctx.beginPath();
        ctx.arc(centerX, centerY, 20, 0, Math.PI * 2);
        ctx.stroke();
        
        // Три линии внутри
        ctx.strokeStyle = '#4da6ff';
        ctx.lineWidth = 2.5;
        ctx.lineCap = 'round';
        
        ctx.beginPath();
        ctx.moveTo(centerX - 10, centerY - 8);
        ctx.lineTo(centerX + 10, centerY - 8);
        ctx.stroke();
        
        ctx.beginPath();
        ctx.moveTo(centerX - 10, centerY);
        ctx.lineTo(centerX + 10, centerY);
        ctx.stroke();
        
        ctx.beginPath();
        ctx.moveTo(centerX - 10, centerY + 8);
        ctx.lineTo(centerX + 6, centerY + 8);
        ctx.stroke();
        
        resultDiv.innerHTML = `<img src="${canvas.toDataURL()}" alt="QR Code" style="max-width: 100%; border-radius: var(--radius); border: 1px solid var(--muted);">`;
    };
    
    qrImg.onerror = function() {
        resultDiv.innerHTML = '<span style="color: #ff6b6b;">Ошибка генерации QR-кода</span>';
    };
    
    qrImg.src = qrUrl;
});
