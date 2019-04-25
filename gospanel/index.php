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
        case 'createOrder':
        require('templates/header.php');
        require('templates/rightpanel.php');
        require('templates/lk.php');
        require('templates/footer.php');
    break;
    case 'orderDetail':
        $id_order = $_GET['id'];
        $orderDetail = resultToArray($mysqli->query("SELECT * FROM gosorder WHERE id = $id_order"));
        $providersList = resultToArray($mysqli->query("SELECT contract.*,user.fio FROM contract JOIN user ON user.id = contract.id_user WHERE id_order = $id_order ORDER BY price"));
        
        require('templates/header.php');
        require('templates/rightpanel.php');
        require('templates/orderDetail.php');
        require('templates/footer.php');        
        break;
    case 'login':
        require("templates/head.php");
        require("templates/login.php");
        showInfo();
    break;
        
    default:
        if (isGosAuthorized()){
            $page=1;
            $limit=20;
            if (isset($_GET['page']))
                $page=$_GET['page'];
            if (isset($_GET['limit']))
                $limit=$_GET['limit'];

            $orgZakupki = getOrgZakupki($mysqli,$page,$limit);
            $numEntryGosOrder = resultToArray($mysqli->query("SELECT count(*) as num FROM gosorder WHERE id_org='{$_SESSION['gos']}'"))[0]['num'];
            $orderPagesNum=ceil($numEntryGosOrder/$limit);
            require('templates/header.php');
            require('templates/rightpanel.php');
            require('templates/main.php');
            require('templates/footer.php');
        }else{
            require("templates/head.php");
            require("templates/login.php");
            showInfo();
        }
    break;
}

?>