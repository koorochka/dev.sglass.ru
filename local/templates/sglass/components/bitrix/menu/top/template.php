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
<div class="section-navi">
	<div class="container">
		<nav class="navi-desktop-site navi-desktop-site-1 hidden-sm hidden-xs">
			<ul class="navi-level-1 uppercase">
			<?
			if(!empty($arResult)):
				$previousLevel = 0;
				foreach($arResult as $arItem):
				if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel)
					echo str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));
				?>

					<?if ($arItem["IS_PARENT"]):?>
						<li class="has-sub"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?><i class="fa fa-angle-down"></i></a>
						<ul class="navi-level-2">
					<?else:?>
						<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
					<?endif?>

				<?
					$previousLevel = $arItem["DEPTH_LEVEL"];
				endforeach;
				if ($previousLevel > 1)
					echo str_repeat("</ul></li>", ($previousLevel-1) );
			endif;
			?>
				<li class="search-container">

                    <form class="form-search-navi" action="<?=SITE_DIR?>search/">
						<div class="input-group">
							<input class="form-control" type="text" name="q" placeholder="<?=GetMessage("MENU_TOP_SEARCH")?>">
							<span class="input-group-btn">
                                 <a href="" class="btn btn-search-navi">
                                  <i class="fa fa-search"></i>
                                 </a>
                             </span>
						</div><!-- /input-group -->
					</form>

                    <div class="sticky-contacts-block">
                        <span class="has-icon">
                              <span class="lnr lnr-phone-handset icon-set-1 icon-xs"></span>
                              <span class="sub-text-icon text-top">
                                 <strong><?$APPLICATION->IncludeComponent(
                                         "bitrix:main.include",
                                         ".default",
                                         array(
                                             "AREA_FILE_SHOW" => "file",
                                             "AREA_FILE_SUFFIX" => "sidebar",
                                             "AREA_FILE_RECURSIVE" => "Y",
                                             "COMPONENT_TEMPLATE" => ".default",
                                             "PATH" => "/inc/header/contacts.phone.php",
                                             "EDIT_MODE" => "text"
                                         ),
                                         false
                                     );?></strong>
                                  <?$APPLICATION->IncludeComponent(
                                      "bitrix:main.include",
                                      ".default",
                                      array(
                                          "AREA_FILE_SHOW" => "file",
                                          "AREA_FILE_SUFFIX" => "sidebar",
                                          "AREA_FILE_RECURSIVE" => "Y",
                                          "COMPONENT_TEMPLATE" => ".default",
                                          "PATH" => "/inc/header/contacts.mail.php",
                                          "EDIT_MODE" => "text"
                                      ),
                                      false
                                  );?>
                              </span>
                           </span>
                    </div>
				</li>
			</ul>
		</nav> <!-- End Navi Desktop Site -->
	</div> <!-- End Container  -->
</div>

<?$this->SetViewTarget("mobile-menu-top");?>
<ul>
<?
if(!empty($arResult)):
	$previousLevel = 0;
	foreach($arResult as $arItem):
		if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel)
			echo str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));
		?>

		<?if ($arItem["IS_PARENT"]):?>
			<li><a href="<?=$arItem["LINK"]?>"><i class="icon-home"></i> <?=$arItem["TEXT"]?></a>
			<ul>
		<?else:?>
			<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
		<?endif?>

		<?
		$previousLevel = $arItem["DEPTH_LEVEL"];
	endforeach;
	if ($previousLevel > 1)
		echo str_repeat("</ul></li>", ($previousLevel-1) );
endif;
?>
</ul>
<?$this->EndViewTarget();?>