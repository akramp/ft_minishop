<?php
include('shop_library.php');

if (isset($_POST['submit'])) {
	if (!isset($_SESSION))
		session_start();
	if (!isset($_SESSION['cart']))
		$_SESSION['cart'] = array();
	if (!isset($_SESSION['cart'][$_POST['id']]))
	{
		$article = shop_get_results("SELECT * FROM articles WHERE id = ".intval($_GET['id']));
		if (count($article) !== 0)
			$_SESSION['cart'][$_POST['id']] = array("quantity" => 0, "name" => $article[0]['name']);
	}
	if (isset($_SESSION['cart'][$_POST['id']]))
		$_SESSION['cart'][$_GET['id']]['quantity'] += $_POST['quantity'];
}
else {
	if (!isset($_SESSION))
		session_start();
	if (!isset($_GET['id']))
		header("Location: articles.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include('div/head.php'); ?>
		<title><!--TITLE--></title>
	</head>
	<body>
		<?php include('div/header.php'); ?>
		<?php
include('shop_library.php');
$path = "$_SERVER[REQUEST_URI]"

?>
<div id="lol">
	<ul>

	<h1>Panier :</h1>
		<?php if (isset($_SESSION['cart']))
			$total = 0;
			foreach($_SESSION['cart'] as $i => $c)
			{ ?>
				<li><span class="quantity"><?php echo ($c['quantity']); ?></span>
				<span class="name"><?php echo ($c['name']); ?></span>
				<a href="delete_cart_id.php?id=<?php echo $i ?>"><i>X</i></a></li>
				<?php
				$result = shop_get_results("SELECT * FROM articles");
				foreach ($result as $item) {
					if ($item['name'] == $c['name'])
						$total = $total + ($item['price'] * $c['quantity']);
				}
				?>
			<?php }
		?>
		<h1><?php
		if ($total == 0)
			echo("Aucun article");
		else {?>
		Total: <?php echo($total). "&#x20AC;"; ?></h1>
		<?php } ?>
		<?php
			if ($_SESSION['loggued_on_user'] && $total != 0)
				echo("<a class='link' href='commande.php'>Commander</a>");
			else if (!$_SESSION['loggued_on_user'])
				echo("<hr/>Connectez vous pour commander");
		?>
	</ul>
</div>

		<section>
<?php
if (isset($_GET['id'])) {
	$article = shop_get_results("SELECT * FROM articles WHERE id = ".intval($_GET['id']));
	if (count($article) === 0)
		header("Location: articles.php");
	$article = $article[0];
}
?>
			<ul class="article">
					<img width="400" src="<?php echo $article['image_url']; ?>">
					<h1 style="background-color: rgba(255, 255, 255, 0.4);"><?php echo $article['name']; ?></h1>
					<div class="price"><?php echo $article['price']; ?> &#x20AC;</div>
					<div class="desc"><?php
					if ($article['description'] == "Lorem") {
						echo (file_get_contents('http://loripsum.net/api'));
					}
					else {
						echo ($article['description']);
					}
					?></div>
					<hr>
					<form method="post">
						<input type="hidden" value="<?php echo $article['id']; ?>" name="id">
						<input type="number" value="1" min="1" placeholder="quantit&eacute;" name="quantity">
						<input type="submit" name="submit" value="Ajouter au panier">
					</form>
			</ul>
			</section>
	</body>
</html>
<?php
$pageContents = ob_get_contents (); // Get all the page's HTML into a string
ob_end_clean (); // Wipe the buffer

// Replace <!--TITLE--> with $pageTitle variable contents, and print the HTML
echo str_replace ('<!--TITLE-->', $article['name'], $pageContents);
?>
