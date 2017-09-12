<?php
header("Content-Type: text/html;charset=utf-8"); 
include_once('connect.php');

$passwd = md5("123123");
$sql3 = "UPDATE `admins` SET `passwd` = '$passwd' WHERE `usename` = '刘婷'";
echo $sql3;