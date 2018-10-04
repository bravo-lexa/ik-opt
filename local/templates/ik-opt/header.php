<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); // Стандартное обьявдение
// * Подключаем библиотеку
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset;
// * * * * *
Loc::loadMessages(__FILE__); // Вывод сообщений

// * Моя библиотека для помощи в работе
require_once($_SERVER['DOCUMENT_ROOT'] . '/local/lib/App.php');
/*
 * Просто переменны для новчка
 * SITE_TEMPLATE_PATH; - Путь к шаблону сайта
 *
*/
?>
<!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>" <?if(isset($_GET['dev'])){?> class="is-developer"<?}?>>
<head>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <?
        $APPLICATION->ShowMeta('viewport');
        $APPLICATION->ShowMeta('HandheldFriendly');
        $APPLICATION->ShowMeta('apple-mobile-web-app-capable', 'yes');
        $APPLICATION->ShowMeta('apple-mobile-web-app-status-bar-style');
        $APPLICATION->ShowMeta('SKYPE_TOOLBAR');

        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH. '/assets/css/style.css');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/libs/jquery-3.3.1.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/libs/jquery-ui.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/libs/jquery.fancybox.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/libs/slick.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/libs/owl.carousel.min.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/libs/stepper.min.js');

        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/script.js');

        // * Шрифты
        Asset::getInstance()->addCss('http' . (\CMain::IsHTTPS() ? 's' : '') . '://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans:400,700');

        // * Показать шапку
        $APPLICATION->ShowHead();
    ?>
</head>
<body class="app">
<div class="app-panel"><? $APPLICATION->ShowPanel(); ?></div>
<!-- Иконки -->
<? require( $_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . '/.icons.php'); ?>
<!-- Шапка -->
<header>
    <!-- MOBILE MENU -->
    <div class="mob">
        <div class="mob-menu">
            <div class="mob-menu-nav">
                <ul data-js-resize-after="header-menu-top"></ul>
                <ul data-js-resize-after="header-menu"></ul>
            </div>
            <div class="mob-menu-footer">
                <a class="btn" href="#page__index__calendar" data-js-scroll title=""><span class="btn-control">записаться</span></a>
            </div>
        </div>
    </div>
    <!--  END  -->
    <!--  DESKTOP  -->
    <div class="header">
        <div class="header__top">
            <div class="container">
                <div class="header__top__left">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "top",
                        array(
                            "ROOT_MENU_TYPE" => "top",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_TIME" => "86400",
                            "MENU_CACHE_USE_GROUPS" => "N",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MAX_LEVEL" => "1",
                            "CHILD_MENU_TYPE" => "",
                            "USE_EXT" => "N",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N",
                            "COMPONENT_TEMPLATE" => "top"
                        ),
                        false
                    ); ?>
                </div>
                <div class="header__top__right">
                    <div class="header__top__user">
                        <?if(!APP::User()->is_authorized()):?>
                            <a href="/user/login/" class="is-user">
                                <i>
                                    <svg role="img" class="icon-svg">
                                        <use xlink:href="#icon-user"></use>
                                    </svg>
                                </i>
                                <span>Вход</span>
                            </a>
                            <a href="/user/register/"><span>Регистрация</span></a>
                            <a href="/" class="is-basket">
                                <i>
                                    <svg role="img" class="icon-svg">
                                        <use xlink:href="#icon-bascket"></use>
                                    </svg>
                                </i>
                                <span></span>
                            </a>
                        <?else:?>
                            <a href="/user/profile/" class="is-user">
                                <i>
                                    <svg role="img" class="icon-svg">
                                        <use xlink:href="#icon-user"></use>
                                    </svg>
                                </i>
                                <span>Профиль</span>
                            </a>
                            <a href="<?echo $APPLICATION->GetCurPageParam("logout=yes", array(
                                "login",
                                "logout",
                                "register",
                                "forgot_password",
                                "change_password"));?>"><span>Выход</span></a>
                            <a href="/" class="is-basket">
                                <i>
                                    <svg role="img" class="icon-svg">
                                        <use xlink:href="#icon-bascket"></use>
                                    </svg>
                                </i>
                                <span></span>
                            </a>
                        <?endif;?>
                    </div>
                </div>
                <div class="mob-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="header__main">
                <div class="row-table row-lg-table-none">
                    <div class="col-6 col-xl-5 col-md-none">
                        <div class="header__main__logo">
                            <img src="<?=SITE_TEMPLATE_PATH?>/assets/images/logo.gif">
                        </div>
                        <div class="header__main__logo__text">
                            <span class="bitrix-include"><? $APPLICATION->IncludeFile(SITE_DIR . "local/include/header/logo_text.php", Array(), Array("MODE" => "text")); ?></span>
                        </div>
                    </div>
                    <div class="col-1 col-md-none"></div>
                    <div class="col-12 col-lg-11 col-md-14 col-sm-24">
                        <div class="row row-table row-lg-table-none">
                            <div class="col-8 col-lg-24">
                                <div class="header__main__time">
                                    <div class="header__main__time__title">График работы</div>
                                    <div class="header__main__time__inf">
                                        <span class="bitrix-include"><? $APPLICATION->IncludeFile(SITE_DIR . "local/include/header/time.php", Array(), Array("MODE" => "text")); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-16 col-lg-24">
                                <!--                                data-js-resize="header-phone" data-width="lg"-->
                                <div class="header__main__phone" >
                                    <div class="header__main__phone__icon">
                                        <svg role="img" class="icon-svg">
                                            <use xlink:href="#icon-phone-static"></use>
                                        </svg>
                                    </div>
                                    <div class="header__main__phone__number">
                                        <a href="<?=APP::Common()->get_phone_link(APP::Bitrix()->includeFile("header/phone_1_code.php") . APP::Bitrix()->includeFile("header/phone_1_number.php"))?>"
                                           class="bitrix-include">
                                            <b class="bitrix-include">
                                                <? $APPLICATION->IncludeFile(SITE_DIR . "local/include/header/phone_1_code.php", Array(), Array("MODE" => "text")); ?>
                                            </b>
                                            <? $APPLICATION->IncludeFile( SITE_DIR . "local/include/header/phone_1_number.php", Array(), Array("MODE" => "text")); ?>
                                        </a>
                                        <a href="<?=APP::Common()->get_phone_link(APP::Bitrix()->includeFile("header/phone_2_code.php") . APP::Bitrix()->includeFile("header/phone_2_number.php"))?>"
                                           class="bitrix-include">
                                            <b class="bitrix-include">
                                                <? $APPLICATION->IncludeFile(SITE_DIR . "local/include/header/phone_2_code.php", Array(), Array("MODE" => "text")); ?>
                                            </b>
                                            <? $APPLICATION->IncludeFile( SITE_DIR . "local/include/header/phone_2_number.php", Array(), Array("MODE" => "text")); ?>
                                        </a>
                                    </div>
                                    <div class="header__main__phone__btn">
                                        <a href="" title="" href="javascript:" data-popup="" data-src="#feedback_phone">Заказать звонок</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-table row-lg-table-none">
                            <div class="col-24">
                                <div class="header__main__search" data-js-resize="header-search" data-width="lg">
                                    <input type="search" name="search" class="header__main__search__control" value="" placeholder="Поиск по названию или артикулу" autocomplete="off" spellcheck="false" dir="auto">
                                    <button class="header__main__search__btn">
                                        <svg role="img" class="icon-svg">
                                            <use xlink:href="#icon-search"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1 col-sm-none"></div>
                    <div class="col-6 col-lg-7 col-md-10 col-sm-none">
                        <div class="header__main__basket">
                            <div class="header__main__basket__title"><span>Ваша корзина</span></div>
                            <div class="header__main__basket__inf"><a href="">27 товаров</a> на 3 126 руб.</div>
                            <div class="header__main__basket__btn"><a href="" class="btn">Оформить заказ</a></div>
                        </div>
                    </div>
                    <div class="col-0 col-lg-24" data-js-resize-after="header-search"></div>
                </div>
            </div>
        </div>
        <div class="header__menu__full">
            <div class="container">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "catalog",
                    array(
                        "ROOT_MENU_TYPE" => "catalog",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "36000000",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_THEME" => "site",
                        "CACHE_SELECTED_ITEMS" => "N",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MAX_LEVEL" => "3",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "Y",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N",
                        "COMPONENT_TEMPLATE" => "catalog"
                    ),
                    false,
                    array("HIDE_ICONS" => "Y")
                );?>
            </div>
        </div>
    </div>
    <!--  END  -->
</header>
<!-- Начало приложения  -->
<div class="app-main" role="main">

