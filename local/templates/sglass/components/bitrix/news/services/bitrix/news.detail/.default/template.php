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

<h1><?=$arResult["NAME"]?></h1>

<?if(is_array($arResult["MORE_PHOTO"])):?>
	<div class="zoom-gallery">
		<?if(count($arResult["MORE_PHOTO"]) > 1):?>
			<div class="slider clearfix">
				<div class="fullwidthbanner-container">
					<div id="more-photo-slider">
						<ul>
							<?foreach ($arResult["MORE_PHOTO"] as $photo):?>
								<li data-transition="boxfade"
									data-thumb="<?=$photo["SRC"]?>">
									<a class="img-gallery-contain"
									   href="<?=$photo["SRC"]?>"
									   title="<?=$photo["TITLE"]?>"><img src="<?=$photo["SRC"]?>"
										 width="<?=$photo["WIDTH"]?>"
										 height="<?=$photo["HEIGHT"]?>"
										 alt="<?=$photo["ALT"]?>"
										 title="<?=$photo["TITLE"]?>"></a>
								</li>
							<?endforeach;?>
						</ul>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		<?else:?>
			<a class="img-gallery-contain"
			   href="<?=$arResult["MORE_PHOTO"][0]["SRC"]?>"
			   title="<?=$arResult["NAME"]?>"><img src="<?=$arResult["MORE_PHOTO"][0]["SRC"]?>"
												   width="<?=$arResult["MORE_PHOTO"][0]["WIDTH"]?>"
												   height="<?=$arResult["MORE_PHOTO"][0]["EIGHT"]?>"
												   class="img-responsive img-header-detail"
												   title="<?=$arResult["MORE_PHOTO"][0]["TITLE"]?>"
												   alt="<?=$arResult["MORE_PHOTO"][0]["ALT"]?>"></a>
		<?endif;?>
	</div>
<?endif;?>

	<div class="h-block">
		<div class="row">
			<div class="col-sm-6 col-md-8 left-hblock">
				<p><?=$arResult["PREVIEW_TEXT"]?></p>
			</div>
			<div class="col-sm-6 col-md-4 right-hblock">
				<div class="brochures-download text-center">
					<button type="button" class="btn btn-success"><?=GetMessage("SERVICE_ADD_QWESTION")?></button>
				</div>
			</div>
		</div><!-- End row -->
	</div><!-- End H-block -->
<?=$arResult["DETAIL_TEXT"]?>