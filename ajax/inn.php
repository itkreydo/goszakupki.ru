<?php
    require_once "../functions.php";
    $user=getUser($_POST['inn']);
    if($user==null) {
        echo "";
        exit;
    }
    $email=$user[0]["email"];
    $email_admin= "admin@goszakupki.ru";        
    $headers = "FROM: $email_admin\r\nReply-to: Госзакупки\r\nContent-type: text/html; charset=utf-8\r\n";
    $subject = "Ваш пароль";
    $password = generateRandomString();
    $inn = $_POST['inn'];
    connectDB();
    $result=$mysqli->query("UPDATE user SET password= '$password' WHERE inn = '$inn'");
    closeDB();
    $qrcode = "http://phpqrcode.sourceforge.net/qrsample.php?data=".$password."&ecc=L&matrix=9";
    $letter = "<img src=".$qrcode."/>";
    mail($email, $subject, $letter, $headers);
    echo $result;
?>