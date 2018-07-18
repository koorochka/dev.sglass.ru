<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '<div class="no-padding border-bottom top-bar-dark">';
$strReturn .= '<div class="container">';
$strReturn .= '<div class="row">';
$strReturn .= '<div class="col-md-12">';
$strReturn .= '<ol class="breadcrumb breadcrumb-finance">';
$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	$nextRef = ($index < $itemSize-2 && $arResult[$index+1]["LINK"] <> ""? ' itemref="bx_breadcrumb_'.($index+1).'"' : '');
	$child = ($index > 0? ' itemprop="child"' : '');
	$arrow = ($index > 0? '<i class="fa fa-angle-right"></i>' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
        if($index){
            $strReturn .= '
			<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"'.$child.$nextRef.'>
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="url"> '.$title.'</a>
			</li>';
        }
        else{
            $strReturn .= '
			<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"'.$child.$nextRef.'>
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="url"><i class="fa fa-home" aria-hidden="true"></i> '.$title.'</a>
			</li>';
        }
	}
	else
	{
		$strReturn .= '<li class="active">'.$title.'</li>';
	}
}

$strReturn .= '</ol></div></div></div></div>';

return $strReturn;