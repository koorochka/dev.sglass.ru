<?
use Bitrix\Iblock\SectionTable;
$obCache = new CPHPCache();
if ($obCache->InitCache($arParams["CACHE_TIME"], false, "/koorochaka/equipment"))
{
    $arSections = $obCache->GetVars();
}
elseif ($obCache->StartDataCache())
{
    $arRubrics = array();
    if(defined("BX_COMP_MANAGED_CACHE"))
    {
        // get data
        $arSections = array();
        $sections = SectionTable::getList(array(
            "order" => array("SORT" => "ASC"),
            "filter" => array(
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "ACTIVE" => "Y"
            ),
            "select" => array("ID", "NAME", "CODE", "SORT")
        ));
        while ($section = $sections->fetch())
        {
            $section["SECTION_URL"] = str_replace("#SECTION_CODE#", $section["CODE"], $arParams["SECTION_URL"]);
            $arSections[$section["ID"]] = $section;
        }
        // set data to cache
        global $CACHE_MANAGER;
        $CACHE_MANAGER->StartTagCache("/koorochaka/equipment");

        if (!empty($arSections))
            $CACHE_MANAGER->RegisterTag("/koorochaka/equipment");
        $CACHE_MANAGER->EndTagCache();
    }
    $obCache->EndDataCache($arSections);
}

$arResult["SECTIONS"] = $arSections;
/*
foreach($arResult["ITEMS"] as $arItem)
{
    $arResult["SECTIONS"][$arItem["IBLOCK_SECTION_ID"]] = array(
        "ID" => $arItem["IBLOCK_SECTION_ID"],
        "NAME" => $arSections[$arItem["IBLOCK_SECTION_ID"]]["NAME"],
        "SECTION_URL" => $arSections[$arItem["IBLOCK_SECTION_ID"]]["SECTION_URL"]
    );
}
*/
?>