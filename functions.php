<?php
session_start();
$mysqli=false;
function connectDB () {
    global $mysqli;
    $mysqli=new mysqli("localhost","root","","goszakupki");
    $mysqli->query("SET NAMES 'utf8mb4'");
}

function closeDB () {
    global $mysqli;
    $mysqli->close();
}

function resultToArray ($result) {
    $array=array();
    while(($row=$result->fetch_assoc())!=false)
        $array[]=$row;
    return $array;
}

function getUser($inn) {
    global $mysqli;
    connectDB();
    $result=$mysqli->query("SELECT * FROM `user` WHERE `inn` = '$inn'");
    closeDB();
    if($result->num_rows==0)
        return null;
    else
        return resultToArray ($result);
}

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

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

/*static dont usable*/
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