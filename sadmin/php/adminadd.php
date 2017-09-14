<?php 

header('Content-Type: text/html; charset=utf-8');
require_once ("./conn.php");

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$sqlDemo  = "INSERT INTO `admins` SET `username`=:username, `passwd`=:password, `email`=:email";
$result = $db->prepare($sqlDemo);
$result->execute(array(":username"=>"$username", ":password"=>"$passDemo", ":email"=>"$email"));

echo "<script>alert('添加成功'); history.back();</script>";
 ?>