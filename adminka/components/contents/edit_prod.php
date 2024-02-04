<content>
<?php
$edit_id=$_GET['edit_id'];
$code=$_POST['code'];
$name_prod=$_POST['name_prod'];
$description=$_POST['description'];
$city=$_POST['city'];
$qty=$_POST['qty'];
$price=$_POST['price'];
$category_prod=$_POST['category_prod'];
$prod_status=$_POST['prod_status'];
$upd_prod=$_POST['upd_prod'];

$name_image=$_FILES['image']['name'];
$type_image=$_FILES['image']['type'];
$tmp_path_image=$_FILES['image']['tmp_name'];
$size_image=$_FILES['image']['size'];
 
$rand=rand(0,1000);
$ext=explode('.',$name_image);

$name_image=$ext['0'];
$ext=$ext['1'];
$full_image="$name_image"."_$rand."."$ext";
$path_image="images/prod/$full_image";
if ($upd_prod) {
	if ($code && $name_prod && $description && $city && $qty && $price && $category_prod && $full_image && $prod_status) {
        $str_out_user="SELECT * FROM `products` WHERE article='$code'";
        $run_out_user=mysqli_query($connect,$str_out_user);
        $count_user=mysqli_num_rows($run_out_user);     
    	if ($count_user==0) {
			if ($size_image<83900938240) 
            {               
			    $str_upd_user="UPDATE `products` SET `article`='$code',`name_prod`='$name_prod',`description`='$description',`city`='$city',`qty`='$qty',`price`='$price',`id_cat`='$category_prod',`image`='$full_image',`status`='$prod_status',`updated_at`=current_timestamp WHERE `id`=$edit_id";

			    $run_upd_user=mysqli_query($connect,$str_upd_user);
			        if ($run_upd_user) 
					{
						move_uploaded_file($tmp_path_image, $path_image);
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
            $_SESSION['mess_error']="Файл слишком большой!";
            // header('Location:/edit_profile.php');
            }
		}
		elseif ($count_user!=0) 
		{
		$_SESSION['mess_error']='Такой номер путёвки уже существует!';
					// header('Location:/edit_profile.php');
		} 
	}
	else
	{
		$_SESSION['mess_error']='Заполните все поля!';
		// header('Location:/edit_profile.php');
	}
}
$out_users_str="SELECT * FROM `products` WHERE `id`=$edit_id";
$run_out_users=mysqli_query($connect,$out_users_str);
$out_user=mysqli_fetch_array($run_out_users);
// echo"$str_out_user";
// print_r( $str_out_user);
//  echo $str_upd_user;

?>
<h2>Товары</h2>
<div class="edit_form">
	<form method="POST" enctype="multipart/form-data">
	<br><h2>Изменение товара</h2>
		<input type="number" name="code" placeholder="Номер путёвки"value="<?= $out_user['code'];?>"><br>
		<input type="text" name="name_prod" placeholder="Наименование товара"value= "<?= $out_user['name_prod'];?>"><br>
		<textarea name="description" placeholder="Описание" value= "<?= $out_user['description'];?>"></textarea> <br> 
		<input type="text" name="city" placeholder="Город"value= "<?= $out_user['city'];?>"><br>
		<input type="number" name="qty" placeholder="Количество"value= "<?= $out_user['qty'];?>"><br>
		<input type="number" name="price" placeholder="Цена" value= "<?= $out_user['price'];?>"><br>
		Категория:<br>
			<select name="category_prod" value= "<?= $out_user['category_prod'];?>"><br>
				<?php
            $out_cat_str="SELECT * FROM `category`";
            $run_out_cat=mysqli_query($connect,$out_cat_str);

            while ($out_cat=mysqli_fetch_array($run_out_cat)) {
                echo "<option value=$out_cat[id]>$out_cat[name_cat]</option>";
            }
			// print_r($run_out_cat);
        ?></select><br>					
		Изображение:<br>
		<input type="file" name="image"value= "<?= $out_user['image'];?>"><br>
		Статус:<br>
		<select name="prod_status"value="<?= $out_user['prod_status'];?>"><br>
	    <?php
			$out_prod_str="SELECT * FROM `status_prod`";
			$run_out_prod=mysqli_query($connect,$out_prod_str);

			while ($out_prod=mysqli_fetch_array($run_out_prod)) {
				echo "<option value=$out_prod[id]>$out_prod[name_status]</option>";
			}
		?>
		<br>
		<input type="submit" name="upd_prod" value="Сохранить"><br>
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