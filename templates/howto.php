<?php
$howto = $howto ?? ($t['howto'] ?? []);
if (!is_array($howto) || empty($howto)) return;
$title = $howto['title'] ?? '';
$steps = $howto['steps'] ?? [];
if (!is_array($steps) || empty($steps)) return;
?>
<section class="howto" itemscope itemtype="https://schema.org/HowTo" aria-labelledby="howto-title">
    <?php if ($title): ?>
        <h2 id="howto-title"><?= esc($title) ?></h2>
    <?php endif; ?>
    <div class="howto-content">
        <ul class="howto-steps grid gap-4 grid-cols-1 md:grid-cols-2">
            <?php foreach ($steps as $i => $s):
                $name = is_array($s) ? ($s['name'] ?? '') : '';
                $text = is_array($s) ? ($s['text'] ?? '') : '';
                $img = is_array($s) ? ($s['image'] ?? '') : '';
                $i++;
                if (!$name && !$text) continue;
            ?>
                <li itemscope itemtype="https://schema.org/HowToStep" itemprop="step" class="flex flex-col gap-6 card card--howto">
                    <div class="flex items-center gap-4">
                        <span class="rounded-full size-8 flex items-center justify-center bg-[var(--bg)] text-lg"><?= $i ?></span>
                        <?php if ($name): ?><p class="text-xl font-medium" itemprop="name"><?= esc($name) ?></p><?php endif; ?>
                    </div>
                    <?php if ($text): ?><p itemprop="text" class="text-left"><?= esc($text) ?></p><?php endif; ?>
                </li>
            <?php
            endforeach; ?>
        </ul>
    </div>
</section>