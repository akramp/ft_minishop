<?php
include('shop_library.php');
$path = "$_SERVER[REQUEST_URI]"

?>
<nav>
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
</nav>
