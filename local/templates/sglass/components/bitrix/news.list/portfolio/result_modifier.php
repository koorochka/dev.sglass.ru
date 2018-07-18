<?
/**
 * @var array $arResult
 * @var array $arParams
 */
$arParams["RESIZE"] = array(
    "width" => 300,
    "height" => 300
);
$file = array();
foreach($arResult["ITEMS"] as $k=>$arItem){
    if(is_array($arItem["PREVIEW_PICTURE"])){
        $file = CFile::ResizeImageGet(
            $arItem["PREVIEW_PICTURE"]["ID"],
            $arParams["RESIZE"],
            BX_RESIZE_IMAGE_EXACT,
            true
        );
        $arItem["PREVIEW_PICTURE"]["SRC"] = $file["src"];
        $arItem["PREVIEW_PICTURE"]["WIDTH"] = $file["width"];
        $arItem["PREVIEW_PICTURE"]["HEIGHT"] = $file["height"];
        $arResult["ITEMS"][$k]["PREVIEW_PICTURE"] = $arItem["PREVIEW_PICTURE"];
    }else{
        unset($arResult["ITEMS"][$k]);
    }
        unset($arResult["ITEMS"][$k]["FIELDS"]);
}
?>