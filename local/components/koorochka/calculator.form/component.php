<?
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Localization\Loc,
    Bitrix\Main\Loader,
    Koorochka\Sglass\CalculatorTable;
Loc::loadLanguageFile(__FILE__);
// is robot send form
if(strlen($_POST["user_last_name"]) > 0){
    return;
}
// multiform
if($_POST && $_POST["form"] !== $arParams["FORM"]){
    return;
}
$arResult["PARAMS_HASH"] = md5(serialize($arParams).$this->GetTemplateName());

//$arParams["USE_CAPTCHA"] = (($arParams["USE_CAPTCHA"] != "N" && !$USER->IsAuthorized()) ? "Y" : "N");
$arParams["EVENT_NAME"] = trim($arParams["EVENT_NAME"]);
if($arParams["EVENT_NAME"] == '')
	$arParams["EVENT_NAME"] = "CALCULATOR";
$arParams["EMAIL_TO"] = trim($arParams["EMAIL_TO"]);
if($arParams["EMAIL_TO"] == '')
	$arParams["EMAIL_TO"] = COption::GetOptionString("main", "email_from");
$arParams["OK_TEXT"] = trim($arParams["OK_TEXT"]);
if($arParams["OK_TEXT"] == '')
	$arParams["OK_TEXT"] = Loc::getMessage("MF_OK_MESSAGE");

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$arResult["ERROR"] = array();
	$arResult["ERROR_MESSAGE"] = "";
	if(check_bitrix_sessid())
	{
		if(empty($arParams["REQUIRED_FIELDS"]) || !in_array("NONE", $arParams["REQUIRED_FIELDS"]))
		{
			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])) && strlen($_POST["user_name"]) <= 1)
				$arResult["ERROR"]["NAME"] = Loc::getMessage("MF_REQ_NAME");
			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])) && strlen($_POST["user_email"]) <= 1)
				$arResult["ERROR"]["EMAIL"] = Loc::getMessage("MF_REQ_EMAIL");
			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])) && strlen($_POST["user_phone"]) <= 1)
				$arResult["ERROR"]["PHONE"] = Loc::getMessage("MF_REQ_PHONE");
			if((empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])) && strlen($_POST["MESSAGE"]) <= 3)
				$arResult["ERROR"]["MESSAGE"] = Loc::getMessage("MF_REQ_MESSAGE");
            if((empty($arParams["REQUIRED_FIELDS"]) || in_array("AGREE", $arParams["REQUIRED_FIELDS"])) && $_POST["AGREE"] !== "Y")
                $arResult["ERROR"]["AGREE"] = Loc::getMessage("MF_REQ_AGREE");
		}
		if(strlen($_POST["user_email"]) > 1 && !check_email($_POST["user_email"]))
			$arResult["ERROR"]["EMAIL"] = Loc::getMessage("MF_EMAIL_NOT_VALID");
        if(strlen($_POST["user_phone"]) > 1 && !preg_match("#^[-+0-9()\s]+$#", $_POST["user_phone"]))
            $arResult["ERROR"]["PHONE"] = GetMessage("MF_PHONE_NOT_VALID");

		if($arParams["USE_CAPTCHA"] == "Y")
		{
			include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
			$captcha_code = $_POST["captcha_sid"];
			$captcha_word = $_POST["captcha_word"];
			$cpt = new CCaptcha();
			$captchaPass = COption::GetOptionString("main", "captcha_password", "");
			if (strlen($captcha_word) > 0 && strlen($captcha_code) > 0)
			{
				if (!$cpt->CheckCodeCrypt($captcha_word, $captcha_code, $captchaPass))
					$arResult["ERROR"]["CAPTCHA"] = Loc::getMessage("MF_CAPTCHA_WRONG");
			}
			else
				$arResult["ERROR"]["CAPTCHA"] = Loc::getMessage("MF_CAPTHCA_EMPTY");

		}			
		if(empty($arResult["ERROR"]))
		{
		    // Event fields
			$arFields = Array(
				"AUTHOR" => $_POST["user_name"],
				"AUTHOR_PHONE" => $_POST["user_phone"],
				"AUTHOR_EMAIL" => $_POST["user_email"],
				"AUTHOR_STUFF" => $_POST["user_stuff"],
				"AUTHOR_PRODUCT" => $_POST["user_product"],
				"EMAIL_TO" => $arParams["EMAIL_TO"],
				"TEXT" => $_POST["MESSAGE"],
			);
			// save and serialize files
            if(!empty($_FILES["user_file"]["tmp_name"])){
                $arFields["FILE"] = array();
                foreach ($_FILES["user_file"]["tmp_name"] as $file){
                    $file = CFile::MakeFileArray($file);
                    $file = CFile::SaveFile($file, "sglass");
                    $arFields["FILE"][] = $file;
                }
                $arFields["FILE"] = serialize($arFields["FILE"]);
            }

            // Add to db
            if(Loader::includeModule("koorochka.sglass")){
                $result = CalculatorTable::add(array(
                    "LID" => SITE_ID,
                    "DATE_CREATE" => new Bitrix\Main\Type\DateTime(),
                    "DATE_UPDATE" => new Bitrix\Main\Type\DateTime(),
                    "SORT" => 500,
                    "NAME" => $arFields["AUTHOR"],
                    "PHONE" => $arFields["AUTHOR_PHONE"],
                    "EMAIL" => $arFields["AUTHOR_EMAIL"],
                    "STUFF" => $arFields["AUTHOR_STUFF"],
                    "PRODUCT" => $arFields["AUTHOR_PRODUCT"],
                    "MESSAGE" => $arFields["TEXT"],
                    "FILE" => $arFields["FILE"]
                ));
                if($result->isSuccess()){
                    $arFields["ID"] = $result->getId();
                    // send event
                    CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields);
                }
            }
		}
		
		$arResult["MESSAGE"] = htmlspecialcharsbx($_POST["MESSAGE"]);
		$arResult["AUTHOR_NAME"] = htmlspecialcharsbx($_POST["user_name"]);
		$arResult["AUTHOR_PHONE"] = htmlspecialcharsbx($_POST["user_phone"]);
		$arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($_POST["user_email"]);
	}
	else
		$arResult["ERROR"]["SESS"] = GetMessage("MF_SESS_EXP");
    $arResult["ERROR_MESSAGE"] = implode("<br>", $arResult["ERROR"]);
}

if($arResult["ERROR"] === Array())
{
	$arResult["OK_MESSAGE"] = $arParams["OK_TEXT"];
}

if($arParams["USE_CAPTCHA"] == "Y")
	$arResult["capCode"] =  htmlspecialcharsbx($APPLICATION->CaptchaGetCode());


if($_REQUEST["action"] == "json")
{
    global $APPLICATION;
    $APPLICATION->RestartBuffer();
        echo json_encode($arResult);
    die;
}
else
{
    $this->IncludeComponentTemplate();
}