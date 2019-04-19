<?php
session_start();
$act=$_GET['act'];
require("../functions.php");
switch ($act){
    case 'reg':
        require('../templates/header.php');
        require('templates/reg.php');
        require('../templates/footer.php');
    break;
    case 'dialogDetail':
        require('templates/header.php');
        require('templates/rightpanel.php');
        require('templates/dialogDetail.php');
        require('templates/footer.php');
    break;
    default:
        require('templates/header.php');
        require('templates/rightpanel.php');
        require('templates/dialog.php');
        require('templates/footer.php');
    break;
}

?>