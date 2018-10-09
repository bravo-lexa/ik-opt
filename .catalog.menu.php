<?
//  * Выбираем разжелы катадога
global $APPLICATION;
$aMenuLinksExt = array();

if(CModule::IncludeModule('iblock'))
{
    $aMenuLinksExt = $APPLICATION->IncludeComponent("bitrix:menu.sections", "", array(
        "IS_SEF" => "Y",
        "SEF_BASE_URL" => "",
        "SECTION_PAGE_URL" => '',
        "DETAIL_PAGE_URL" => '',
        "IBLOCK_TYPE" => 'catalog',
        "IBLOCK_ID" => 1,
        "DEPTH_LEVEL" => "3",
        "CACHE_TYPE" => "N",
    ), false, Array('HIDE_ICONS' => 'Y'));
}

$aMenuLinks = Array(
    Array(
        "Оптовикам",
        "/discount/",
        Array(),
        Array(),
        ""
    ),
    Array(
        "Контакты",
        "/contact/",
        Array(),
        Array(),
        ""
    ),
);


//  * Соединяем массивы
$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);
