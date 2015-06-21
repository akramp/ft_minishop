<?php
function shop_connect_to_db(){
	if (file_exists(".passwd"))
	{
		$user = explode("\n", file_get_contents(".passwd"));
		$link = mysqli_connect('localhost', $user[0], $user[1], 'shop');
		if (!$link)
			die('Erreur de connexion ('.mysqli_connect_errno().') '.mysqli_connect_error());
		return ($link);
	}
	die('No credential found !\n');
}

function shop_close_connection_to_db($link)
{
	mysqli_close($link);
}

function shop_get_results($query) {
	$link = shop_connect_to_db();
	if ($result = mysqli_query($link, $query))
	{
		while ($tab[] = mysqli_fetch_assoc($result))
		{
		}
		mysqli_free_result($result);
		shop_close_connection_to_db($link);
		array_pop($tab);
		return ($tab);
	}
}

function shop_exec_query($query) {
	$ret = true;
	$link = shop_connect_to_db();
	$ret = mysqli_query($link, $query);
	shop_close_connection_to_db($link);
	return (!$ret ? false : true);
}

function shop_redirect_prev()
{
	if (!isset($_SESSION))
		session_start();
	if (isset($_SERVER['HTTP_REFERER']))
	{
		$last = end(explode("/", $_SERVER['HTTP_REFERER']));
		if ($last == "")
			header("Location: index.php");
		else
			header("Location: $last");
	}
	else
		header("Location: index.php");
}

function get_price_by_name($name)
{
	$result = shop_get_results("SELECT * FROM articles");
	foreach ($result as $item) {
		if ($item['name'] == $name)
			return ($item['price']);	
	}
	return (0);
}

function shop_add_order($login, $cart)
{
	$user = $login;
	$tmp = array();
	foreach ($cart as $i => $c)
	{
		$c['price'] = get_price_by_name($c['name']);
		$tmp[] = $c;
	}
	date_default_timezone_set("Europe/Paris");
	shop_exec_query("INSERT INTO `orders` (`user_id`, `content`, `date`) VALUES ('".$login."', '".serialize($tmp)."', '".date("Y-m-d H:i:s")."')");
}

function shop_get_orders()
{
	$orders = shop_get_results("SELECT * FROM orders");
	return ($orders);
}
?>
