   
   <?php
   $adsContent = $adsContent ?? '';
   $visible =  false;
   if($visible === false) {
       return;
   }
   ?>

   <section class="ad" aria-label="Реклама">
        <div class="ad-block" role="complementary" aria-hidden="false">
           
            <?php if (!empty(trim((string)$adsContent))): ?>
                <?= $adsContent ?>
            <?php else: ?>
                <div class="media-placeholder" aria-hidden="true"></div>
            <?php endif; ?>
        </div>
    </section>