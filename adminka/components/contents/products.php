<content>
<?php
session_start();
include 'controllers/db.php';
//error_reporting(0);
?>
	<article>
		<h2>Товары</h2>
		<div class="reg_form">
			<h3>Добавить товар</h3>
			<form method="POST" action="controllers\add.php" enctype="multipart/form-data">
			    <input type="number" name="code" placeholder="Номер путёвки">
				<input type="text" name="name_prod" placeholder="Наименование товара">
				<textarea name="description" placeholder="Описание"></textarea><br>
				<input type="text" name="city" placeholder="Город">
				<input type="number" name="qty"
				placeholder="Количество">
				<input type="number" name="price" placeholder="Цена">
				Категория:<br>
				<select name="category_prod">
				<?php
            $out_cat_str="SELECT * FROM `category`";
            $run_out_cat=mysqli_query($connect,$out_cat_str);

            while ($out_cat=mysqli_fetch_array($run_out_cat)) {
                echo "<option value=$out_cat[id]>$out_cat[name_cat]</option>";
            }
			// print_r($run_out_cat);
        ?>					
				</select><br>
				Изображение:<br>
				<input type="file" name="image">
				Статус:<br>
				<select name="prod_status" >
	    <?php
			$out_prod_str="SELECT * FROM `status_prod`";
			$run_out_prod=mysqli_query($connect,$out_prod_str);

			while ($out_prod=mysqli_fetch_array($run_out_prod)) {
				echo "<option value=$out_prod[id]>$out_prod[name_status]</option>";
			}
		?>
	</select><br>
				<input type="submit" name="add_prod" value="Добавить товар">

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
				<th>Номер путёвки</th>
				<th>Наименование</th>
				<th>Описание</th>
				<th>Город</th>
				<th>Кол-во</th>
				<th>Цена</th>
				<th>Категория</th>
				<th>Изображение</th>
				<th>Статус</th>
				<th colspan="3">Действия</th>
			</tr>
			<?php
			//error_reporting();
		// УДАЛЕНИЕ ТОВАРА
		$del_id=$_GET['del_id'];
		$str_del_prod="DELETE FROM `products` WHERE `id` = $del_id";
		if ($del_id) {
			$run_del_prod=mysqli_query($connect,$str_del_prod);
			if ($run_del_prod) {
				echo "<font color=green>Товар удален!</font>";
			}
			else
			{
				echo "<font color=red>Товар удалить не удалось!</font>";
			}
		}

		$count_row=5;
		$page_id=$_GET['page_id'];
		$page=$page_id*$count_row;

		$str_out_prod="SELECT * FROM `products`LIMIT $page,$count_row";
		$run_out_prod=mysqli_query($connect,$str_out_prod);
		$num=0;
		$num=$page;
		
		while ($out_prod=mysqli_fetch_array($run_out_prod)) {
			$num++;
			$id_cat=$out_prod['id_cat'];
			$id_status=$out_prod['status'];

			$str_out_cat="SELECT * FROM `category` WHERE id=$id_cat";
			$str_out_status="SELECT * FROM `status_prod` WHERE id=$id_status";

			$run_out_cat=mysqli_query($connect,$str_out_cat);
			$run_out_status=mysqli_query($connect,$str_out_status);

			$out_cat=mysqli_fetch_array($run_out_cat);
			$out_status=mysqli_fetch_array($run_out_status);

			if ($out_prod['status']==1) {
				$status="Есть в наличии";
				$status_but="Выключить";
			}
			else{
				$status="Нет в наличии";
				$status_but="Выключить";
			}

			echo "
			  <tr>
				<td>$num</td>
				<td>$out_prod[article]</td>
				<td>$out_prod[name_prod]</td>
				<td>$out_prod[description]</td>
				<td>$out_prod[city]</td>
				<td>$out_prod[qty]</td>
				<td>$out_prod[price] руб</td>
				<td>$out_cat[name_cat]</td>
				<td>$out_prod[image]</td>
				<td>$status</td>
				<td>
					<a href='controllers/status.php?prod_id=$out_prod[id]' class=off>
					$status_but
					</a>	
				</td>
				<td>
				<a href='edit_prod.php?edit_id=$out_prod[id]' class=change>
				Изменить
				</td>
				<td>
					<a href='?del_id=$out_prod[id]'class=delete>
						Удалить
					</a>	
				</td>
			  </tr>
		    ";
		}


	?>
			
		</table>
		<div class="pagination">
			<?php
			$str_out_prod="SELECT * FROM `products`";
			$run_out_prod=mysqli_query($connect,$str_out_prod);
			$count_prod=mysqli_num_rows($run_out_prod);
			$count_pro=ceil($count_prod/$count_row);
			$p=0;
			for ($i=0; $i < $count_pro; $i++) { 
				$p++;
				echo "<a href=?page_id=$i>$p</a>";
			}
		?>
	
		</div>
	</article>

</content>