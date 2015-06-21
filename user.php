<div class='login'>
<?php session_start();
include("pic.php");?>

<link rel="stylesheet" type="text/css" href="style.css">
<?php if ($_SESSION["loggued_on_user"] != "" && $_SESSION["loggued_on_user"])
	{
		pic($_SESSION["loggued_on_user"]);
		echo "<table class='lol'><tr><td>Hi ".$_SESSION['loggued_on_user']."</td></tr>";
		echo "<tr><td><a class='link' href='manage.php'>Mon compte</a></td></tr>";
		if ($_SESSION["loggued_on_user"] == "jvolonda" || $_SESSION["loggued_on_user"] == "rdantzer")
		echo "<tr><td><a class='link' href='admin.php'>Panneau d'administration</a></td></tr>";
		echo "<tr><td><a class='link' href='logout.php'>Se d&eacute;connecter</a></td></tr></table>";
	}
?>
<?php 
if ($_SESSION["loggued_on_user"] == "" || !$_SESSION["loggued_on_user"])
{
	echo"<table class = 'lol'><tr><td >
	<form action='login.php' method='POST'>
		Identifiant: <input type='text' name='login' />
		<br />
		mot de passe: <input type='password' name='passwd' />
		<input type='submit' name='submit' value='OK'/>
	</form></td></tr>";
	echo "<tr><td class='but1'><a class='link' href='inscription.php'>inscription</a></td></tr></table>";
}
?>
</div>
