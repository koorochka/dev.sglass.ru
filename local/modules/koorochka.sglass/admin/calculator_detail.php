<?
/**
 * @global CMain $APPLICATION
 */
use Bitrix\Main\Localization\Loc,
    Bitrix\Main\Loader,
    Koorochka\Sglass\CalculatorTable;
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
Loc::loadLanguageFile(__FILE__);
Loader::includeModule("koorochka.sglass");
$POST_RIGHT = $APPLICATION->GetGroupRight("main");
if ($POST_RIGHT == "D")
    $APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));
$ID = intval($_REQUEST["ID"]);
$cols = CalculatorTable::getMap();
// ******************************************************************** //
//                ОБРАБОТКА ИЗМЕНЕНИЙ ФОРМЫ                             //
// ******************************************************************** //

if(
    $REQUEST_METHOD == "POST" // проверка метода вызова страницы
    &&
    ($save!="" || $apply!="") // проверка нажатия кнопок "Сохранить" и "Применить"
    &&
    $POST_RIGHT=="W"          // проверка наличия прав на запись для модуля
    &&
    check_bitrix_sessid()     // проверка идентификатора сессии
)
{
    $arFields = array();
    $cols = CalculatorTable::getMap();
    foreach ($cols as $id => $col){
        if(is_set($_POST[$id])){
            $arFields[$id] = $_POST[$id];
        }
    }
    if($arFields){
        unset($arFields["ID"]);
        // сохранение данных
        if($ID > 0)
        {
            $result = CalculatorTable::update($ID, $arFields);
        }
        else
        {
            $result = CalculatorTable::add($arFields);
        }

        if($result->isSuccess()){
            if ($apply != ""){
                // если была нажата кнопка "Применить" - отправляем обратно на форму.
                LocalRedirect("/bitrix/admin/sglass_call_calculator_detail.php?ID=".$ID."&mess=ok&lang=".LANG);
            }else{
                // если была нажата кнопка "Сохранить" - отправляем к списку элементов.
                LocalRedirect("/bitrix/admin/sglass_call_calculator_list.php?lang=".LANG);
            }
        }else{
            // если в процессе сохранения возникли ошибки - получаем текст ошибки и меняем вышеопределённые переменные
            $message = $result->getErrorMessages();
        }

    }

}

// ******************************************************************** //
//                ВЫБОРКА И ПОДГОТОВКА ДАННЫХ ФОРМЫ                     //
// ******************************************************************** //
if($ID > 0)
{
    $arOrder = CalculatorTable::getRowById($ID);
}
$aTabs = array(array("DIV" => "tab1", "TAB" => Loc::getMessage("ORDER_DATA")));
$tabControl = new CAdminTabControl("tabControl", $aTabs);
$APPLICATION->SetTitle(Loc::getMessage("ORDER_TITLE", array("ID" => $ID)));
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
// конфигурация административного меню
$aMenu = array(
    array(
        "TEXT"=>Loc::getMessage("ORDER_LIST"),
        "TITLE"=>Loc::getMessage("ORDER_LIST"),
        "LINK"=>"sglass_call_calculator_list.php?lang=".LANG,
        "ICON"=>"btn_list",
    )
);
// создание экземпляра класса административного меню
$context = new CAdminContextMenu($aMenu);

// вывод административного меню
$context->Show();
?>

<?
// если есть сообщения об ошибках или об успешном сохранении - выведем их.
if($_REQUEST["mess"] == "ok" && $ID>0)
    CAdminMessage::ShowMessage(array("MESSAGE"=> Loc::getMessage("ORDER_SAVED"), "TYPE"=>"OK"));

if($message)
    echo $message->Show();
?>

<?
// далее выводим собственно форму
?>
<form method="POST" Action="<?echo $APPLICATION->GetCurPage()?>" ENCTYPE="multipart/form-data" name="post_form">
<?// проверка идентификатора сессии ?>
<?echo bitrix_sessid_post();?>



<?
$tabControl->Begin();
$tabControl->BeginNextTab();
$cols = CalculatorTable::getMap();
foreach ($cols as $id => $col):
    if($id == "LID")
        continue;
    ?>
    <tr>
        <td width="240" align="right"><strong><?=$col["title"]?>:</strong></td>
        <td width="10"></td>
        <td>
        <?if(
            $id == "NAME" ||
            $id == "PHONE" ||
            $id == "EMAIL" ||
            $id == "STUFF" ||
            $id == "PRODUCT"
        ):?>
            <input type="text"
                   name="<?=$id?>"
                   value="<?=$arOrder[$id]?>"
                   size="30"
                   maxlength="100">
        <?
        elseif($id == "FILE"):
            $arFiles = array();
            $arOrder["FILE"] = unserialize($arOrder["FILE"]);
            foreach ($arOrder["FILE"] as $file){
                if($file > 0){
                    $file = CFile::GetFileArray($file);
                    $arFields[] = '<a href="' . $file["SRC"] . '" target="_blank">' . Loc::getMessage("ORDER_DOWNLOAD") . '</a>';
                }
            }
            if(!empty($arFields)){
                echo implode(" / ", $arFields);
            }
        ?>
        <?elseif(
            $id == "MESSAGE" ||
            $id == "RESULT"
        ):?>
            <textarea name="<?=$id?>"
                      cols="45"
                      rows="5"
                      wrap="VIRTUAL"><?=$arOrder[$id]?></textarea>
        <?else:?>
            <?=$arOrder[$id];?>
        <?endif;?>
        </td>
    </tr>
    <?
endforeach;
?>

<?
// завершение формы - вывод кнопок сохранения изменений
$tabControl->Buttons(
    array(
        "disabled"=>($POST_RIGHT<"W"),
        "back_url"=>"sglass_call_calculator_list.php?lang=".LANG,

    )
);
?>
    <input type="hidden" name="lang" value="<?=LANG?>">
<?if($ID>0):?>
    <input type="hidden" name="ID" value="<?=$ID?>">
<?endif;?>
<?
// завершаем интерфейс закладок
$tabControl->End();
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");?>