<?php

$lang['text_serial'] = ' # '; 
$lang['text_swap_picture'] = 'Pictures'; 
$lang['text_swap_title'] = 'Title '; 
$lang['text_swap_action'] = ' Action '; 
$lang['text_swap_compare'] = ' Compare ';
$lang['text_swaping_but_login'] = 'Proceed to <a href="'.base_url().'place-an-advertises/">place an advertise</a> to list your items';


foreach($lang as $key => $val)
{
	$GLOBALS['language'][$key] = $val;
}

?>