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
$column = 3;
if(!empty($arResult["SECTIONS"])):
?>
    <!-- List services section -->
    <section class="padding-top-50 padding-bottom-20">
        <div class="services-wrap">
            <div class="services-list-contain">
                <?
                foreach ($arResult["SECTIONS"] as $k=>$arSection):
                    ?>
                    <div class="item-services<?
                    if($k){
                        if($k%$column == 0){
                            echo " item-services-last";
                        }
                    }
                    ?>"
                         id="<?=$this->GetEditAreaId($arSection['ID']);?>">

                        <div class="thumbnail">
                            <a href="<?=$arSection["SECTION_PAGE_URL"]?>"
                               class="services-<?=$column?>-column-img-container">
                                <img src="<?=$arSection["PICTURE"]["SRC"]?>"
                                     width="<?=$arSection["PICTURE"]["WIDTH"]?>"
                                     height="<?=$arSection["PICTURE"]["HEIGHT"]?>"
                                     alt="<?=$arSection["PICTURE"]["ALT"]?>"
                                     title="<?=$arSection["PICTURE"]["TITLE"]?>">
                                <h4><?=$arSection["NAME"]?></h4>
                            </a>

                            <div class="caption">
                                <p><?=$arSection["DESCRIPTION"]?></p>
                            </div>
                        </div>

                    </div>
                <?endforeach;?>
            </div>
        </div><!--  End col -->
    </section><!--  End Section -->
<?endif;?>