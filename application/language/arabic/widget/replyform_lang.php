<?php

$lang["text_heading"] = ' الرد على هذه الإعلان ';
$lang["text_your_name"] = ' اسمك';
$lang["text_label_name"] = 'الاسم';
$lang["text_your_email"] = ' بريد الإلكتروني';
$lang["text_label_email"] = ' البريد الإلكتروني';
$lang["text_your_phone"] = ' هاتفك';
$lang["text_label_phone"] = ' رقم الهاتف';
$lang["text_your_message"] = ' رسالتك!';
$lang["text_your_description"] = 'يرجى إدخال الأربعة أحرف الظاهرة في الصورة على اليسار.  ';
$lang["text_your_wantit"] = ' الرد ';
$lang["text_your_or"] = ' أو ';
$lang["text_swapit"] = ' قايض';
$lang["text_terms"] = " بالنقر على أريدها أو أقايضها، فإنني أقبل بشروط وأحكام وسياسة الخصوصية لموقع دوبازارو ";

foreach($lang as $key => $val)
{
	$GLOBALS['language'][$key] = $val;
}


?>