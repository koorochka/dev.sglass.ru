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
global $sectionMetaTilie;
$sectionMetaTilie = $arResult["SECTION"]["PATH"][0]["IPROPERTY_VALUES"]["SECTION_META_TITLE"];
if(empty($sectionMetaTilie)){
    $sectionMetaTilie = $arResult["SECTION"]["PATH"][0]["NAME"];
}
?>