<?
/**
 * More photo
 * @var array $arResult
 */
$arResult["MORE_PHOTO"] = array();

if(is_array($arResult["DETAIL_PICTURE"]))
{
    $arResult["DETAIL_PICTURE"] = $arResult["DETAIL_PICTURE"];
    #$arResult["DETAIL_PICTURE"] = correct_photo($arResult["DETAIL_PICTURE"]);
    $arResult["MORE_PHOTO"][] = $arResult["DETAIL_PICTURE"];
}

if(count($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]["VALUE"]) == 1)
{
    $arResult["MORE_PHOTO"][] = $arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]["FILE_VALUE"];
}
elseif(count($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]["VALUE"]) > 1)
{
    foreach ($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]["FILE_VALUE"] as $photo)
    {
        $arResult["MORE_PHOTO"][] = $photo;
        #$arResult["MORE_PHOTO"][] = correct_photo($photo);
    }
}

unset($arResult["PROPERTIES"]["MORE_PHOTO"]);
unset($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]);

/**
 * @param $photo
 * @return mixed
 */
function correct_photo($photo)
{
    $result = $photo;
    if($photo["HEIGHT"] > $photo["WIDTH"])
    {
        $file = CFile::ResizeImageGet(
            $photo["ID"],
            array(
                "width" => 855,
                "height" => 400
            ),
            BX_RESIZE_IMAGE_EXACT,
            true
        );
        $result["SRC"] = $file["src"];
        $result["HEIGHT"] = $file["height"];
        $result["WIDTH"] = $file["width"];
    }
    return $result;
}

$arResult["SECTION"] = CIBlockSection::GetList(
    false,
    array(
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "ID" => $arResult["IBLOCK_SECTION_ID"]
    ),
    false,
    array("DESCRIPTION", "NAME", "SECTION_PAGE_URL")
);
if($arResult["SECTION"] = $arResult["SECTION"]->GetNext()){
    $arResult["SECTION"] = $arResult["SECTION"];
}
?>