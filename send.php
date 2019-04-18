<?php
session_start();
require("bd.php");
require("func.php");
$act = $_GET["act"];
switch ($act){
    case 'reg':
        $captchaKey = "6LcjCp8UAAAAAFonnxjSuk74QHaTebJpgN8ljvJ3";
          $response = $_POST["g-recaptcha-response"];
          $url = 'https://www.google.com/recaptcha/api/siteverify';
          $data = [
            'secret' => $captchaKey,
            'response' => $_POST["g-recaptcha-response"]
          ];
          $options = [
            'http' => [
              'method' => 'POST',
              'content' => http_build_query($data)
            ]
          ];
          $context  = stream_context_create($options);
          $verify = file_get_contents($url, false, $context);
          $captcha_success=json_decode($verify);
          if ($captcha_success->success==false) {
            echo "Вы робот, доступ запрещён!";
            exit();
          } 
        
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