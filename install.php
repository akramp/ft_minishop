#!/usr/bin/php
<?php

if (count($argv) != 3)
{
	echo "Invalid argument\n";
	echo "\033[31musage:\033[32m ./install.php login password\033[00m\n";
	exit ;
}
$user = $argv[1];
$pwd = $argv[2];
$db = 'shop';

file_put_contents(".passwd", "$user\n$pwd");
$link = mysqli_connect('127.0.0.1', $user, $pwd);
if (!$link)
	die('Erreur de connexion (' .mysqli_connect_errno() . ') ' .mysqli_connect_error() ."\n");
if (mysqli_query($link, "CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci"))
	echo "Initialising database...\n";
if (mysqli_query($link, "USE `shop`;"))
echo "Launching shopdb...\n";

if (mysqli_query($link, "DROP TABLE IF EXISTS `articles`;"))
echo "Emptying shopdb...\n";
if (mysqli_query($link, "CREATE TABLE IF NOT EXISTS `articles` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`category` int(10) unsigned NOT NULL,
	`description` text NOT NULL,
	`image_url` varchar(255) NOT NULL,
	`price` float NOT NULL,
	PRIMARY KEY (`id`),
	KEY `name` (`name`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;"))
	echo "Creating articles...\n";
if (mysqli_query($link, "INSERT INTO `articles` (`id`, `name`, `category`, `description`, `image_url`, `price`) VALUES
	(1, 'Banane pygmée', 2, 'Lorem', 'http://www.vegactu.com/wp-content/uploads/2014/08/Chevauchant-la-banane.jpg', 750),
	(2, 'Banane dark-vador', 2, 'Lorem', 'http://www.danstapub.com/wp-content/uploads/2013/08/dans-ta-pub-sculpture-sur-banane-1.jpg', 49),
	(3, 'Costume banane', 2, 'Lorem', 'http://www.atelier-mascarade.com/ph_v39438,v39438,costume-banane-a2', 200),
	(4, 'Costume kiwi', 3, 'Lorem', 'http://www.desiree.co.nz/uploads/images/GalleryThumbs/12882-8.jpg', 150),
	(5, 'Orange hexa', 6, 'Lorem', 'http://www.actupus.com/wp-content/uploads/2014/02/Pentagonal-Shaped-Fruit-Cut.jpg', 25),
	(6, 'Pasteque carrée', 5, 'Lorem', 'http://auto.img.v4.skyrock.net/8713/77918713/pics/3067528319_1_3_ZcsYDzeH.jpg', 15),
	(7, 'Ca pique', 5, 'Lorem', 'http://www.marevueweb.com/wp-content/uploads/2011/07/Durian.jpg', 1),
	(8, 'Oeuf de dragon', 5, 'Lorem', 'http://www.marevueweb.com/wp-content/uploads/2011/07/Salak.jpg', 999),
	(9, 'Fruit du peché', 5, 'Lorem', 'http://www.marevueweb.com/wp-content/uploads/2011/07/Dragon-Fruit.jpg', 55),
	(10, 'Citron', 7, 'Lorem', 'http://www.quizz.biz/uploads/quizz/319534/6_fkm4o.jpg', 001),
	(11, 'Fraise', 7, 'Lorem', 'http://www.quizz.biz/uploads/quizz/319534/icons/x1_l9pv0.jpg.pagespeed.ic.uR0C7OrtjF.webp', 002),
	(12, 'Poire', 7, 'Lorem', 'http://aghucaf.files.wordpress.com/2011/06/les-fruits-pourris-ont-une-vie-9.jpg?w=640', 003),
	(13, 'Carotte violette', 9, 'Lorem', 'http://www.quizz.biz/uploads/quizz/354852/24_ix7ti.jpg', 4.2),
	(14, 'Poivron', 9, 'Lorem', 'http://img.src.ca/2012/01/16/635x357/120116_hm9k1_verte_legume_parfait_1_sn635.jpg', 8.9),
	(15, 'potiron', 9, 'Lorem', 'http://s.plurielles.fr/mmdia/i/35/5/la-citrouille-un-legume-a-cuisiner-en-fevrier-10646355kcdgx_2041.jpg', 123),
	(16, 'melon', 8, 'ATTENTION VIVANT!', 'http://www.fredzone.org/wp-content/uploads/2008/08/animal2.png', 199),
	(17, 'Avocat', 9, 'Lorem', 'http://2.bp.blogspot.com/_JgqUG3QeK8g/SmV3zfAlalI/AAAAAAAACPQ/kiXgInuYB5Q/s320/avocat.gif', 2.6),
	(18, 'Kiwi', 3, 'Lorem', 'http://img.over-blog-kiwi.com/0/90/41/18/20140601/ob_109408_kiwi.jpg', 5),
	(19, 'Chou roma', 9, 'Lorem', 'https://c1.staticflickr.com/9/8475/8386654476_30b5824f9d.jpg', 10),
	(20, 'Fruit inconnu', 5, 'Lorem', 'http://img.over-blog.com/600x401/2/02/19/60/preparatif_canada/08-kiwano.jpg', 50),
	(21, 'Dat ass poire', 6, 'Lorem', 'http://www.vitamin-ha.com/wp-content/uploads/2014/02/Wierd-and-suggestive-mutant-fruit-05.jpg', 16),
	(22, 'Apple', 8, 'Lorem', 'http://patentlyo.com/media/2015/02/Apple-logo1.jpg', 99999),
	(23, 'Belle pomme', 4, 'Lorem', 'https://yannickdurden.files.wordpress.com/2013/01/logo-apple-mac-brand-red.jpg', 18),
	(24, 'Pomme boudda', 4, 'Lorem', 'http://coolsandfools.com/wp-content/uploads/2014/10/fruit-mould-post-2.jpg', 15),
	(25, 'Pomme velue', 6, 'Lorem', 'http://www.incrediblethings.com/wp-content/uploads/2013/01/strange-fruits.jpg', 1399),
	(26, 'Pomme bleu', 6, 'Lorem', 'http://auto.img.v4.skyrock.net/0468/23510468/pics/680943589.jpg', 789),
	(27, 'Banane dragon', 7, 'Lorem', 'http://golem13.fr/wp-content/uploads/2013/10/BananaManga-09.jpg', 399),
	(28, 'Kiwi sauvage', 3, 'Lorem', 'http://www.dinosoria.com/oiseaux/kiwi-blanc.jpg', 120);"))
echo "Inserting elements... (articles)\n";

if (mysqli_query($link, "DROP TABLE IF EXISTS `categories`;"));
echo "Dropping table categories...\n";
if (mysqli_query($link, "CREATE TABLE IF NOT EXISTS `categories` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;"));
	echo "Creating table categories...\n";
if (mysqli_query($link, "INSERT INTO `categories` (`id`, `name`) VALUES
	(2, 'Bananes'),
	(3, 'Kiwis'),
	(4, 'Pommes'),
	(5, 'Fruits japonais'),
	(6, 'Fruits wtf'),
	(7, 'Fruits pourris'),
	(8, 'Fruits trop cher'),
	(9, 'L&eacute;gume');"))
	echo "Inserting elements (categories)...\n";

if (mysqli_query($link, "DROP TABLE IF EXISTS `orders`;"));
	echo "Dropping table orders...\n";
if (mysqli_query($link, "CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;"));
	echo "Creating table orders...\n";
	?>
