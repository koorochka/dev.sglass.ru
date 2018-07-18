<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty("TITLE", "Стекольное производство: изготовление и производство стекла");
$APPLICATION->SetPageProperty("keywords", "изготовление стекла , производство стекла , стекольная компания , стекольное производство , стекло");
$APPLICATION->SetPageProperty("description", "Компания «ДАЙМ» изготавливает стекло и стеклопакеты на заказ, выполняет резку и другие стекольные работы на заказ. Продукция компании пользуется заслуженной популярностью у российских и зарубежных покупателей.");
$APPLICATION->SetTitle("Стекольная компания ДАЙМ: изготовление и производство стекла");
?>
<?$APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "slider",
    array(
        "IBLOCK_ID" => "2",
        "IBLOCK_TYPE" => "Daim",
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "CACHE_GROUPS" => "N",
        "COUNT_ELEMENTS" => 100,
        "TOP_DEPTH" => 1,
        "HIDE_SECTION_NAME" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "SLIDER_ID" => "index_slider_1",
        "ALL_LINK_TEXT" => "Весь список продукции и услуг",
        "TITLE" => "Продукция и услуги",
    ),
    false
);
?>

    <div class="container">
        <div class="line"></div>
    </div>
		<br><br>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
<iframe width="100%" height="315" src="https://www.youtube.com/embed/bDS0Ev2ldP8" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="col-xs-12 col-md-6">
                    <h2>Стекольная компания Дайм</h2>


<p style="font-size: 16px;">Работаем с&nbsp;1992 года</p>
<p style="font-size: 16px;">
2&nbsp;500 м<sup>2</sup>&nbsp;производственных мощностей в&nbsp;пределах ТТК</p>
<p style="font-size: 16px;">Свыше 800&nbsp;000 м<sup>2</sup>&nbsp;стекла и&nbsp;стеклопакетов в&nbsp;год</p>
<p style="font-size: 16px;">Более 1&nbsp;000 объектов по&nbsp;всей России</p>
<p style="font-size: 16px;">Более 100 видов стекольной и&nbsp;зеркальной продукции</p>
<p style="font-size: 16px;">Отгрузка продукции от&nbsp;1&nbsp;листа</p>
<p style="font-size: 16px;">Собственный автопарк. Доставка по РФ.</p>


                </div><!-- End col -->
            </div><!-- End row -->
        </div><!-- End container-->

	<br><br>
    <div class="container">
        <div class="line"></div>
    </div>
<br><br>
    <div class="container">
<h2>Прямые поставки стекла от ведущих производителей</h2>
<div class="row">
              <article class=" col-sm-6 col-md-3 thumbnail-style thumbnail-icon-item text-center no-margin">

                   <div class="thumbnail">
                      <img src="/upload/medialibrary/d6e/d6ece23c589c6818968ebc0c91e57e37.png" alt="">

                   </div>

              </article><!-- End article -->

              <article class=" col-sm-6 col-md-3 thumbnail-style thumbnail-icon-item text-center no-margin">

                   <div class="thumbnail">
                       <img src="/upload/medialibrary/34a/34a457a996b4b10b0311fc45095fb0e7.png" class="img-icon-thumbnail" alt="">

                   </div>

              </article><!-- End article -->

              <article class=" col-sm-6 col-md-3 thumbnail-style thumbnail-icon-item text-center no-margin">

                   <div class="thumbnail">
                       <img src="/upload/medialibrary/7f9/7f9222052d72f68b902e3ad421a024be.png" class="img-icon-thumbnail" alt="">

                   </div>

              </article><!-- End article -->

              <article class=" col-sm-6 col-md-3 thumbnail-style thumbnail-icon-item text-center no-margin">

                 <div class="thumbnail">
                     <img src="/upload/medialibrary/174/1745d3b6e0b039d7a90c520863021194.png" class="img-icon-thumbnail" alt="">

                 </div>

              </article><!-- End article -->
          </div>
    </div>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"slider.gray",
	array(
	    "ALL_LINK_TEXT" => "Весь список оборудования",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "slider.gray",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "Daim",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "100",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Продукция",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SLIDER_ID" => "index_slider_2",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC"
	),
	false
);?>

<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"portfolio",
	array(
		"ALL_LINK_TEXT" => "Весь список работ",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "portfolio",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "Daim",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "100",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "DESC"
	),
	false
);?>

<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"block.grey",
	Array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "file",
		"COMPONENT_TEMPLATE" => ".default",
		"EDIT_MODE" => "text",
		"PATH" => "/inc/footer/consalting.php"
	)
);?>

<?$APPLICATION->IncludeComponent(
	"koorochka:consalting.form",
	"",
	Array(
		"EMAIL_TO" => "ajoq@ya.ru",
		"EVENT_MESSAGE_ID" => array(0=>"12",),
		"FORM" => "consalting-modal",
		"OK_TEXT" => "В ближайшее время мы с вами свяжемся!",
		"PAGE" => $APPLICATION->GetCurPage(false),
		"REQUIRED_FIELDS" => array(0=>"NAME",1=>"PHONE",2=>"AGREE"),
		"TITLE" => "Запрос на консультацию",
		"USE_CAPTCHA" => "N"
	)
);?>

    <section class="padding-top-45">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Стекольная компания «ДАЙМ»</h3>

                    <p>Изготовлением стекла компания &laquo;ДАЙМ&raquo; занимается уже четверть века &mdash; с 1992 года. Мы изготавливаем готовые стеклопакеты, комплекты для высотного и аварийного остекления, занимаемся производством стекла для витрин. Осуществляем на заказ резку, обработку, закалку, монтаж.</p>

<p>К персоналу стекольная компания &laquo;ДАЙМ&raquo; предъявляет строгие требования. Производство стекла контролируется на всех этапах процесса. Благодаря этому мы завоевали прочные позиции на рынке и отличную репутацию. Мы занимаемся изготовлением стекла для крупных строительных фирм, выполняем госзаказы. Наши сотрудники восстанавливали стеклянные изделия после госпереворота в 1993 году, урагана 1998 года, теракта на Манежной площади.</p>

<p>Среди постоянных клиентов компании &laquo;ДАЙМ&raquo; &mdash; многие крупные фирмы, расположенные России и за рубежом. Число предприятий, заказывающих у нас производство стекла, постоянно растёт.</p>

<p>Все работы, в том числе резку, сотрудники нашей компании выполняют с помощью профессионального инструмента итальянской марки Bavelloni. Прежде чем получить допуск к стекольному производству, персонал проходит специальное обучение. Именно это позволяет нам достигать столь высоких результатов.</p>

<p>Обратитесь к нам, чтобы заказать производство стекла на заказ, резку и прочие работы. Мы выпускаем изделия исключительно высокого качества, не имеющие аналогов ни в Москве, ни за его пределами. Это в том числе различные виды флоат-стекла и спецстёкла: тонированные, триплексы, армированные, закалённые, солнцезащитные, освещённые.</p>

<h2>Почему стоит покупать стекло у нас?</h2>

<p>Компания &laquo;ДАЙМ&raquo; &mdash; не единственный производитель на рынке. Но никто другой не предложит вам столь же выгодных условий. Вот лишь основные причины обратиться к нам:</p>

<ul>
	<li>Безупречно работаем уже 25 лет.</li>
	<li>Выпускаем сотни видов продукции.</li>
	<li>Курируем тысячи объектов по России.</li>
	<li>Выполняем резку с ювелирной точностью.</li>
	<li>Предлагаем оптовые поставки по выгодным ценам.</li>
	<li>Отгружаем партии любого объёма (от одного листа).</li>
	<li>Объём производства стекла &mdash; более 800 000 м<sup>2</sup> в год.</li>
</ul>

<p>Оставьте заявку, и вскоре менеджер нашей компании свяжется с вами, чтобы подробнее рассказать об условиях.</p>

<p>Мы сотрудничаем с клиентами не только в Москве, но и в других городах России. Закажите стекольную продукцию в компании &laquo;ДАЙМ&raquo;. Вы не будете разочарованы ни качеством, ни стоимостью!</p>

                </div>
            </div><!-- End Row -->
        </div> <!-- End Container -->
    </section><!-- End Section --><?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>