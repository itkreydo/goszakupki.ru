<?php
session_start();
require("bd.php");
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
        if (count($userInfo)==0){$_SESSION['ERROR']="NO SUCH USER";header('LOCATION: .');}
        
        
        header('LOCATION: .');
        break;
        
    default:
        break;
}
?>