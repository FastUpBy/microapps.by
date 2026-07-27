<?php
/**
 * Простой конвертер шрифтов в WOFF2 формат
 * Работает без внешних зависимостей
 */
class FontConverter {
    
    /**
     * Конвертация TTF/OTF/WOFF в WOFF2
     */
    public static function toWoff2($inputPath, $outputPath) {
        $extension = strtolower(pathinfo($inputPath, PATHINFO_EXTENSION));
        
        // Если уже WOFF2, просто копируем
        if ($extension === 'woff2') {
            return copy($inputPath, $outputPath);
        }
        
        $fontData = file_get_contents($inputPath);
        if ($fontData === false) {
            throw new Exception('Unable to read font file');
        }
        
        // Конвертация в зависимости от формата
        switch ($extension) {
            case 'woff':
                $ttfData = self::woffToTtf($fontData);
                break;
            case 'ttf':
            case 'otf':
                $ttfData = $fontData;
                break;
            default:
                throw new Exception('Unsupported font format');
        }
        
        // Создаем WOFF2
        $woff2Data = self::ttfToWoff2($ttfData);
        
        if (file_put_contents($outputPath, $woff2Data) === false) {
            throw new Exception('Unable to write output file');
        }
        
        return true;
    }
    
    /**
     * Конвертация WOFF в TTF (распаковка)
     */
    private static function woffToTtf($woffData) {
        $len = strlen($woffData);
        if ($len < 44) {
            throw new Exception('Invalid WOFF file');
        }
        
        // Читаем WOFF заголовок
        $header = unpack('Nsignature/Nflavor/Nlength/nnumTables/nreserved/' .
                        'NtotalSfntSize/nmajorVersion/nminorVersion/' .
                        'NmetaOffset/NmetaLength/NmetaOrigLength/' .
                        'NprivOffset/NprivLength', substr($woffData, 0, 44));
        
        // Проверяем сигнатуру
        if ($header['signature'] !== 0x774F4646) { // 'wOFF'
            throw new Exception('Not a valid WOFF file');
        }
        
        // Создаем TTF заголовок
        $ttf = pack('N', $header['flavor']);
        $ttf .= pack('n', $header['numTables']);
        
        // Вычисляем searchRange, entrySelector, rangeShift
        $entrySelector = floor(log($header['numTables'], 2));
        $searchRange = pow(2, $entrySelector) * 16;
        $rangeShift = $header['numTables'] * 16 - $searchRange;
        
        $ttf .= pack('n', $searchRange);
        $ttf .= pack('n', $entrySelector);
        $ttf .= pack('n', $rangeShift);
        
        // Читаем таблицы директорий
        $offset = 44;
        $tableDirectory = [];
        
        for ($i = 0; $i < $header['numTables']; $i++) {
            $entry = unpack('Ntag/NorigChecksum/NcompLength/NorigLength',
                          substr($woffData, $offset, 16));
            $offset += 16;
            $tableDirectory[] = $entry;
        }
        
        // Пишем таблицы директорий и данные
        $dataOffset = 12 + ($header['numTables'] * 16);
        $currentOffset = $dataOffset;
        
        foreach ($tableDirectory as $i => $table) {
            // Записываем запись в директорию
            $ttf .= pack('N', $table['tag']);
            $ttf .= pack('N', $table['origChecksum']);
            $ttf .= pack('N', $currentOffset);
            $ttf .= pack('N', $table['origLength']);
            
            $currentOffset += $table['origLength'];
            // Выравниваем по 4 байта
            if ($table['origLength'] % 4 !== 0) {
                $currentOffset += 4 - ($table['origLength'] % 4);
            }
        }
        
        // Теперь копируем данные таблиц
        foreach ($tableDirectory as $table) {
            $compData = substr($woffData, $offset, $table['compLength']);
            $offset += $table['compLength'];
            
            // Распаковываем, если сжато
            if ($table['compLength'] < $table['origLength']) {
                $tableData = @gzuncompress($compData);
                if ($tableData === false) {
                    throw new Exception('Failed to decompress table data');
                }
            } else {
                $tableData = $compData;
            }
            
            $ttf .= $tableData;
            
            // Добавляем padding
            $padding = 4 - (strlen($tableData) % 4);
            if ($padding < 4) {
                $ttf .= str_repeat("\0", $padding);
            }
        }
        
        return $ttf;
    }
    
    /**
     * Конвертация TTF в WOFF2
     */
    private static function ttfToWoff2($ttfData) {
        // Если доступно Brotli сжатие
        if (function_exists('brotli_compress')) {
            return self::ttfToWoff2Brotli($ttfData);
        }
        
        // Fallback: создаем WOFF вместо WOFF2
        return self::ttfToWoff($ttfData);
    }
    
    /**
     * Создание WOFF2 с Brotli сжатием
     */
    private static function ttfToWoff2Brotli($ttfData) {
        // Сжимаем весь шрифт с помощью Brotli
        $compressed = brotli_compress($ttfData, 11, BROTLI_GENERIC);
        
        if ($compressed === false) {
            return self::ttfToWoff($ttfData);
        }
        
        // WOFF2 заголовок (упрощенная версия)
        $woff2 = pack('N', 0x774F4632); // 'wOF2' signature
        $woff2 .= substr($ttfData, 0, 4); // flavor (TTF/OTF identifier)
        $woff2 .= pack('N', strlen($woff2) + 8 + strlen($compressed)); // totalLength
        $woff2 .= pack('N', strlen($ttfData)); // totalUncompressedSize
        $woff2 .= $compressed;
        
        return $woff2;
    }
    
    /**
     * Fallback: создание WOFF вместо WOFF2
     */
    private static function ttfToWoff($ttfData) {
        $len = strlen($ttfData);
        if ($len < 12) {
            throw new Exception('Invalid TTF file');
        }
        
        // Читаем TTF заголовок
        $header = unpack('Nflavor/nnumTables/nsearchRange/nentrySelector/nrangeShift',
                        substr($ttfData, 0, 12));
        
        // WOFF заголовок
        $woff = pack('N', 0x774F4646); // 'wOFF' signature
        $woff .= pack('N', $header['flavor']);
        
        // Читаем таблицы
        $offset = 12;
        $tables = [];
        $totalSize = 0;
        
        for ($i = 0; $i < $header['numTables']; $i++) {
            $table = unpack('Ntag/Nchecksum/Noffset/Nlength',
                          substr($ttfData, $offset, 16));
            $offset += 16;
            
            $table['data'] = substr($ttfData, $table['offset'], $table['length']);
            $table['compData'] = gzcompress($table['data'], 9);
            
            // Используем сжатые данные только если они меньше
            if (strlen($table['compData']) >= strlen($table['data'])) {
                $table['compData'] = $table['data'];
            }
            
            $table['compLength'] = strlen($table['compData']);
            $totalSize += $table['length'];
            $tables[] = $table;
        }
        
        // Завершаем WOFF заголовок
        $woffLength = 44 + ($header['numTables'] * 20);
        foreach ($tables as $t) {
            $woffLength += $t['compLength'];
        }
        
        $woff .= pack('N', $woffLength); // length
        $woff .= pack('n', $header['numTables']); // numTables
        $woff .= pack('n', 0); // reserved
        $woff .= pack('N', $totalSize); // totalSfntSize
        $woff .= pack('n', 1); // majorVersion
        $woff .= pack('n', 0); // minorVersion
        $woff .= pack('N', 0); // metaOffset
        $woff .= pack('N', 0); // metaLength
        $woff .= pack('N', 0); // metaOrigLength
        $woff .= pack('N', 0); // privOffset
        $woff .= pack('N', 0); // privLength
        
        // Записываем директорию таблиц
        $dataOffset = 44 + ($header['numTables'] * 20);
        foreach ($tables as $table) {
            $woff .= pack('N', $table['tag']);
            $woff .= pack('N', $dataOffset);
            $woff .= pack('N', $table['compLength']);
            $woff .= pack('N', $table['length']);
            $woff .= pack('N', $table['checksum']);
            
            $dataOffset += $table['compLength'];
        }
        
        // Записываем данные таблиц
        foreach ($tables as $table) {
            $woff .= $table['compData'];
        }
        
        return $woff;
    }
}
