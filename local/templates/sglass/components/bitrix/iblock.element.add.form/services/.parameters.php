<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arTemplateParameters = array(
	"AJAX_MODE" => Array(),
	"TITLE" => Array(
		"NAME" => GetMessage("TITLE"),
		"TYPE" => "STRING",
		"DEFAULT" => GetMessage("TITLE_DEFAULT"),
		"PARENT" => "DATA_SOURCE"
	),
	"DESCRIPTION" => Array(
		"NAME" => GetMessage("DESCRIPTION"),
		"TYPE" => "STRING",
		"DEFAULT" => GetMessage("DESCRIPTION_DEFAULT"),
		"PARENT" => "DATA_SOURCE"
	)
);
?>