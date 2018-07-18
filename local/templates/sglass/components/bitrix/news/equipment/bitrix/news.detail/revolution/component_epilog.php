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
global $ElementName, $ElementMetaTitle, $APPLICATION;

$APPLICATION->SetTitle($arResult["NAME"]);
$ElementName = $arResult["NAME"];
$ElementMetaTitle = $arResult["IPROPERTY_VALUES"]["ELEMENT_META_TITLE"];
if(empty($ElementMetaTitle))
{
    $ElementMetaTitle = $arResult["NAME"];
}
?>
