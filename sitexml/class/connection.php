<?php 
if($_SERVER['SERVER_NAME']=="localhost"){
	$HOST="localhost";
	$USERNAME="root";
	$PASSWORD="password";
	$DB="dubazaaro";	
}
else
{
	$HOST="localhost";
	$USERNAME="dubaza14_dubdu";
	$PASSWORD=".3^6c!7mA5)&";
	$DB="dubaza14_du14";
}
global $con;
$con = mysql_connect($HOST,$USERNAME,$PASSWORD) or die("Invalid Host".mysql_error());
$db=mysql_select_db($DB) or die("Failed to Access Database ".mysql_error());
mysql_query("SET NAMES utf8;");
mysql_query("SET CHARACTER_SET utf8;");
?>