<?php
header('Content-type:text/html;charset=utf8');
$username=trim($_POST['username']);
$username=strtolower($username);
$password=$_POST['password'];
$password=addslashes($password);

require('connect.php');
 
$sql="select * from userinfo where username='{$username}' and passwd='{$passwd}'";

$rs=$pdo->query($sql);
$result=$rs->fetch(PDO::FETCH_ASSOC);
if ($result) {
    //echo '登录成功！欢迎你，'.$result['nickname'];
    session_start();
    $_SESSION['username']=$username;
    $_SESSION['nickname']=$result['nickname'];
    header('Location:list.php');
}else{
    echo '<script>alert("用户名或密码错误");history.back()</script>';
    exit();
}
?>