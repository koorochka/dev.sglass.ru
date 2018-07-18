<?
/**
 * @var CMain $APPLICATION
 */
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
use Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
global $curPage;
$curPage = $APPLICATION->GetCurPage(true);
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="ru"> <![endif]-->
<!--[if gt IE 8]><html class="no-js" lang="ru"><!--<![endif]-->
<head>
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/bootstrap.min.css"/>
<?
$APPLICATION->AddHeadString(
    '<meta charset="utf-8">'
    . '<meta name="author" content="Koorochka">'
    . '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">'
    . '<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">'
    . '<link rel="stylesheet" href="' . SITE_TEMPLATE_PATH . '/css/font-awesome.min.css">'
    . '<link rel="stylesheet" type="text/css" href="' . SITE_TEMPLATE_PATH . '/css/fancySelect.css" media="screen" />'
    . '<link rel="stylesheet" type="text/css" href="' . SITE_TEMPLATE_PATH . '/css/extralayers.css" media="screen" />'
    . '<link rel="stylesheet" type="text/css" href="' . SITE_TEMPLATE_PATH . '/css/settings.css" media="screen" />'
    . '<link rel="stylesheet" href="' . SITE_TEMPLATE_PATH . '/css/owl.carousel.css">'
    . '<link rel="stylesheet" href="' . SITE_TEMPLATE_PATH . '/css/owl.theme.default.css">'
    . '<link rel="stylesheet" href="' . SITE_TEMPLATE_PATH . '/css/jquery.mCustomScrollbar.css" />'
    . '<link rel="stylesheet" href="' . SITE_TEMPLATE_PATH . '/css/style.css"/>'
    . '<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />'
    . '<script src="' . SITE_TEMPLATE_PATH . '/js/jquery.min.js"></script>'
    //. '<script src="' . SITE_TEMPLATE_PATH . '/js/jpreLoader.js"></script>'
    . '<script src="' . SITE_TEMPLATE_PATH . '/js/jquery.waypoints.min.js"></script>'
    . '<script src="' . SITE_TEMPLATE_PATH . '/js/bootstrap.min.js"></script>'
    . '<script src="' . SITE_TEMPLATE_PATH . '/js/easing.js"></script>'
    . '<script src="' . SITE_TEMPLATE_PATH . '/js/jquery.mCustomScrollbar.concat.min.js"></script>'
    . '<script src="' . SITE_TEMPLATE_PATH . '/js/fancySelect.js"></script>'
    . '<script src="' . SITE_TEMPLATE_PATH . '/js/custom.js"></script>'
    . '<script src="' . SITE_TEMPLATE_PATH . '/js/jquery.animateNumber.min.js"></script>'
    . '<script src="' . SITE_TEMPLATE_PATH . '/js/custom-counterup.js"></script>'
    . '<script src="' . SITE_TEMPLATE_PATH . '/js/jquery.mobile-menu.js"></script>'
    . '<script src="' . SITE_TEMPLATE_PATH . '/js/sticky.min.js"></script>'
    . '<script src="' . SITE_TEMPLATE_PATH . '/js/jquery.maskedinput-1.2.2.js"></script>'
);
$APPLICATION->ShowHead();
?>
<title><?$APPLICATION->ShowTitle("TITLE");?></title>
<script async src="https://stats.lptracker.ru/code/new/54068"></script>
</head>
<body>
<noindex>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter5119156 = new Ya.Metrika2({
                    id:5119156,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/tag.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks2");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/5119156" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</noindex>
<div class="mobile-menu-first">
    <div id="mobile-menu" class="mobile-menu-light">
        <div class="mCustomScrollbar light" data-mcs-theme="minimal-dark">
            <div class="header-mobile-menu hmm-v1">
                <span class="has-icon sm-icon"><span class="lnr lnr-phone-handset icon-set-1 icon-xs "></span> <span class="sub-text-icon text-middle"><strong><a href="tel:+74956000101" rel="nofollow">+7 495 600-01-01</a></strong></span></span>
                <a href="#" class="ot-btn btn-rounded btn-hightlight-color">Заказать звонок</a>
            </div> <!-- Mobile Menu -->
            <?$APPLICATION->ShowViewContent("mobile-menu-top")?>
            <div class="footer-mobile-menu fmm-v1">
                <ul class="social">
                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                    <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>

                <ul class="address-footer-mobile">

                    <li>
                        <span clss="lnr lnr-map-marker"></span>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            ".default",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "sidebar",
                                "AREA_FILE_RECURSIVE" => "Y",
                                "COMPONENT_TEMPLATE" => ".default",
                                "PATH" => "/inc/adress.php",
                                "EDIT_MODE" => "html"
                            ),
                            false
                        );?>
                    </li>
                    <li><a href="tel:+74956000101 "><span class="lnr lnr-smartphone"></span> +7 495 600-01-01 </a></li>
                    <li><a href="mailto:info@sglass.ru"><span class="lnr lnr-envelope"></span> info@sglass.ru </a></li>

                </ul>
            </div>
        </div> <!-- /#rmm   -->
    </div>
</div>
<!-- End Mobile Menu -->

<div id="page">
    <?$APPLICATION->ShowPanel();?>
    <div class="top-bar top-bar-dark">
        <div class="container">
            <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "header.top",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_RECURSIVE" => "Y",
                        "COMPONENT_TEMPLATE" => ".default",
                        "PATH" => "/inc/header/top.php",
                        "EDIT_MODE" => "text"
                    ),
                    false
                );?>

            <div class="left-top-bar">
                <div class="mm-toggle visible-xs visible-sm">
                    <i class="fa fa-bars"></i><span class="mm-label"><?=Loc::getMessage("MENU")?></span>
                </div> <!-- End button mobile menu -->
            </div>
            <div class="right-top-bar">

                <div class="popover-container visible-xs visible-sm">
                    <button type="button"
                            class="btn btn-popover popover-dark"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="bottom"
                            title="<?$APPLICATION->IncludeComponent(
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
                                false,
                                Array('HIDE_ICONS' => 'Y')
                            );?>"
                            data-content="<?$APPLICATION->IncludeComponent(
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
                                false,
                                Array('HIDE_ICONS' => 'Y')
                            );?>">
                        <span class="lnr lnr-phone-handset"></span>
                    </button>
                    <button type="button"
                            class="btn btn-popover popover-dark"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="bottom"
                            title="<?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                ".default",
                                array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "sidebar",
                                    "AREA_FILE_RECURSIVE" => "Y",
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "PATH" => "/inc/header/adress.city.php",
                                    "EDIT_MODE" => "text"
                                ),
                                false,
                                Array('HIDE_ICONS' => 'Y')
                            );?>"
                            data-content="<?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                ".default",
                                array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "sidebar",
                                    "AREA_FILE_RECURSIVE" => "Y",
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "PATH" => "/inc/header/adress.street.php",
                                    "EDIT_MODE" => "text"
                                ),
                                false,
                                Array('HIDE_ICONS' => 'Y')
                            );?>">
                        <span class="lnr lnr-map-marker"></span>
                    </button>
                    <button type="button"
                            class="btn btn-popover popover-dark"
                            data-container="body"
                            data-toggle="popover"
                            data-placement="bottom"
                            title="<?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                ".default",
                                array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "sidebar",
                                    "AREA_FILE_RECURSIVE" => "Y",
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "PATH" => "/inc/header/work.day.php",
                                    "EDIT_MODE" => "text"
                                ),
                                false,
                                Array('HIDE_ICONS' => 'Y')
                            );?>"
                            data-content="<?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                ".default",
                                array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "sidebar",
                                    "AREA_FILE_RECURSIVE" => "Y",
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "PATH" => "/inc/header/work.time.php",
                                    "EDIT_MODE" => "text"
                                ),
                                false,
                                Array('HIDE_ICONS' => 'Y')
                            );?>">
                        <span class="lnr lnr lnr-clock"></span>
                    </button>
                </div>
            </div>



        </div>
    </div> <!-- End Top bar -->

    <header id="sticked-menu" class="header header-v3 hidden-xs hidden-sm">

        <div class="container">
            <div class="hidden-md hidden-lg">
                <div class="pull-left">
                    <div class="mm-toggle">
                        <i class="fa fa-bars"></i><span class="mm-label"><?=Loc::getMessage("MENU")?></span>
                    </div> <!-- End button mobile menu -->
                </div>
                <div class="pull-right">
                    <div class="popover-container">
                        <button type="button"
                                class="btn btn-popover"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="bottom"
                                title="<?$APPLICATION->IncludeComponent(
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
                                    false,
                                    Array('HIDE_ICONS' => 'Y')
                                );?>"
                                data-content="<?$APPLICATION->IncludeComponent(
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
                                    false,
                                    Array('HIDE_ICONS' => 'Y')
                                );?>">
                            <span class="lnr lnr-phone-handset"></span>
                        </button>
                        <button type="button"
                                class="btn btn-popover"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="bottom"
                                title="<?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    ".default",
                                    array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "sidebar",
                                        "AREA_FILE_RECURSIVE" => "Y",
                                        "COMPONENT_TEMPLATE" => ".default",
                                        "PATH" => "/inc/header/adress.city.php",
                                        "EDIT_MODE" => "text"
                                    ),
                                    false,
                                    Array('HIDE_ICONS' => 'Y')
                                );?>"
                                data-content="<?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    ".default",
                                    array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "sidebar",
                                        "AREA_FILE_RECURSIVE" => "Y",
                                        "COMPONENT_TEMPLATE" => ".default",
                                        "PATH" => "/inc/header/adress.street.php",
                                        "EDIT_MODE" => "text"
                                    ),
                                    false,
                                    Array('HIDE_ICONS' => 'Y')
                                );?>">
                            <span class="lnr lnr-map-marker"></span>
                        </button>
                        <button type="button"
                                class="btn btn-popover"
                                data-container="body"
                                data-toggle="popover"
                                data-placement="bottom"
                                title="<?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    ".default",
                                    array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "sidebar",
                                        "AREA_FILE_RECURSIVE" => "Y",
                                        "COMPONENT_TEMPLATE" => ".default",
                                        "PATH" => "/inc/header/work.day.php",
                                        "EDIT_MODE" => "text"
                                    ),
                                    false,
                                    Array('HIDE_ICONS' => 'Y')
                                );?>"
                                data-content="<?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    ".default",
                                    array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "sidebar",
                                        "AREA_FILE_RECURSIVE" => "Y",
                                        "COMPONENT_TEMPLATE" => ".default",
                                        "PATH" => "/inc/header/work.time.php",
                                        "EDIT_MODE" => "text"
                                    ),
                                    false,
                                    Array('HIDE_ICONS' => 'Y')
                                );?>">
                            <span class="lnr lnr lnr-clock"></span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="top-header hidden-xs hidden-sm">
                <div class="logo">
                    <a href="<?=SITE_DIR?>" title="Стекольная компания ДАЙМ"><img src="<?=SITE_TEMPLATE_PATH?>/images/Header/logo.png" class="img-responsive" alt="Стекольная компания ДАЙМ" title="Стекольная компания ДАЙМ"></a>
                </div><!-- End Logo -->
                <div class="navi-right margin-top-20">
                    <ul>

                        <li class="hidden-md">
                           <span class="has-icon">
                              <a href="/contacts/">
                                  <span class="lnr lnr-map-marker icon-set-1 icon-xs"></span>
                                  <span class="sub-text-icon text-top">
                                      <strong>
                                          <?$APPLICATION->IncludeComponent(
                                              "bitrix:main.include",
                                              ".default",
                                              array(
                                                  "AREA_FILE_SHOW" => "file",
                                                  "AREA_FILE_SUFFIX" => "sidebar",
                                                  "AREA_FILE_RECURSIVE" => "Y",
                                                  "COMPONENT_TEMPLATE" => ".default",
                                                  "PATH" => "/inc/header/adress.city.php",
                                                  "EDIT_MODE" => "text"
                                              ),
                                              false,
                                              array("HIDE_ICONS" => "Y")
                                          );?>
                                      </strong>
                                      <?$APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        ".default",
                                        array(
                                            "AREA_FILE_SHOW" => "file",
                                            "AREA_FILE_SUFFIX" => "sidebar",
                                            "AREA_FILE_RECURSIVE" => "Y",
                                            "COMPONENT_TEMPLATE" => ".default",
                                            "PATH" => "/inc/header/adress.street.php",
                                            "EDIT_MODE" => "text"
                                        ),
                                        false,
                                          array("HIDE_ICONS" => "Y")
                                    );?>
                                  </span>
            					</a>
                           </span>
                        </li >
                        <li class="hidden-md">
                           <span class="has-icon">
                              <span class="lnr lnr-clock icon-set-1 icon-xs"></span>
                              <span class="sub-text-icon text-top">
                                 <strong><?$APPLICATION->IncludeComponent(
                                         "bitrix:main.include",
                                         ".default",
                                         array(
                                             "AREA_FILE_SHOW" => "file",
                                             "AREA_FILE_SUFFIX" => "sidebar",
                                             "AREA_FILE_RECURSIVE" => "Y",
                                             "COMPONENT_TEMPLATE" => ".default",
                                             "PATH" => "/inc/header/work.day.php",
                                             "EDIT_MODE" => "text"
                                         ),
                                         false,
                                         array("HIDE_ICONS" => "Y")
                                     );?></strong>
                                  <?$APPLICATION->IncludeComponent(
                                      "bitrix:main.include",
                                      ".default",
                                      array(
                                          "AREA_FILE_SHOW" => "file",
                                          "AREA_FILE_SUFFIX" => "sidebar",
                                          "AREA_FILE_RECURSIVE" => "Y",
                                          "COMPONENT_TEMPLATE" => ".default",
                                          "PATH" => "/inc/header/work.time.php",
                                          "EDIT_MODE" => "text"
                                      ),
                                      false,
                                      array("HIDE_ICONS" => "Y")
                                  );?>
                              </span>
                           </span>
                        </li>
						<li class="hidden-md">
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
                                         false,
                                         array("HIDE_ICONS" => "Y")
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
                                      false,
                                      array("HIDE_ICONS" => "Y")
                                  );?>
                              </span>
                           </span>
                        </li>
                        <li>
                            <a href="#"
                               data-toggle="modal"
                               data-target="#order-call-modal"
                               class="ot-btn btn-hightlight-color large-btn btn-rounded"><?=Loc::getMessage("ORDER_CALL")?></a>
                        </li>
                    </ul>
                </div> <!-- End Navi Right -->
            </div><!-- End Top Header -->

        </div> <!-- End Container -->
        <?$APPLICATION->IncludeComponent(
            "bitrix:menu",
            "top",
            array(
                "COMPONENT_TEMPLATE" => "top",
                "ROOT_MENU_TYPE" => "top",
                "MENU_CACHE_TYPE" => "A",
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_USE_GROUPS" => "N",
                "MENU_CACHE_GET_VARS" => array(
                ),
                "MAX_LEVEL" => "2",
                "CHILD_MENU_TYPE" => "left.sections",
                "USE_EXT" => "Y",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "N"
            ),
            false
        );?>
    </header> <!-- END HEADER -->

    <section class="visible-xs hidden-sm hidden-md hidden-lg padding-30">
        <img src="<?=SITE_TEMPLATE_PATH?>/images/logo_m.png" class="img-responsive center-block">
    </section>

<?if(ERROR_404 !== "Y"):?>
    <section class="bg-grey padding-top-45 padding-bottom-45 clearfix">

        <div class="container">
            <div class="row">
                <div class="section-title">
                    <div class="col-xs-12 col-sm-8 col-md-12">
                        <h2><?$APPLICATION->ShowTitle(true)?></h2>
                    </div>
                    <div class="hidden-xs col-sm-4 hidden-md hidden-lg">
                        <img src="<?=SITE_TEMPLATE_PATH?>/images/logo_m.png" class="img-responsive">
                    </div>
                </div>
            </div><!-- End Row -->
        </div><!-- End container -->



    </section>

    <?if($curPage !== "/index.php"):?>
        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "new.sglass", Array());?>
    <?endif;?>
    <div class="line"></div>
<?endif;?>
<?
if(
    strpos($curPage,'equipment') == false &&
    strpos($curPage,'services') == false &&
    strpos($curPage,'contacts') == false &&
    $curPage !== "/index.php"
):
?>
<section class="padding-top-45">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
<?endif;?>


