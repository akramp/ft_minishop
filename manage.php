<link rel="stylesheet" type="text/css" href="style.css">
<h1>Change password</h1>
<div class="lol">
	<form action='modif.php' method='POST'>
		<?PHP
		session_start();
		echo"Identifiant: <input type='text' name='login' value=".$_SESSION['loggued_on_user'].">"?>
		<br />
		Ancien mot de passe: <input type='password' name='oldpw' /><br />
		Nouveau mot de passe: <input type='password' name='newpw' />
		<br />
		Nouvelle image de profile: <input type='text' name='pic' />
		<input type='submit' name='submit' value='OK'/>
	</form>
	</div>
<?php
echo "<a class='link' href='index.php'>Back</a>"?>