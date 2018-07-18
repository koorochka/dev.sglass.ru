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
?>
<section class="bg-grey no-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?
				if($arResult["FILE"] <> '')
					include($arResult["FILE"]);
				?>
			</div>
		</div>
	</div>
</section>