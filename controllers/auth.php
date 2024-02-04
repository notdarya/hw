<?php
    include 'db.php';
    session_start();

    $login=$_POST['login'];
    $pass=$_POST['pass'];
    $auth_user=$_POST['auth_user'];

    if($auth_user){
        if($pass&&$login){
        $str_auth_user="SELECT * FROM `users` WHERE login = '$login' AND password='$pass'";
        $run_auth=mysqli_query($connect, $str_auth_user);
        $count_user=mysqli_num_rows($run_auth);
        if($count_user==1){
            $out_user=mysqli_fetch_array($run_auth);
            $_SESSION['user']=array(
                'id'=> $out_user['id'],
                'login'=>$out_user['login'],
                'pass'=>$out_user['pass'],
                'name'=> $out_user['name'],
                'surname'=>$out_user['surname'],
                'l_name'=>$out_user['l_name'],
                'role'=> $out_user['role'],
                'email'=>$out_user['email'],
                
            );
         
            $_SESSION['mess']="вы авторизованы";
            header("Location: ../shop.php");
        }
        else{
            $_SESSION['error']="такого нет";
            header("Location: ../index.php");
        }
    }
    else{
        $_SESSION['error']="ошибка авторизации";
        header("Location:../index.php");
    }
    }
?>