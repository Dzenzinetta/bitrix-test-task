<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    exit();
} ?>
  <section class="page-section bg-light" id="portfolio">
      <div class="container">
          <div class="text-center">
              <h2 class="section-heading text-uppercase">Новости</h2>
          </div>
            <div class="row">
              <?php foreach ($arResult['ITEMS'] as $arItem) {
                  $picId = (int) ($arItem['PREVIEW_PICTURE']['ID'] ?? 0);
                  if ($picId) {
                      $img = CFile::ResizeImageGet($picId, ['width' => 600, 'height' => 400], BX_RESIZE_IMAGE_EXACT, true);
                      $src = $img['src'];
                  } else {
                      $src = SITE_TEMPLATE_PATH.'/assets/img/placeholder.jpg';
                  }
                  $name = $arItem['NAME'];
                  $desc = $arItem['PREVIEW_TEXT'] ?: '';
                  if (mb_strlen($desc) > 130) {
                      $desc = mb_substr($desc, 0, 130).'…';
                  }
                  $url = $arItem['DETAIL_PAGE_URL'];
                  ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                  <div class="portfolio-item">
                      <a class="portfolio-link" data-bs-toggle="modal" href="<?= $url?>">
                          <div class="portfolio-hover">
                              <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                          </div>
                          <img class="img-fluid" src="<?= $src?>" alt="<?= $name?>" />
                      </a>
                      <div class="portfolio-caption">
                          <div class="portfolio-caption-heading"><?= $name?></div>
                          <div class="portfolio-caption-subheading text-muted"><?= $desc?></div>
                      </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
    </section>
