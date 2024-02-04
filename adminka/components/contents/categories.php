<content>
<?php
session_start();
include 'controllers/db.php';
//error_reporting(0);
?>
	<article>
		<h2>Категории</h2>
		<div class="reg_form">
			<h3>Добавить категорию</h3>
			<form method="POST" action="controllers\add.php" enctype="multipart/form-data">
				<input type="text" name="name_cat" placeholder="Наименование">
				<textarea name="desc" placeholder="Описание"></textarea><br>
				<select name="cat_status" >
	    <?php
			$out_stat_str="SELECT * FROM `status_cat`";
			$run_out_stat=mysqli_query($connect,$out_stat_str);

			while ($out_stat=mysqli_fetch_array($run_out_stat)) {
				echo "<option value=$out_stat[id]>$out_stat[name_status]</option>";
			}
		?>
	</select><br>
				<input type="submit" name="add_cat" value="Добавить категорию">
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
				<th>Наименование</th>
				<th>Описание</th>
				<th>Статус</th>
				<th colspan="3">Действия</th>
			</tr>

	<?php
	//error_reporting();

		// УДАЛЕНИЕ КАТЕГОРИИ
		$del_id=$_GET['del_id'];
		$str_del_cat="DELETE FROM `category` WHERE `id` = $del_id";
		
		if ($del_id) {
			$run_del_cat=mysqli_query($connect,$str_del_cat);
			if ($run_del_cat) {
				$_SESSION['mess']='Категория удалена!';
			}
			else
			{
				$_SESSION['mess_error']='Категорию удалить не удалось!';
	
			}
		}
    // ДОБАВЛЕИЕ

		$count_row=5;
		$page_id=$_GET['page_id'];
	    $page=$page_id*$count_row;

		$str_out_cat="SELECT * FROM `category`LIMIT $page,$count_row";
		$run_out_cat=mysqli_query($connect,$str_out_cat);
        $num=0;
		$num=$page;

		while ($out_cat=mysqli_fetch_array($run_out_cat)) {
			$num++;
			$id_status=$out_cat['status'];

			$str_out_status="SELECT * FROM `status_cat` WHERE id=$id_status";

			$run_out_status=mysqli_query($connect,$str_out_status);

			$out_status=mysqli_fetch_array($run_out_status);
			if ($out_cat['status']==1) {
				$status="Есть в наличии";
				$status_but="Изменить";
			}
			else{
				$status="Нет в наличии";
				$status_but="Выключить";
			}

			echo "
			<tr>
				<td>$num</td>
				<td>$out_cat[name_cat]</td>
				<td>$out_cat[description]</td>
				<td>$status</td>
				<td>
					<a href='controllers/status.php?cat_id=$out_cat[id]' class=off>
					$status_but
					</a>	
				</td>
				<td>
				   <a href='edit_cat.php?edit_id=$out_cat[id]' class=change>
				    Изменить	
				</td>
				<td>
					<a href='?del_id=$out_cat[id]' class=delete>
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
	$str_out_cat="SELECT * FROM `category`";
	$run_out_cat=mysqli_query($connect, $str_out_cat);
	$count_cat=mysqli_num_rows($run_out_cat);
	$count_cats=ceil($count_cat/$count_row);
	$p=0;
	for ($i=0; $i < $count_cats; $i++) { 
		$p++;
		echo "<a href=?page_id=$i>$p</a>";
	}
?>
		
</div>

</content>