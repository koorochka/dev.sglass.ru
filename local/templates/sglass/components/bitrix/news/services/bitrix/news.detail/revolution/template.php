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
<?if(!empty($arResult["SECTION"]["DESCRIPTION"])):?>
    <section id="services-description" class="padding-top-0 padding-bottom-20">
        <?=$arResult["SECTION"]["DESCRIPTION"]?>
    </section>
<?endif;?>

<?if(!empty($arResult["MORE_PHOTO"])):?>
	<div class="zoom-gallery">
		<?if(count($arResult["MORE_PHOTO"]) > 1):?>
			<div class="slider clearfix">
				<div class="tp-leftarrow tparrows default preview4 hashoveralready hidearrows"><div class="tp-arr-allwrapper"></div></div>
				<div class="tp-rightarrow tparrows default preview4 hashoveralready hidearrows"><div class="tp-arr-allwrapper"></div></div>
				<div class="fullwidthbanner-container">
					<div id="more-photo-slider">
						<ul>
							<?foreach ($arResult["MORE_PHOTO"] as $photo):?>
								<li data-transition="boxfade"
									data-thumb="<?=$photo["SRC"]?>">
									<a class="img-gallery-contain"
									   href="<?=$photo["SRC"]?>"><img src="<?=$photo["SRC"]?>"
										 width="<?=$photo["WIDTH"]?>"
										 height="<?=$photo["HEIGHT"]?>"
										 alt="<?=$photo["DESCRIPTION"]?>"
										 title="<?=$photo["DESCRIPTION"]?>"></a>
								</li>
							<?endforeach;?>
						</ul>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		<?else:?>
            <div id="more-photo-slider">
			<a class="img-gallery-contain"
			   href="<?=$arResult["MORE_PHOTO"][0]["SRC"]?>"
			   title="<?=$arResult["NAME"]?>"><img src="<?=$arResult["MORE_PHOTO"][0]["SRC"]?>"
												   width="<?=$arResult["MORE_PHOTO"][0]["WIDTH"]?>"
												   height="<?=$arResult["MORE_PHOTO"][0]["EIGHT"]?>"
												   class="img-responsive img-header-detail"
												   title="<?=$arResult["MORE_PHOTO"][0]["TITLE"]?>"
												   alt="<?=$arResult["MORE_PHOTO"][0]["ALT"]?>"></a>
        </div>
		<?endif;?>
	</div>
<?endif;?>

	<div class="h-block">
		<div class="row">
			<div class="col-xs-12">
                <div class="brochures-download text-center pull-right">
                    <button type="button"
                            data-toggle="modal" data-target="#add-question"
                            class="btn btn-success"><?=GetMessage("SERVICE_ADD_QWESTION")?></button>
                </div>
				<p><?=$arResult["DETAIL_TEXT"]?></p>
			</div>
		</div><!-- End row -->
	</div><!-- End H-block -->