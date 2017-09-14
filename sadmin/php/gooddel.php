<?php 	

header('Content-Type: text/html; charset=utf-8');
require_once ("./conn.php");

	$id  = $_GET['id'];
	$sql = "DELETE FROM `goods` WHERE `id`=:id";
	$result = $db->prepare($sql);
	$res = $result->execute(array(":id"=>"$id"));
	if ($res) {
		echo "<script>alert('删除成功'); history.back();</script>";
	}

 ?>