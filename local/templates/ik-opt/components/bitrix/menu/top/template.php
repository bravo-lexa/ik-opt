<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true ) die();?>
<? $this->setFrameMode( true ); ?>
<?
    // *
?>
<?if( !empty( $arResult ) ){?>
    <div class="header__top__menu">
        <ul data-js-resize="header-menu-top" data-width="md">
            <?foreach( $arResult as $key => $arItem ){?>
                <li <?if( $arItem["SELECTED"] ):?> class="is-active" <?endif?>><a href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>"><span><?=$arItem["TEXT"]?></span></a></li>
            <?}?>
	    </ul>
    </div>
<?}?>