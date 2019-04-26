<?php
session_start();
require("bd.php");
require("functions.php");
$act=$_GET['act'];
switch ($act){
    case 'reg':
        require('templates/header.php');
        require('templates/reg.php');
        require('templates/footer.php');
    break;
    case 'login':
        if($_SESSION['id']!="") {
            header("Location: /userpanel/");
            exit;
        }
        require('templates/header.php');
        require('templates/login.php');
        require('templates/footer.php');
    break;
    default:
        $type="gosorder";
        $f="";
        $page = 1;
        $limit = 20;
        if (isset($_GET['page']))
            $page=$_GET['page'];
        if (isset($_GET['limit']))
            $limit=$_GET['limit'];
        if (isset($_GET['type']))
            $type=$_GET['type'];
        if (isset($_GET['f']))
            $f=$_GET['f'];
        $offset=($page-1)*$limit;
        if ($f==""){
        connectDB();
        $orgZakupki=resultToArray($mysqli->query("SELECT *,orgs.title as org_title FROM gosorder JOIN orgs ON orgs.id = gosorder.id_org LIMIT $offset,$limit"));
        $orgPagesNum =ceil(count(resultToArray($mysqli->query("SELECT *,COUNT(*) as num FROM gosorder")))/$limit);
        closeDB();

        }else{
        connectDB();
        $orgZakupki=resultToArray($mysqli->query("SELECT * FROM gosorder WHERE title LIKE '%$f%' UNION SELECT * FROM gosorder WHERE id LIKE '%$f%' UNION SELECT gosorder.* FROM gosorder JOIN orgs ON orgs.id = gosorder.id_org WHERE orgs.title LIKE '%$f%' LIMIT $offset,$limit"));
        $orgPagesNum = count(resultToArray($mysqli->query("SELECT * FROM gosorder WHERE title LIKE '%$f%' UNION SELECT * FROM gosorder WHERE id LIKE '%$f%' UNION SELECT gosorder.* FROM gosorder JOIN orgs ON orgs.id = gosorder.id_org WHERE orgs.title LIKE '%$f%'")));
        $orgPagesNum =ceil($orgPagesNum/$limit);
        closeDB();    
        }
        require('templates/header.php');
        require('templates/main.php');
        require('templates/footer.php');
    break;
}

?>