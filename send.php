<?php
session_start();
require("bd.php");
require("func.php");
$act = $_GET["act"];
switch ($act){
    case 'reg':
          if (captchaConfirm()==false) {
            
              $_SESSION['ERROR']="Каптча введена неверно!";
              header('LOCATION: /?act=reg');
            exit();
          } 
        
        $userType=$_POST["user_type"];
        $genPass = genPassword(10);
    
        if ($userType == "fizFace"){
            $userINN=$_POST["inn"];
            $userFio=$_POST["fio"];
            $userEmail=$_POST["email"];   
        
            $mysqli->query("INSERT INTO user (fio,inn,email,date_reg,type) VALUES('$userFio','$userINN','$userEmail',CURRENT_DATE(),'$userType')");    
        }else if ($userType == "urFace"){
            $orgFullTitle = $_POST['full_title'];
            $orgTitle=$_POST['title'];
            $orgFullTitle = $_POST['full_title'];
            $orgOGRN = $_POST['ogrn'];
            $orgINN = $_POST['inn'];
            $orgKPP = $_POST['kpp'];
            $orgAdress = $_POST['address'];

            $userFio=$_POST["fio"];
            $userEmail=$_POST["email"];   
            $userPhone=$_POST["phone"];
            $userFax=$_POST["fax"];
            
            $mysqli->query("INSERT INTO user (fio,inn,email,date_reg,type,phone) VALUES('$userFio','$orgINN','$userEmail',CURRENT_DATE(),'$userType','$userPhone')");  
            $user_id = $mysqli->insert_id;
            $mysqli->query("INSERT INTO ur_face (id_user,title,full_title,ogrn,inn,kpp,adress,phone,date_reg,email,director_name) VALUES('$user_id','$orgTitle','$orgFullTitle','$orgOGRN','$orgINN','$orgKPP','$orgAdress','$userPhone',CURRENT_DATE(),'$userEmail','$userFio')"); 
        
        }
        $_SESSION['SUCCESS']="Вы зарегистрированы успешно!";

        mail($userEmail,$userEmail,"Письмо с паролем авторизации","QR cod:".$genPass);
        header('LOCATION: .');
        break;
        
    default:
        break;
}
?>