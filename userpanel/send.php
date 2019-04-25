<?php
session_start();
require("../bd.php");
require("../functions.php");
$act = $_GET["act"];
switch ($act){
    case 'addUserToRNP':
        $userFio=$_POST['fio'];
        $userINN=$_POST['inn'];
        $userReason=$_POST['reason'];
        $dateStart=$_POST['date_start'];
        $dateEnd=$_POST['date_end'];
        
        $userInfo = resultToArray($mysqli->query("SELECT * FROM user WHERE inn = '$userINN'"));
        if (count($userInfo)==0){$_SESSION['ERROR']="NO SUCH USER";header('LOCATION: .');exit();}
        $userID=$userInfo[0]['id'];
        $mysqli->query("INSERT INTO rnp(id_user,reason,date_start,date_end) VALUES('$userID','$userReason','$dateStart','$dateEnd')");
        
        $_SESSION['SUCCESS']="Поставщик добавлен в Реестр.";
        header('LOCATION: .');
        break;
    case 'login':
        $userLogin=$_POST['login'];
        $userPassword=$_POST['password'];

        $userInfo = resultToArray($mysqli->query("SELECT * FROM admin WHERE login = '$userLogin'"));
        if (count($userInfo)==0){$_SESSION['ERROR']="NO SUCH USER";header('LOCATION: index.php?act=login');exit();}
        if ($userInfo[0]['password']!=$userPassword){
            $_SESSION['ERROR']="WRONG PASSWORD";header('LOCATION: index.php?act=login');exit();
        }

        $_SESSION['SUCCESS']="Добро пожаловать, ".$userInfo[0]["fio"];
        header('LOCATION: .');
        break;
    case 'logout':
        unset($_SESSION['id']);
        unset($_SESSION['fio']);
        header("LOCATION: ..");
        break;
    default:
        break;
}
?>