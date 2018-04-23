<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登录</title>

    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/bootstrap.min.css" />

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/signin.css" />

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script type="text/javascript" src="/zz/Public/Js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body  >

    <div class="container" >

      <form class="form-signin" action="/zz/index.php/Home/Login/dologin" method="POST">
          <h2 class="form-signin-heading">用户登录</h2>
          <input name="username" type="email"  class="form-control" placeholder="用户名邮箱" required autofocus>
          <input name="password" type="password" class="form-control" placeholder="密码" required>
          <input name="code" type="text"  class="form-control" placeholder="验证码" required id="inputCode" style="width: 100px;float: left;">
          <img id="img" src="/zz/index.php/Home/Code/index" onclick='this.src=this.src+"?"+Math.random()'  style="width: 200px;height:45px;" />
          <button class="btn btn-lg btn-primary btn-block" type="submit"  >登录</button>
          <a href="/zz/index.php/Home/Login/zhpw" >忘记密码？</a>
          <a href="/zz/index.php/Home/Registered/reg" style="margin-left: 70px;">没有账号？马上去注册-></a>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script type="text/javascript" src="/zz/Public/Js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>