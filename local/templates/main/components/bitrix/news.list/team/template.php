<?php if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    exit();
} ?>

        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Наша команда</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row">
                        <?php foreach ($arResult['ITEMS'] as $arItem) {
                            // echo '<pre>'; print_r($arItem["PREVIEW_PICTURE"]); echo '</pre>';
                            $name = $arItem['NAME'];
                            $photo = $arItem['PREVIEW_PICTURE'];
                            if ($photo) {
                                $src = $photo['SRC'];
                            } else {
                                $src = SITE_TEMPLATE_PATH.'/assets/img/placeholder.jpg';
                            }
                            $position = (string) $arItem['PROPERTIES']['POSITION']['VALUE'] ?? '';
                            $repo = (string) $arItem['PROPERTIES']['GIT']['VALUE'] ?? '';
                            $social = (string) $arItem['PROPERTIES']['POSITION']['VALUE'] ?? '';
                            ?>
                        <div class="col-lg-4">
                                <div class="team-member">
                                        <img class="mx-auto rounded-circle" src="<?= $src?>" alt="..." />
                                        <h4><?= $name?></h4>
                                        <p class="text-muted"><?= $position?></p>
                                        <a class="btn btn-dark btn-social mx-2" href=<?= $repo?> aria-label="Parveen Anand GitHub Profile"><i class="fab fa-linkedin-in"></i></a>
                                        <a class="btn btn-dark btn-social mx-2" href=<?= $social?> aria-label="Parveen Anand Instagram Profile"><i class="fab fa-twitter"></i></a>
                                </div>
                        </div>
                        <?php } ?>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"> <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p> </div>
                </div>
            </div>
        </section>