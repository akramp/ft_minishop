<?php
session_start();
include("auth.php");
$login = $_POST["login"];
$passwd = hash(whirlpool, $_POST["passwd"]);
if (auth($login, $passwd) == true)
{
	$_SESSION["loggued_on_user"] = $login;
	include"index.php";
}
else
{
	echo "ERROR\n";
	$_SESSION["loggued_on_user"] = "";
}
?>