<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true ) die(); ?>
<?
    use Bitrix\Main\Localization\Loc;
    Loc::loadMessages(__FILE__);

    $TEMPLATE["standard.php"] = Array(
        "name" => Loc::getMessage("standart"),
        "sort" => 1
    );
?>
