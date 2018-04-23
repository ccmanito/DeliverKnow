<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>添加项目</title>

    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/bootstrap.min.css" />

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/signin.css" />

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- <script type="text/javascript" src="/zz/Public/Js/ie-emulation-modes-warning.js"></script> -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <div class="container" >

      <div class="form-signin">
      <form action="/zz/index.php/Home/Team/add" method="POST" >
          <input name="name" type="text"  class="form-control" placeholder="项目名称"  id="pro_name" required autofocus>
          <input name="abs" type="text" class="form-control" placeholder="项目描述" >
          <!--<input type="text"  class="form-control" placeholder="(可选)个性域名" >
          <input type="text"  class="form-control" placeholder="(可选)访问密码" > -->
          <input type="submit" class="btn btn-lg btn-primary btn-block"  id="sub_pro" value="提交">
      </form> 
      </div>

    </div> 
   <!-- /container -->
   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   <!--  <script type="text/javascript" src="/zz/Public/Js/ie10-viewport-bug-workaround.js"></script> -->
    <script type="text/javascript" src="/zz/Public/Js/jquery.min.js"></script>
  </body>
</html>