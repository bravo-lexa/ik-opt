<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><?
$arUrlRewrite = array(
    array(
        "CONDITION" => "#^/news/#",
        "RULE" => "",
        "ID" => "bitrix:news",
        "PATH" => "/news/index.php",
    ),
);

?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>