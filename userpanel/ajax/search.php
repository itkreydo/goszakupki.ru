<?
session_start();
require('../../bd.php');
if(!empty($_POST["referal"])){ //Принимаем данные

    $referal = trim(strip_tags(stripcslashes(htmlspecialchars($_POST["referal"]))));

    $db_referal = $mysqli -> query("SELECT * from user WHERE fio LIKE '%$referal%' LIMIT 5")
    or die('Ошибка №'.__LINE__.'<br>Обратитесь к администратору сайта пожалуйста, сообщив номер ошибки.');

    while ($row = $db_referal -> fetch_array()) {
        echo "\n<li>ИНН:".$row["inn"].", ".$row["fio"]."</li>"; //$row["name"] - имя поля таблицы
    }

}
?>