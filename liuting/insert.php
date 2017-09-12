<?php
header("Content-Type: text/html;charset=utf-8"); 
include_once('connect.php');


$adminName = "叶虹霓";
$passwd    = md5("123456");	

$sql1      = "INSERT INTO `admins`(`username`,`passwd`) VALUES ('$adminName', '$passwd')";

echo $sql1;
$stmt = $pdo->exec($sql1);

// var_dump($stmt);

?>