<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости ");
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"breadcrumbs", 
	array(
		"PATH" => "",
		"SITE_ID" => "s1",
		"START_FROM" => "1",
		"COMPONENT_TEMPLATE" => "breadcrumbs"
	),
	false
);?>
<div class="news container-fluid">
    <div class="container">
        <div class="container-main">
            <div class="container-main-aside">
                <div class="aside">
                    <div class="aside__menu">
                        <a class="aside__menu__btn-back" href="/admin/" title="Назад">
                            <i class="icon icon-arrow-left"></i>
                            <span>Назад</span>
                        </a>
                        <div class="aside__menu__title"><span>Меню</span></div>
                        <ul class="aside__menu__list">
                            <li>
                                <a href="/admin/infoblock/element/1" title="" class="">
                                    <i class="icon icon-chevron-right"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/infoblock/element/2" title="" class="">
                                    <i class="icon icon-chevron-right"></i>
                                    <span>2</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/infoblock/element/3" title="" class="">
                                    <i class="icon icon-chevron-right"></i>
                                    <span>3</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container-main-content">
                <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"news", 
	array(
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "#SITE_DIR#/news/#ELEMENT_CODE#/",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "2",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "round",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "news"
	),
	false
);?>
            </div>
        </div>
    </div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>