<?php
/************************* Register -************************/
$lang["txt_first_name"] = 'الاسم الأول : ';
$lang["txt_last_name"] = 'الاسم الأخير : ';
$lang["txt_text_fb_connect"] = "تواصل";
$lang["txt_create_account"] = "أنشيء حساب مجاني";
$lang["txt_email"] = "البريد الإلكتروني : ";
$lang["txt_confirm_email"] = "تأكيد البريد الإلكتروني : ";
$lang["txt_gender"] = "النوع : ";
$lang["txt_male"] = "ذكر";
$lang["txt_female"] = "أنثى";
$lang["txt_dob"] = "تاريخ الميلاد : ";
$lang["txt_from"] = "الجنسية : ";
$lang["txt_register_btn"] = "التسجيل";
$lang["txt_submit_btn"] = "Submit";
$lang["text_login"] = "تسجيل الدخول";
$lang["txt_note"] = "ملاحظة: جميع الحقول إلزامية";
$lang["txt_error"] = "يوجد خطأ، يرجى تكرار المحاولة.";
$lang["txt_reg_signin"] = "الدخول / تسجيل جديد";
$lang["txt_new_register"] = "تسجيل جديد";
$lang["term"] = "بالنقر على التسجيل فلإنك توافق على الشروط والأحكام وسياسة الخصوصية لموقع دوبازارو.";

$lang["country_eng"] = "en_title";
$lang["txt_password"] = "كلمة السر : ";
$lang["txt_confirm_password"] = "تأكيد كلمة السر : ";
$lang["er_email"] = "يرجى إدخال البريد الإلكتروني";
$lang["er_cemail"] = "البريد الإلكتروني غير متطابق";
$lang["er_password"] = "يرجى إدخال كلمةالسر";
$lang["er_cpassword"] = "كلمةالسر غير متطابقة";

$lang["er_firstname"] = "يرجى إدخال الاسم الأول";
$lang["er_lastname"] = "يرجى إدخال الاسم الأخير";
$lang["er_dob"] = "يرجى اختيار تاريخ الميلاد";
$lang["er_country"] = "يرجى اختيار الدولة";

$lang["email_error"] = "البريد الإلكتروني مسجل لدينا، يرجى اختيار بريد إلكتروني آخر";


$lang["txt_update_account"] = "تحديث الحساب";
$lang["txt_myaccount"] = "حسابي";
$lang["txt_myprofile"] = "صفحتي";
$lang["txt_cancel"] = "إلغاء";
$lang["txt_editaccount"] = "تعديل الحساب";
$lang["txt_dashboard"] = "لوحة التحكم";

$lang["txt_loginEr"] = "يرجى إدخال البريد الإلكتروني وكلمة السر";
$lang["txt_loginAfter"] = "اسم المستخدم أو كلمة السر غير صحيحة";
$lang["txt_forgot"] = "نسيت كلمة السر";
$lang["txt_changePass"] = "اترك الخانة فارغة إذا لم ترغب في تغيير كلمة السر";

$lang["txt_LoginClick"] = "انقر هنا للدخول";
$lang["txt_btn_changePass"] = "تغيير كلمة السر";
$lang["txt_email_notfound"] = "البريد الإلكتروني غير موجود";
$lang["txt_someError"] = "يوجد خطأ، الرجاء تكرار المحاولة";
$lang["txt_checkMail"] = "لقد أرسلنا رابط لكلمة السر المنسية إلى بريدك الإلكتروني، يرجى التحقق من صندوق الرسائل الواردة.";
$lang["txt_changeP"] = "تم تغيير كلمة السر بنجاح";
$lang["txt_updateP"] = "تحديث كلمة السر";

/*************************** END REGISTER ********************/

/******************* User Profile **********************/
$lang["txt_profile"] = "صفحتي";
$lang["txt_profile_fullName"] = "الاسم";
$lang["txt_profile_wish"] = "My Wishlist";
$lang["txt_profile_tSkill"] = "مهاراتي";
$lang["txt_profile_ads"] = "إجمالي الإعلانات المنشورة";

$lang["txt_profile_skill"] = "إجمالي المهارات المنشورة";
$lang["txt_profile_sendMsg"] = "أرسل رسالة";

$lang["txt_profile_noWish"] = "لا توجد قائمة للمفضلات";
$lang["txt_profile_noskill"] = "لا توجد مهارات";

$lang["txt_profile_noitem"] = "لا توجد إعلانات في هذه الفئة";
$lang["txt_profile_latestitem"] = "أحدث إعلاناتي";
$lang["txt_fb_reg"] = "سجل بإستخدام الفيسبوك";
$lang['txt_contact'] = 'اتصال';

/********************* end User Profile ************/

foreach($lang as $key => $val)
{
	$GLOBALS['language'][$key] = $val;
}

?>