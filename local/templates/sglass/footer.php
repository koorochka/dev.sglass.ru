<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
use Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
global $curPage;

if(
	strpos($curPage,'equipment') == false &&
	strpos($curPage,'services') == false &&
	strpos($curPage,'contacts') == false &&
    $curPage !== "/index.php"
):
	?>
	</div>
	</div><!-- End Row -->
	</div> <!-- End Container -->
	</section><!-- End Section -->
<?endif;?>

<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "block.grey",
    array(
        "AREA_FILE_SHOW" => "file",
        "AREA_FILE_RECURSIVE" => "Y",
        "COMPONENT_TEMPLATE" => ".default",
        "PATH" => "block.grey.php",
        "EDIT_MODE" => "text"
    ),
    false,
    Array('HIDE_ICONS' => 'Y')
);?>

<!-- Footer -->
<footer class=" bg-dark footer">
	<div class="container">
		<div class="row">
			<div class="footer-row">

				<div class="footer-col-1">
					<a href="<?=SITE_DIR?>"><img src="<?=SITE_TEMPLATE_PATH?>/images/Footer/logo-footer.png" class="img-responsive" alt="Image"></a>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "bottom1",
                        array(
                            "COMPONENT_TEMPLATE" => "bottom1",
                            "ROOT_MENU_TYPE" => "bottom1",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_TIME" => "3600000000000",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MAX_LEVEL" => "1",
                            "CHILD_MENU_TYPE" => "bottom1",
                            "USE_EXT" => "N",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N"
                        ),
                        false
                    );?>
				</div>

				<div class="footer-col-3">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        ".default",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "sidebar",
                            "AREA_FILE_RECURSIVE" => "Y",
                            "COMPONENT_TEMPLATE" => ".default",
                            "PATH" => "/inc/footer/social.php",
                            "EDIT_MODE" => "html"
                        ),
                        false
                    );?>
				</div>
				<div class="footer-col-2">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        ".default",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "sidebar",
                            "AREA_FILE_RECURSIVE" => "Y",
                            "COMPONENT_TEMPLATE" => ".default",
                            "PATH" => "/inc/footer/contacts.php",
                            "EDIT_MODE" => "html"
                        ),
                        false
                    );?>
				</div>				

			</div> <!-- End footer row -->
			<div class="col-md-12 footer-link">
				<p><?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        ".default",
                        array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "sidebar",
                            "AREA_FILE_RECURSIVE" => "Y",
                            "COMPONENT_TEMPLATE" => ".default",
                            "PATH" => "/inc/footer/copyright.php",
                            "EDIT_MODE" => "html"
                        ),
                        false
                    );?></p>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "bottom2",
                    array(
                        "COMPONENT_TEMPLATE" => "bottom2",
                        "ROOT_MENU_TYPE" => "bottom2",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "3600000000000",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "bottom2",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ),
                    false
                );?>
			</div>
		</div><!-- End Row -->

	</div><!-- End container -->
</footer><!-- End  -->

</div><!-- End Page -->


<div id="overlay"></div>
<!-- Overlay Mobile Menu Click -->

<a id="to-the-top" style="display: block;"><i class="fa fa-angle-up"></i></a>
<!-- Back To Top -->

<?$APPLICATION->IncludeComponent(
	"koorochka:order.call",
	"",
	array(
		"USE_CAPTCHA" => "N",
		"TITLE" => "Заказ звонка",
		"OK_TEXT" => "В ближайшее время мы с вами свяжемся!",
		"EMAIL_TO" => "ajoq@ya.ru",
		"FORM" => "call-order-form",
		"REQUIRED_FIELDS" => array(
			0 => "NAME",
			1 => "PHONE",
            2 => "AGREE"
		),
		"EVENT_MESSAGE_ID" => array(
			0 => "10",
		)
	),
	false
);?>

</body>
</html>