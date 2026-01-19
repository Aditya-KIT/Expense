<?php
session_start();


//session_unset();


//session_destroy();




header("Location:login_user.php");
if(isset($_SESSION['is_login'])){
    unset($_SESSION['is_login']);
    $_SESSION['message']="Logout Successfully";
    $_SESSION['color']="success";
}
header("Location:login_user.php");




?>