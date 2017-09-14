<?php 

header('Content-Type: text/html; charset=utf-8');
require_once ("./conn.php");


$password = md5($_POST['password']);
$email    = $_POST['email'];
$id = 7;

$sql = "UPDATE `admins` SET `passwd`='$password', `email`='$email' WHERE `id`='$id'";
$res = $db->query($sql);

if ($res) {
	echo "<script>alert('更新成功');location.href='../index.php'</script>";
}


 ?>