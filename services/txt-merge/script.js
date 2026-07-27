/* Frontend for txt-merge: read multiple text files in browser, merge and download */
(function(){
    'use strict';
    const drop = document.getElementById('dropZone') || document.getElementById('tm_dropzone');
    const input = document.getElementById('tm_files') || document.getElementById('imageInput');
    const dropText = document.getElementById('dropText');
    const originalDropText = dropText ? dropText.innerHTML : null;
    const uploadBtn = document.getElementById('uploadBtn');
    const mergeBtn = document.getElementById('tm_merge');
    const resetBtn = document.getElementById('tm_reset');
    const preview = document.getElementById('tm_preview');
    const sepSelect = document.getElementById('tm_separator');

    let files = [];
    // internal list with metadata: {file: File, name, size, mtime}
    let fileList = [];

    function bytesToSize(bytes){
        if (bytes === 0) return '0 B';
        const k = 1024;
        const sizes = ['B','KB','MB','GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    function formatDate(d){
        try{ return new Date(d).toLocaleString(); }catch(e){ return '-'; }
    }

    function renderTable(){
        const tbody = document.getElementById('tm_file_rows');
        tbody.innerHTML = '';
        if (!fileList.length){
            const tr = document.createElement('tr');
            tr.innerHTML = `<td colspan="5" class="empty-row">— Пусто</td>`;
            tbody.appendChild(tr);
            return;
        }
        fileList.forEach((item, idx)=>{
            const tr = document.createElement('tr');
            tr.className = 'el-table__row';
            const name = escHtml(item.name);
            tr.innerHTML = `
                <td><div class="cell"><div>${idx+1}</div></div></td>
                <td><div class="cell">${name}</div></td>
                <td><div class="cell">${bytesToSize(item.size)}</div></td>
                <td><div class="cell">${formatDate(item.mtime)}</div></td>
                <td><div class="cell"><button data-action="delete" data-idx="${idx}" title="Удалить"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash2-icon lucide-trash-2"><path d="M10 11v6"/><path d="M14 11v6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg></button></div></td>
            `;
            tbody.appendChild(tr);
        });
    }

    function escHtml(s){ return String(s).replace(/[&<>"']/g, function(m){ return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m]; }); }

    function removeItem(idx){
        fileList.splice(idx,1);
        renderTable();
    }

    function readFileAsText(file){
        return new Promise((res, rej)=>{
            const r = new FileReader();
            r.onload = ()=>res(String(r.result));
            r.onerror = ()=>rej(r.error);
            r.readAsText(file);
        });
    }

    async function mergeAndDownload(){
        if (!fileList.length) { alert('Нет файлов для объединения'); return; }
        // Determine separator: support literal '\n' selection, an explicit 'none' option, or any custom string.
        let sep = '';
        if (sepSelect){
            const val = sepSelect.value;
            if (val === 'none') sep = ''; // no separator between files
            else if (val === '\\n') sep = '\n';
            else if (val === '\\r\\n') sep = '\r\n';
            else sep = val || '';
        }
        // No size limit: attempt to merge all files (may be memory-heavy for very large data)
        try{
            // Build an array of parts without joining into a huge string.
            // Ensure we don't accidentally insert the literal string "\\n---\\n" — that was likely caused
            // by having the select option value contain backslashes which were not interpreted.
            const parts = [];
            for (let i = 0; i < fileList.length; i++){
                const item = fileList[i];
                const txt = await readFileAsText(item.file);
                parts.push(txt);
                // Append separator AFTER the file except for the last one when a separator is desired
                if (sep && i !== fileList.length - 1) parts.push(sep);
            }
            // Create blob directly from parts (avoids building one giant string in memory)
            const blob = new Blob(parts, {type: 'text/plain;charset=utf-8'});
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'merged.txt';
            document.body.appendChild(a);
            a.click();
            a.remove();
            // cleanup
            setTimeout(()=> URL.revokeObjectURL(url), 5000);
        }catch(e){
            console.error(e);
            alert('Ошибка при чтении файлов');
        }
    }

    // Защита от двойного срабатывания открытия диалога: флаг и небольшой таймаут
    let opening = false;
    const openInput = ()=>{
        if (opening) return;
        opening = true;
        try { input.click(); } finally { setTimeout(()=> opening = false, 300); }
    };

    drop.addEventListener('pointerdown', (e)=>{ e.preventDefault(); openInput(); });
    drop.addEventListener('keydown', (ev)=>{ if(ev.key === 'Enter' || ev.key === ' ') { ev.preventDefault(); openInput(); } });

    if (uploadBtn) uploadBtn.addEventListener('click', (e)=>{ e.preventDefault(); openInput(); });

    drop.addEventListener('dragover', (e)=>{ e.preventDefault(); drop.classList.add('dragover'); if(dropText) dropText.textContent = 'Отпустите файлы для загрузки'; });
    drop.addEventListener('dragleave', (e)=>{ drop.classList.remove('dragover'); if(dropText && originalDropText) dropText.innerHTML = originalDropText; });
    drop.addEventListener('drop', (e)=>{
        e.preventDefault(); drop.classList.remove('dragover');
        const dt = e.dataTransfer;
        if (!dt) return;
        const picked = Array.from(dt.files).filter(f=>/\.txt$|\.csv$|text\//i.test(f.type) || /\.txt$|\.csv$/i.test(f.name));
        picked.forEach(f=> fileList.push({ file: f, name: f.name, size: f.size, mtime: f.lastModified }));
        renderTable();
    });

    input.addEventListener('change', (e)=>{
        const picked = Array.from(input.files || []).filter(f=>/\.txt$|\.csv$|text\//i.test(f.type) || /\.txt$|\.csv$/i.test(f.name));
        picked.forEach(f=> fileList.push({ file: f, name: f.name, size: f.size, mtime: f.lastModified }));
        input.value = '';
        renderTable();
    });

    mergeBtn.addEventListener('click', mergeAndDownload);
    resetBtn.addEventListener('click', ()=>{ fileList = []; input.value = ''; renderTable(); });

    // Делегирование кликов для таблицы (удаление)
    document.addEventListener('click', (e)=>{
        const btn = e.target.closest && e.target.closest('button[data-action="delete"]');
        if (!btn) return;
        const idx = parseInt(btn.getAttribute('data-idx'),10);
        if (Number.isNaN(idx)) return;
        removeItem(idx);
    });
})();
