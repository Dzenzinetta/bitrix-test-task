<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    exit();
} $this->setFrameMode(true); ?>

<section class="py-5">
  <div class="container">

    <a href="/news/" class="btn btn-outline-secondary mb-4">&larr; Ко всем новостям</a>

    <h1 class="mb-4 text-center"><?= $arResult['NAME']?></h1>

    <?php if (! empty($arResult['DETAIL_PICTURE']['SRC'])) { ?>
      <div class="text-center mb-4">
        <img class="img-fluid rounded shadow" 
             src="<?= $arResult['DETAIL_PICTURE']['SRC']?>" 
             alt="<?= $arResult['NAME']?>" 
             style="max-width: 800px;" />
      </div>
    <?php } ?>

    <?php if ($arResult['DISPLAY_ACTIVE_FROM']) { ?>
      <div class="text-muted text-center mb-4">
        <?= $arResult['DISPLAY_ACTIVE_FROM']?>
      </div>
    <?php } ?>

    <div class="article-body" style="max-width: 800px; margin: 0 auto;">
      <?php
        $text = trim($arResult['DETAIL_TEXT']);
echo '<p>'.nl2br($text).'</p>';
?>
    </div>

    <?php if ($arResult['PROPERTIES']['SOURCE_LINK']['VALUE']) { ?>
      <div class="mt-5 text-center">
        <span class="text-muted">Источник:</span>
        <a href="<?= $arResult['PROPERTIES']['SOURCE_LINK']['VALUE']?>" 
           target="_blank" rel="nofollow noopener">
          <?= $arResult['PROPERTIES']['SOURCE_LINK']['VALUE']?>
        </a>
      </div>
    <?php } ?>

  </div>
</section>
