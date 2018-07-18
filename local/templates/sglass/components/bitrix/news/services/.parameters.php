<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters['ORDER_FORM_TITLE'] = array(
    'PARENT' => 'BASE',
    'NAME' => GetMessage('ORDER_FORM_TITLE'),
    'TYPE' => 'STRING',
    'DEFAULT' => GetMessage('ORDER_FORM_TITLE_DEFAULT')
);

$arTemplateParameters['ORDER_FORM_DESCRIPTION'] = array(
    'PARENT' => 'BASE',
    'NAME' => GetMessage('ORDER_FORM_DESCRIPTION'),
    'TYPE' => 'STRING',
    'DEFAULT' => GetMessage('ORDER_FORM_DESCRIPTION_DEFAULT')
);

?>