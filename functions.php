<?php
	$mysqli=false;
	function connectDB () {
		global $mysqli;
		$mysqli=new mysqli("localhost","root","","goszakupki");
		$mysqli->query("SET NAMES 'utf8mb4'");
	}

	function closeDB () {
		global $mysqli;
		$mysqli->close();
	}

	function resultToArray ($result) {
		$array=array();
		while(($row=$result->fetch_assoc())!=false)
			$array[]=$row;
		return $array;
	}
    
    function getUser($inn) {
        global $mysqli;
        connectDB();
        $result=$mysqli->query("SELECT * FROM `user` WHERE `inn` = '$inn'");
        closeDB();
        if($result->num_rows==0)
            return null;
        else
            return resultToArray ($result);
    }

    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
?>