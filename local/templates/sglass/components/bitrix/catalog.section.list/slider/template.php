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
if(!empty($arResult["SECTIONS"])):
    $strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
    $strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
    $arSectionDeleteParams = array("CONFIRM" => GetMessage('ELEMENT_DELETE_CONFIRM'));
    $LIST_PAGE_URL = "";
?>
    <section class="padding-top-10 padding-bottom-10">
        <div class="container">
            <div class="overflow-hidden">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title"><?=$arParams["TITLE"]?></h2>
                        <div class="customNavigation">
                            <a class="btn prev-services-3-columns" onclick='<?=$arParams["SLIDER_ID"]?>.trigger("owl.prev");'><i class="fa fa-angle-left"></i></a>
                            <a class="btn next-services-3-columns" onclick='<?=$arParams["SLIDER_ID"]?>.trigger("owl.next");'><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>

                    <div class="warp-owl-services">
                        <div id="<?=$arParams["SLIDER_ID"]?>" class="owl-carousel owl-theme owl-services-3-columns clearfix">
                            <?
                            foreach ($arResult["SECTIONS"] as $arSection):
                                $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                                $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
                                $LIST_PAGE_URL = $arSection["LIST_PAGE_URL"];
                                ?>
                                <div class="item item-services" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
                                    <div class="thumbnail">
                                        <a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="services-3-column-img-container">
                                            <img src="<?=$arSection["PICTURE"]["SRC"]?>"
                                                 alt="<?=$arSection["PICTURE"]["ALT"]?>"
                                                 title="<?=$arSection["PICTURE"]["TITLE"]?>">
                                            <h4><?=$arSection["NAME"]?></h4>
                                        </a>

                                        <div class="caption">
                                            <p><?=$arSection["DESCRIPTION"]?></p>
                                        </div>
                                    </div>
                                </div><!-- end item -->

                            <?endforeach;?>
                        </div> <!--End Owl  -->
                    </div><!-- End Col -->
                </div><!-- End Row -->
            </div>
            <?if(!empty($arParams["ALL_LINK_TEXT"])):?>
                <a href="<?=$LIST_PAGE_URL?>" class="ot-btn large-btn btn-rounded btn-blue-color"><?=$arParams["ALL_LINK_TEXT"]?></a>
            <?endif;?>
        </div> <!-- End Container -->
    </section><!-- End Section -->

    <script>
        // End Owl Project
        var <?=$arParams["SLIDER_ID"]?> = $("#<?=$arParams["SLIDER_ID"]?>").owlCarousel({

            autoPlay: false, //Set AutoPlay to 3 seconds
            items : 3,
            itemsDesktop      : [1199,3],
            itemsDesktopSmall     : [979,3],
            itemsTablet       : [768,2],
            itemsMobile       : [479,1],
            pagination:false,
            navigation:false

        });

    </script>
<?endif;?>