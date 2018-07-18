<?
$ID = $arResult["SECTION"]["PATH"][0]["ID"];
if($ID > 0){
    $PATH = $arResult["SECTION"]["PATH"];
    $arResult["SECTION"] = CIBlockSection::GetList(
        false,
        array(
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "ID" => $ID
        ),
        false,
        array("DESCRIPTION", "NAME", "ID", "IBLOCK_ID", "UF_DETAIL", "DESCRIPTION_TYPE")
    );
    if($arResult["SECTION"] = $arResult["SECTION"]->GetNext()){
        $arResult["SECTION"] = $arResult["SECTION"];
        $arResult["SECTION"] = array_merge($arResult["SECTION"], array("PATH" => $PATH));
    }
}
?>