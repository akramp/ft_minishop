<link rel="stylesheet" type="text/css" href="style.css">
<?php

$login = $_POST['lol'];
$tab = unserialize(file_get_contents("../private/passwd"));
foreach ($tab as &$val)
{
	if ($val["login"] == $login)
	{
		$val = "";
		sort($tab);
		$tab = serialize($tab);
		file_put_contents("../private/passwd", $tab);
		echo $login." user delete\n";
		echo "<br /><a class='link' href='index.php'>Back</a>";
	}
}

?>