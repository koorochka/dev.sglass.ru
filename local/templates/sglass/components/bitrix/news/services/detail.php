<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$APPLICATION->AddHeadString(
	// revolution slider
	//'<script src="' . SITE_TEMPLATE_PATH . '/js/jquery.themepunch.plugins.min.js"></script>'
	//. '<script src="' . SITE_TEMPLATE_PATH . '/js/jquery.themepunch.revolution.min.js"></script>'
	// jcarousellite
	'<script src="' . SITE_TEMPLATE_PATH . '/js/jquery.jcarousellite.min.js"></script>'
	// Magnific Popup core
	. '<script src="' . SITE_TEMPLATE_PATH . '/js/jquery.magnific-popup.min.js"></script>'
	. '<link rel="stylesheet" href="' . SITE_TEMPLATE_PATH . '/css/magnific-popup.css">'
);
?>

<section class="padding-top-50">
	<div class="container">
		<div class="row">
			<div class="col-md-3 slidebar">
				<?$APPLICATION->IncludeComponent(
					"bitrix:menu",
					"left",
					array(
						"COMPONENT_TEMPLATE" => ".default",
						"ROOT_MENU_TYPE" => "left",
						"MENU_CACHE_TYPE" => "N",
						"MENU_CACHE_TIME" => "3600",
						"MENU_CACHE_USE_GROUPS" => "Y",
						"MENU_CACHE_GET_VARS" => array(
						),
						"MAX_LEVEL" => "1",
						"CHILD_MENU_TYPE" => "left",
						"USE_EXT" => "Y",
						"DELAY" => "N",
						"ALLOW_MULTI_SELECT" => "N"
					),
					false
				);?>
			</div>  <!-- End col slidebar -->
			<div class="col-md-9 services-detail-content">
				<?$ElementID = $APPLICATION->IncludeComponent(
					"bitrix:news.detail",
					"revolution",
					Array(
						"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
						"DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
						"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
						"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
						"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
						"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
						"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
						"META_KEYWORDS" => $arParams["META_KEYWORDS"],
						"META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
						"BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
						"SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
						"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
						"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
						"SET_TITLE" => $arParams["SET_TITLE"],
						"MESSAGE_404" => $arParams["MESSAGE_404"],
						"SET_STATUS_404" => $arParams["SET_STATUS_404"],
						"SHOW_404" => $arParams["SHOW_404"],
						"FILE_404" => $arParams["FILE_404"],
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N", //$arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
						"ADD_SECTIONS_CHAIN" => "N", //$arParams["ADD_SECTIONS_CHAIN"],
						"ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
						"CACHE_TIME" => $arParams["CACHE_TIME"],
						"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
						"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
						"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
						"DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
						"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
						"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
						"PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
						"CHECK_DATES" => $arParams["CHECK_DATES"],
						"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
						"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
						"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
						"USE_SHARE" => $arParams["USE_SHARE"],
						"SHARE_HIDE" => $arParams["SHARE_HIDE"],
						"SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
						"SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
						"SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
						"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
						"ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : '')
					),
					$component
				);?>
				<p class="margin-top-25"><a href="<?=$arResult["FOLDER"].str_replace("#SECTION_CODE#", $arResult["VARIABLES"]["SECTION_CODE"], $arResult["URL_TEMPLATES"]["section"])?>"
					  class="btn btn-default">&larr;&nbsp;<?=GetMessage("T_NEWS_DETAIL_BACK")?></a></p>
			</div>
		</div>
	</div>
</section>

<?
/**
 * Component Get a Call Back
 */
global $ElementName, $ElementMetaTitle;
$APPLICATION->IncludeComponent(
    "koorochka:order.form",
    "",
    array(
        "USE_CAPTCHA" => "N",
        "TITLE" => $arParams["ORDER_FORM_TITLE"],
        "DESCRIPTION" => $arParams["ORDER_FORM_DESCRIPTION"],
        "OK_TEXT" => "Спасибо, ваша заявка принята. В ближайшее время мы с вами свяжемся!",
        "EMAIL_TO" => "ajoq@ya.ru",
        "IBLOCK_ELEMENT_ID" => $ElementID,
        "IBLOCK_ELEMENT_NAME" => $ElementName,
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "FORM" => "order-form",
        "PAGE" => $APPLICATION->GetCurPage(false),
        "REQUIRED_FIELDS" => array(
            0 => "NAME",
            1 => "EMAIL",
            2 => "PHONE",
            3 => "AGREE"
        ),
        "EVENT_MESSAGE_ID" => array(
            0 => "11",
        ),
        "AJAX_MODE" => "Y",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => "N"
    ),
    false
);
?>


<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	".default",
	array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => "/inc/services_detail.php",
		"EDIT_TEMPLATE" => ""
	),
	false
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "equipment",
    Array(
        "ALL_LINK_TEXT" => "Весь список оборудования",
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => "3",
        "NEWS_COUNT" => "100",
        "SORT_BY1" => "sort",
        "SORT_ORDER1" => "asc",
        "SORT_BY2" => "sort",
        "SORT_ORDER2" => "asc",
        "FILTER_NAME" => "",
        "FIELD_CODE" => array("NAME", "PREVIEW_PICTURE"),
        "PROPERTY_CODE" => array(),
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_FILTER" => $arParams["CACHE_FILTER"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "PREVIEW_TRUNCATE_LEN" => "",
        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_STATUS_404" => "N",
        "SHOW_404" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "INCLUDE_SUBSECTIONS" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "N",
    ),
    $component
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "portfolio",
    Array(
        "ALL_LINK_TEXT" => "Весь список работ",
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => "4",
        "NEWS_COUNT" => "100",
        "SORT_BY1" => "sort",
        "SORT_ORDER1" => "asc",
        "SORT_BY2" => "sort",
        "SORT_ORDER2" => "asc",
        "FILTER_NAME" => "",
        "FIELD_CODE" => array("NAME", "PREVIEW_PICTURE"),
        "PROPERTY_CODE" => array(),
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_FILTER" => $arParams["CACHE_FILTER"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "PREVIEW_TRUNCATE_LEN" => "",
        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_STATUS_404" => "N",
        "SHOW_404" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "INCLUDE_SUBSECTIONS" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "N",
    ),
    $component
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "block.grey",
    array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_RECURSIVE" => "Y",
        "COMPONENT_TEMPLATE" => ".default",
        "PATH" => "/inc/footer/consalting.php",
        "EDIT_MODE" => "text"
    ),
    false,
    Array('HIDE_ICONS' => 'Y')
);?>

<?$APPLICATION->IncludeComponent(
    "koorochka:consalting.form",
    "",
    array(
        "USE_CAPTCHA" => "N",
        "TITLE" => "Запрос на консультацию",
        "OK_TEXT" => "В ближайшее время мы с вами свяжемся!",
        "EMAIL_TO" => "ajoq@ya.ru",
        "FORM" => "consalting-modal",
        "PAGE" => $APPLICATION->GetCurPage(false),
        "REQUIRED_FIELDS" => array(
            0 => "NAME",
            1 => "PHONE",
            2 => "AGREE"
        ),
        "EVENT_MESSAGE_ID" => array(
            0 => "12",
        )
    ),
    false
);?>

<?
$APPLICATION->IncludeComponent(
	"koorochka:add.question",
	"",
	array(
		"USE_CAPTCHA" => "N",
		"TITLE" => "Напишите нам",
		"OK_TEXT" => "Спасибо за вопрос. В ближайшее время мы с вами свяжемся!",
		"EMAIL_TO" => "ajoq@ya.ru",
		"IBLOCK_ELEMENT_ID" => $ElementID,
		"IBLOCK_ELEMENT_NAME" => $ElementName,
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"FORM" => "add-question",
		"REQUIRED_FIELDS" => array(
			0 => "NAME",
			1 => "EMAIL",
            2 => "AGREE"
		),
		"EVENT_MESSAGE_ID" => array(
			0 => "9",
		),
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "undefined"
	),
	false
);?>

<?
/**
  * <script src="http://templates.thememodern.com/finance/js/plugins/custom-owl.js"></script>
  */
//$APPLICATION->SetPageProperty("title", $ElementMetaTitle);
$APPLICATION->SetTitle($ElementMetaTitle);
?>