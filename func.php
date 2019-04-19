<?php
session_start();
function genPassword($len=10){
$chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP_"; 
$max=$len; 
$size=StrLen($chars)-1; 
$password=null; 
while($max--) 
    $password.=$chars[rand(0,$size)]; 
return $password;
}
function captchaConfirm(){
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
    return($captcha_success->success);
}
function showInfo(){
    if (isset($_SESSION['SUCCESS'])){
        echo "
        <div style='position:fixed;bottom:20px;right:20px;max-width:400px;' class='alert alert-success alert-dismissible fade show' role='alert'>
          {$_SESSION['SUCCESS']}
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
    }else if (isset($_SESSION['ERROR'])){
        echo "
        <div style='position:fixed;bottom:20px;right:20px;max-width:400px;' class='alert alert-danger alert-dismissible fade show' role='alert'>
          {$_SESSION['ERROR']}
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>";
    }
    unset($_SESSION['SUCCESS']);
    unset($_SESSION['ERROR']);
    unset($_SESSION['INFO']);
}
?>