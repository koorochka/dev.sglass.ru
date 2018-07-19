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
?>
	<div class="modal fade in" id="order-call-modal" data-toggle="modal"  tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<form action="<?=POST_FORM_ACTION_URI?>"
				  name="test"
				  onsubmit="return orderCallForm(this)"
				  method="POST"
				  class="modal-content">
				<?=bitrix_sessid_post()?>
				<input type="hidden"
					   name="PARAMS_HASH"
					   value="<?=$arResult["PARAMS_HASH"]?>">
				<input type="hidden"
					   name="action"
					   value="json">
				<input type="hidden"
					   name="form"
					   value="<?=$arParams["FORM"]?>">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><?=Loc::getMessage("MFT_TITLE")?></h4>
				</div>
				<div class="modal-body modal-body-shadow">
					<div class="alert hidden"></div>

					<div class="form-group" id="call-order-name">
						<label for="user_name">
							<?=Loc::getMessage("MFT_NAME")?>
							<?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
						</label>
						<input class="form-control"
							   placeholder="<?=Loc::getMessage("MFT_NAME")?>"
							   type="text"
							   id="user_name"
							   name="user_name"
							   value="<?=$arResult["AUTHOR_NAME"]?>">
                        <input class="form-control hidden" name="user_last_name" value="" type="text">
						<div class="help-block hidden"></div>
					</div>

					<div class="form-group" id="call-order-phone">
						<label for="user_phone">
							<?=Loc::getMessage("MFT_PHONE")?>
							<?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
						</label>
						<input class="form-control"
							   placeholder="<?=Loc::getMessage("MFT_PHONE")?>"
							   type="text"
							   name="user_phone"
                               id="user_phone"
							   value="<?=$arResult["AUTHOR_PHONE"]?>">
						<div class="help-block hidden"></div>
					</div>

					<div class="form-group" id="call-order-email">
						<label for="user_email">
							<?=Loc::getMessage("MFT_EMAIL")?>
							<?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?>
						</label>
						<input class="form-control"
							   placeholder="<?=Loc::getMessage("MFT_EMAIL")?>"
							   type="text"
							   name="user_email"
							   id="user_email"
							   value="<?=$arResult["AUTHOR_EMAIL"]?>">
						<div class="help-block hidden"></div>
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
                        <input type="file"
                               name="user_file[]"><br />
                        <p class="help-block"><?=Loc::getMessage("MFT_FILE_DESC")?></p>
					</div>

                    <div class="checkbox form-group" id="call-order-agree">
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
				</div>
				<div class="modal-footer">
					<button type="button"
							class="btn btn-default"
							data-dismiss="modal"><?=Loc::getMessage("MFT_CLOSE")?></button>
					<input type="submit"
						   name="submit"
						   value="<?=Loc::getMessage("MFT_SUBMIT")?>"
						   class="btn btn-success">
				</div>
			</form><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
