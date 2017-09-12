<?php
header("Content-Type: text/html;charset=utf-8"); 
include_once('connect.php');
sql4 = "SELECT * FROM admins WHERE `usename` = '叶虹霓'";
$stmt = $pdo->query($sql4);
$result = $rs->fetch(PDO::FETCH_ASSOC);