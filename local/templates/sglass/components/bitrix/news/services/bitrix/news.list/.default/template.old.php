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
?>
<section id="services-description" class="padding-top-0 padding-bottom-20">
    <?
    if($arResult["SECTION"]["PATH"][0]["DESCRIPTION_TYPE"] == "text")
        echo $arResult["SECTION"]["PATH"][0]["DESCRIPTION"];
    else
        echo $arResult["SECTION"]["PATH"][0]["~DESCRIPTION"];
    ?>
</section>

<!-- List services section -->
<section class="padding-top-0 padding-bottom-20">
    <div class="row">
        <div class="services-wrap">
            <div class="services-list-contain">
                <?
                foreach($arResult["ITEMS"] as $k=>$arItem):
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="item-services" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <div class="thumbnail">
                            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"
                               class="services-3-column-img-container">
                                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                                     width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
                                     height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
                                     alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                                     title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>">
                                <h4><?=$arItem["NAME"]?></h4>
                            </a>

                            <div class="caption">
                                <p><?=$arItem["PREVIEW_TEXT"]?></p>
                            </div>
                        </div>
                    </div>
                    <?
                endforeach;
                ?>
            </div>
        </div><!--  End col -->
    </div><!-- End Row -->
</section><!--  End Section -->