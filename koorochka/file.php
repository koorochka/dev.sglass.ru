<?
/**
 * @var CMain $APPLICATION
 */
#$_SERVER['DOCUMENT_ROOT'] = "/home/s/sglass/new.sglass.ru/public_html/";
#$DOCUMENT_ROOT = "/home/s/sglass/new.sglass.ru/public_html/";
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');



?>

<form action="" method="post" enctype="multipart/form-data">
    <?for($i=0; $i<3;$i++):?>
        <div class="margin-bottom-15">
            <input type="file"
                   name="file[]">
        </div>
        <input type="submit"
               value="Submit"
               class="btn btn-danger">
    <?endfor;?>
</form>

<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>