<?php

header('Content-Type: text/html; charset=utf-8');
require_once ("./conn.php");

if (!$_POST['username']) {
	echo "<script>alert('请输入管理员用户名'); history.back();</script>";
	exit;
} elseif (!$_POST['password']) {
	echo "<script>alert('请输入管理员密码'); history.back();</script>";
	exit;
}

$username = $_POST['username']?$_POST['username']:null;
$password = $_POST['password']?$_POST['password']:null;



// mock admins data

// $passDemo = md5('123456');
// $email = 'erchoc@qq.com';
// $sqlDemo  = "INSERT INTO `admins` SET `username`=:username, `passwd`=:password, `email`=:email";

// $result = $db->prepare($sqlDemo);
// $result->execute(array(":username"=>"admin1997", ":password"=>"$passDemo", ":email"=>"$email"));
// exit;

$sql = "SELECT * FROM `admins` WHERE `username`=:username";
$result = $db->prepare($sql);  // 此时$result是一个PDO结果集对象
$result->execute(array(":username"=>"$username"));

$res = $result->fetchAll(PDO::FETCH_ASSOC);  // 此时结果集变成关联数组
if (!$res) {
	echo "<script>alert('管理员不存在，请确认输入正确信息'); history.back();</script>";
}

session_start();
$_SESSION['userinfo'] = newSession($res[0]['username'], $res[0]['passwd']);

header("location: ../index.php");
