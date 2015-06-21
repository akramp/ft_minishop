<?php

function pic($p1)
{
	$tab = unserialize(file_get_contents("../private/passwd"));
	sort($tab);
	foreach ($tab as &$val)
	{
		if ($val['login'] == $p1 && $val['pic'] != "")
		{
				echo "<img src='".$val['pic']."' HEIGHT='50' WIDTH='50'/>";
		}
	}
}

?>