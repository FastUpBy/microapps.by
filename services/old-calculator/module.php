<?php

/**
 * Module HTML for old-calculator
 */
$t = init_service(__DIR__);
$L = get_embedded_module_lang(__DIR__);
?>
<section>
  <div class="tablo">
  <h2>Калькулятор процентов</h2>
      <table width="100%">
        <tbody>          
          <tr>
            <td>Сколько составляет
              <label for="ch1_1" class="visually-hidden"><?= esc($L['label_percent'] ?? '%') ?></label>
              <input type="number" class="osn_18_b_ram_vir_pr" id="ch1_1">
              % от числа
              <label for="ch2_1" class="visually-hidden"><?= esc($L['label_number'] ?? 'Число') ?></label>
              <input type="number" class="osn_18_b_ram_vir_pr" id="ch2_1">
              <input type="button" class="osn_16_b" id="ok1" value="<?= esc($L['btn_ok']) ?>" aria-label="<?= esc($L['btn_ok']) ?>" >
              <input type="button" class="osn_16_b" id="reset1" value="<?= esc($L['btn_reset']) ?>" aria-label="<?= esc($L['btn_reset']) ?>">
            </td>
          </tr>
          <tr>
            <td class="osn_16_b"><span id="itog_1">0% от числа 0 = 0</span> <button class="copy-btn" data-target="itog_1" aria-label="Копировать результат">📋</button></td>
          </tr>
          <tr>
            <td>Сколько % составляет число
              <label for="ch1_2" class="visually-hidden"><?= esc($L['label_number'] ?? 'Число') ?></label>
              <input type="number" class="osn_18_b_ram_vir_pr" id="ch1_2" >
              от числа
              <label for="ch2_2" class="visually-hidden"><?= esc($L['label_number'] ?? 'Число') ?></label>
              <input type="number" class="osn_18_b_ram_vir_pr" id="ch2_2" >
              <input type="button" class="osn_16_b" id="ok2" value="<?= esc($L['btn_ok']) ?>" aria-label="<?= esc($L['btn_ok']) ?>" >
              <input type="button" class="osn_16_b" id="reset2" value="<?= esc($L['btn_reset']) ?>" aria-label="<?= esc($L['btn_reset']) ?>">
            </td>
          </tr>
          <tr>
            <td class="osn_16_b"><span id="itog_2">Число 0 от числа 0 = 0%</span> <button class="copy-btn" data-target="itog_2" aria-label="Копировать результат">📋</button></td>
          </tr>
          <tr>
            <td>Прибавить
              <label for="ch1_3" class="visually-hidden"><?= esc($L['label_percent'] ?? '%') ?></label>
              <input type="number" class="osn_18_b_ram_vir_pr" id="ch1_3">
              % к числу
              <label for="ch2_3" class="visually-hidden"><?= esc($L['label_number'] ?? 'Число') ?></label>
              <input type="number" class="osn_18_b_ram_vir_pr" id="ch2_3">
              <input type="button" class="osn_16_b" id="ok3" value="<?= esc($L['btn_ok']) ?>" aria-label="<?= esc($L['btn_ok']) ?>" >
              <input type="button" class="osn_16_b" id="reset3" value="<?= esc($L['btn_reset']) ?>" aria-label="<?= esc($L['btn_reset']) ?>">
            </td>
          </tr>
          <tr>
            <td class="osn_16_b"><span id="itog_3">Прибавить 0% к числу 0 = 0</span> <button class="copy-btn" data-target="itog_3" aria-label="Копировать результат">📋</button></td>
          </tr>
          <tr>
            <td>Вычесть
              <label for="ch1_4" class="visually-hidden"><?= esc($L['label_percent'] ?? '%') ?></label>
              <input type="number" class="osn_18_b_ram_vir_pr" id="ch1_4">
              % из числа
              <label for="ch2_4" class="visually-hidden"><?= esc($L['label_number'] ?? 'Число') ?></label>
              <input type="number" class="osn_18_b_ram_vir_pr" id="ch2_4">
              <input type="button" class="osn_16_b" id="ok4" value="<?= esc($L['btn_ok']) ?>" aria-label="<?= esc($L['btn_ok']) ?>" >
              <input type="button" class="osn_16_b" id="reset4" value="<?= esc($L['btn_reset']) ?>" aria-label="<?= esc($L['btn_reset']) ?>">
            </td>
          </tr>
          <tr>
            <td class="osn_16_b"><span id="itog_4">Вычесть 0% из числа 0 = 0</span> <button class="copy-btn" data-target="itog_4" aria-label="Копировать результат">📋</button></td>
          </tr>
          <tr>
            <td align="right" valign="bottom">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="osn_star">
                <tbody>
                  <tr  class="flex justify-between items-center">
                    <td width="354"><label for="dszn" class="visually-hidden">Округлять до</label>
                      <select id="dszn" class="osn_star" style="width: auto;">
                        <?php for ($i = 0; $i <= 10; $i++): ?>
                          <option value="<?= $i ?>" <?= $i === 2 ? 'selected' : '' ?>><?= $i ?></option>
                        <?php endfor; ?>
                      </select>
                      знаков после запятой
                    </td>
                    <td>&nbsp;</td>
                    <td><a href="javascript:sbrosVse();" class="btn">Сбросить все</a></td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
      </div>
</section>

<link rel="stylesheet" href="<?= asset_url('services/old-calculator/style.css') ?>">
<script src="<?= asset_url('services/old-calculator/script.js') ?>" defer></script>