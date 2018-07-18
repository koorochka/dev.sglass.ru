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
<!--Blog Detail -->
<section class="no-padding">
    <div class="container">
        <div class="row">
            <div id="primary" class="content-area  col-md-12 no-padding-right padding-bottom-70">
                <main id="main" class="site-main padding-top-0" >
                    <h1><?=$arResult["NAME"]?></h1>
                    <div class="lastest-news-detail">

                        <?if(is_array($arResult["DETAIL_PICTURE"])):?>
                            <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
                                 class="img-responsive"
                                 title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
                                 alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>">
                        <?endif;?>

                        <?=$arResult["DETAIL_TEXT"]?>
                    </div>
                </main>
            </div> <!-- End Col -->
        </div><!-- End Row -->
    </div><!-- End container -->
</section><!--  End Section -->