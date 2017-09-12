<?php

header("Content-Type: text/html;charset=utf-8"); 
include_once('connect.php');

sql2 = "delete from admins where `username` = '刘gdfsg'";
$stmt $pdo->exec($sql2);
echo $sql2;