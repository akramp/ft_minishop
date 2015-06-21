<?php
include('shop_library.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Tout les articles</title>
		<?php include('div/head.php'); ?>
	</head>
	<body>
		<?php include('div/header.php'); ?>
		<?php include('div/cart_nav.php'); ?>
		<div class="container">
			<section>
				<ul class="menu">
					<li><a href="articles.php">Tous</a></li>
<?php
$categories = shop_get_results("SELECT * FROM categories ORDER BY name");
foreach ($categories as $categ) {
?>

					<li>
						<a href="articles.php?categ=<?php echo $categ['id']; ?>"><?php echo $categ['name']; ?></a>
					</li>

<?php

} // end foreach categories
?>
				</ul>
				<ul class="display_shop">
<?php
$categ_filter = isset($_GET['categ']) ? "WHERE category = ".intval($_GET['categ'])." " : "";
$articles = shop_get_results("SELECT * FROM articles ".$categ_filter."ORDER BY name");
foreach ($articles as $article) {
?>
					<li><a href="article.php?id=<?php echo $article['id']; ?>">
						<img width="200" height="200" src="<?php echo ($article['image_url']); ?>">
						<div class="name"><?php echo ($article['name']); ?></div>
					</a></li>
<?php
} // end foreach article
?>
				</ul>
<?php
if (count($articles) === 0) {
?>
				<p>Aucun fruit dans cette cat&eacute;gorie...
<?php
} // fin if 0
?>
			</section>
		</div>
		<?php include('elements/footer.php'); ?>
	</body>
</html>
