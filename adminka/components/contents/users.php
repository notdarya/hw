<content>
<?php
session_start();
include 'controllers/db.php';
//error_reporting(0);
?>
	<article>
		<h2>Пользователи</h2>
		<div class="reg_form">
			<h3>Добавить пользователя</h3>
			<form method="POST" enctype="multipart/form-data" action="controllers\add.php" >
				<input type="text" name="surname" placeholder="Фамилия">
				<input type="text" name="name" placeholder="Имя">
				<input type="text" name="l_name" placeholder="Отчество">
				<input type="text" name="email" placeholder="Электронная почта">
				Укажите ваш адрес проживания:<br>
				<input type="text" name="city_u" placeholder="Откуда вы поедете">
				<input type="text" name="login" placeholder="Логин">
				<input type="password" name="pass" placeholder="Пароль">
				<input type="password" name="repass" placeholder="Повторите пароль">
				Выберите аватарку:<br>
				<input type="file" name="avatar">
				<input type="submit" name="add_user" value="Добавить пользователя">
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
			</form>
		</div>
		<table>
			<tr>
				<th>№ п/п</th>
				<th>Фамилия</th>
				<th>Имя</th>
				<th>Отчество</th>
				<th>Логин</th>
				<th>Почта</th>
				<th>Город</th>
				<th>Аватарка</th>
				<th>Роль</th>
				<th>Статус</th>
				<th colspan="3">Действия</th>
			</tr> 
			
    <?php 
	//error_reporting();

	// УДАЛЕНИЕ 
	$del_id=$_GET['del_id'];
    $str_del_user="DELETE FROM `users` WHERE `id` = $del_id";

    if ($del_id) {
        $run_del_user=mysqli_query($connect,$str_del_user);
        if ($run_del_user) {
            echo "<font color=green>Пользователь удален!</font>";
        }
        else
        {
            echo "<font color=red>Пользователя удалить не удалось!</font>";

        }
    }
	
	$count_row=5;
	$page_id=$_GET['page_id'];
	$page=$page_id*$count_row;

	$str_out_user="SELECT * FROM `users` LIMIT $page,$count_row";
	$run_out_users=mysqli_query($connect,$str_out_user);
	$num=0;
	$num=$page;
	while ($out_users=mysqli_fetch_array($run_out_users)) {
	   
		$id_role=$out_users['role'];
		$id_status=$out_users['status'];
		
		$str_out_role="SELECT * FROM `roles` WHERE id=$id_role";
		$str_out_status="SELECT * FROM `status_user` WHERE id=$id_status";

		$run_out_role=mysqli_query($connect,$str_out_role);
		$run_out_status=mysqli_query($connect,$str_out_status);

		$out_role=mysqli_fetch_array($run_out_role);
		$out_status=mysqli_fetch_array($run_out_status);
		if ($out_users['status']==1) {
			$status="Активный";
			$status_but="Выключить";
		}
		else{
			$status="Деактивный";
			$status_but="Выключить";
		}
		
		 $num++;
		echo "

		    <tr>
				<td>$num</td>
				<td>$out_users[surname]</td>
				<td>$out_users[name]</td>
				<td>$out_users[l_name]</td>
				<td>$out_users[login]</td>
				<td>$out_users[email]</td>
				<td>$out_users[city]</td>
				<td>$out_users[avatar]</td>
				<td>$out_role[name_role]</td>
				<td>$status</td>
				<td>
					<a href='controllers/status.php?user_id=$out_users[id]' class=off>
					$status_but
					</a>	
				</td>
				<td>
					<a href='edit_user.php?edit_id=$out_users[id]' class=change>
						Изменить
					</a>	
				</td>
				<td>
				<a href='?del_id=$out_users[id]'class=delete>
				Удалить
					</a>	
				</td>
			</tr>";	
	}
?>
	</table>
			
		<div class="pagination">
			<?php
			$str_out_users="SELECT * FROM `users`";
			$run_out_users=mysqli_query($connect,$str_out_users);
			$count_users=mysqli_num_rows($run_out_users);
			$count_user=ceil($count_users/$count_row);
			$p=0;
			for ($i=0; $i < $count_user; $i++) { 
				$p++;
				echo "<a href=?page_id=$i>$p</a>";
			}
		?>
	
		</div>
	</article>

</content>