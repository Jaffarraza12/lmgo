<?php


$lang["text_email"] = ' البريد الإلكتروني ';
$lang["text_message"] = ' الرسالة! ';
$lang["text_spam"] = ' صيغة سبام ';
$lang["text_fraud"] = ' الاحتيال';
$lang["text_miscategorized"] = ' تصنيف خاطئ';
$lang["text_abusement"] = ' إساءة';
$lang["text_repetition"] = 'تكرار';
$lang["text_spam_button"] = ' إبلاغ عن سبام ';

foreach($lang as $key => $val)
{
	$GLOBALS['language'][$key] = $val;
}
?>