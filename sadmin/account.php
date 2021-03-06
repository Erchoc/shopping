<?php

header('Content-Type: text/html; charset=utf-8');
require_once ("./php/conn.php");
session_start();

if(!$_SESSION['userinfo']) {
    echo "<script>alert('请先登录管理员账户'); window.location.href='./login.html'</script>>";
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM `users` WHERE `id`=:id";
$result = $db->prepare($sql);
$res = $result->execute(array(":id"=>"$id"));

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title> 用户信息 </title>
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
					<li>
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
					<i class="icon-th-large"></i>
					用户设置			
				</h1>
				<div class="row">
					<div class="span9">
						<div class="widget">
							<div class="widget-header">
								<h3>基本信息</h3>
							</div> <!-- /widget-header -->
							<div class="widget-content">
								<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li>
						    <a href="#1" data-toggle="tab">修改用户信息</a>
						  </li>
						  <li class="active">
						    <a href="#2" data-toggle="tab">修改管理员信息</a>
						  </li>
						  <li>
						  	<a href="#3" data-toggle="tab">增加VIP用户</a>
						  </li>
						  <li>
						  	<a href="#4" data-toggle="tab">增加管理员用户</a>
						  </li>
						</ul>
						<br />
							<div class="tab-content">
								<div class="tab-pane" id="1">
								<form method="post" id="edit-profile" class="form-horizontal" action="./php/adminfix.php" />
									<fieldset>
										<div class="control-group">	
											<label class="control-label" for="username">用户名：</label>
											<div class="controls">
												<input type="text" class="input-large disabled" id="username" value="erchoc" disabled="" />
												<p class="help-block">用户名是为登录而用，不能修改.</p>
											</div> <!-- /controls -->
										</div> <!-- /control-group -->
										<div class="control-group">
											<label class="control-label" for="email">邮箱：</label>
											<div class="controls">
												<input type="text" class="input-large" id="email" value="erchoc@gmail.com" />
											</div> <!-- /controls -->
										</div> <!-- /control-group -->
										<div class="control-group">	
											<label class="control-label" for="firstname">手机号：</label>
											<div class="controls">
												<input type="text" class="input-large" id="firstname" value="13077926807" />
											</div> <!-- /controls -->
										</div> <!-- /control-group -->
										<div class="control-group">	
											<label class="control-label" for="lastname">性别：</label>
											<div class="controls">
												<input type="text" class="input-large" id="lastname" value="男" />
											</div> <!-- /controls -->
										</div> <!-- /control-group -->
										<br /><br />
										<div class="control-group">
											<label class="control-label" for="password1">密码：</label>
											<div class="controls">
												<input type="password" class="input-large" id="password1" value="password" />
											</div> <!-- /controls -->
										</div> <!-- /control-group -->
										<div class="control-group">
											<label class="control-label" for="password2">确认密码：</label>
											<div class="controls">
												<input type="password" class="input-large" id="password2" value="password" />
											</div> <!-- /controls -->
										</div> <!-- /control-group -->
											<br />
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">保存</button> 
											<button class="btn">取消</button>
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
								</div>
								<div class="tab-pane active" id="2">
								<form id="edit-profile" method="post" class="form-horizontal" action="./php/adminfix.php" />
									<fieldset>
										<div class="control-group">	
											<label class="control-label" for="username">用户名：</label>
											<div class="controls">
												<input type="text" class="input-large disabled" name="username" id="username" value="erchoc" disabled="" />
												<p class="help-block">用户名是为登录而用，不能修改.</p>
											</div> <!-- /controls -->
										</div> <!-- /control-group -->
										<div class="control-group">
											<label class="control-label" for="email">邮箱：</label>
											<div class="controls">
												<input type="text" class="input-large" name="email" id="email" value="erchoc@gmail.com" />
											</div> <!-- /controls -->
										</div> <!-- /control-group -->
										<br /><br />
										<div class="control-group">
											<label class="control-label" for="password">密码：</label>
											<div class="controls">
												<input type="password" name="password" class="input-large" id="password1" value="password" />
											</div> <!-- /controls -->
										</div> <!-- /control-group -->
										<div class="control-group">
											<label class="control-label" for="password2">确认密码：</label>
											<div class="controls">
												<input type="password" class="input-large" id="password2" value="password" />
											</div> <!-- /controls -->
										</div> <!-- /control-group -->
											<br />
										<div class="form-actions">
											<button type="submit" class="btn btn-primary">保存</button> 
											<button class="btn">取消</button>
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
								</div>
								<div class="tab-pane" id="3">
									<form id="edit-profile2" class="form-horizontal" />
										<fieldset>
											<div class="control-group">
												<label class="control-label" for="accounttype">账号类型</label>
												<div class="controls">
													<label class="radio">
														<input type="radio" name="accounttype" value="option1" checked="checked" id="accounttype" />
														管理员
													</label>
													<label class="radio">
														<input type="radio" name="accounttype" value="option2" />
														普通用户
													</label>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="accountusername">账号名称</label>
												<div class="controls">
													<input type="text" class="input-large" id="accountusername" value="jikehui2018@gmail.com" />
													<p class="help-block">填写你的邮箱地址.</p>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="emailserver">邮件服务器</label>
												<div class="controls">
													<input type="text" class="input-large" id="emailserver" value="mail.jikehui.com.cn" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="accountpassword">密码</label>
												<div class="controls">
													<input type="text" class="input-large" id="accountpassword" value="password" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="accountadvanced">高级设置</label>
												<div class="controls">
													<label class="checkbox">
														<input type="checkbox" name="accountadvanced" value="option1" checked="checked" id="accountadvanced" />
														通过加密连接服务器
													</label>
													<label class="checkbox">
														<input type="checkbox" name="accounttype" value="option2" />
														通过连接下载所有信息
													</label>
												</div>
											</div>
											<br />
											<div class="form-actions">
												<button type="submit" class="btn btn-primary">保存</button> <button class="btn">取消</button>
											</div>
										</fieldset>
									</form>
								</div>
								<div class="tab-pane" id="4">
									<form id="edit-profile2" class="form-horizontal" action="./php/adminadd.php" />
										<fieldset>
											<div class="control-group">
												<label class="control-label" for="accountusername">账号名称</label>
												<div class="controls">
													<input type="text" class="input-large" id="accountusername" value="" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="accountusername">账号邮箱</label>
												<div class="controls">
													<input type="text" class="input-large" id="accountusername" value="" />
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="accountpassword">密码</label>
												<div class="controls">
													<input type="password" class="input-large" id="accountpassword" value="" />
												</div>
											</div>
											<div class="form-actions">
												<button type="submit" class="btn btn-primary">保存</button> <button class="btn">取消</button>
											</div>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
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
