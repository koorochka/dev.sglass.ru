<?
/**
 * Need to cache
 * Get all sections for isotop
 */
$arResult["SECTIONS"] = array();
$sections = \Bitrix\Iblock\SectionTable::getList(array(
    "filter" => array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"]
    ),
    "select" => array(
        "ID",
        "NAME"
    )
));
while ($section = $sections->fetch())
{
    $arResult["SECTIONS"][$section["ID"]] = $section;
}
/**
 * Need to cache
 * Element sections for isotop
 */
foreach($arResult["ITEMS"] as $k=>$arItem)
{
    $arResult["ITEMS"][$k]["SECTIONS"] = array();
    $sections = \Bitrix\Iblock\SectionElementTable::getList(array(
        "filter" => array(
            "IBLOCK_ELEMENT_ID" => $arItem["ID"]
        )
    ));
    while ($section = $sections->fetch())
    {
        $section = array_merge($arResult["SECTIONS"][$section["IBLOCK_SECTION_ID"]], $section);
        $arResult["ITEMS"][$k]["SECTIONS"][] = $section;
    }
}
?>