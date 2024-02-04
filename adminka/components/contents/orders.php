<content>
	<article>
		<h2>Заказы</h2><br>
		<?php
			$str_out_user_ord="SELECT DISTINCT `id_user` FROM `orders`";
			$run_out_user_ord=mysqli_query($connect,$str_out_user_ord);

			while ($out_user_ord=mysqli_fetch_array($run_out_user_ord)) {
				$id_user=$out_user_ord['id_user'];
				$str_out_user="SELECT * FROM `users` WHERE id=$id_user";
				$run_out_user=mysqli_query($connect,$str_out_user);

				$out_user=mysqli_fetch_array($run_out_user);
				echo "<br><br><h4>$out_user[surname] $out_user[name] $out_user[l_name] - $out_user[email]</h4>";

				// $str_out_prod_u="SELECT * FROM `orders` WHERE id_user=$id_user";
				// $run_out_prod_u=mysqli_query($connect,$str_out_prod_u);
				
				echo "<table>
			<tr>
				<th>№ п/п</th>
				<th>Товар</th>
				<th>В каком городе запланированна поездка</th>
				<th>Из какого города пользователь</th>
				<th>Статус</th>
				<th>Время заказа</th>
				<th>Время <br>изменения заказа</th>
				<th colspan='3'>Действия</th>
			</tr>";
		
				    $q=0;
					$str_out_prod="SELECT *, DATE_FORMAT(created_at,'%d.%m.%y') AS s_date, TIME_FORMAT(created_at, '%H:%i') AS s_time,DATE_FORMAT(updated_at,'%d.%m.%y') AS u_date, TIME_FORMAT(updated_at, '%H:%i') AS u_time FROM `orders` WHERE id_user=$id_user";
					// echo "$str_out_prod";
				    $run_out_prod=mysqli_query($connect,$str_out_prod);
				   while ($out_prod=mysqli_fetch_array($run_out_prod)) {
					$q++;
					$id_prod=$out_prod['id_prod'];
					$date_time_create=$out_prod['created_at'];
					$date_time_update=$out_prod['updated_at'];

					$str_out_product="SELECT * FROM `products` WHERE id=$id_prod";
					$run_out_product=mysqli_query($connect,$str_out_product);
					$out_product=mysqli_fetch_array($run_out_product);
				

					$status=$out_prod['status'];
					switch ($status) {
						case '4':
							$status="Заказан";
							$canc_but="
								<a href='controllers/status.php?cancel=$out_prod[id]' class='off'>
									Отменить
								</a>
							";

							$send_but="
							<a href='controllers/status.php?send=$out_prod[id]' class='change'>
								Отправить
							</a>

							";
							break;
						case '3':
							$status="Отправлено";
							$canc_but="
								<a href='controllers/status.php?cancel=$out_prod[id]' class='off'>
									Отменить
								</a>

							";
							$send_but="В пути";

							break;
						case '2':
							$status="Получен";
							$canc_but="Получен";
							$send_but="Получен";
							break;
						case '1':
							$status="Отменен";
							$canc_but="Отменен";
							$send_but="Отменен";

							break;
						default:
						$status="Нет";
						$canc_but="Нет";
						$send_but="Нет";
							break;
					}
					// УДАЛЕНИЕ 
		            $del_id=$_GET['del_id'];
		            $str_del_cat="DELETE FROM `orders` WHERE `id` = $del_id";
		
		            if ($del_id) {
			            $run_del_cat=mysqli_query($connect,$str_del_cat);
			            if ($run_del_cat) {
				            $_SESSION['del']='Заказ удален!';
			            }
			            else
			            {
							$_SESSION['del_error']='Заказ удалить не удалось!';
			            }
						// unset($_SESSION['del']);
						// unset($_SESSION['del_error']);
						// unset($_SESSION['mess']);
						// unset($_SESSION['mess_error']);
		            }

					echo "
				    <tr>
					<td>$q</td>
					<td>$out_product[name_prod]</td>
					<td>$out_product[city]</td>
					<td>$out_user[city]</td>
					<td>$status</td>
					<td>$out_prod[s_date]<br>$out_prod[s_time]</td>
			        <td>$out_prod[u_date]<br>$out_prod[u_time]</td>
					<td>
						$canc_but
					</td>
					<td>
					<a href='?del_id=$out_prod[id]' class='delete'>
						Удалить
						</a>	
					</td>
				   </tr>";
				   }
				   // }
				   
				   // }
				   echo "</table>";
				   
				   if ($_SESSION['del']) {
				echo '<font color=#3081da <p class="msg">'.$_SESSION['del'].'</p></font>';}
			if ($_SESSION['del_error']) {
				echo '<font color=red <p class="msg">'.$_SESSION['del_error'].'</p></font>';
			}
			unset($_SESSION['del']);
			unset($_SESSION['del_error']);
		}

		?>
	</article>

</content>
					<!-- <td>
					<a href='controllers/status.php?cancel=$out_prod[id]' class='off'>
					Получен</a>
		
					</td>
					<td>
					<a href='controllers/status.php?cancel=$out_prod[id]' class='off'>
					Отменён</a>
					</td> -->