<?php include('shop_library.php') ?>
<DOCTYPE html>
<html><?php
session_start()?>
	<head>
		<title>Fruitland</title>
		<?php include('div/head.php'); ?>
	</head>
	<body>
	<?php include('div/cart_nav.php'); ?>
	<div class="container">
		<?php include('div/header.php') ?>
		<h1 class="site_title">BIENVENUE SUR FRUITLAND</h1><?php include('user.php'); ?>
		<hr/>
		<ul class="display_shop">
		<?php
			$articles = shop_get_results("SELECT * FROM articles ORDER BY RAND() LIMIT 10");
			foreach ($articles as $article) {?>
					<li><a href="article.php?id=<?php echo $article['id']; ?>">
						<img width="200" height="200" src="<?php echo ($article['image_url']); ?>">
						<div class="name"><?php echo ($article['name']); ?></div>
					</a></li>
			<?php } ?>
			</ul>
		<a href="articles.php">Plus de fruits !</a>
	</div>
	</body>
</html>
