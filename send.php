<?php
session_start();
require("bd.php");
require("func.php");
$act = $_GET["act"];
switch ($act){
    case 'reg':
        $userType=$_POST["user_type"];
        $userINN=$_POST["inn"];
        $userEmail=$_POST["email"];
        $userEmail="autodesk@list.ru";
        $genPass = genPassword(10);
        mail($userEmail,$userEmail,"Письмо с паролем авторизации","QR cod:".$genPass);
        break;
        
    default:
        break;
}
?>