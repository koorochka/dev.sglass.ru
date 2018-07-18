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
<div class="projectDetail">
	<div class="col-md-6">
		<?=$arResult["DETAIL_TEXT"]?>
	</div> <!-- End col -->
	<div class="col-md-6">
		<?if(!empty($arResult["MORE_PHOTO"])):?>
			<div class="zoom-gallery">
				<?foreach ($arResult["MORE_PHOTO"] as $k=>$file):?>
					<a class="<?=$k%2?"img-gallery-contain":"img-gallery-contain pull-right"?>"
					   href="<?=$file["SRC"]?>"
					   data-source="<?=$file["SRC"]?>"
					   title="<?=$file["SRC"]?>">
						<?if($k):?>
                            <img src="<?=$file["PREVIEW"]["src"]?>"
                                 class="img-responsive" alt="<?=$file["ALT"]?>">
                        <?else:?>
                            <img src="<?=$file["SRC"]?>"
                                 class="img-responsive" alt="<?=$file["ALT"]?>">
                        <?endif;?>
					</a>
				<?endforeach;?>
			</div>
		<?endif;?>
	</div>
</div><!-- End project detail -->

