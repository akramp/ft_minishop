<link rel="stylesheet" type="text/css" href="style.css">
<h1>Inscription</h1>

<div class='lol'>
	<form action="create.php" method="POST">
		Identifiant: <input type="text" name="login" />	
		<br />	
		Mot de passe: <input type="password" name="passwd" />
		<br />
		Image de profil: <input type="text" name="pic" />
		<input type="submit" name="submit" value="OK"/>	
	</form>
	</div>
<?php
echo "<a class='link' href='index.php'>Back</a>"?>