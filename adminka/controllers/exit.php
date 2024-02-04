<?php
include 'db.php';
session_unset();
unset($_SESSION['admin']);
header("Location:/adminka");
// $_SESSION['mess_error']='Вы вышли!';
// header("Location:/");
?>