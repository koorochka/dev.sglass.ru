<?
use Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->addExternalJs(SITE_TEMPLATE_PATH . "/js/owl.carousel.js");
$this->addExternalCss(SITE_TEMPLATE_PATH . "/css/");
if(!empty($arResult["ITEMS"])):
?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title"><?=$arResult["NAME"]?></h2>
                    <div class="row clearfix visible-xs visible-sm visible-md visible-lg">
                        <?foreach($arResult["ITEMS"] as $k=>$arItem):
                            $this->AddEditAction($arItem ['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>
                                <div class="col-md-3 item item-experts text-center" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                                    <div class="expert-img-container">
                                        <div class="avatar">
                                            <img src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>"
                                                 class="img-responsive"
                                                 title="<?=$arItem["DETAIL_PICTURE"]["TITLE"]?>"
                                                 alt="<?=$arItem["DETAIL_PICTURE"]["ALT"]?>">
                                        </div>
                                    </div> <!-- end expert img container -->


                                    <div class="clearfix"></div>
                                    <h4 class=""><?=$arItem["NAME"]?></h4>
                                    <p class="job-experts"><?=$arItem["CODE"]?></p>
                                </div><!-- end item -->
                        <?endforeach;?>
                    </div> <!-- End owl container -->
                </div> <!-- End col -->
            </div><!-- End row -->
        </div>
    </section>

<?endif;?>