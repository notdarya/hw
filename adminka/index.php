<?php
include_once 'adminka/controllers/db.php';
// if ($_SESSION['user']) {
// 	header("Location:/dashboard.php");
// }
if ($_SESSION['admin']) {
header("Location:/adminka/dashboard.php");
};
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Админпанель</title>
	<link rel="stylesheet" type="text/css" href="adminka/assets/style.css">
</head>
<body>
	<div class="authorization_a">
		<h2>Панель<br>администратора</h2>
		<form method="POST" action="adminka/controllers\auth.php">
			<input type="text" name="login_auth" placeholder="Логин"><br>
			<input type="password" name="pass_auth" placeholder="Пароль"><br>
			<input type="submit" name="auth_admin" value="Войти"><br><br>
			<?php
	        if ($_SESSION['mess_a']) {
	        echo '<font color=#3081da <p class="msg">'.$_SESSION['mess'].'</p></font>';
	        }
	        if ($_SESSION['error']) {
	        echo '<font color=red <p class="msg">'.$_SESSION['error'].'</p></font>';
	        }
	        unset($_SESSION['mess_a']);
	        unset($_SESSION['error']);
	        ?><br>
		</form>
	</div>
	<?php
	// echo "$_SESSION[mess]";
	// echo "$_SESSION[error]";

	// unset($_SESSION['mess']);
	// unset($_SESSION['error']);
	// echo "<font color=red>".$_SESSION['mess_error']."</font>";
	// unset($_SESSION['mess_error']);
	?>
</body>
</html>
