<?php
include('shop_library.php');
if (!isset($_SESSION))
	session_start();

if (isset($_GET['id']) && isset($_SESSION['cart'][$_GET['id']]))
{
	unset($_SESSION['cart'][$_GET['id']]);
	shop_redirect_prev();
}
?>
