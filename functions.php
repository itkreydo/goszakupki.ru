<?php
session_start();

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

function getRnpData($mysqli,$page,$limit){
    $offset=($page-1)*$limit;
    return resultToArray($mysqli->query("SELECT rnp.*,user.fio,user.inn FROM rnp JOIN user ON rnp.id_user = user.id LIMIT $offset,$limit"));
}
function getSupportDialogs($mysqli,$page,$limit){
    $offset=($page-1)*$limit;
    $newsql = "SELECT support.*,user.fio,user.inn,support_chat.text,support_chat.date FROM support JOIN user ON support.id_user = user.id JOIN (SELECT * FROM support_chat ORDER BY date DESC) AS support_chat ON support_chat.id_support=support.id GROUP BY support.id";
    return resultToArray($mysqli->query($newsql));
}

function getSupportDialogsGos($mysqli,$page,$limit,$id){
    $offset=($page-1)*$limit;
    $newsql = "SELECT support.*,orgs.title as fio,orgs.inn,support_chat.text,support_chat.date FROM support JOIN orgs ON support.id_user = orgs.id JOIN (SELECT * FROM support_chat ORDER BY date DESC) AS support_chat ON support_chat.id_support=support.id WHERE support.id_user = $id GROUP BY support.id";
    return resultToArray($mysqli->query($newsql));
}
function getDialogsGos($mysqli,$page,$limit,$id){
    $offset=($page-1)*$limit;
    $newsql = "SELECT support.*,orgs.title as fio,orgs.inn,support_chat.text,support_chat.date FROM support JOIN orgs ON support.id_user = orgs.id JOIN (SELECT * FROM support_chat ORDER BY date DESC) AS support_chat ON support_chat.id_support=support.id WHERE support.id_user = $id GROUP BY support.id";
    return resultToArray($mysqli->query($newsql));
}
function getSupportDialogsUser($mysqli,$page,$limit,$id){
    $offset=($page-1)*$limit;
    $newsql = "SELECT support.*,user.fio,user.inn,support_chat.text,support_chat.date FROM support JOIN user ON support.id_user = user.id JOIN (SELECT * FROM support_chat ORDER BY date DESC) AS support_chat ON support_chat.id_support=support.id WHERE support.id_user = $id GROUP BY support.id";
    return resultToArray($mysqli->query($newsql));
}
function getOrgZakupki($mysqli,$page,$limit){
    $offset=($page-1)*$limit;
    $newsql = "SELECT * FROM gosorder WHERE id_org = {$_SESSION['gos']} LIMIT $offset, $limit";
    return resultToArray($mysqli->query($newsql));
}
function getOrgZakupkiUser($mysqli,$page,$limit, $id){
    $offset=($page-1)*$limit;
    $newsql = "SELECT gosorder.* FROM contract JOIN gosorder ON contract.id_order = gosorder.id WHERE contract.id_user = '$id' LIMIT $offset, $limit";
    return resultToArray($mysqli->query($newsql));
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
function isAdminAuthorized(){
    if (isset($_SESSION['admin']))
        return true;
    else
        return false;
}
function isUserAuthorized(){
    if (isset($_SESSION['user']))
        return true;
    else
        return false;
}
function isGosAuthorized(){
    if (isset($_SESSION['gos']))
        return true;
    else
        return false;
}
?>