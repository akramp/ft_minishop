<!DOCTYPE html>
<html>
	<head>
		<title>Commande</title>
		<?php include('div/head.php') ?>
	</head>
	<body>
		<?php include('div/header.php'); ?>
		<?php include_once('shop_library.php') ?>
		<div class="container">
			<section>
			<?php
			if ($_SESSION['cart'])
				{
					$total = 0;
					?>
					<table>
					<h1>Commande pour <?php echo $_SESSION['loggued_on_user']?></h1>
					<hr>
					<thead>
						<tr>
							<th><strong>Nom</strong></th>
							<th><strong>Quantit&eacute;</strong></th>
							<th><strong>Prix</strong></th>
						</tr>
					</thead>
					<?php
					if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0 && isset($_POST['submit']))
					{
						shop_add_order($_SESSION['loggued_on_user'], $_SESSION['cart']);
						$_SESSION['cart'] = null;
						header("location: thanks.php");
					}
					foreach ($_SESSION['cart'] as $i => $c) {?>
						<tr>
							<td><?php echo $c['name']; ?></td>
							<td><?php echo $c['quantity']; ?></td>
							<?php
							$price = get_price_by_name($c['name']);
							$total += $price * $c['quantity'];
							?>
							<td><?php echo $price; ?> &euro;</td>
						</tr>
					<?php } ?>
						<tr>
							<td><strong>Total</strong></td>
							<td>&nbsp;</td>
							<td><?php echo $total; ?> &euro;</td>
						</tr>
					</table>
					<form method="post">
						<input type="hidden" name="submit" value="OK">
						<button class="submit_button" type="submit">Valider la commande</button>
					</form>
			<?php }
		?>
			</section>
		</div>
	</body>
</html>
