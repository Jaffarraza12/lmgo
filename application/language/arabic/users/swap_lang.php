<?php
$lang['text_swaping'] = ' المقايضة '; 
$lang['text_swaping_existing_product'] = ' حدد المنتج من القائمة الموجودة لديك '; 
$lang['text_swaping_with_existing'] = 'المقايضة بالمنتجات الحالية'; 
$lang['text_swaping_with_new'] = 'أضف منتج جديد للمقايضة';


foreach($lang as $key => $val)
{
	$GLOBALS['language'][$key] = $val;
}

?>