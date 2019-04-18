<?php
session_start();
require("bd.php");
require("func.php");
$act = $_GET["act"];
switch ($act){
    case 'reg':
          if (captchaConfirm()==false) {
            echo "Вы робот, доступ запрещён!";
            exit();
          } 
        
        $userType=$_POST["user_type"];
        
        if ($userType == "fizFace"){
            
        }
        $userINN=$_POST["inn"];
        $userFio=$_POST["fio"];
        $userEmail=$_POST["email"];
        
        $mysqli->query("INSERT INTO user (fio,inn,email,date_reg,type) VALUES('$userFio','$userINN','$userEmail',CURRENT_DATE(),'$userType')");
        $genPass = genPassword(10);

        mail($userEmail,$userEmail,"Письмо с паролем авторизации","QR cod:".$genPass);
        header('LOCATION: .');
        break;
        
    default:
        break;
}
?>