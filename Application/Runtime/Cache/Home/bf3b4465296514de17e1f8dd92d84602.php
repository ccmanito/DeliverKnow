<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>致知信息管理系统</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">
    <link href="css/person_info.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    h2{
      margin-bottom: 30px;
    }
  
      input[type="text"]{
        width: 750px;
        height:45px;
      }
       input[type="submit"]{
        width: 80px;
        height:45px;
      }
    </style>
  </head>
  <body>
      <h2>站内搜索</h2>
      <form action=" method="post" ">
        <input type="text" ><input type="submit" value="搜索">
      </form>
      <!-- 显示搜索内容 -->
      <div>
        
      </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>