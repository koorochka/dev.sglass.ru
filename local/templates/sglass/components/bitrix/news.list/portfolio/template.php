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
<section class="padding-top-55 padding-bottom-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title"><?=Loc::getMessage("PORTFOLIO_TITLE")?></h2>

                <div class="customNavigation">
                    <a class="btn prev-project" onclick='owlProject.trigger("owl.prev");'><i class="fa fa-angle-left"></i></a>
                    <a class="btn next-project" onclick='owlProject.trigger("owl.next");'><i class="fa fa-angle-right"></i></a>
                </div><!-- End owl button -->

                <div id="owl-project" class="owl-carousel owl-theme  owl-project clearfix">
                    <?foreach($arResult["ITEMS"] as $k=>$arItem):
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                            <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                                 class="img-responsive"
                                 title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                                 alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>">
                            <h5 class="title-project"><?=$arItem["NAME"]?></h5>
                        </a>
                    </div>
                <?endforeach;?>
                </div> <!--End Owl  -->
            </div><!-- End Col -->
            <?if(!empty($arParams["ALL_LINK_TEXT"])):?>
                <div class="col-md-12">
                    <a href="<?=$arResult["LIST_PAGE_URL"]?>" class="ot-btn large-btn btn-rounded btn-blue-color"><?=$arParams["ALL_LINK_TEXT"]?></a>
                </div>
            <?endif;?>
        </div><!-- End Row -->
    </div> <!-- End Container -->
</section><!-- End Section -->

<script>
    // End Owl Project
    $("#owl-project").owlCarousel({

        autoPlay: false, //Set AutoPlay to 3 seconds
        items : 4,
        itemsDesktop      : [1199,4],
        itemsDesktopSmall     : [979,3],
        itemsTablet       : [768,2],
        itemsMobile       : [479,1],
        pagination:false,
        navigation:false

    });
    var owlProject = $("#owl-project");
    // Custom Navigation Events
</script>
<?endif;?>