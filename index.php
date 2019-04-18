<?php
session_start();
$act=$_GET['act'];
switch ($act){
    case 'login':
        require('templates/header.php');
        require('templates/login.php');
        require('templates/footer.php');
    break;
    default:
        require('templates/header.php');
        require('templates/main.php');
        require('templates/footer.php');
    break;
}

?>