<?php


$lang["text_email"] = ' Email ';
$lang["text_message"] = ' Message! ';
$lang["text_spam"] = ' Spam Form ';
$lang["text_fraud"] = ' Fraud';
$lang["text_miscategorized"] = ' Miscategorized';
$lang["text_abusement"] = ' Abusement';
$lang["text_repetition"] = 'Repetition';
$lang["text_spam_button"] = ' Report As a Spam ';

foreach($lang as $key => $val)
{
	$GLOBALS['language'][$key] = $val;
}
?>