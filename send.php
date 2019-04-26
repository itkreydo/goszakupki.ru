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
            $token=md5($userEmail.time());
        
            $mysqli->query("INSERT INTO user (fio,inn,email,date_reg,type,token) VALUES('$userFio','$userINN','$userEmail',CURRENT_DATE(),'$userType','$token')");    
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
            $token=md5($userEmail.time());
            
            $mysqli->query("INSERT INTO user (fio,inn,email,date_reg,type,phone,token) VALUES('$userFio','$orgINN','$userEmail',CURRENT_DATE(),'$userType','$userPhone','$token')");  
            $user_id = $mysqli->insert_id;
            $mysqli->query("INSERT INTO ur_face (id_user,title,full_title,ogrn,inn,kpp,adress,phone,date_reg,email,director_name) VALUES('$user_id','$orgTitle','$orgFullTitle','$orgOGRN','$orgINN','$orgKPP','$orgAdress','$userPhone',CURRENT_DATE(),'$userEmail','$userFio')"); 
        
        }
        
        $subject = "Подтверждение почты на сайте ".$_SERVER['HTTP_HOST'];    
        $message = 'Здравствуйте! <br/> <br/> Сегодня '.date("d.m.Y", time()).', неким пользователем была произведена регистрация на сайте <a href="https://goszakupki.ru">'.$_SERVER['HTTP_HOST'].'</a> используя Ваш email. Если это были Вы, то, пожалуйста, подтвердите адрес вашей электронной почты, перейдя по этой ссылке: <a href="https://goszakupki.ru/send.php?act=token&token='.$token.'&email='.$userEmail.'">https://goszakupki.ru/'.$token.'</a> <br/> <br/> В противном случае, если это были не Вы, то, просто игнорируйте это письмо. <br/> <br/> <strong>Внимание!</strong> Ссылка действительна 24 часа. После чего Ваш аккаунт будет удален из базы.';        
        $email_admin= "admin@goszakupki.ru";        
        $headers = "FROM: $email_admin\r\nReply-to: $email_admin\r\nContent-type: text/html; charset=utf-8\r\n";        
        mail($userEmail, $subject, $message,$headers);
        
        $_SESSION['SUCCESS']="Подтвердите email адрес";
/*Письмо с подтверждением*/
        //mail($userEmail,$userEmail,"Письмо с паролем авторизации","QR cod:".$genPass);
        header('LOCATION: index.php?act=login');
        break;
    case 'token':
        $token = $_GET["token"];
        $email = $_GET["email"];
        $result=$mysqli->query("SELECT id FROM user WHERE token = '$token' AND email='$email'");
        if($result->num_rows>0) {
            $result = resultToArray($result);
            $id = $result[0]["id"];
            $mysqli->query("UPDATE user SET token= '1' WHERE id = '$id'");
            $_SESSION['fio']=$result[0]['fio']; 
            $_SESSION['id']=$result[0]['id'];
            $_SESSION['SUCCESS']="Добро пожаловать, ".$result[0]['fio'];
        }
        header('LOCATION: index.php');
        break;
    case 'find':
        $type = $_POST['type'];
        $f = $_POST['f'];
        
        break;
    default:
        break;
}
?>