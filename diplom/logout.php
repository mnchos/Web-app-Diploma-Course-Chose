<?php
session_start();
// Удаляем куки
unset($_SESSION['userid']);
unset($_SESSION['0']);
setcookie('token','');
setcookie('user_login','');
header("Location:index.php");
?>
