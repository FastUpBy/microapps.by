// Получаем переводы из глобального объекта
const t = window.svc_t || {};

// Элементы DOM
let fontInput;
let dropZone;
let dropText;
let btnConvert;
let btnReset;
let fileList;
let resultArea;
let resultsContainer;
let btnDownloadAll;
let downloadAllContainer;

// Хранилище загруженных файлов
let uploadedFiles = [];
let convertedFiles = [];

// Инициализация после загрузки DOM
document.addEventListener('DOMContentLoaded', () => {
    initElements();
    attachEventListeners();
});

/**
 * Инициализация элементов DOM
 */
function initElements() {
    fontInput = document.getElementById('fontInput');
    dropZone = document.getElementById('fontInputDropZone');
    dropText = document.getElementById('fontInputDropText');
    btnConvert = document.getElementById('btn-convert');
    btnReset = document.getElementById('btn-reset');
    fileList = document.getElementById('file-list');
    resultArea = document.getElementById('result-area');
    resultsContainer = document.getElementById('results-container');
    btnDownloadAll = document.getElementById('btn-download-all');
    downloadAllContainer = document.getElementById('download-all-container');
}

/**
 * Подключение обработчиков событий
 */
function attachEventListeners() {
    if (fontInput) {
        fontInput.addEventListener('change', handleFileSelect);
    }
    
    // Клик по dropzone открывает диалог выбора файла
    if (dropZone) {
        dropZone.addEventListener('click', () => {
            if (fontInput) fontInput.click();
        });
        
        // Drag & Drop support
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('drag-over');
        });
        
        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('drag-over');
        });
        
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('drag-over');
            
            const files = Array.from(e.dataTransfer.files);
            if (files.length > 0) {
                // Эмулируем выбор файлов через input
                const dt = new DataTransfer();
                files.forEach(file => dt.items.add(file));
                fontInput.files = dt.files;
                
                // Вызываем обработчик
                handleFileSelect({ target: fontInput });
            }
        });
    }
    
    if (btnConvert) {
        btnConvert.addEventListener('click', handleConvert);
    }
    
    if (btnReset) {
        btnReset.addEventListener('click', handleReset);
    }

    if (btnDownloadAll) {
        btnDownloadAll.addEventListener('click', handleDownloadAll);
    }
}

/**
 * Обработка выбора файлов
 */
function handleFileSelect(event) {
    const files = Array.from(event.target.files);
    
    if (files.length === 0) {
        return;
    }
    
    // Фильтруем только поддерживаемые форматы
    const validFiles = files.filter(file => {
        const ext = file.name.split('.').pop().toLowerCase();
        return ['ttf', 'otf', 'woff', 'woff2'].includes(ext);
    });
    
    if (validFiles.length === 0) {
        alert(t.error_invalid_format || 'Unsupported file format');
        return;
    }
    
    uploadedFiles = validFiles;
    displayFileList();
    btnConvert.disabled = false;
}

/**
 * Отображение списка загруженных файлов
 */
function displayFileList() {
    if (uploadedFiles.length === 0) {
        fileList.classList.add('hidden');
        return;
    }
    
    fileList.classList.remove('hidden');
    fileList.innerHTML = '<h4 class="font-semibold mb-2">Загруженные файлы:</h4>';
    
    const listEl = document.createElement('ul');
    listEl.className = 'file-list-items';
    
    uploadedFiles.forEach((file, index) => {
        const li = document.createElement('li');
        li.className = 'file-list-item';
        li.innerHTML = `
            <span class="file-name">${escapeHtml(file.name)}</span>
            <span class="file-size">${formatFileSize(file.size)}</span>
        `;
        listEl.appendChild(li);
    });
    
    fileList.appendChild(listEl);
}

/**
 * Обработка конвертации
 */
async function handleConvert() {
    if (uploadedFiles.length === 0) {
        alert(t.error_no_file || 'Please upload files');
        return;
    }
    
    btnConvert.disabled = true;
    btnConvert.textContent = t.status_converting || 'Converting...';
    
    convertedFiles = [];
    resultsContainer.innerHTML = '';
    resultArea.classList.remove('hidden');
    downloadAllContainer.classList.add('hidden');
    
    // Конвертируем каждый файл
    for (let i = 0; i < uploadedFiles.length; i++) {
        const file = uploadedFiles[i];
        await convertFile(file, i);
    }
    
    // Показываем кнопку "Скачать все" если файлов больше одного
    if (convertedFiles.length > 1) {
        downloadAllContainer.classList.remove('hidden');
    }
    
    btnConvert.disabled = false;
    btnConvert.textContent = t.btn_convert || 'Convert to WOFF2';
}

/**
 * Конвертация одного файла
 */
async function convertFile(file, index) {
    const resultCard = createResultCard(file, index);
    resultsContainer.appendChild(resultCard);
    
    const statusEl = resultCard.querySelector('.conversion-status');
    const downloadBtn = resultCard.querySelector('.btn-download-single');
    const statsEl = resultCard.querySelector('.conversion-stats');
    
    try {
        const formData = new FormData();
        formData.append('font', file);
        
        const response = await fetch(window.location.href.replace(/\/$/, '') + '/api.php', {
            method: 'POST',
            body: formData
        });
        
        if (!response.ok) {
            throw new Error('Conversion failed');
        }
        
        const blob = await response.blob();
        const woff2Name = file.name.replace(/\.(ttf|otf|woff)$/i, '.woff2');
        
        // Сохраняем конвертированный файл
        convertedFiles.push({
            name: woff2Name,
            blob: blob,
            originalSize: file.size,
            compressedSize: blob.size
        });
        
        // Обновляем UI
        statusEl.textContent = t.status_success || 'Done!';
        statusEl.className = 'conversion-status status-success';
        
        // Показываем статистику
        const savedBytes = file.size - blob.size;
        const savedPercent = ((savedBytes / file.size) * 100).toFixed(1);
        
        statsEl.innerHTML = `
            <div class="stat-item">
                <span class="stat-label">${t.res_original_size || 'Original:'}:</span>
                <span class="stat-value">${formatFileSize(file.size)}</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">${t.res_compressed_size || 'WOFF2:'}:</span>
                <span class="stat-value">${formatFileSize(blob.size)}</span>
            </div>
            <div class="stat-item stat-saved">
                <span class="stat-label">${t.res_saved || 'Saved:'}:</span>
                <span class="stat-value">${formatFileSize(savedBytes)} (${savedPercent}%)</span>
            </div>
        `;
        
        // Активируем кнопку скачивания
        downloadBtn.disabled = false;
        downloadBtn.onclick = () => downloadFile(blob, woff2Name);
        
    } catch (error) {
        console.error('Conversion error:', error);
        statusEl.textContent = t.status_error || 'Error';
        statusEl.className = 'conversion-status status-error';
        
        statsEl.innerHTML = `<p class="text-error">${t.error_conversion || 'Conversion error'}</p>`;
    }
}

/**
 * Создание карточки результата
 */
function createResultCard(file, index) {
    const card = document.createElement('div');
    card.className = 'result-card';
    card.innerHTML = `
        <div class="result-header">
            <h4 class="result-filename">${escapeHtml(file.name)}</h4>
            <span class="conversion-status status-converting">${t.status_converting || 'Converting...'}</span>
        </div>
        <div class="conversion-stats"></div>
        <button class="btn btn-download-single" disabled>
            ${t.btn_download || 'Download'}
        </button>
    `;
    return card;
}

/**
 * Скачивание одного файла
 */
function downloadFile(blob, filename) {
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = filename;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
}

/**
 * Скачивание всех файлов в ZIP
 */
async function handleDownloadAll() {
    if (convertedFiles.length === 0) {
        return;
    }
    
    // Если файлов мало, скачиваем по отдельности
    if (convertedFiles.length <= 3) {
        convertedFiles.forEach(file => {
            downloadFile(file.blob, file.name);
        });
        return;
    }
    
    // Для большого количества файлов создаем ZIP (потребуется библиотека JSZip)
    // Пока просто скачиваем по очереди
    for (const file of convertedFiles) {
        downloadFile(file.blob, file.name);
        await new Promise(resolve => setTimeout(resolve, 100));
    }
}

/**
 * Сброс формы
 */
function handleReset() {
    uploadedFiles = [];
    convertedFiles = [];
    
    if (fontInput) {
        fontInput.value = '';
    }
    
    fileList.classList.add('hidden');
    resultArea.classList.add('hidden');
    resultsContainer.innerHTML = '';
    downloadAllContainer.classList.add('hidden');
    
    btnConvert.disabled = true;
    btnConvert.textContent = t.btn_convert || 'Convert to WOFF2';
}

/**
 * Форматирование размера файла
 */
function formatFileSize(bytes) {
    if (bytes === 0) return '0 B';
    const k = 1024;
    const sizes = ['B', 'KB', 'MB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return (bytes / Math.pow(k, i)).toFixed(2) + ' ' + sizes[i];
}

/**
 * Экранирование HTML
 */
function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}
