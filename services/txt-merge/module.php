<?php
$svc_t = get_embedded_module_lang(__DIR__);
?>
<div class="wrapper">
    <div>
        <label for="tm_files" class="upload-label block mb-2 font-semibold"><?php echo esc($svc_t['label_files']) ?></label>
        <div class="upload-section">
            <div id="dropZone" class="w-full p-5 mb-4 border-2 border-dashed rounded-md text-center" style="border-color:var(--accent); background:var(--bg);" tabindex="0">
                <div id="dropText" class="text-muted">
                    <?php echo esc($svc_t['drop_here']) ?>
                    <div class="text-sm mt-2 text-muted"><?php echo esc($svc_t['label_sep']) ?>: <?php echo esc($svc_t['sep_newline']) ?></div>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <button type="button" id="uploadBtn" class="btn"><?php echo esc($svc_t['btn_upload']) ?></button>
                <small class="text-muted"><?php echo esc($svc_t['preview_empty']) ?></small>
            </div>
            <input id="tm_files" type="file" accept=".txt,.csv,text/plain,text/csv" multiple class="hidden">
        </div>

        <div class="mt-4 mb-4">
            <label class="block text-sm text-muted mb-2" for="tm_separator"><?php echo esc($svc_t['label_sep']) ?></label>
            <select id="tm_separator">
                <option value="\n"><?php echo esc($svc_t['sep_newline']) ?></option>
                <option value=","><?php echo esc($svc_t['sep_comma']) ?></option>
                <option value=";"><?php echo esc($svc_t['sep_semicolon']) ?></option>
                <option value="\n---\n"><?php echo esc($svc_t['sep_line']) ?></option>
            </select>
        </div>

        <div class="mb-4">
            <button type="button" id="tm_merge" class="btn-primary"><?php echo esc($svc_t['btn_merge']) ?></button>
            <button type="button" id="tm_reset"><?php echo esc($svc_t['btn_reset']) ?></button>
        </div>

        <div class="file-table-wrapper">
            <div class="file-table" aria-live="polite">
                <div class="el-table__header-wrapper">
                    <table class="el-table__header">
                        <thead>
                            <tr>
                                <th><?php echo esc($svc_t['tbl_no'] ?? '№') ?></th>
                                <th><?php echo esc($svc_t['tbl_name'] ?? 'Имя файла') ?></th>
                                <th><?php echo esc($svc_t['tbl_size'] ?? 'Размер файла') ?></th>
                                <th><?php echo esc($svc_t['tbl_mtime'] ?? 'Последнее изменение') ?></th>
                                <th><?php echo esc($svc_t['tbl_actions'] ?? 'Действия') ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="el-table__body-wrapper" style="height: 220px; overflow:auto;">
                    <table class="el-table__body">
                        <tbody id="tm_file_rows">
                            <tr class="sizer-row" aria-hidden="true">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="empty-row">&mdash; <?php echo esc($svc_t['preview_empty']) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="<?= asset_url('services/txt-merge/style.css') ?>">
<script src="<?= asset_url('services/txt-merge/script.js') ?>" defer></script>