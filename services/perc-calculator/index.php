<?php
// Сервис QR-генератора: используем возвращаемый массив $t для локального доступа
$t = init_service(__DIR__);
get_header();
?>

<?php
this_module();
get_content();
?>
<?php $pi = $t['percent_info'] ?? null; if (is_array($pi) && !empty($pi['sections'])): ?>
<section class="percent-info wrapper" itemscope itemtype="https://schema.org/Article">
        <meta itemprop="inLanguage" content="<?= esc(current_lang()) ?>">
        <?php $sections = $pi['sections']; ?>
        <?php if (!empty($sections[0]['title'])): ?>
                <h2 itemprop="headline"><?= esc($sections[0]['title']) ?></h2>
        <?php endif; ?>
        <div itemprop="articleBody">
                <?php $s0 = $sections[0]; ?>
                <?php if (!empty($s0['paragraphs']) && is_array($s0['paragraphs'])): foreach ($s0['paragraphs'] as $p): ?>
                        <p><?= esc($p) ?></p>
                <?php endforeach; endif; ?>
                <?php if (!empty($s0['formula'])): ?>
                        <p><strong>Формула:</strong> <code><?= esc($s0['formula']) ?></code></p>
                <?php endif; ?>
                <?php if (!empty($s0['note'])): ?>
                        <p><?= esc($s0['note']) ?></p>
                <?php endif; ?>

                <?php for ($i = 1; $i < count($sections); $i++): $sec = $sections[$i]; ?>
                        <?php if (!empty($sec['title'])): ?>
                                <h2><?= esc($sec['title']) ?></h2>
                        <?php endif; ?>
                        <?php if (!empty($sec['paragraphs']) && is_array($sec['paragraphs'])): foreach ($sec['paragraphs'] as $p): ?>
                                <p><?= esc($p) ?></p>
                        <?php endforeach; endif; ?>
                        <?php if (!empty($sec['formulas']) && is_array($sec['formulas'])): ?>
                                <ul>
                                        <?php foreach ($sec['formulas'] as $f): ?>
                                                <li><code><?= esc($f) ?></code></li>
                                        <?php endforeach; ?>
                                </ul>
                        <?php elseif (!empty($sec['formula'])): ?>
                                <p><strong>Формула:</strong> <code><?= esc($sec['formula']) ?></code></p>
                        <?php endif; ?>
                        <?php if (!empty($sec['note'])): ?>
                                <p><?= esc($sec['note']) ?></p>
                        <?php endif; ?>
                <?php endfor; ?>

                <?php if (!empty($pi['examples']) && is_array($pi['examples'])): ?>
                        <?php if (!empty($pi['examples_title'])): ?>
                                <h2><?= esc($pi['examples_title']) ?></h2>
                        <?php endif; ?>
                        <ul>
                                <?php foreach ($pi['examples'] as $ex): ?>
                                        <li><?= esc($ex) ?></li>
                                <?php endforeach; ?>
                        </ul>
                <?php endif; ?>
        </div>
</section>
<?php endif; ?>
<?php

get_howto();
get_faq();
?>
<?php get_footer(); ?>