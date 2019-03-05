<?php

$lang['text_serial'] = ' # '; 
$lang['text_swap_picture'] = 'الصور'; 
$lang['text_swap_title'] = 'العنوان '; 
$lang['text_swap_action'] = ' الفعل '; 
$lang['text_swap_compare'] = ' المقارنة ';
$lang['text_swaping_but_login'] = 'الشروع في تسجيل الدخول إلى قائمة العناصر الخاصة بك';


foreach($lang as $key => $val)
{
	$GLOBALS['language'][$key] = $val;
}

?>