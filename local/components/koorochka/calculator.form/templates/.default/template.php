<?
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
use Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
if(empty($arResult["OK_MESSAGE"])):
?>

<form action="<?=POST_FORM_ACTION_URI?>"
      name="test"
      enctype="multipart/form-data"
      method="POST">
    <?=bitrix_sessid_post()?>
    <input type="hidden"
           name="PARAMS_HASH"
           value="<?=$arResult["PARAMS_HASH"]?>">
    <input type="hidden"
           name="form"
           value="<?=$arParams["FORM"]?>">

    <?if(!empty($arResult["ERROR_MESSAGE"])):?>
        <div class="alert alert-danger"><?=$arResult["ERROR_MESSAGE"]?></div>
    <?endif;?>

    <div class="form-group <?if($_POST){echo empty($arResult["ERROR"]["NAME"])?"has-success":"has-error";}?>">
        <label for="user_name">
            <?=Loc::getMessage("MFT_NAME")?>
            <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
        </label>
        <input class="form-control"
               placeholder="<?=Loc::getMessage("MFT_NAME")?>"
               type="text"
               name="user_name"
               value="<?=$arResult["AUTHOR_NAME"]?>">
        <input class="form-control hidden" name="user_last_name" value="" type="text">
        <?if(!empty($arResult["ERROR"]["NAME"])):?>
            <div class="help-block"><?=$arResult["ERROR"]["NAME"]?></div>
        <?endif;?>
    </div>

    <div class="form-group <?if($_POST){echo empty($arResult["ERROR"]["PHONE"])?"has-success":"has-error";}?>">
        <label for="user_phone">
            <?=Loc::getMessage("MFT_PHONE")?>
            <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
        </label>
        <input class="form-control"
               placeholder="<?=Loc::getMessage("MFT_PHONE")?>"
               type="text"
               name="user_phone"
               id="calculator_phone"
               value="<?=$arResult["AUTHOR_PHONE"]?>">
        <?if(!empty($arResult["ERROR"]["PHONE"])):?>
            <div class="help-block"><?=$arResult["ERROR"]["PHONE"]?></div>
        <?endif;?>
    </div>

    <div class="form-group <?if($_POST){echo empty($arResult["ERROR"]["EMAIL"])?"has-success":"has-error";}?>">
        <label for="user_email">
            <?=Loc::getMessage("MFT_EMAIL")?>
            <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
        </label>
        <input class="form-control"
               placeholder="<?=Loc::getMessage("MFT_EMAIL")?>"
               type="text"
               name="user_email"
               value="<?=$arResult["AUTHOR_EMAIL"]?>">
        <?if(!empty($arResult["ERROR"]["EMAIL"])):?>
            <div class="help-block"><?=$arResult["ERROR"]["EMAIL"]?></div>
        <?endif;?>
    </div>

    <div class="form-group" id="call-order-stuff">
        <label for="user_stuff">
            <?=Loc::getMessage("MFT_STUFF")?>
        </label>
        <input class="form-control"
               placeholder="<?=Loc::getMessage("MFT_STUFF")?>"
               type="text"
               name="user_stuff"
               id="user_stuff"
               value="<?=$arResult["AUTHOR_STUFF"]?>">
    </div>

    <div class="form-group" id="call-order-product">
        <label for="user_product">
            <?=Loc::getMessage("MFT_PRODUCT")?>
        </label>
        <input class="form-control"
               placeholder="<?=Loc::getMessage("MFT_PRODUCT")?>"
               type="text"
               name="user_product"
               id="user_product"
               value="<?=$arResult["AUTHOR_PRODUCT"]?>">
    </div>

    <div class="form-group" id="call-order-message">
        <label for="MESSAGE">
            <?=Loc::getMessage("MFT_MESSAGE")?>
        </label>
        <textarea rows="5"
                  class="form-control"
                  placeholder="<?=Loc::getMessage("MFT_MESSAGE")?>"
                  name="MESSAGE"
                  id="MESSAGE"><?=$arResult["AUTHOR_MESSAGE"]?></textarea>
    </div>

    <div class="form-group" id="call-order-file">
        <label for="user_product">
            <?=Loc::getMessage("MFT_FILE")?>
        </label>
        <input type="file"
               name="user_file[]"><br />
        <input type="file"
               name="user_file[]"><br />
        <button class="btn btn-success" onclick="return addCalculatorFile(this)"><?=Loc::getMessage("MFT_FILE_ADD")?></button>
        <p class="help-block"><?=Loc::getMessage("MFT_FILE_DESC")?></p>
    </div>

    <div class="form-group checkbox" id="call-order-agree">
        <label>
            <input type="checkbox"
                <?
                if($_REQUEST["AGREE"] == "Y" || !$_POST){
                    echo "checked";
                }
                ?>
                   name="AGREE" value="Y"> <?=Loc::getMessage("MFT_AGREE_TEXT")?>
        </label>
        <div class="help-block hidden"></div>
    </div>

    <?if($arParams["USE_CAPTCHA"] == "Y"):?>
        <div class="form-group <?if($_POST){echo empty($arResult["ERROR"]["CAPTCHA"])?"has-success":"has-error";}?>">
            <label><?=Loc::getMessage("MFT_CAPTCHA")?></label>
            <input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
            <div class="margin-bottom-15">
                <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>"
                     class="img-thumbnail"
                     width="180"
                     height="40"
                     alt="CAPTCHA">
            </div>
            <input type="text"
                   class="form-control"
                   name="captcha_word"
                   size="30"
                   maxlength="50"
                   value="">
            <p class="help-block"><?=Loc::getMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></p>
        </div>
    <?endif;?>

    <div>
        <button type="button"
                class="btn btn-default"
                data-dismiss="modal"><?=Loc::getMessage("MFT_CLOSE")?></button>
        <input type="submit"
               name="submit"
               value="<?=Loc::getMessage("MFT_SUBMIT")?>"
               class="btn btn-success">
    </div>
</form>

<?else:?>
    <div class="alert alert-success"><?=$arResult["OK_MESSAGE"]?></div>
<?endif;?>