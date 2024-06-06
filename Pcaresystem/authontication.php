<?php 
session_start();
if(!$_SESSION['username'] && !$_SESSION['name']){
    header("Location: ../index.php");
    exit();
}
?>