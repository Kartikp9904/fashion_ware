<?php
session_start();
unset($_SESSION['ADMIN_LOGIN']);
unset($_SESSION['ADMIN_USERNAME']);
unset($_SESSION['ADMIN_ID']);
header('location:login.php');
die();
?>