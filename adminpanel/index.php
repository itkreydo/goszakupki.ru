<?php
session_start();
$act=$_GET['act'];
require("../bd.php");
require("../functions.php");
switch ($act){
    case 'reg':
        require('../templates/header.php');
        require('templates/reg.php');
        require('../templates/footer.php');
    break;
    case 'dialogDetail':
        $support = $_GET['support'];
        $result = resultToArray($mysqli->query("SELECT support.reason, support_chat.* FROM support JOIN support_chat ON support.id=support_chat.id_support WHERE support.id = $support"));
        require('templates/header.php');
        require('templates/rightpanel.php');
        require('templates/dialogDetail.php');
        require('templates/footer.php');
    break;
        case 'rnp':
        $page=1;
        $limit=20;
        if (isset($_GET['page']))
            $page=$_GET['page'];
        if (isset($_GET['limit']))
            $limit=$_GET['limit'];
        $rnpData = getRnpData($mysqli,$page,$limit);
        $numEntryesRnp = resultToArray($mysqli->query("SELECT count(*) as num FROM rnp"))[0]['num'];
        $rnpPagesNum=ceil($numEntryesRnp/$limit);
        require('templates/header.php');
        require('templates/rightpanel.php');
        require('templates/rnp.php');
        require('templates/footer.php');
    break;
    default:
        $page=1;
        $limit=20;
        if (isset($_GET['page']))
            $page=$_GET['page'];
        if (isset($_GET['limit']))
            $limit=$_GET['limit'];
        
        $supportDialodsData = getSupportDialogs($mysqli,$page,$limit);
        $rnpData = getRnpData($mysqli,$page,$limit);
        $numEntryesRnp = resultToArray($mysqli->query("SELECT count(*) as num FROM rnp"))[0]['num'];
        $rnpPagesNum=ceil($numEntryesRnp/$limit);

        require('templates/header.php');
        require('templates/rightpanel.php');
        require('templates/dialog.php');
        require('templates/footer.php');
    break;
}

?>