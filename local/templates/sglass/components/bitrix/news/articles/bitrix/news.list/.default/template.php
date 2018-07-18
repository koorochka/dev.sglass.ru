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
use Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
?>
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<div class="margin-bottom-10"><?=$arResult["NAV_STRING"]?></div>
<?endif;?>
<?
foreach($arResult["ITEMS"] as $arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<article class="item-lastest-news itemBlogList" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><h3 class="title-news"><?=$arItem["NAME"]?></h3></a>
			<p><?=$arItem["PREVIEW_TEXT"]?></p>

			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=Loc::getMessage("READ_MORE")?> <i class="fa fa-arrow-right"></i></a>

		<div class="clearfix"></div>
	</article>
<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<div class="margin-top-10"><?=$arResult["NAV_STRING"]?></div>
<?endif;?>
