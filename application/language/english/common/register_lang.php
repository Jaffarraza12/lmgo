<?php
/************************* Register -************************/
$lang["txt_first_name"] = 'First Name : ';
$lang["txt_last_name"] = 'Last Name : ';
$lang["txt_text_fb_connect"] = "Connect";
$lang["txt_create_account"] = "Create a FREE account";
$lang["txt_email"] = "Email Address : ";
$lang["txt_confirm_email"] = "Confirm Email : ";
$lang["txt_gender"] = "Gender : ";
$lang["txt_male"] = "Male";
$lang["txt_female"] = "Female";
$lang["txt_dob"] = "Date of birth : ";
$lang["txt_from"] = "I am from : ";
$lang["txt_register_btn"] = "Register";
$lang["txt_submit_btn"] = "Submit";
$lang["text_login"] = "Login";
$lang["txt_note"] = "Note: All fields are mandatory";
$lang["txt_error"] = "There is some error, please try again.";
$lang["txt_reg_signin"] = "Sign In / Register";
$lang["txt_new_register"] = "New Registration";
$lang["term"] = "By clicking on Register, you agree to the Dubazaaro Terms and Conditions and the Dubazaaro Privacy Policy.";
$lang["country_eng"] = "en_title";
$lang["txt_password"] = "Password : ";
$lang["txt_confirm_password"] = "Confirm Password : ";
$lang["er_email"] = "Please enter your email address";
$lang["er_cemail"] = "Confirm email address does not match";
$lang["er_password"] = "Please enter the password";
$lang["er_cpassword"] = "Confirm password does not match";

$lang["er_firstname"] = "Please enter your first name";
$lang["er_lastname"] = "Please enter your last name";
$lang["er_dob"] = "Please select your date of birth";
$lang["er_country"] = "Please select your country";

$lang["email_error"] = "Email already exists, please use another email";

$lang["txt_update_account"] = "Update Account";
$lang["txt_myaccount"] = "My Account";
$lang["txt_myprofile"] = "My Profile";
$lang["txt_cancel"] = "Cancel";
$lang["txt_editaccount"] = "Edit Account";
$lang["txt_dashboard"] = "My Dashboard";

$lang["txt_loginEr"] = "Please enter email and password";
$lang["txt_loginAfter"] = "Username or password invalid";
$lang["txt_forgot"] = "Forgot Password";
$lang["txt_changePass"] = "Leave blank if you dont want to change";

$lang["txt_LoginClick"] = "Click here for login";
$lang["txt_btn_changePass"] = "Change Password";
$lang["txt_email_notfound"] = "Email not found";
$lang["txt_someError"] = "There is some error, please try again";
$lang["txt_checkMail"] = "We have sent forgot password link to your inbox. please check your mail";
$lang["txt_changeP"] = "Your password successfully changed.";
$lang["txt_updateP"] = "Update Password";

/*************************** END REGISTER ********************/

/******************* User Profile **********************/
$lang["txt_profile"] = "Profile";
$lang["txt_profile_fullName"] = "Name";
$lang["txt_profile_wish"] = "My Wishlist";
$lang["txt_profile_tSkill"] = "My Skills";
$lang["txt_profile_ads"] = "Total Ads Posted";

$lang["txt_profile_skill"] = "Total Skills Posted";
$lang["txt_profile_sendMsg"] = "Send Message";

$lang["txt_profile_noWish"] = "No wishlist found";
$lang["txt_profile_noskill"] = "No skill found";

$lang["txt_profile_noitem"] = "No item found";
$lang["txt_profile_latestitem"] = "My Latest Items";
/********************* end User Profile ************/
$lang["txt_fb_reg"] = "Register Using Facebook";
$lang['txt_contact'] = 'Contact';
foreach($lang as $key => $val)
{
	$GLOBALS['language'][$key] = $val;
}

?>