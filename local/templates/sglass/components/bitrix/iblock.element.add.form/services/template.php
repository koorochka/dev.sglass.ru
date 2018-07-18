<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(false);
use Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
?>

<section class="bg-dark">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-white"><?=$arParams["TITLE"]?></h2>
				<p class="text-grey"><?=$arParams["DESCRIPTION"]?></p>
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="get-call-back-contain">
					<div class="call-back-form">
						<form name="iblock_add"
                              action="<?=POST_FORM_ACTION_URI?>"
                              method="post"
                              enctype="multipart/form-data">

                            <?if (!empty($arResult["ERRORS"])):?>
                                <div class="alert alert-danger">
                                    <?foreach ($arResult["ERRORS"] as $error):?>
                                        <i class="fa fa-bomb"></i>  <?=str_replace("<br>", "", $error)?><br>
                                    <?endforeach;?>
                                </div>
                            <?endif;
                            if (strlen($arResult["MESSAGE"]) > 0):?>
                                <div class="alert alert-success"> <i class="fa fa-hand-peace-o"></i> <?=$arResult["MESSAGE"]?></div>
                            <?endif?>
							<?
                            echo bitrix_sessid_post();
                            $inputNum = 1;
                            ?>
							<div class="row">
                                <?
                                foreach ($arResult["PROPERTY_LIST"] as $propertyID):
                                    if($propertyID == 6 || $propertyID == "PREVIEW_TEXT")
                                        continue;
                                ?>
								<div class="form-group col-md-4 custom-form">
                                    <?
                                    for ($i = 0; $i<$inputNum; $i++)
                                    {
                                        if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
                                        {
                                            $value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
                                        }
                                        elseif ($i == 0)
                                        {
                                            $value = intval($propertyID) <= 0 ? "" : $arResult["PROPERTY_LIST_FULL"][$propertyID]["DEFAULT_VALUE"];

                                        }
                                        else
                                        {
                                            $value = "";
                                        }?>
                                        <input type="text"
                                               class="form-control"
                                               id="PROPERTY_<?=$propertyID?>"
											   name="PROPERTY[<?=$propertyID?>][<?=$i?>]"
                                               value="<?=$value?>"
                                               placeholder="<?
                                        if (intval($propertyID) > 0){
                                            echo $arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"];
                                        }
                                        else{
                                            echo !empty($arParams["CUSTOM_TITLE_".$propertyID]) ? $arParams["CUSTOM_TITLE_".$propertyID] : GetMessage("IBLOCK_FIELD_".$propertyID);
                                        }
                                        if(in_array($propertyID, $arResult["PROPERTY_REQUIRED"])){
                                            echo " *";
                                        }
                                        ?>">
										<?if($propertyID == 7):?>
										<script>
											$('#PROPERTY_<?=$propertyID?>').mask("+7(999) 999-99-99");
										</script>
										<?endif;?>
                                    <?}?>
								</div>
                                <?endforeach;?>
							</div>
							<div class="row">
								<div class="form-group col-md-8 custom-form">
                                    <?
                                    $propertyID = "PREVIEW_TEXT";
                                    for ($i = 0; $i<$inputNum; $i++)
                                    {
                                        if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0)
                                        {
                                            $value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
                                        }
                                        elseif ($i == 0)
                                        {
                                            $value = intval($propertyID) > 0 ? "" : $arResult["PROPERTY_LIST_FULL"][$propertyID]["DEFAULT_VALUE"];
                                        }
                                        else
                                        {
                                            $value = "";
                                        }
                                        ?>
                                        <textarea class="form-control"
                                                  placeholder="<?=!empty($arParams["CUSTOM_TITLE_".$propertyID]) ? $arParams["CUSTOM_TITLE_".$propertyID] : GetMessage("IBLOCK_FIELD_".$propertyID)?>"
                                                  name="PROPERTY[<?=$propertyID?>][<?=$i?>]"><?=$value?></textarea>
                                    <?}?>

									<?if($arParams["USE_CAPTCHA"] == "Y" && $arParams["ID"] <= 0):?>
										<div class="row">
											<div class="col-md-6">
												<input type="text"
													   name="captcha_word"
													   maxlength="50"
													   value=""
													   class="form-control"
													   placeholder="<?=GetMessage("IBLOCK_FORM_CAPTCHA_PROMPT")?> *">
												<input type="hidden"
													   name="captcha_sid"
													   value="<?=$arResult["CAPTCHA_CODE"]?>" />
												<span class="help-block"><?=GetMessage("IBLOCK_FORM_CAPTCHA_TITLE")?></span>
											</div>
											<div class="col-md-6">

														<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>"
															 width="180"
															 height="40"
															 id="capcha-img"
															 alt="CAPTCHA" />

														<?
														$page = explode("?", POST_FORM_ACTION_URI);
														$page = $page[0];
														?>
														<a class="ot-btn large-btn btn-rounded btn-refresh btn-main-color btn-submit"
														   href="<?=$page?>">
															<i class="fa fa-refresh"></i>
															<span class="hidden-md">&nbsp;<?=Loc::getMessage("IBLOCK_FORM_CAPTCHA_REFRESH")?></span>
														</a>

											</div>
										</div>
									<?endif?>

								</div>
								<div class="form-group col-md-4 custom-form">

									<div class="fileUpload ot-btn large-btn btn-rounded btn-main-color btn-submit">
										<i class="fa fa-inclined"></i>
                                        <span><?=Loc::getMessage("FILE_INPUT_CHUSE")?></span>
										<?
                                        $propertyID = 6;
                                        for ($i = 0; $i<$inputNum; $i++)
                                        {
                                            $value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
                                            ?>
                                            <input type="file"
                                                   class="upload"
												   onchange="$(this).parent().find('span').text(this.value)"
                                                   size="<?=$arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"]?>"
                                                   name="PROPERTY_FILE_<?=$propertyID?>_<?=$arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i?>" />
											<input type="hidden"
												   name="PROPERTY[<?=$propertyID?>][<?=$arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i?>]"
												   value="<?=$value?>" />
                                            <?
                                        }
                                        ?>
									</div>

									<input type="submit"
										   class="ot-btn large-btn btn-rounded btn-main-color btn-submit"
										   name="iblock_submit"
										   value="<?=GetMessage("IBLOCK_FORM_SUBMIT")?>" />

								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div><!-- End row -->
	</div><!-- End container -->
</section><!-- End Section -->