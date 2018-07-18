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
<!-- List services section -->
<section class="padding-top-50 padding-bottom-20 photo-section">
	<div class="container">
		<div class="row">
			<h2><?=$arParams["TITLE"]?></h2>
			<div class="services-wrap">
				<div class="services-list-contain zoom-gallery">
					<?foreach($arResult as $arItem):?>
					<div class="item-services">
						<div class="thumbnail">
							<a href="<?=$arItem["PATH"]?>"
							   data-description="<?=$arItem["DESCRIPTION"]?>"
							   class="services-3-column-img-container img-gallery-contain">
								<img src="<?=$arItem["PATH"]?>"
									 width="<?=$arItem["WIDTH"]?>"
									 height="<?=$arItem["HEIGHT"]?>"
									 alt="<?=$arItem["NAME"]?>"
									 title="<?=$arItem["NAME"]?>">
								<h4><?=$arItem["NAME"]?></h4>
							</a>

						</div>
					</div>
					<?endforeach;?>
				</div>
			</div><!--  End col -->
		</div><!-- End Row -->
	</div><!-- End container -->
</section><!--  End Section -->
