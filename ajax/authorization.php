<?php
    session_start();
    require_once "../functions.php";
    $inn=$_POST['inn'];
    $password=$_POST['password'];
    if($inn=="" || $password=="") {
        echo "";
        exit;
    }
    connectDB();
    $result=$mysqli->query("SELECT * FROM user WHERE inn = '$inn' AND password = '$password'");
    closeDB();
    if($result->num_rows>0) {
        $result=resultToArray($result);
        $_SESSION['fio']=$result[0]['fio']; 
        $_SESSION['id']=$result[0]['id'];
        $_SESSION['SUCCESS']="Добро пожаловать, ".$result[0]['fio'];
        echo "1";
    }
?>