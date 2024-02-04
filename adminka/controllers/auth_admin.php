<?php
include 'db.php';
$login_auth=$_POST['login_auth'];
$pass_auth=$_POST['pass_auth'];
$auth_admin=$_POST['auth_admin'];
// Авторизация админа
if($auth_admin){
	if($login_auth && $pass_auth) {
		$out_auth_user="SELECT * FROM `users` WHERE login='$login_auth' AND pass='$pass_auth'";
		$run_auth_user=mysqli_query($connect,$out_auth_user);
		$num_user=mysqli_num_rows($run_auth_user);
		if ($num_user==1){
			$out_user=mysqli_fetch_array($run_auth_user);
		   if ($out_user['role']==1) {
			   $_SESSION['admin']=array(
				'id' => $out_user['id'], 
                'login' => $out_user['login'], 
                'surname' => $out_user['surname'], 
                'name' => $out_user['name'], 
                'l_name' => $out_user['l_name'], 
                'email' => $out_user['email'],
                'role' => $out_user['role'], 
                'status' => $out_user['status'],
                'avatar' => $out_user['avatar']
				); 
				$_SESSION['mess_a']="Успешная авторизация";
				header("Location:/adminka/dashboard.php");
		    }
		    else
		    {
			$_SESSION['error']="Недостаточно прав у пользователя";
			header("Location:/adminka/index.php");
		    }
	    }
	    else
	    {
		$_SESSION['error']="Такого пользователя нет";
		header("Location:/adminka/index.php");
	    }
	   // $_SESSION['error']="Успешная авторизация";
    }
    else
	{
	$_SESSION['error']="Заполните все поля";
	header("Location:/adminka/index.php");
	// echo $_SESSION['error'];
	// unset( $_SESSION['error']);
    }
}
// elseif
// header("Location:/");
?>