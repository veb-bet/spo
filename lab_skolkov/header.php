<?php require_once "./inc/index.php" ?>
<?php session_start();ob_start(); ?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" type="text/css" href="./public/styles/main.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<body>
<header class="sklv-header sklv-header_product header">
<div class="sklv-header-top">
    <div class="sklv-header-top__left">
        <div class="sklv-header__wrapper sklv-header__wrapper_shops">
            <a href="#" class="sklv-button sklv-button_white" data-sklv-action="headerButtonAnalitic">
                <div class="sklv-node"><div class="sklv-node__content">Магазины</div>
                </div>
            </a>
        </div>
        <div class="sklv-header__wrapper sklv-header__wrapper_burger">
            <button class="sklv-button sklv-button_icon" id="burger">
                <svg class="icon icon-menu"> <use xlink:href="/redesign/interface/sprite.svg?v=1671463501#menu"></use></svg>                    </button>
        </div>
        <div class="sklv-header__wrapper sklv-header__wrapper_country">
            <button class="sklv-button sklv-change-city-button" data-target="#select-city">
                <div class="sklv-node">
                    <div class="sklv-node__content sklv-header__node_city">Волгоград</div>
                </div>
            </button>
        </div>
        <div class="sklv-header__wrapper sklv-header__wrapper_phone">
            <a class="sklv-button" href="#">
                <div class="sklv-node">
                    <svg class="icon icon-phone"> <use xlink:href="/redesign/interface/sprite.svg?v=1671463501#phone"></use></svg>                                <div class="sklv-node__content">
                        8&nbsp;916&nbsp;6666&nbsp;66
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="sklv-header-top__center">
        <a href="./index.php">
            <img class="sklv-logo" src="./public/images/sokolov-logo_new.svg" alt="SOKOLOV">
        </a>
    </div>
    <div class="sklv-header-top__rigth">
        <div class="sklv-header__wrapper sklv-header__wrapper_delivery">
            <a href="#" class="sklv-button bordered" data-sklv-action="headerButtonAnalitic">Доставка&nbsp;и&nbsp;оплата</a>
        </div>
        <div class="sklv-header__wrapper sklv-header__wrapper_atelier">
            <div class="d-flex">
                <a href="#" class="sklv-button sklv-button_white" data-sklv-action="headerButtonAnalitic">
                    <div class="sklv-node">
                        <div class="sklv-node__content">Украшения&nbsp;на&nbsp;заказ</div>
                    </div>
                </a>
                <div class="mx-4">
                    <?php if(!empty($_SESSION["USER_ID"])): ?>
                        <a class=" text-danger" href="./signOut.php">Выход</a>
                    <?php else: ?>
                        <a class="" href="./signIn.php">Вход</a>
                        <a href="./signUp.php">Регистрация</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sklv-header-bottom">
    <div class="sklv-header__wrapper sklv-header__wrapper_catalog">
        <button type="button" class="sklv-button sklv-button_black" data-sklv-action="catalog" appendclass="">
            <a class="sklv-node" href="./products.php"><div class="sklv-node__content">Продукты</a>
            </div>
        </button>
    </div>
    <div class="sklv-header__wrapper sklv-header__wrapper_diamonds">
    <a href="#" class="sklv-button sklv-button_pic sklv-button_white" style="background-image: url(&quot;https://cdn.sokolov.ru/upload/content/area/740d679e614377a80783768993382c5e.jpg&quot;);"><div class="sklv-node"><div class="sklv-node__content"></div></div></a></div>
    <div class="sklv-search sklv-header__wrapper sklv-header__wrapper_search">
        <div class="sklv-search-text search-by-text"><div class="search "><div class="search-container  search-active"><div><svg class="icon icon-magnify "><use xlink:href="/redesign/interface/sprite.svg#magnify"></use></svg></div><input class="sklv-input" placeholder="Поиск по каталогу" type="text" inputmode="search" tabindex="0" value=""></div></div></div>
        
    </div>
    <div class="sklv-header__wrapper sklv-header__wrapper_sklv">
    <a href="#" class="sklv-button sklv-button_pic" style="background-image: url(&quot;https://cdn.sokolov.ru/upload/content/area/b7d8131608813a4cc74b3c1a6c6c99c9.jpg&quot;);"></a></div>
    <div class="sklv-header__wrapper sklv-header__wrapper_promo">
        <a href="#" class="sklv-button bordered" data-sklv-action="headerButtonAnalitic">Акции</a>
    </div>
    <div class="sklv-header__wrapper sklv-header__wrapper_sale">
        <a href="#" class="sklv-button bordered" data-sklv-action="headerButtonAnalitic">Sale</a>
    </div>
    <div class="sklv-header__wrapper  sklv-header__wrapper_new">
        <a href="#" class="sklv-button bordered" data-sklv-action="headerButtonAnalitic">Новинки</a>
    </div>
</div>
</header>