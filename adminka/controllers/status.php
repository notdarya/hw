<?php
include '../controllers/db.php';
$user_id=$_GET['user_id'];
$cat_id=$_GET['cat_id'];
$prod_id=$_GET['prod_id'];
$get=$_GET['get'];
$send=$_GET['send'];
$cancel=$_GET['cancel'];
$cancel_user=$_GET['cancel_user'];

if ($user_id) {
    $page="users";
    $str_current_user="SELECT `status` FROM `users` WHERE id=$user_id";
    $run_current_user=mysqli_query($connect,$str_current_user);
    $out_user=mysqli_fetch_array($run_current_user);
    if ($out_user['status']==1) {
        $val_status=2;
    }
    elseif ($out_user['status']==2) {
        $val_status=1;
    }
    $str_upd_user="UPDATE `users` SET `status`=$val_status WHERE `id`= $user_id ";
    $run_upd_status=mysqli_query($connect,$str_upd_user);
}
 elseif($cat_id){
    $page="categories";
    $str_current_cat="SELECT `status` FROM `category` WHERE id=$cat_id";
    $run_current_cat=mysqli_query($connect,$str_current_cat);
    $out_cat=mysqli_fetch_array($run_current_cat);
    if ($out_cat['status']==1) {
        $val_status=2;
    }
    elseif ($out_cat['status']==2) {
        $val_status=1;
    }
    $str_upd_cat="UPDATE `category` SET `status`=$val_status WHERE `id`= $cat_id ";
    $run_upd_status=mysqli_query($connect,$str_upd_cat);
   

 }
 elseif($prod_id){
     $page="products";
    $str_current_prod="SELECT `status` FROM `products` WHERE id=$prod_id";
    $run_current_prod=mysqli_query($connect,$str_current_prod);
    $out_prod=mysqli_fetch_array($run_current_prod);
    if ($out_prod['status']==1) {
        $val_status=2;
    }
    elseif ($out_prod['status']==2) {
        $val_status=1;
    }
    $str_upd_prod="UPDATE `products` SET `status`=$val_status WHERE `id`= $prod_id ";
    $run_upd_status=mysqli_query($connect,$str_upd_prod);
 }

 elseif ($send) {
	$page="orders";
	$str_upd_status="UPDATE `orders` SET `status` = '3',`updated_at`=current_timestamp WHERE `id` = $send";
	$run_upd_status=mysqli_query($connect,$str_upd_status);
}
elseif ($cancel) {
    if ($cancel_user) {
        $page="../orders_user";
    }
    else {
        $page="orders";
    }
	$str_upd_status="UPDATE `orders` SET `status` = '1',`updated_at`=current_timestamp WHERE `id` = $cancel";
	$run_upd_status=mysqli_query($connect,$str_upd_status);
}
elseif ($get) {
	$page="../orders_user";
	$str_upd_status="UPDATE `orders` SET `status` = '2',`updated_at`=current_timestamp WHERE `id` = $get";
	$run_upd_status=mysqli_query($connect,$str_upd_status);
}
 header("Location:../$page.php");
//  header("Location:../$page_cat.php");
//  header("Location:../$page_prod.php");
?>