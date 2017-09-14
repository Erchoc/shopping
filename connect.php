<?php
  $server="localhost";
  $db_username="root";
  $db_password="root";
 
  $con = mysql_connect($server,$db_username,$db_password);//链接数据库
  if(!$con){
    die("can't connect".mysql_error());//如果链接失败输出错误
  }
   
  mysql_select_db('shopping',$con);//选择数据库（我的是test）
?>