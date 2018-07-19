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
$oSort = new CAdminSorting($listTableId, "SORT", "asc");
$arOrder = (strtoupper($by) === "ID"? array($by => $order): array($by => $order, "ID" => "ASC"));
$adminList = new CAdminList($listTableId, $oSort);
$arFilter = array();
// ******************************************************************** //
//                           ФИЛЬТР                                     //
// ******************************************************************** //

// опишем элементы фильтра
$FilterArr = Array(
    "find_id",
    "find_sort",
    "find_name",
    "find_phone",
    "find_email",
    "find_stuff",
    "find_product",
    "find_create_1",
    "find_create_2",
    "find_update_1",
    "find_update_2"
);

// инициализируем фильтр
$adminList->InitFilter($FilterArr);

if(intval($find_id) > 0)
    $arFilter["ID"] = $find_id;

if(intval($find_sort) > 0)
    $arFilter["SORT"] = $find_sort;

if(!empty($find_name))
    $arFilter["?NAME"] = $find_name;

if(!empty($find_name))
    $arFilter["?PHONE"] = $find_name;

if(!empty($find_name))
    $arFilter["?EMAIL"] = $find_name;

if(!empty($find_name))
    $arFilter["?STUFF"] = $find_name;

if(!empty($find_name))
    $arFilter["?PRODUCT"] = $find_name;

if(!empty($find_create_1))
    $arFilter[">=DATE_CREATE"] = $find_create_1;

if(!empty($find_create_2))
    $arFilter["<=DATE_CREATE"] = $find_create_2;

if(!empty($find_update_1))
    $arFilter[">=DATE_UPDATE"] = $find_update_1;

if(!empty($find_update_2))
    $arFilter["<=DATE_UPDATE"] = $find_update_2;


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
// групповые действия
$adminList->AddGroupActionTable(Array(
    "delete"=>Loc::getMessage("MAIN_ADMIN_LIST_DELETE"), // удалить выбранные элементы
));
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

// ******************************************************************** //
//                ВЫВОД ФИЛЬТРА                                         //
// ******************************************************************** //

// создадим объект фильтра
$oFilter = new CAdminFilter(
    $listTableId."_filter",
    array(
        $cols["ID"]["title"],
        $cols["SORT"]["title"],
        $cols["NAME"]["title"],
        $cols["PHONE"]["title"],
        $cols["EMAIL"]["title"],
        $cols["STUFF"]["title"],
        $cols["PRODUCT"]["title"],
        $cols["DATE_CREATE"]["title"],
        $cols["DATE_UPDATE"]["title"]
    )
);
?>
<form name="find_form" method="get" action="<?echo $APPLICATION->GetCurPage();?>">
    <?$oFilter->Begin();?>

    <tr>
        <td><?=$cols["ID"]["title"]?>:</td>
        <td>
            <input type="text"
                   name="find_id"
                   size="47"
                   value="<?echo htmlspecialchars($find_id)?>">
        </td>
    </tr>

    <tr>
        <td><?=$cols["SORT"]["title"]?>:</td>
        <td>
            <input type="text"
                   name="find_sort"
                   size="47"
                   value="<?echo htmlspecialchars($find_sort)?>">
        </td>
    </tr>

    <tr>
        <td><b><?=$cols["NAME"]["title"]?>:</b></td>
        <td><input type="text"
                   name="find_name"
                   value="<?echo htmlspecialcharsex($find_name)?>"
                   size="47">&nbsp;<?=ShowFilterLogicHelp()?></td>
    </tr>

    <tr>
        <td><b><?=$cols["PHONE"]["title"]?>:</b></td>
        <td><input type="text"
                   name="find_phone"
                   value="<?echo htmlspecialcharsex($find_phone)?>"
                   size="47">&nbsp;<?=ShowFilterLogicHelp()?></td>
    </tr>

    <tr>
        <td><b><?=$cols["EMAIL"]["title"]?>:</b></td>
        <td><input type="text"
                   name="find_email"
                   value="<?echo htmlspecialcharsex($find_email)?>"
                   size="47">&nbsp;<?=ShowFilterLogicHelp()?></td>
    </tr>

    <tr>
        <td><b><?=$cols["STUFF"]["title"]?>:</b></td>
        <td><input type="text"
                   name="find_stuff"
                   value="<?echo htmlspecialcharsex($find_stuff)?>"
                   size="47">&nbsp;<?=ShowFilterLogicHelp()?></td>
    </tr>

    <tr>
        <td><b><?=$cols["PRODUCT"]["title"]?>:</b></td>
        <td><input type="text"
                   name="find_product"
                   value="<?echo htmlspecialcharsex($find_product)?>"
                   size="47">&nbsp;<?=ShowFilterLogicHelp()?></td>
    </tr>

    <tr>
        <td><b><?=$cols["DATE_CREATE"]["title"]?>:</b></td>
        <td><?=CalendarPeriod("find_create_1", htmlspecialcharsex($find_create_1), "find_create_2", htmlspecialcharsex($find_create_2), "find_form", "Y")?></td>
    </tr>

    <tr>
        <td><b><?=$cols["DATE_UPDATE"]["title"]?>:</b></td>
        <td><?=CalendarPeriod("find_update_1", htmlspecialcharsex($find_update_1), "find_update_2", htmlspecialcharsex($find_update_2), "find_form", "Y")?></td>
    </tr>

    <?
    $oFilter->Buttons(array("table_id"=>$listTableId,"url"=>$APPLICATION->GetCurPage(),"form"=>"find_form"));
    $oFilter->End();
    ?>
</form>
<?
$adminList->DisplayList();

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>