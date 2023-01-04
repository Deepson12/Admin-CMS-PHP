<?php 
session_start();
//session_destroy();
unset($_SESSION["my__website"]);
header('location:index.php');
?>


