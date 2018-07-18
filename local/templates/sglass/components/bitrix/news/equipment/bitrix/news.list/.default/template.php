<?
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
use Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
?>
<!-- List services section -->
<section class="padding-top-50 padding-bottom-20">
	<div class="container">
		<?foreach ($arResult["SECTIONS"] as $arSection):?>
			<div class="row">
				<div class="col-sm-12"><a href="<?=$arSection["SECTION_URL"]?>" class="h1"><?=$arSection["NAME"]?></a></div>
			</div>
			<div class="row margin-top-15">
				<div class="services-wrap">
					<div class="services-list-contain">
						<?foreach($arResult["ITEMS"] as $arItem):
							$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
							$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
							?>
							<?if($arSection["ID"] == $arItem["IBLOCK_SECTION_ID"]):?>
								<div class="item-services" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
								    <div class="thumbnail">
									<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"
									   class="services-3-column-img-container">
										<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
											 width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
											 height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
											 class="preview-picture"
                                             alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
											 title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>">
										<h4><?=$arItem["NAME"]?></h4>
									</a>

									<div class="caption">
										<p><?=$arItem["PREVIEW_TEXT"]?></p>
										<a class="learn-more" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><i class="fa fa-caret-right" aria-hidden="true"></i>  <?=Loc::getMessage("DETAIL_PAGE_URL")?></a>
                                        <div class="pull-right brand-info">
                                            <img src="<?=$arItem["DISPLAY_PROPERTIES"]["COUNTRY"]["VALUE_XML_ID"]?>"
                                                 title="<?=$arItem["DISPLAY_PROPERTIES"]["COUNTRY"]["VALUE"]?>">
                                            <img src="<?=$arItem["DISPLAY_PROPERTIES"]["BRAND"]["VALUE_XML_ID"]?>"
                                                 title="<?=$arItem["DISPLAY_PROPERTIES"]["BRAND"]["VALUE"]?>">
                                        </div>
									</div>
								</div>
							    </div>
							<?endif;?>
						<?endforeach;?>
					</div>
				</div><!--  End col -->
			</div><!-- End Row -->
		<?endforeach;?>
	</div><!-- End container -->
</section><!--  End Section -->