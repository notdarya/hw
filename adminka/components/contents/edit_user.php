<content>
<?php
$edit_id=$_GET['edit_id'];
$surname=$_POST['surname'];
$name=$_POST['name'];
$l_name=$_POST['l_name'];
$email=$_POST['email'];
$city=$_POST['city'];
$login=$_POST['login'];
$pass=$_POST['pass'];
$repass=$_POST['repass'];
$upd_user=$_POST['upd_user'];

$name_avatar=$_FILES['avatar']['name'];
$type_avatar=$_FILES['avatar']['type'];
$tmp_path_avatar=$_FILES['avatar']['tmp_name'];
$size_avatar=$_FILES['avatar']['size'];
 
$rand=rand(0,1000);
$ext=explode('.',$name_avatar);

$name_avatar=$ext['0'];
$ext=$ext['1'];
$full_avatar="$name_avatar"."_$rand."."$ext";
$path_avatar="images/users/$full_avatar";
if ($upd_user) {
	if ($login && $pass && $surname && $name && $l_name && $email && $city && $full_avatar) {
		if ($pass==$repass) {
            $str_out_user="SELECT * FROM `users` WHERE login='$login'";
            $run_out_user=mysqli_query($connect,$str_out_user);
            $count_user=mysqli_num_rows($run_out_user);     
    		if ($count_user==0) {
				if ($size_avatar<83900938240) 
                {
                    // $run_add=mysqli_query($connect,$str_add_user);
                    // if ($run_add) 
                    // {
                        // move_uploaded_file($tmp_path_avatar, $path_avatar);
                        
			            $str_upd_user="UPDATE `users` SET `login`='$login',`surname`='$surname',`name`='$name',`l_name`='$l_name',`email`='$email',`city`='$city',`pass`='$pass',`avatar`='$full_avatar',`updated_at`=current_timestamp WHERE `id`=$edit_id";
			            $run_upd_user=mysqli_query($connect,$str_upd_user);
			            if ($run_upd_user) {
							move_uploaded_file($tmp_path_avatar, $path_avatar);
						    $run_out_user=mysqli_query($connect,$str_out_user);
                            $out_user=mysqli_fetch_array($run_out_user);
                            $_SESSION['user']=array(
                            'id' => $out_user['id'], 
                            'login' => $out_user['login'], 
                            'surname' => $out_user['surname'], 
                            'name' => $out_user['name'], 
                            'l_name' => $out_user['l_name'], 
                            'email' => $out_user['email'],
                            'city' => $out_user['city'],
                            'role' => $out_user['role'], 
                            'status' => $out_user['status'],
                            'avatar' => $out_user['avatar']
                            );
						    $_SESSION['mess']='Изменения выполнены!';
                            // header('Location:../adminka/users.php');
			            }
				    // }
			        else
			        {
						echo $str_upd_user;
					$_SESSION['mess_error']='Ошибка при изменении!';
					// header('Location:/edit_profile.php');
			        }
				}
                else
                {
                $_SESSION['mess_error']="Файл слишком большой!";
                // header('Location:/edit_profile.php');
                }
			}
			elseif ($count_user!=0) 
			{
				$_SESSION['mess_error']='Такой пользователь существует!';
					// header('Location:/edit_profile.php');
			} 
		}
		else 
			{
				$_SESSION['mess_error']='Пароли не совпадают';
					// header('Location:/edit_profile.php');
			}
	}
		
	else
	{
		$_SESSION['mess_error']='Заполните все поля!';
		// header('Location:/edit_profile.php');
	}
}

?>
<h2>Пользователи</h2>
<div class="edit_form">
	<form method="POST" enctype="multipart/form-data">
	<br><h2>Изменение пользователя</h2>
		<input type="text" name="surname" placeholder="Фамилия"value= "<?= $out_user['surname'];?>"><br>
		<input type="text" name="name" placeholder="Имя"value= "<?= $out_user['name'];?>"><br>
		<input type="text" name="l_name" placeholder="Отчество"value= "<?= $out_user['l_name'];?>"><br>
		<input type="text" name="email" placeholder="Электронная почта"value= "<?= $out_user['email'];?>"><br>
		<input type="text" name="city" placeholder="Из какого вы города"value= "<?= $out_user['city'];?>"><br>
		<input type="text" name="login" placeholder="Логин" value= "<?= $out_user['login'];?>"><br>
		<input type="password" name="pass" placeholder="Пароль"value= "<?= $out_user['pass'];?>"><br>
		<input type="password" name="repass" placeholder="Повторите пароль"value= "<?= $out_user['repass'];?>"><br>
		Аватар:<br>
		<input type="file" name="avatar"value= "<?= $out_user['avatar'];?>"><br>
		<input type="submit" name="upd_user" value="Сохранить"><br>
		<?php
	if ($_SESSION['mess']) {
	echo '<font color=#3081da <p class="msg">'.$_SESSION['mess'].'</p></font>';
	}
	if ($_SESSION['mess_error']) {
	echo '<font color=red <p class="msg">'.$_SESSION['mess_error'].'</p></font>';
	}
	unset($_SESSION['mess']);
	unset($_SESSION['mess_error']);
	?><br>
	</form><br>
</div>



	
</content>