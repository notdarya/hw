<?php
include 'db.php';

$del_ord_user=$_GET['del_ord_user'];
$del_ord_admin=$_GET['del_ord_admin'];
if ($del_ord_user) {
    $page="../orders_user.php";
    $str_del_order="DELETE FROM `orders` WHERE id=$del_ord_user";
}
elseif ($del_ord_admin) {
    $page="orders.php";
    $str_del_order="DELETE FROM `orders` WHERE id=$del_ord_admin";
}

$run_del_order=mysqli_query($connect,$str_del_order);
header("Location:../$page");
?>