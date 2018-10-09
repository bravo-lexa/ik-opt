<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */
?>

<?APP::Includs()->template('catalog','list.item','', [
    '$arParams' => $arParams ,
    '$item' => $item ,
    '$actualItem' => $actualItem ,
    '$minOffer' => $minOffer ,
    '$itemIds' => $itemIds ,
    '$price' => $price ,
    '$measureRatio' => $measureRatio ,
    '$haveOffers' => $haveOffers ,
    '$showSubscribe' => $showSubscribe ,
    '$morePhoto' => $morePhoto ,
    '$showSlider' => $showSlider ,
    '$imgTitle' => $imgTitle ,
    '$productTitle' => $productTitle ,
    '$buttonSizeClass' => $buttonSizeClass ,
    ]);
?>
