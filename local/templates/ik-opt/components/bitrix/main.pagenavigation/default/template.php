<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

/** @var PageNavigationComponent $component */
$component = $this->getComponent();

$this->setFrameMode(true);

$colorSchemes = array(
	"green" => "bx-green",
	"yellow" => "bx-yellow",
	"red" => "bx-red",
	"blue" => "bx-blue",
);
if(isset($colorSchemes[$arParams["TEMPLATE_THEME"]]))
{
	$colorScheme = $colorSchemes[$arParams["TEMPLATE_THEME"]];
}
else
{
	$colorScheme = "";
}
?>


<div class="pagination">
    <a href="" class="pagination__back">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 26 26" version="1.1">
            <g id="surface1">
                <path style=" " d="M 10.59375 13 L 19.179688 4.234375 C 19.5625 3.84375 19.558594 3.21875 19.171875 2.828125 L 17.636719 1.292969 C 17.242188 0.902344 16.609375 0.902344 16.21875 1.296875 L 5.292969 12.292969 C 5.097656 12.488281 5 12.742188 5 13 C 5 13.257813 5.097656 13.511719 5.292969 13.707031 L 16.21875 24.703125 C 16.609375 25.097656 17.242188 25.097656 17.636719 24.707031 L 19.171875 23.171875 C 19.558594 22.78125 19.5625 22.15625 19.179688 21.765625 Z "></path>
            </g>
        </svg>
        Предыдущая
    </a>
    <a href="" title="">1</a>
    <a href="" title="">2</a>
    <span>3</span>
    <a href="" title="">3</a>
    <a href="" class="pagination__next">Следующая
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 26 26" version="1.1">
            <g id="surface1">
                <path style=" " d="M 11.414063 3.585938 L 8.585938 6.414063 L 15.171875 13 L 8.585938 19.585938 L 11.414063 22.414063 L 20.828125 13 Z "></path>
            </g>
        </svg>
    </a>
</div>
11
<div class="pagination <?=$colorScheme?>">
    <ul>
        <?if($arResult["REVERSED_PAGES"] === true):?>

            <?if ($arResult["CURRENT_PAGE"] < $arResult["PAGE_COUNT"]):?>
                <?if (($arResult["CURRENT_PAGE"]+1) == $arResult["PAGE_COUNT"]):?>
                    <li class="pagination__prev"><a href="<?=htmlspecialcharsbx($arResult["URL"])?>"><span><?echo GetMessage("round_nav_back")?></span></a></li>
                <?else:?>
                    <li class="pagination__prev"><a href="<?=htmlspecialcharsbx($component->replaceUrlTemplate($arResult["CURRENT_PAGE"]+1))?>"><span><?echo GetMessage("round_nav_back")?></span></a></li>
                <?endif?>
                    <li class=""><a href="<?=htmlspecialcharsbx($arResult["URL"])?>"><span>1</span></a></li>
            <?else:?>
                <li class="pagination__prev"><span><?echo GetMessage("round_nav_back")?></span></li>
                <li class="is-active"><span>1</span></li>
            <?endif?>

            <?
            $page = $arResult["START_PAGE"] - 1;
            while($page >= $arResult["END_PAGE"] + 1):
            ?>
                <?if ($page == $arResult["CURRENT_PAGE"]):?>
                    <li class="is-active"><span><?=($arResult["PAGE_COUNT"] - $page + 1)?></span></li>
                <?else:?>
                    <li class=""><a href="<?=htmlspecialcharsbx($component->replaceUrlTemplate($page))?>"><span><?=($arResult["PAGE_COUNT"] - $page + 1)?></span></a></li>
                <?endif?>

                <?$page--?>
            <?endwhile?>

            <?if ($arResult["CURRENT_PAGE"] > 1):?>
                <?if($arResult["PAGE_COUNT"] > 1):?>
                    <li class=""><a href="<?=htmlspecialcharsbx($component->replaceUrlTemplate(1))?>"><span><?=$arResult["PAGE_COUNT"]?></span></a></li>
                <?endif?>
                    <li class="pagination__next"><a href="<?=htmlspecialcharsbx($component->replaceUrlTemplate($arResult["CURRENT_PAGE"]-1))?>"><span><?echo GetMessage("round_nav_forward")?></span></a></li>
            <?else:?>
                <?if($arResult["PAGE_COUNT"] > 1):?>
                        <li class="is-active"><span><?=$arResult["PAGE_COUNT"]?></span></li>
                    <?endif?>
                        <li class="pagination__next"><span><?echo GetMessage("round_nav_forward")?></span></li>
                <?endif?>

            <?else:?>

                <?if ($arResult["CURRENT_PAGE"] > 1):?>
                    <?if ($arResult["CURRENT_PAGE"] > 2):?>
                        <li class="pagination__prev"><a href="<?=htmlspecialcharsbx($component->replaceUrlTemplate($arResult["CURRENT_PAGE"]-1))?>"><span><?echo GetMessage("round_nav_back")?></span></a></li>
                    <?else:?>
                        <li class="pagination__prev"><a href="<?=htmlspecialcharsbx($arResult["URL"])?>"><span><?echo GetMessage("round_nav_back")?></span></a></li>
                    <?endif?>
                        <li class=""><a href="<?=htmlspecialcharsbx($arResult["URL"])?>"><span>1</span></a></li>
                <?else:?>
                        <li class="pagination__prev"><span><?echo GetMessage("round_nav_back")?></span></li>
                        <li class="is-active"><span>1</span></li>
                <?endif?>

                <?
                $page = $arResult["START_PAGE"] + 1;
                while($page <= $arResult["END_PAGE"]-1):
                ?>
                    <?if ($page == $arResult["CURRENT_PAGE"]):?>
                        <li class="is-active"><span><?=$page?></span></li>
                    <?else:?>
                        <li class=""><a href="<?=htmlspecialcharsbx($component->replaceUrlTemplate($page))?>"><span><?=$page?></span></a></li>
                    <?endif?>
                    <?$page++?>
                <?endwhile?>

                <?if($arResult["CURRENT_PAGE"] < $arResult["PAGE_COUNT"]):?>
                    <?if($arResult["PAGE_COUNT"] > 1):?>
                        <li class=""><a href="<?=htmlspecialcharsbx($component->replaceUrlTemplate($arResult["PAGE_COUNT"]))?>"><span><?=$arResult["PAGE_COUNT"]?></span></a></li>
                    <?endif?>
                        <li class="pagination__next"><a href="<?=htmlspecialcharsbx($component->replaceUrlTemplate($arResult["CURRENT_PAGE"]+1))?>"><span><?echo GetMessage("round_nav_forward")?></span></a></li>
                <?else:?>
                    <?if($arResult["PAGE_COUNT"] > 1):?>
                        <li class="is-active"><span><?=$arResult["PAGE_COUNT"]?></span></li>
                    <?endif?>
                        <li class="pagination__next"><span><?echo GetMessage("round_nav_forward")?></span></li>
                <?endif?>
        <?endif?>
        <?if ($arResult["SHOW_ALL"]):?>
            <?if ($arResult["ALL_RECORDS"]):?>
            <li class="pagination__all"><a href="<?=htmlspecialcharsbx($arResult["URL"])?>" rel="nofollow"><span><?echo GetMessage("round_nav_pages")?></span></a></li>
        <?else:?>
            <li class="pagination__all"><a href="<?=htmlspecialcharsbx($component->replaceUrlTemplate("all"))?>" rel="nofollow"><span><?echo GetMessage("round_nav_all")?></span></a></li>
        <?endif?>
        <?endif?>
    </ul>
</div>
