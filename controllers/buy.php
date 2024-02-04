<?php
    include 'db.php';
     $id_prod=$_GET['id_prod'];
     $id_user=$_SESSION['user']['id'];

     /* echo "$id_prod<br>";
     echo  $_SESSION['user']['id']; */

     $str_add_order="INSERT INTO `orders`(`id_user`, `id_prod`, `status_ord`) VALUES ('$id_user','$id_prod','1')";
     $run_add_order=mysqli_query($connect, $str_add_order);
     echo $str_add_order;

     if($run_add_order){
        header("Location: ../ready_order.php");
     }
?>