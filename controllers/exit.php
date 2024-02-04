<?php
include "db.php";
    session_unset();
    $_SESSION['mess_error']="вы вышли";
    header("Location: ../index.php");
?>