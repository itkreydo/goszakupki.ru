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
        
    default:
        break;
}
?>