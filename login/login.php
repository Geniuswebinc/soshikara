<?php
session_start();
//var_dump($_SESSION);
if(!$_SESSION['id'] > 0) {
    header('Location: ./../login/Logout.php');
}

$login_name = $_SESSION['name'];
?>
