<?php

$lang['text_swaping'] = ' SWAPING '; 
$lang['text_swaping_existing_product'] = ' Select product from your existing list? '; 
$lang['text_swaping_with_existing'] = 'Swaping with current products'; 
$lang['text_swaping_with_new'] = 'Add New Product for swaping';


foreach($lang as $key => $val)
{
	$GLOBALS['language'][$key] = $val;
}

?>