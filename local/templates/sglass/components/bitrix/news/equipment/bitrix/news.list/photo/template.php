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
<section class="padding-top-50 padding-bottom-20">
	<div class="container">
		<div class="row">
			<h1>Наше производство</h1>
			<div class="services-wrap">
				<div class="services-list-contain zoom-gallery">
					<?
					foreach($arResult["ITEMS"] as $arItem):
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<div class="item-services" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<div class="thumbnail">
							<a href="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>"
							   class="services-3-column-img-container img-gallery-contain">
								<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
									 width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
									 height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
									 alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
									 title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>">
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
