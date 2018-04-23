<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/zz3.0/Public/Css/style.css" />
    <link rel="stylesheet" type="text/css" href="/zz3.0/Public/Css/bootstrap.min.css" />
    <script type="text/javascript" src="/zz3.0/Public/Js/jquery.min.js"></script>
    <script type="text/javascript" src="/zz3.0/Public/Js/javascript.js"></script>

  </head>
  <body>
     <div id = "header" class="container-fluid">
        <a class="header_logo" href="#"><img class="header_logo_img" src="/zz3.0/Public/Images/3.png" alt="" /> 致知信息管理系统</a>
        <a class="admin_logo" href="#"><img class="admin_logo_img" src="/zz3.0/Public/Images/3.png" alt="" /> 管理员</a>
     </div>

     <div id = "side">
        <ul id = "list">
           <li><a class="Team" href="/zz3.0/index.php/Home/Super/team">团队管理</a></li>
           <li>
             <a class="System" href="#">系统消息</a>
                <ul class="system_nav">
                   <li><a class="Not" href="#">发布公告</a></li>
                   <li><a class="Mes" href="/zz3.0/index.php/Home/Super/send_message">发送消息</a></li>
                </ul>
           </li>
           <li class="Appeal"><a href="/zz3.0/index.php/Home/Super/appeal">申诉处理</a></li>
           <li><a href="/zz3.0/index.php/Home/Login/outlogin">退出登录</a></li>
        </ul>
     </div>
     <div id = "content"></div>
  </body>
  <!--
    <script type="text/javascript">
      var ajaxobj = new AJAXRequest;
      ajaxobj.method="GET"; // 设置请求方式为GET
      ajaxobj.url="team.html"
      ajaxobj.callback=function(xmlobj) {
      document.getElementById('content').innerHTML = xmlobj.responseText;
      }
      ajaxobj.send();// 发送请求
  </script>-->
</html>