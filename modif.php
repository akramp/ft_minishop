<?php
if (!$_POST["login"])
{
	echo "ERROR\n";
	exit;
}
$tab = unserialize(file_get_contents("../private/passwd"));
$login = $_POST["login"];
$oldpw = hash('whirlpool', $_POST["oldpw"]);
$newpw = hash('whirlpool', $_POST["newpw"]);
$newpic = $_POST["pic"];
foreach ($tab as &$val)
{
	if ($val["login"] == $login && $newpic)
	{
		$val["pic"] = $newpic;
		$tab = serialize($tab);
		file_put_contents("../private/passwd", $tab);
		echo "your picture has been changed\n";
		echo "<br /><a class='link' href='index.php'>Back to main page</a>";
		exit;
	}
	if ($val["login"] == $login && $val["passwd"] == $oldpw && $val["passwd"] != $newpw && $oldpw != $newpw && $newpw)
	{
		$val["passwd"] = $newpw;
		$tab = serialize($tab);
		file_put_contents("../private/passwd", $tab);
		echo "your password has been changed\n";
		echo "<br /><a class='link' href='index.php'>Back to main page</a>";
		exit;
	}
}
echo "ERROR\n";
?>