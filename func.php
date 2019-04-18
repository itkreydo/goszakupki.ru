<?php
function genPassword($len){
$chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP_"; 

$max=$len; 
$size=StrLen($chars)-1; 
$password=null; 
while($max--) 
    $password.=$chars[rand(0,$size)]; 
return $password;
}
?>