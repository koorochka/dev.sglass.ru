<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "О компании СП Дайм");
$APPLICATION->SetTitle("О компании СП Дайм");
?>


        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
<iframe width="100%" height="315" src="https://www.youtube.com/embed/bDS0Ev2ldP8" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="col-xs-12 col-md-6">
                    <h2>Стекольная компания Дайм</h2>


<p style="font-size: 16px;">Работаем с&nbsp;1992 года</p>
<p style="font-size: 16px;">
2&nbsp;500 м<sup>2</sup>&nbsp;производственных мощностей в&nbsp;пределах ТТК<br />
Свыше 800&nbsp;000 м<sup>2</sup>&nbsp;стекла и&nbsp;стеклопакетов в&nbsp;год<br />
Более 1&nbsp;000 объектов по&nbsp;всей России<br />
Более 100 видов стекольной и&nbsp;зеркальной продукции<br />
Отгрузка продукции от&nbsp;1&nbsp;листа<br />
Собственный автопарк. Доставка по РФ.
</p>

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
                       <img class="img-icon-thumbnail" src="/upload/medialibrary/34a/34a457a996b4b10b0311fc45095fb0e7.png" alt="">

                   </div>
                 
              </article><!-- End article -->

              <article class=" col-sm-6 col-md-3 thumbnail-style thumbnail-icon-item text-center no-margin">
                 
                   <div class="thumbnail">
                       <img class="img-icon-thumbnail" src="/upload/medialibrary/7f9/7f9222052d72f68b902e3ad421a024be.png" alt="">

                   </div>
                 
              </article><!-- End article -->

              <article class=" col-sm-6 col-md-3 thumbnail-style thumbnail-icon-item text-center no-margin">
               
                 <div class="thumbnail">
                     <img class="img-icon-thumbnail" src="/upload/medialibrary/174/1745d3b6e0b039d7a90c520863021194.png" alt="">

                 </div>
               
              </article><!-- End article -->
          </div>
    </div>		


<br><br>

    <div class="container">
        <div class="line"></div>
    </div>

<?$APPLICATION->IncludeComponent("koorochka:medialib.list", "photo1", Array(
	"COMPONENT_TEMPLATE" => ".default",
		"TITLE" => "Сертификаты",	// Заголовок
		"COLLECTION" => "63",	// Колекция из медиабиблиотеки
		"RESIZE_WIDTH" => "",	// Ширина превью
		"RESIZE_HEIGHT" => "",	// Высота превью
		"RESIZE_TYPE" => "",	// Тип ресаза
		"WINDOW_HEIGHT" => "",	// Высота
		"WINDOW_WIDTH" => "",	// Ширина
	),
	false
);?>


<?$APPLICATION->IncludeComponent(
    "koorochka:consalting.form",
    "",
    array(
        "USE_CAPTCHA" => "N",
        "TITLE" => "Запрос на консультацию",
        "OK_TEXT" => "В ближайшее время мы с вами свяжемся!",
        "EMAIL_TO" => "ajoq@ya.ru",
        "FORM" => "consalting-modal",
        "PAGE" => "/company/",
        "REQUIRED_FIELDS" => array(
            0 => "NAME",
            1 => "PHONE",
            2 => "AGREE"
        ),
        "EVENT_MESSAGE_ID" => array(
            0 => "12",
        )
    ),
    false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>