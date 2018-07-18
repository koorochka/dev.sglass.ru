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
use Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
?>
<section class="no-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-isotope-project-3-column">

					<div class="projectFilter project-terms project-terms-list-page">
						<a href="#" data-filter="*" class="current"><?=Loc::getMessage("ALL")?></a>
						<?foreach ($arResult["SECTIONS"] as $section):?>
							<a href="#" data-filter=".section<?=$section["ID"]?>"><?=$section["NAME"]?></a>
						<?endforeach;?>
					</div>

					<div class="row">
						<div class="clearfix projectContainer projectContainer3column" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
							<?
							foreach($arResult["ITEMS"] as $arItem):
							$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
							$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
							$class = "element-item";
							foreach ($arItem["SECTIONS"] as $section)
							{
								$class .= " section" . $section["ID"];
							}
							?>
							<div class="<?=$class?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
								<a class="img-contain-isotope" href="<?=$arItem["DETAIL_PAGE_URL"]?>">
									<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
										 width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
										 height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
										 alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
										 title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
										 class="img-responsive">
								</a>
                                <div class="cateInfo">
                                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><h5 class="title-project"><?=$arItem["NAME"]?></h5></a>
                                    <?foreach($arItem["SECTIONS"] as $k=>$section):?>
                                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="cateProject">
                                            <?
                                            echo $section["NAME"];
                                            if($k !== (count($arItem["SECTIONS"]) - 1))
                                                echo "&nbsp;|&nbsp;";
                                            ?>
                                        </a>
                                    <?endforeach;?>
                                </div>
							</div>
							<?endforeach;?>
						</div>
					</div>

				</div> <!-- End  -->
			</div><!-- End Col -->
		</div><!-- End Row -->
	</div> <!-- End Container -->
</section>