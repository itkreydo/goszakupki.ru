<?php
    require_once "../functions.php";
    $cost = $_POST['cost'];
    $id = $_POST["id"];
    $id_order = $_POST["id_order"];
    if($cost=="" || $id=="") {
        echo "null";
        exit;
    }
    connectDB();
    $result=resultToArray($mysqli->query("INSERT INTO contract (`id_user`, `id_order`, `price`) VALUES ('$id', '$id_order', '$cost');"));
    closeDB();
    echo "1";
?>