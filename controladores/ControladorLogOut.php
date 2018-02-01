<?php


   if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    unset($_SESSION["login_user"]);  
    session_unset();
    session_destroy();
    ob_start();
    header("location: ../index.php");
    ob_end_flush(); 
    include './inidex.php';
    //include 'home.php';
    exit();
?>

