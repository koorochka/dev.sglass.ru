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

$listTableId = "sglass_calculator";
$oSort = new CAdminSorting($listTableId, "ID", "asc");
$arOrder = (strtoupper($by) === "ID"? array($by => $order): array($by => $order, "ID" => "ASC"));
$arFilter = array();
$adminList = new CAdminList($listTableId, $oSort);
// ******************************************************************** //
//                ОБРАБОТКА ДЕЙСТВИЙ НАД ЭЛЕМЕНТАМИ СПИСКА              //
// ******************************************************************** //
// Даю права на запись
$POST_RIGHT = $APPLICATION->GetGroupRight("main");
// обработка одиночных и групповых действий

// сохранение отредактированных элементов
if($adminList->EditAction() && $POST_RIGHT=="W")
{
    // пройдем по списку переданных элементов
    foreach($FIELDS as $ID=>$arFields)
    {
        if(!$adminList->IsUpdated($ID))
            continue;

        // сохраним изменения каждого элемента
        $DB->StartTransaction();
        $ID = IntVal($ID);

        $rsData = CalculatorTable::getList(array('filter' => array("ID" => $ID)));
        
        if($arData = $rsData->fetch())
        {
            foreach($arFields as $key=>$value)
                $arData[$key]=$value;

            $result = CalculatorTable::update($ID, $arData);
            if(!$result->isSuccess())
            {
                $adminList->AddGroupError(Loc::getMessage("ORDER_SAVE_ERROR")." ".$result->getErrorMessages(), $ID);
            }
        }
        else
        {
            $adminList->AddGroupError(Loc::getMessage("ORDER_SAVE_ERROR")." ".Loc::getMessage("NO_ORDER"), $ID);
        }
        $DB->Commit();
    }
}


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
                // item check for existing files
                $rsData = CalculatorTable::getList(array('filter' => array("ID" => $ID)));
                if($arData = $rsData->fetch())
                {
                    if(!empty($arData["FILE"])){
                        $arData["FILE"] = unserialize($arData["FILE"]);
                        foreach ($arData["FILE"] as $file){
                            CFile::Delete($file);
                        }
                    }
                }
                // delete process
                CalculatorTable::delete($ID);
                break;
        }
    }
}

// ******************************************************************** //
//                            ГЕНЕРАЦИЯ СПИСКА                          //
// ******************************************************************** //
$myData = CalculatorTable::getList(
    array(
        'filter' => $arFilter,
        'order' => $arOrder
    )
);

$myData = new CAdminResult($myData, $listTableId);
$myData->NavStart();

$adminList->NavText($myData->GetNavPrint(Loc::getMessage("MAIN_ADMIN_NAV")));

$cols = CalculatorTable::getMap();
$colHeaders = array();
foreach ($cols as $colId => $col)
{
    if(
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
    $row->AddInputField("EMAIL");


    if ($POST_RIGHT>="W")
    {
        $row->AddActions(array(
            array(
                "ICON" => "view",
                "TEXT" => Loc::getMessage("ORDER_VIEW"),
                "ACTION" => $adminList->ActionRedirect("sglass_call_calculator_detail.php?ID=" . $arRes["ID"] . "&lang=" . LANG)
            ),
            array("SEPARATOR"=>true),
            array(
                "ICON"=>"delete",
                "TEXT"=>Loc::getMessage("ORDER_DELETE"),
                "ACTION"=>"if(confirm('".Loc::getMessage('ORDER_CONFIRM_DELETE', array("ID" => $arRes["ID"]))."')) ".$adminList->ActionDoGroup($arRes["ID"], "delete")
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

// ******************************************************************** //
//                АДМИНИСТРАТИВНОЕ МЕНЮ                                 //
// ******************************************************************** //

// сформируем меню из одного пункта - добавление рассылки
$aContext = array(
    array(
        "TEXT"=>Loc::getMessage("ORDER_ADD"),
        "LINK"=>"sglass_call_calculator_detail.php?lang=".LANG,
        "TITLE"=>Loc::getMessage("ORDER_ADD"),
        "ICON"=>"btn_new",
    ),
);
// и прикрепим его к списку
$adminList->AddAdminContextMenu($aContext);

// ******************************************************************** //
//                ВЫВОД                                                 //
// ******************************************************************** //

// альтернативный вывод
$adminList->CheckListMode();

$APPLICATION->SetTitle(Loc::getMessage("ORDER_TITLE"));

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
$adminList->DisplayList();

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>