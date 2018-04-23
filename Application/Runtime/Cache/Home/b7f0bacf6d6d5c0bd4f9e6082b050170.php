<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>找回密码</title>

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

      <form name="myform" action="/zz/index.php/Home/Login/password" method="POST" class="form-signin">
          <input id="u_email" name="username" type="email"  class="form-control" placeholder="用户名邮箱" required autofocus> 
          <input name="password" type="password" class="form-control" placeholder="密码" required>
          <input name="password1" type="password" class="form-control" placeholder="密码确认" required>   
          <input name="code" type="text" class="form-control" placeholder="验证码" required>      
          <button id="button" class="btn btn-lg btn-primary btn-block"  onclick="validateCode();">提交</button>
 
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>