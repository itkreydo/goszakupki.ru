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
        $userINN=$_POST['login'];
        $userPassword=$_POST['password'];

        $userInfo = resultToArray($mysqli->query("SELECT * FROM orgs WHERE inn = '$userINN'"));
        if (count($userInfo)==0){$_SESSION['ERROR']="NO SUCH ORGANISATION";header('LOCATION: .');exit();}
        if ($userInfo[0]['password']!=$userPassword){
            $_SESSION['ERROR']="WRONG PASSWORD";header('LOCATION: .');exit();
        }

        $_SESSION['SUCCESS']="Добро пожаловать, ".$userInfo[0]["title"];
        $_SESSION['gos'] = $userInfo[0]["id"];
        $_SESSION['gos_title'] = $userInfo[0]["title"];
        header('LOCATION: .');
        break;
    case 'createOrder':
        $title = $_POST['title'];
        $description = $_POST['description'];
        $max_price = $_POST['max_price'];
        $date_end = $_POST['date_end'];
        if ($mysqli->query("INSERT INTO gosorder(id_org,title,description,max_price,valuta,date_end) VALUES('{$_SESSION['gos']}','$title','$description','$max_price','RUB','$date_end')")){
            $_SESSION['SUCCESS'] = "Закупка создана успешно!";
            header('LOCATION: .');
        }else{
            $_SESSION['ERROR'] = "Закупка не добавлена, проверьте введённые данные";
            header('LOCATION: .');
        }
        
        break;
    case 'logout':
        unset($_SESSION['gos_title']);
        unset($_SESSION['gos']);
        header("LOCATION: ..");
        break;
    default:
        break;
}
?>