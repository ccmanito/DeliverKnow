<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>注册</title>

    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/bootstrap.min.css" />

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/signin.css" />

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script type="text/javascript" src="/zz/Public/Js/ie-emulation-modes-warning.js"></script></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 <script type="text/javascript" src="/zz/Public/Js/code.js"></script>
  <body  onload="createCode()">

    <div class="container" >

      <form name="myform" action="/zz/index.php/Home/Registered/user_info/id/<?php echo ($id); ?>" method="POST" class="form-signin">
          <h2 class="form-signin-heading">完善信息(不可更改)</h2>
          <input name="user_name" type="text"  class="form-control" placeholder="用户名(姓名)" required autofocus>
          <input name="school" type="text" class="form-control" placeholder=单位(学校) required>
          <input name="class" type="text" class="form-control" placeholder="部门(专业班级)" required>
          <input name="abstract" type="text"  class="form-control" placeholder="个人简介" required autofocus>
          <input name="code" type="text" class="form-control" placeholder="验证码" required>
          <button id="button" class="btn btn-lg btn-primary btn-block"  onclick="validateCode();">提交</button>
          <a href="/zz/index.php/Home/Login/login" class="noReg">已有账号？马上去登录-></a>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>