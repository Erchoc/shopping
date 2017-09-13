<?php

header('Content-Type: text/html; charset=utf-8');
require_once ("./php/conn.php");
session_start();

if(!$_SESSION['userinfo']) {
    echo "<script>alert('请先登录管理员账户'); window.location.href='./login.html'</script>>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title> 后台首页 </title>
    <link rel="shortcut icon" href="./favicon.ico" />
    <link href="./css/bootstrap.min.css" rel="stylesheet" />
    <link href="./css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="./css/font-awesome.css" rel="stylesheet" />
    <link href="./css/adminia.css" rel="stylesheet" /> 
    <link href="./css/adminia-responsive.css" rel="stylesheet" /> 
    <link href="./css/pages/dashboard.css" rel="stylesheet" /> 
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<body>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span> 				
			</a>
			<a class="brand" href="./"> Lyy-CMS内容管理系统 </a>
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="divider-vertical"></li>
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle " href="#">
							Erchoc <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="./account.html"><i class="icon-user"></i> 账号设置</a>
							</li>
							<li>
								<a href="./change_password.html"><i class="icon-lock"></i>修改密码</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="./php/logout.php"><i class="icon-off"></i>退出</a>
							</li>
						</ul>
					</li>
				</ul>
			</div> <!-- /nav-collapse -->
		</div> <!-- /container -->
	</div> <!-- /navbar-inner -->
</div> <!-- /navbar -->

<div id="content">
	<div class="container">
		<div class="row">
			<div class="span3">
				<div class="account-container">
					<div class="account-avatar">
						<img src="./img/headshot.png" alt="" class="thumbnail" />
					</div> <!-- /account-avatar -->
					<div class="account-details">
						<span class="account-name">Erchoc</span>
						<span class="account-role">管理员</span>
						<span class="account-actions">
							<a href="javascript:;">资料</a> |
							<a href="javascript:;">编辑设置</a>
						</span>
					</div> <!-- /account-details -->
				</div> <!-- /account-container -->
				<hr />
				<ul id="main-nav" class="nav nav-tabs nav-stacked">
					<li>
						<a href="./">
							<i class="icon-home"></i>
							后台首页 		
						</a>
					</li>
					<li  class="active">
						<a href="./usersmanage.php">
							<i class="icon-pushpin"></i>
							用户管理	
						</a>
					</li>
					<li>
						<a href="./goodsmanage.php">
							<i class="icon-th-list"></i>
							商品管理
							<span class="label label-warning pull-right"> 3 </span>
						</a>
					</li>
					<li>
						<a href="./ordersmanage.php">
							<i class="icon-signal"></i>
							订单管理
						</a>
					</li>	
					<li>
						<a href="./php/logout.php">
							<i class="icon-lock"></i>
							退出系统
						</a>
					</li>
				</ul>	
				<hr />
				<div class="sidebar-extra">
					<p>欢迎使用lyy-cms内容管理系统，lyy-cms内容管理系统前端为COSY HONE知名家具公司。</p>
					<p>COSY Home, 致力于打造一个优质家具的购物平台，用贴心真诚的服务成为专属于您的家庭小帮手。该web项目团队成员由杨雪晋，叶虹霓，刘婷三人组成，拥有最强大脑和最强美工的强强联合，你有没有心动呢？满意的话请给我们5星好评吧！比心！</p>
				</div> <!-- .sidebar-extra -->
				<hr />
			</div> <!-- /span3 -->
			<div class="span9">
				<h1 class="page-title">
					<i class="icon-home"></i>
					用户管理					
				</h1>
				<div class="widget widget-table">
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3> 会员用户显示列表 </h3>
					</div> <!-- /widget-header -->
					<div class="widget-content">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>唯一编码</th>
									<th>用户名</th>
									<th>邮箱</th>
									<th>性别</th>
									<th>手机号</th>
									<th>注册时间</th>
									<th>用户等级</th>
									<th>累计积分</th>
									<th>数据操作</th>
								</tr>
							</thead>


							<?php

								$sql = "SELECT * FROM `users`";
								$result = $db->prepare($sql);  // 此时$result是一个PDO结果集对象
								$result->execute();
								$res = $result->fetchAll(PDO::FETCH_ASSOC);  // 此时结果集变成关联数组
								// var_dump($res);

								$output = "<tbody>";
								foreach ($res as $k => $v) {
								    // $result is your query result array
								    $output .= "<tr>";
								    $output .= "<td>".$v['id']."</td>";
								    $output .= "<td>".$v['username']."</td>";
								    $output .= "<td>".$v['email']."</td>";
								    $output .= "<td>".$v['sex']."</td>";
								    $output .= "<td>".$v['phone']."</td>";
								    $output .= "<td>".$v['register']."</td>";
								    $output .= "<td>".$v['grade']."</td>";
								    $output .= "<td>".$v['integrals']."</td>";
								    $output .= "<td><a class='btn btn-small btn-warning' href='./account.html?id=".$v["id"]."';>"." 编辑 "."</a> <a class='btn btn-small btn-warning' href='./php/admindel?id=".$v["id"]."';>"." 删除 "."</a></td>";


								    $output .= "</tr>";

								}
								$output .= "</tdoby>";
								echo $output;

							 ?>
						</table>
					</div> <!-- /widget-content -->
				</div> <!-- /widget -->
			</div> <!-- /span9 -->
		</div> <!-- /row -->
	</div> <!-- /container -->
</div> <!-- /content -->

<div id="footer">
	<div class="container">				
		<hr />
		<p>&copy; 2017 Sadmin By <a href="https://github.com/Erchoc">Erchoc</a>.</p>
	</div> <!-- /container -->
</div> <!-- /footer -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
	<script src="./js/jquery-1.7.2.min.js"></script>
	<script src="./js/excanvas.min.js"></script>
	<script src="./js/jquery.flot.js"></script>
	<script src="./js/jquery.flot.pie.js"></script>
	<script src="./js/jquery.flot.orderBars.js"></script>
	<script src="./js/jquery.flot.resize.js"></script>
	<script src="./js/bootstrap.js"></script>
	<script src="./js/charts/bar.js"></script>
  </body>
</html>
