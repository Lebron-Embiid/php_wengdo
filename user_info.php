<?php 
	include "include/init.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文豆-个人信息</title>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
	<script src="js/playImg.js"></script>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/user_info.css">
	<link rel="stylesheet" href="css/playImg.css">
</head>
<body>
	<div class="container">
		<?php include "header.php"; ?>
		<div class="main_nav">
			<nav>
				<a href="index.php">首页</a>
				&gt;
				<a href="user_info.php">用户中心</a>
			</nav>
		</div>
		<div class="main">
			<div class="main_left">
				<div class="phone">
					<div><img src="images/user_01.gif" alt=""></div>
					<p>username</p>
				</div>
				<p class="p1">基本信息</p>
				<p>客户留言</p>
			</div>
			<div class="main_right">
				<h1>基本信息</h1>
				<form action="">
				<table>
					<tr>
						<td>用户名</td>
						<td>
							<input class="txt" type="text" placeholder="请输入用户名" name="" id="">
						</td>
					</tr>
					<tr>
						<td>真实姓名</td>
						<td>
							<input class="txt" type="text" placeholder="请输入姓名" name="" id="">
						</td>
					</tr>
					<tr>
						<td>性别</td>
						<td>
							<input type="radio" name="sex" id="man" value="1">
							<label for="man">男</label>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="radio" name="sex" id="woman" value="0">
							<label for="woman">女</label>
						</td>
					</tr>
					<tr>
						<td>手机</td>
						<td>
							<input class="txt" type="text" placeholder="请输入手机号" name="" id="">
						</td>
					</tr>
					<tr>
						<td>E-mail</td>
						<td>
							<input class="txt" type="text" placeholder="请输入邮箱" name="" id="">
						</td>
					</tr>
					<tr>
						<td>生日</td>
						<td>
							<input class="txt" type="text" placeholder="请输入您的生日" name="" id="">
						</td>
					</tr>
				</table>
				</form>
			</div>
		</div>
		<div class="bottom"></div>
		<div class="foot">
			<p>粤ICP备12022584号-3</p>
			<p>广州文豆网络科技有限公司 Copyright 2009-2015 ,All Rights Reserved wengdo</p>
		</div>
	</div>
</body>
</html>
<script>
	//滚动条事件改变导航背景色
	var head_scroll=document.getElementById('head_scroll');

	document.onscroll=function(){
		var scroll_top=document.body.scrollTop || document.documentElement.scrollTop;
		if(scroll_top>$('#con').height()){
			head_scroll.style.background='rgba(21,24,27,1)';
		}
		if(scroll_top<$('#con').height()){
			head_scroll.style.background='rgba(21,24,27,0.3)';
		}
		
	}

</script>