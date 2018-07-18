<?
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
use Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);
if(!empty($arResult)):
?>
<ul class="list-group left-menu">

    <li class="hidden-md hidden-lg">
        <a onclick="leftMenu.mobileToggle()" class="list-group-item list-group-item-success">
            <?=Loc::getMessage("MENU_CATALOG_TITLE")?>
            <i class="fa fa-angle-down pull-right"></i>
        </a>
    </li>

    <div id="sidebar-menu-items" class="hidden-xs hidden-sm">
	<?
	$previousLevel = 0;
	foreach($arResult as $arItem):
	if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel)
		echo str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));
	?>

		<?if ($arItem["IS_PARENT"]):?>
			<?if($arItem["SELECTED"]):?>
			<li class="active-list">
				<a href="<?=$arItem["LINK"]?>"
                   onclick="return leftMenu.parent(this)"
                   class="list-group-item active">
					<?=$arItem["TEXT"]?>
					<i class="fa fa-angle-down pull-right"></i>
				</a>
			<?else:?>
			<li>
				<a href="<?=$arItem["LINK"]?>"
                   onclick="return leftMenu.parent(this)"
                   class="list-group-item">
					<?=$arItem["TEXT"]?>
					<i class="fa fa-angle-right pull-right"></i>
				</a>
			<?endif;?>
				<ul>
		<?else:?>
			<?if($arItem["SELECTED"]):?>
				<li><a href="<?=$arItem["LINK"]?>" class="<?=$arItem["DEPTH_LEVEL"] > 1 ? "" : "list-group-item"?> active"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
				<li><a href="<?=$arItem["LINK"]?>" class="<?=$arItem["DEPTH_LEVEL"] > 1 ? "" : "list-group-item"?>"><?=$arItem["TEXT"]?></a></li>
			<?endif;?>
		<?endif?>



    <?
		$previousLevel = $arItem["DEPTH_LEVEL"];
		endforeach;
		if ($previousLevel > 1)
			echo str_repeat("</ul></li>", ($previousLevel-1) );
	?>
    </div>
</ul>
<?endif;?>