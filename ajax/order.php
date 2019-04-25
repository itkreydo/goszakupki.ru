<?php
header('Content-Type: application/json');
    require_once "../functions.php";
    $id = $_POST['id'];
    if($id=="") {
        echo "null";
        exit;
    }
    connectDB();
    $result=resultToArray($mysqli->query("SELECT gosorder.*, orgs.title FROM gosorder JOIN orgs ON gosorder.id_org = orgs.id WHERE gosorder.id = '$id'"));
    closeDB();
    echo json_encode(array('zakazchik' => $result[0]["title"],'zakaz'=> $result[0]["description"]));
?>