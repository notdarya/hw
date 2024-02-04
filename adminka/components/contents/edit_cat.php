<content>
<?php
$edit_id=$_GET['edit_id'];
$name_cat=$_POST['name_cat'];
$desc=$_POST['desc'];
$cat_status=$_POST['cat_status'];
$upd_cat=$_POST['upd_cat'];

if ($upd_cat) {
	if ($name_cat && $desc && $cat_status) 
	{
		 $str_upd_user="UPDATE `category` SET `name_cat`='$name_cat',`description`='$desc',`status`='$cat_status' WHERE `id`=$edit_id";

		//  UPDATE `category` SET `id`='[value-1]',`name_cat`='[value-2]',`description`='[value-3]',`status`='[value-4]' WHERE 1
		$run_upd_user=mysqli_query($connect,$str_upd_user);
		if ($run_upd_user) {
			$_SESSION['mess']='Изменения выполнены!';
            // header('Location:/profile.php');
		}
		else
		{
		$_SESSION['mess_error']='Ошибка при изменении!';
		// header('Location:/edit_profile.php');
		}
	}
	else
	{
		$_SESSION['mess_error']='Заполните все поля!';
		// header('Location:/edit_profile.php');
	}
}
    $out_users_str="SELECT * FROM `category` WHERE `id`=$edit_id";
	$run_out_users=mysqli_query($connect,$out_users_str);
	$out_user=mysqli_fetch_array($run_out_users);
?>
<h2>Категория</h2>
<div class="edit_form">
	<form method="POST">
	<br><h2>Изменение категории</h2>
		<input type="text" name="name_cat" placeholder="Наименование"value= "<?= $out_user['name_cat'];?>"><br>
		<input type="text" name="desc" placeholder="Описание"value= "<?= $out_user['desc'];?>"><br>
		<select name="cat_status" value="<?= $out_user['cat_status'];?>">>
		<?php
			$out_stat_str="SELECT * FROM `status_cat`";
			$run_out_stat=mysqli_query($connect,$out_stat_str);

			while ($out_stat=mysqli_fetch_array($run_out_stat)) {
				echo "<option value=$out_stat[id]>$out_stat[name_status]</option>";
			}
		?>
	    </select><br>
		<input type="submit" name="upd_cat" value="Сохранить"><br>
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