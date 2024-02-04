<content>
	<article class="db_panel">
		<div class="panel">
			<?php
			$str_out_user="SELECT * FROM `users`";
			$run_out_users=mysqli_query($connect,$str_out_user);
			$out_users=mysqli_num_rows($run_out_users);
			echo"<h5>Всего пользователей</h5><p>$out_users</p>";
			?>
		</div>
		<div class="panel">
		<?php
			$str_out_prod="SELECT * FROM `products`";
			$run_out_prods=mysqli_query($connect,$str_out_prod);
			$out_prods=mysqli_num_rows($run_out_prods);
			echo"<h5>Всего товаров</h5><p>$out_prods</p>";
			?>
		</div>
		<div class="panel">
		<?php
			$str_out_cat="SELECT * FROM `category`";
			$run_out_cats=mysqli_query($connect,$str_out_cat);
			$out_cats=mysqli_num_rows($run_out_cats);
			echo"<h5>Всего категорий</h5><p>$out_cats</p>";
			?>
		</div>
		<div class="panel">
		<?php
			$str_out_order="SELECT * FROM `orders`";
			$run_out_orders=mysqli_query($connect,$str_out_order);
			$out_orders=mysqli_num_rows($run_out_orders);
			echo"<h5>Всего заказов</h5><p>$out_orders</p>";
			?>
		</div>

	</article>

</content>