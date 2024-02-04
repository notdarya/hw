<?php
session_start();
include_once 'controllers/db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Панель администратора</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<link rel="stylesheet" href="../assetss/adapt.css">
</head>
<body>
	<div class="wrapper">
		<header>
		    <div class="logo">
				<!-- <a class="logotip" href="/index.php"><img src="Carpe diem\сайт\img\главная\логотип.png" alt=""></a> -->
				<a class="leibl" href="/index.php ">carpe diem</a>
			</div>
			<?php
				echo"
				<div class=exit>
			 <a href=/adminka/dashboard.php>Панель администратора</a>
				<a href=/index.php target=_blank>Перейти на сайт</a> 
				<a href=/adminka/index.php>Выход</a>
			</div>";
			?>
		</header>
		<hr>
		<nav>
		<a href="dashboard.php">Главная панель</a>
		<a href="users.php">Пользователи</a>
		<a href="categories.php">Категории товаров</a>
		<a href="products.php">Товары</a>
		<a href="orders.php">Заказы</a>      
	</nav>
	<hr>
	<!-- if ($_SESSION['admin']) {
		echo "<a href="/" target='_blank'>Привет,</a> 
		".$_SESSION['admin']['surname']." ".$_SESSION['admin']['name'].
		"<a href='/'>Перейти на сайт</a> <a href='/index.php'>Выход</a>";
	} -->