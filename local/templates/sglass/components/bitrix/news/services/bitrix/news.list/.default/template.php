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
if(count($arResult["SECTION"]["UF_TAB_TITLE"]) > 0):
?>
    <section class="padding-top-10 padding-bottom-20">
        <div class="tab-finance clearfix">
            <ul class="nav nav-tabs">
                <?foreach ($arResult["SECTION"]["UF_TAB_TITLE"] as $key=>$tab):?>
                    <li class="<?=$key?"":"active"?>"><a data-toggle="tab" href="#<?=$key?>" aria-expanded="false"><?=$tab?></a></li>
                <?endforeach;?>
            </ul>

            <div class="tab-content">
                <?foreach ($arResult["SECTION"]["UF_TAB_DESC"] as $key=>$tab):?>
                    <div id="<?=$key?>" class="<?=$key?"tab-pane fade":"tab-pane fade active in"?>"><?=$tab?></div>
                <?endforeach;?>
            </div>
        </div>
    </section>
<?endif;?>
    <!-- List services section -->
    <section class="row padding-top-0 padding-bottom-20">
        <?
        foreach($arResult["ITEMS"] as $k=>$arItem):
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="col-xs-12 col-sm-12 col-md-6 item-services margin-bottom-25"
                 id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="services-3-column-img-container">
                    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                         class="img-responsive"
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
            <?
        endforeach;
        ?>
    </section><!--  End Section -->
<?if(!empty($arResult["SECTION"]["UF_DETAIL"])):?>
    <section class="services-description padding-top-10 padding-bottom-20">
        <?=$arResult["SECTION"]["~UF_DETAIL"]?>
    </section>
<?endif;?>