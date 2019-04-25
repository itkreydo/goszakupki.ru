<?php
    require_once "../../functions.php";
    $text=$_POST['text'];
    $support=$_POST['support'];
    if($text=="") {
        echo "";
        exit;
    }
    connectDB();
    $result=$mysqli->query("INSERT INTO `support_chat` (`sender`, `text`, `id_support`) VALUES ('0', '$text', '$support')");
    closeDB();
    echo "1";
?>