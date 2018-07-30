<?
/**
 * @var CMain $APPLICATION
 */
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');



?>

<?
$arr_file=Array(
    "name" => $_FILES[IMAGE_ID][name],
    "size" => $_FILES[IMAGE_ID][size],
    "tmp_name" => $_FILES[IMAGE_ID][tmp_name],
    "type" => "",
    "old_file" => "",
    "del" => "Y",
    "MODULE_ID" => "koorochka.sglass");
$fid = CFile::SaveFile($arr_file, "landings");
if (strlen($fid)>0):
    ?><?echo CFile::ShowImage($fid, 200, 200, "border=0", "", true);
endif;
?>
    <form method = "post" enctype = 'multipart/form-data'>
        <?echo CFile::InputFile("IMAGE_ID", 20, $str_IMAGE_ID);?>
        <input type="submit" value="Сохранить">
    </form>

<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');?>