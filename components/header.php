<?php

include "controllers/db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles.css">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <nav class="menu">
                <ul class="menu_items">
                    
                        <li class="menu_item">
                            <a href="index.php">Главная</a>
                        </li>
                    
                    <a href="index.php"><img class="logo" src="assets/images/logo.png" alt=""></a>
                    
    
                    <li class="menu_item">
                        <a href="prod.php">Товары</a>
                    </li>
    
                </ul>
            </nav>
        </div>
        <div class="under_header">
        <?php
                    if($_SESSION['user']){
                        echo"
                        <nav class='menu_auth'>
                             <li class='menu_item-auth'>
                            <a class='reg'>
                                Добро пожаловать в наш магазин , ".$_SESSION['user']['name']." ".$_SESSION['user']['surname']." !
                            </a>
                            </li>
                            <li class='menu_item-auth'>
                            <a class='auth' href='controllers/exit.php'>
                                Выход
                            </a>
                            </li>
                        </nav>
                        ";
                    }
                    else{
                        echo"
                        <nav class='menu_auth'>
                            <li class='menu_item-auth'>
                            <a class='auth' href='auth.php'>
                                Авторизация
                            </a>
                            <a class='reg' href='reg.php'>
                                Регистрация
                            </a>
                            </li>
                        </nav>
                        ";
                    }
                    if($_SESSION['admin']){
                        echo"
                        <nav class='menu_auth'>
                             <li class='menu_item-auth'>
                             <a class='reg' href='shop.php'>
                                Shop
                            </a>
                            </li>
                            <li class='menu_item-auth'>
                            <a class='auth' href='controllers/exit.php'>
                                Выход
                            </a>
                            </li>
                        </nav>
                        ";
                    }
                    ?>
        </div>
    </header>