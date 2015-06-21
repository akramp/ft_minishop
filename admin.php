<link rel="stylesheet" type="text/css" href="style.css">
<?php
include('shop_library.php');
include('div/head.php');	
session_start();
$tab = unserialize(file_get_contents("../private/passwd"));
sort($tab);
echo"<h1>Gestion des utilisateurs:</h1><br />";
$new = array();?><div class="lol"><?php
foreach ($tab as &$val)
{
	if ($val['login'] != "" && $val['login'])
	{
echo $val['login']."<form action='delete.php' method='POST'><input type=hidden name=lol value=".$val['login']."><input type='submit' name='submit' value='del'/></form>";
}
}?></div><?php

echo"<h1>Historique des commandes:</h1>";
?>
<center><table border="solid black 1px">
	<thead>
		<tr>
			<th><strong>Date</strong></th>
			<th><strong>Client</strong></th>
			<th><strong>Articles</strong></th>
			<th><strong>Total</strong></th>
		</tr>
	</thead>
	<?php
	$orders = shop_get_orders();
	foreach ($orders as $c)
	{
?>
<tr>
	<td><?php echo $c['date']; ?></td>
	<td><?php echo $c['user_id']; ?></td>
	<td>
		<?php
		$articles = unserialize($c['content']); 
		$total = 0;?>
		<table>
			<?php
			foreach ($articles as $a)
				{?>
			<tr>
				<td><?php echo $a['name'] . " x"; ?></td>
				<td><?php echo $a['quantity']; ?></td>
				<td><center><?php echo "<bold>" . $a['price'] . "</bold>"; $total += $a['price'] * $a['quantity']?> &euro;</center></td>
			</tr>
			<?php } ?>
		</table>
	</td>
	<td><center><?php echo $total; ?></center></td>
</tr>
<?php } ?>
</table></center>
<br /><a class='link' href='index.php'>Back</a>
