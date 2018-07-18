<?
/**
 * More photo
 * @var array $arResult
 */
$arResult["MORE_PHOTO"] = array();

if(is_array($arResult["DETAIL_PICTURE"]))
{
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
        $photo["PREVIEW"] = CFile::ResizeImageGet(
            $photo["ID"],
            array(
                "width" => 200,
                "height" => 200
            ),
            BX_RESIZE_IMAGE_EXACT,
            false
        );
        $arResult["MORE_PHOTO"][] = $photo;
    }
}

unset($arResult["PROPERTIES"]["MORE_PHOTO"]);
unset($arResult["DISPLAY_PROPERTIES"]["MORE_PHOTO"]);
?>