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
// $username = 'erchoc';
// $passDemo = md5('erchoc');
// $email = 'erchoc@gmail.com';
// $sqlDemo  = "INSERT INTO `admins` SET `username`=:username, `passwd`=:password, `email`=:email";
// $result = $db->prepare($sqlDemo);
// $result->execute(array(":username"=>"$username", ":password"=>"$passDemo", ":email"=>"$email"));
// exit;

// mock users data
// $username = 'user_mock_9';
// $passDemo = md5('user_mock_9');
// $email    = 'user_mock_9@qq.com';
// $sex      = '女';
// $phone    = '15676562452';
// $register = date('Y-d-m', time());
// $grade    = 2;
// $integrals= 1980;
// $sqlDemo  = "INSERT INTO `users` SET `username`=:username, `passwd`=:password, `email`=:email, `sex`=:sex, `phone`=:phone, `register`=:register, `grade`=:grade, `integrals`=:integrals";
// $result = $db->prepare($sqlDemo);
// $result->execute(array(":username"=>"$username", ":password"=>"$passDemo", ":email"=>"$email", ":sex"=>"$sex", ":phone"=>"$phone", ":register"=>"$register", ":grade"=>"$grade", ":integrals"=>"$integrals"));
// exit;

// mock goods data
// $gname = '';
// $number = 1000;
// $gtype = '';
// $intro = '';
// $recommend = '';
// $integrals = '';
// $up_time = '';
// $old_price = '';
// $new_price = '';
// $sqlDemo  = "INSERT INTO `goods` SET `gname`=:gname, `number`=:$number, `gtype`=:gtype, `intro`=:intro, `recommend`=:recommend, `integrals`=:integrals, `up_time`=:up_time, `old_price`=:old_price, `new_price`=:new_price";
// $result = $db->prepare($sqlDemo);
// $result->execute(array(":gname"=>"$gname", ":number"=>"$number", ":gtype"=>"$gtype", `intro`="$intro", `recommend`="$recommend", `integrals`="$integrals", `up_time`="$up_time", `old_price`="$old_price", `new_price`="$new_price"));
// exit;

// mock orders data
// $uid = ;
// $gid = ;
// $username  = '';
// $order_time= '';
// $address   = '';
// $phone     = ;
// $remarks   = '';
// $sqlDemo  = "INSERT INTO `orders` SET `uid`=:uid, `gid`=:gid, `username`=:username, `order_time`=:order_time, `address`=:address, `phone`=:phone, `remarks`=:remarks";
// $result = $db->prepare($sqlDemo);
// $result->execute(array(":uid"=>"$uid", ":gid"=>"$gid", ":username"=>"$username", `order_time`="$order_time", `address`="$address", `phone`="$phone", `remarks`="$remarks"));
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
