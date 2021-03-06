<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<title>致知信息交流系统</title>
<link rel="stylesheet" type="text/css" href="/zz/Public/Css/jquery.fullPage.css" />
<style>
.section { 
	text-align: center;
	font: 50px "Microsoft Yahei"; 
	color: #fff;
}
#login_reg{
	position: fixed;
	z-index: 2;
	top:20px;
	right:50px;
	color:#fff;
	font-size: 18px;
	text-decoration: none;
}
#login_reg:hover{
	text-decoration: underline;
}
</style>
<script type="text/javascript" src="/zz/Public/Js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/zz/Public/Js/jquery-ui-1.10.3.min.js"></script>
<script type="text/javascript" src="/zz/Public/Js/jquery.fullPage.min.js"></script>
<script>
$(document).ready(function() {
	$.fn.fullpage({
		 slidesColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', '#f90'],
		 anchors: ['page1', 'page2', 'page3', 'page4'],
		 navigation: true
	});
});
</script>
</head>

<body>
<a href="login.html"   id="login_reg">登录/注册</a>
<div class="section">
	<h5>致知信息交流系统</h5>
	<h6>一个非常适合IT团队的在线交流平台</h6>
</div>
<div class="section">
	<h5>在线文件托管</h5>
	<h6>文件实时上传，团队随处共享</h6>
</div>
<div class="section">
	<h5>在线聊天</h5>
	<h6>团队及时交流，沟通工作难题</h6>
</div>
<div class="section">
	<h5>团队协作</h5>
	<h6>精诚合作，高效快速完成项目开发</h6>
</div>









</body>
</html>