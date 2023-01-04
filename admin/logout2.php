<?php 
session_start();
//session_destroy();
unset($_SESSION['clientsite']);
header('location:clientsiteindex.php');
?>
