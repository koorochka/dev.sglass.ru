<?
use Bitrix\Main\Localization\Loc,
    Bitrix\Main\Loader,
    Koorochka\Sglass;
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
Loc::loadLanguageFile(__FILE__);
Loader::includeModule("koorochka.sglass");

$listTableId = "sglass_calculator";
$oSort = new CAdminSorting($listTableId, "ID", "asc");
$arOrder = (strtoupper($by) === "ID"? array($by => $order): array($by => $order, "ID" => "ASC"));
$arFilter = array();
$adminList = new CAdminList($listTableId, $oSort);
// ******************************************************************** //
//                ОБРАБОТКА ДЕЙСТВИЙ НАД ЭЛЕМЕНТАМИ СПИСКА              //
// ******************************************************************** //
// Даю права на запись
$POST_RIGHT="W";
// $POST_RIGHT = $APPLICATION->GetGroupRight("main");
// обработка одиночных и групповых действий
if(($arID = $adminList->GroupAction()) && $POST_RIGHT=="W")
{

    // пройдем по списку элементов
    foreach($arID as $ID)
    {
        if(strlen($ID)<=0)
            continue;
        $ID = IntVal($ID);
        switch($_REQUEST['action']) {
            // удаление
            case "delete":
                Sglass\OrderTable::delete($ID);
                break;
        }
    }
}

// ******************************************************************** //
//                            ГЕНЕРАЦИЯ СПИСКА                          //
// ******************************************************************** //
$myData = Sglass\CalculatorTable::getList(
    array(
        'filter' => $arFilter,
        'order' => $arOrder
    )
);

$myData = new CAdminResult($myData, $listTableId);
$myData->NavStart();

$adminList->NavText($myData->GetNavPrint(Loc::getMessage("MAIN_ADMIN_NAV")));

$cols = Sglass\CalculatorTable::getMap();
$colHeaders = array();
foreach ($cols as $colId => $col)
{
    if(
        $colId == "SORT" ||
        $colId == "DATE_UPDATE" ||
        $colId == "RESULT" ||
        $colId == "FILE" ||
        $colId == "MESSAGE" ||
        $colId == "STUFF" ||
        $colId == "PRODUCT" ||
        $colId == "LID"
    )
        continue;
    $colHeaders[] = array(
        "id" => $colId,
        "content" => $col["title"],
        "sort" => $colId,
        "default" => true,
    );
}
$adminList->AddHeaders($colHeaders);

$visibleHeaderColumns = $adminList->GetVisibleHeaderColumns();
$arUsersCache = array();

while ($arRes = $myData->GetNext())
{
    $row =& $adminList->AddRow($arRes["ID"], $arRes);
    $row->AddInputField("SORT");
    $row->AddInputField("NAME");
    $row->AddInputField("PHONE");


    if ($POST_RIGHT>="W")
    {
        $row->AddActions(array(
            array(
                "ICON" => "view",
                "TEXT" => Loc::getMessage("ORDER_VIEW"),
                "ACTION" => $adminList->ActionRedirect("sglass_call_calculator_detail.php?ID=" . $arRes["ID"] . "&lang=" . LANG)
            )

        ));
    }
}

$adminList->AddFooter(
    array(
        array(
            "title" => Loc::getMessage("MAIN_ADMIN_LIST_SELECTED"),
            "value" => $myData->SelectedRowsCount()
        ),
        array(
            "counter" => true,
            "title" => Loc::getMessage("MAIN_ADMIN_LIST_CHECKED"),
            "value" => "0"
        ),
    )
);

$adminList->CheckListMode();

$APPLICATION->SetTitle(Loc::getMessage("ORDER_TITLE"));

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
$adminList->DisplayList();

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>