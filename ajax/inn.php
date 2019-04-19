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
    $qrcode = "http://your-letter.ru/qr_code_generator.php?data=".$password;
    $letter = "Ваш пароль для входа на сайт goszakupki.ru</br>";
    $letter .= "<center><img src=".$qrcode." ></center>";
    mail($email, $subject, $letter, $headers);
    echo $result;
?>