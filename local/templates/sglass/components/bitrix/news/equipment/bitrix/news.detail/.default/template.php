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

<?if(is_array($arResult["DETAIL_PICTURE"])):?>
	<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
		 width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
		 height="<?=$arResult["DETAIL_PICTURE"]["EIGHT"]?>"
		 class="img-responsive img-header-detail"
		 title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
		 alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>">

<?endif;?>

	<div class="h-block">
		<div class="row">
			<div class="col-sm-6 col-md-8 left-hblock">
				<p><?=$arResult["PREVIEW_TEXT"]?></p>
			</div>
			<div class="col-sm-6 col-md-4 right-hblock">
				<div class="brochures-download">
					<button type="button" class="btn btn-download"><i class="fa fa-file-word-o" aria-hidden="true"></i> Задать вопрос</button>
				</div>
			</div>
		</div><!-- End row -->
	</div><!-- End H-block -->
<?=$arResult["DETAIL_TEXT"]?>