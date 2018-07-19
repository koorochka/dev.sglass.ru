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
if($ID > 0)
{
    $test = CalculatorTable::getRowById($ID);
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
$tabControl->Begin();
$tabControl->BeginNextTab();
$cols = CalculatorTable::getMap();
foreach ($cols as $id => $col):
    ?>
    <tr>
        <td width="240" align="right"><strong><?=$col["title"]?>:</strong></td>
        <td width="10"></td>
        <td><?=$test[$id];?></td>
    </tr>
    <?
endforeach;
$tabControl->End();
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");?>