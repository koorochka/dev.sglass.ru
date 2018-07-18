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

<!--List Blog -->
<div class="no-padding">
	<div class="container">
		<div class="row">

			<div id="primary" class="content-area col-md-9 no-padding-right">

				<main id="main" class="site-main padding-top-50" >
					<?
					foreach($arResult["ITEMS"] as $arItem):
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<article class="item-lastest-news itemBlogList" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="img-news-container">
							<?if(is_array($arItem["PREVIEW_PICTURE"])):?>
								<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
									 width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
									 height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
									 alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
									 title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>">
							<?else:?>
								<img src="<?=$templateFolder?>/images/default.jpg"
									 class="img-responsive"
									 alt="<?=$arItem["NAME"]?>">
							<?endif;?>
						</a>
						<div class="news-text-container">
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><h3 class="title-news"><?=$arItem["NAME"]?></h3></a>
							<div class="latest-news-data">
								<span class="tags"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Financial</a>, <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"> Maketing</a></span>
								<span class="dates"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span>
							</div>
							<p><?=$arItem["PREVIEW_TEXT"]?></p>

							<a class="continueReading" href="<?=$arItem["DETAIL_PAGE_URL"]?>">Continue Reading</a>
						</div> <!-- End Text box -->
						<div class="clearfix"></div>
					</article>
					<?endforeach;?>
				</main> <!-- End Main -->
				<div class="col-md-12 text-center clearfix">
					<ul class="pagination pagination-finance">
						<li><a class="current" href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li class="threedots">...</li>
						<li><a href="#">25</a></li>
						<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</div>


			<div id="secondary" class="widget-area  col-md-3 padding-top-50" role="complementary">
				<aside class="widget widget_text">
					<h3 class="widget-title">About</h3>
					<div class="textwidget">
						<p>Nulla eleifend, sapien eget porttitor maximus, nisl ante convallis dolor, nec consequat felis ex a ex. Vestibulum, vitae fringilla nibh consectetur. Integer at volutpat augue.
						</p>
					</div>
				</aside>

				<aside class="widget widget_search">
					<form action="_POST" class="search-form" method="get" role="search">
						<input name="s" value="" placeholder="Search …" class="search-field" type="search">
						<button class="search-submit" type="submit"><i class="fa fa-search"></i></button>
					</form>
				</aside>
				<aside id="categories-2" class="widget widget_categories">
					<h3 class="widget-title" >Categories</h3>

					<ul>
						<li><a href="#">Business Market</a></li>
						<li><a href="#">Socials Network</a></li>
						<li><a href="#">Team Work</a></li>
						<li><a href="#">Rebuild Services</a></li>
						<li><a href="#">Electrical System</a></li>
					</ul> <!-- End Ul -->
				</aside>



				<aside class="widget widget_Archive">
					<h3 class="widget-title">Archive</h3>
					<ul>
						<li><a href="#">March 2016</a>
							<span class="count">(4)</span>
						</li>
						<li><a href="#">Febuary 2016</a>
							<span class="count">(9)</span>

						</li>
						<li><a href="#">January 2016</a>
							<span class="count">(34)</span>

						</li>
						<li><a href="#">December 2015</a>
							<span class="count">(22)</span>

						</li>
						<li><a href="#">November 2015</a>
							<span class="count">(35)</span>

						</li>
						<li><a href="#">Octorber 2015</a>
							<span class="count">(4)</span>

						</li>
						<li><a href="#">September 2015</a>
							<span class="count">(26)</span>

						</li>
						<li><a href="#">August</a>
							<span class="count">(11)</span>

						</li>
					</ul> <!-- End Ul -->
				</aside>

				<aside class="widget widget_tag_cloud">
					<h3 class="widget-title">Tags</h3>
					<div class="tagcloud">
						<a href="#">audio</a>
						<a href="#">gallery</a>
						<a href="#">image</a>
						<a href="#">music</a>
						<a href="#">photo</a>
						<a href="#">quote</a>
						<a href="#">text</a>
						<a href="#">video</a>
						<a href="#">vimeo</a>
						<a href="#">youtube</a>
					</div>
				</aside>

				<aside class="widget widget_meta">
					<h3 class="widget-title">Meta</h3>
					<ul>
						<li><a href="#">Site Admin</a></li>
						<li><a href="#">Log out</a></li>
						<li><a href="#">Entries <abbr>RSS</abbr></a></li>
						<li><a href="#">Comments <abbr>RSS</abbr></a></li>
						<li><a href="#">WordPress.org</a></li>
					</ul>
				</aside>
			</div>
		</div><!-- End Row -->

	</div><!-- End container -->
</div><!--  End Section -->
