<?php
session_start();
include 'db.php';

/*ПЕРЕМЕННЫЕ КАТЕГОРИЙ*/  
 $name_cat=$_POST['name_cat'];
$desc=$_POST['desc'];
$cat_status=$_POST['cat_status'];
$add_cat=$_POST['add_cat'];

 /*ПЕРЕМЕННЫЕ ТОВАРОВ*/ 
$code=$_POST['code'];
$name_prod=$_POST['name_prod'];
$description=$_POST['description'];
$city=$_POST['city'];
$qty=$_POST['qty'];
$price=$_POST['price'];
$category_prod=$_POST['category_prod'];
$prod_status=$_POST['prod_status'];

$name_image=$_FILES['image']['name'];
$type=$_FILES['image']['type'];
$tmp_path=$_FILES['image']['tmp_name'];
$size=$_FILES['image']['size'];

$rand=rand(0,1000);
$ext=explode('.',$name_image);

$name_image=$ext['0'];
$ext=$ext['1'];
$full_name="$name_image"."_$rand."."$ext";
$path="../images/prod/$full_name";
$add_prod=$_POST['add_prod'];

/*ПЕРЕМЕННЫЕ ПОЛЬЗОВАТЕЛЯ*/  
$surname=$_POST['surname'];
$name=$_POST['name'];
$l_name=$_POST['l_name'];
$email=$_POST['email'];
$city_u=$_POST['city_u'];
// $role_u=$_POST['role_u'];
$login=$_POST['login'];
$pass=$_POST['pass'];
$repass=$_POST['repass'];
$add_user=$_POST['add_user'];

$name_avatar=$_FILES['avatar']['name'];
$type_avatar=$_FILES['avatar']['type'];
$tmp_path_avatar=$_FILES['avatar']['tmp_name'];
$size_avatar=$_FILES['avatar']['size'];
 
$rand=rand(0,1000);
$ext=explode('.',$name_avatar);

$name_avatar=$ext['0'];
$ext=$ext['1'];
$full_avatar="$name_avatar"."_$rand."."$ext";
$path_avatar="../images/users/$full_avatar";
/*ЗАПРОСЫ*/
	$str_add_user="INSERT INTO `users` (`login`, `pass`, `surname`, `name`, `l_name`, `email`,`city`, `role`, `status`, `avatar`, `created_at`, `updated_at`) VALUES ('$login', '$pass', '$surname', '$name', '$l_name', '$email','$city_u', '3', '1', '$full_avatar', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";

    $str_add_cat="INSERT INTO `category` (`name_cat`, `description`, `status`) VALUES ('$name_cat', '$desc',$cat_status)";
    
    $str_add_prod="INSERT INTO `products` (`article`, `name_prod`, `description`, `city`, `qty`, `price`, `id_cat`, `image`, `status`, `created_at`, `updated_at`) VALUES ( '$code', '$name_prod', '$description', '$city', '$qty', '$price', '$category_prod', '$full_name', '$prod_status', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
    // print_r($path);

    if ($add_user) {
        if ($surname && $name && $l_name && $email && $city_u && $login && $pass && $full_avatar) 
        {
          if ($pass==$repass) 
           {
                $str_out_user="SELECT * FROM `users` WHERE login='$login'";
                $run_out_user=mysqli_query($connect,$str_out_user);
                $count_user=mysqli_num_rows($run_out_user);

                if ($count_user==0) 
                {
                    if ($size_avatar<83900938240) 
                    {
                        $run_add=mysqli_query($connect,$str_add_user);
                        if ($run_add) 
                        {
                             move_uploaded_file($tmp_path_avatar, $path_avatar);
                            $_SESSION['mess']='Регистрация прошла успешно';
                            header('Location:/adminka/users.php');
                        }
                        else
		                {
                        $_SESSION['mess_error']='Ошибка добавления';
                        header('Location:/adminka/users.php');
			            }
                    }
                    else
                    {
                    $_SESSION['mess_error']="Файл слишком большой!";
                    header('Location:/adminka/users.php');
                    }
                }
                elseif ($count_user!=0) 
                {
                    $_SESSION['mess_error']='Такой пользователь существует!';
                    header('Location:/adminka/users.php');
                }
            }
            else 
            {
              $_SESSION['mess_error']='Пароли не совпадают';
               header('Location:/adminka/users.php');
            }
        }
        else
	    {
    	$_SESSION['mess_error']='Заполните все поля';
        header('Location:/adminka/users.php');
    	}
    }
	
    elseif ($add_cat) {
        if ($name_cat && $desc && $cat_status) {
            $run_add_cat=mysqli_query($connect,$str_add_cat);
                if ($run_add_cat) {
                    $_SESSION['mess']="Категория добавлена!";
                    header('Location:/adminka/categories.php');
                }
                else
                {
                    $_SESSION['mess_error']="Ошибка добавления!";
                    header('Location:/adminka/categories.php');
                }
        }
        else
        {
            $_SESSION['mess_error']="Заполните все поля!";
            header('Location:/adminka/categories.php');
        }
    }
    
elseif ($add_prod) 
{
    if ($code && $name_prod && $description && $city && $qty && $price && $category_prod && $full_name && $prod_status) 
    {
        if ($size<83886080) 
        {
            $run_add_p=mysqli_query($connect,$str_add_prod);
            if ($run_add_p) {
                move_uploaded_file($tmp_path, $path);
                $_SESSION['mess']="Товар добавлен!";
                header('Location:/adminka/products.php');
            }
            else
            {
                $_SESSION['mess_error']="Ошибка добавления!";
                header('Location:/adminka/products.php');
            }
        }
        else
        {
            $_SESSION['mess_error']="Файл слишком большой!";
            header('Location:/adminka/products.php');
        }
    }
    else
    {
        $_SESSION['mess_error']="Заполните все поля!";
        header('Location:/adminka/products.php');
    }
    // print_r($run_add_prod);
}
// header("Location:\adminka\components\contents\products.php");



?>