<?php
session_start();
$_SESSION['username']='';
header("Location:home.php");
?>