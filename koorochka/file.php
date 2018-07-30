<?
/**
 * @var CMain $APPLICATION
 */
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');


d($_FILES);

?>

<form action="" method="post" enctype="multipart/form-data">
    <?for($i=0; $i<3;$i++):?>
        <div class="margin-bottom-15">
            <input type="file"
                   name="file[]">
        </div>
    <?endfor;?>
    <input type="submit"
           value="Submit"
           class="btn btn-danger">
</form>

<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>