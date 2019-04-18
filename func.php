<?php
function genPassword($len){
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
?>