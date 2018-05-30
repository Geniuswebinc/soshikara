<?php
session_start();
$id = $_SESSION['id'];
//var_dump($_SESSION);
if(is_null($id)) {
    header('Location: ./../login/login.php');
} else {
    header('Location: ./../top/index.php');
}
?>
