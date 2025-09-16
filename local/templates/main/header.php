<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

  use Bitrix\Main\Page\Asset;
?>
						
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <title><?$APPLICATION->ShowTitle();?></title>
        <link rel="icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/assets/assets/favicon.ico" />
        <?php
          Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/styles.css');
          Asset::getInstance()->addString('<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />');
          Asset::getInstance()->addString('<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />');
          Asset::getInstance()->addString('<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>');

          Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/scripts.js');
          Asset::getInstance()->addJs("https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js");
          Asset::getInstance()->addJs("https://cdn.startbootstrap.com/sb-forms-latest.js");
        ?>
        <?$APPLICATION->ShowHead();?>
    </head>
    <body id="page-top">

        <div id="panel">
          <?php 
          $APPLICATION->ShowPanel();
          ?>
        </div>

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="<?=SITE_TEMPLATE_PATH?>/assets/assets/img/navbar-logo.svg" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/">Главная</a></li>
                        <li class="nav-item"><a class="nav-link" href="/news/">Новости</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">О нас</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Наша команда</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Our Studio!</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
            </div>
        </header>
