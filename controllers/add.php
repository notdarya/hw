<?php
    include 'db.php';

    $login=$_POST['login'];
    $pass=$_POST['pass'];
    $repass=$_POST['repass'];
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $l_name=$_POST['l_name'];
    $email=$_POST['email'];

    $add_user=$_POST['add_user'];
   
    $str_add_user="INSERT INTO `users`(`name`, `surname`, `l_name`, `login`, `password`, `role`, `email`) 
    VALUES ('$name','$surname','$l_name','$login','$pass','2','$email')";

    if($add_user){
        if($login&& $pass&& $repass&& $name&& $surname&&$l_name && $email){
            if($pass==$repass){
                $str_out_user="SELECT * FROM `users` WHERE login='$login'";
               /*  echo $str_out_user; */
                $run_add_user=mysqli_query($connect,$str_out_user);
                $num_user=mysqli_num_rows($run_add_user);
                if($num_user==0){
                    $run_add=mysqli_query($connect,$str_add_user);
                    if($run_add){
                    $str_auth_user="SELECT * FROM `users` WHERE login = '$login' AND password='$pass'";   
                    $run_auth=mysqli_query($connect, $str_auth_user);
                    $count_user=mysqli_num_rows($run_auth);
                        $out_user=mysqli_fetch_array($run_auth);
                        $_SESSION['user']=array(
                            'id'=> $out_user['id'],
                            'login'=>$out_user['login'],
                            'pass'=>$out_user['pass'],
                            'name'=> $out_user['name'],
                            'surname'=>$out_user['surname'],
                            'l_name'=>$out_user['l_name'],
                            'role'=> $out_user['role'],
                            'email'=>$out_user['email']
                            
                        );
                    
                        $_SESSION['mess']="вы добавлены";
                        header("Location: ../index.php");
                    }
                    else{
                        $_SESSION['error']="ошибка добалвения";
                        header("Location: ../reg.php");
                    }
            }
            elseif($num_user!=0){
                $_SESSION['error']="такой уже есть";
                header("Location: ../reg.php");
            }
        }
        else{
            $_SESSION['error']="пароли не совпадают";
            header("Location: ../reg.php");
        }
    }
    else{
        $_SESSION['error']="заполните все поля";
        header("Location: ../reg.php");
    }
}
?>