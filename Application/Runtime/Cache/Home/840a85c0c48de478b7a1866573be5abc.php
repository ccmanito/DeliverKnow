<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/style.css" />
    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/bootstrap.min.css" />
    <script type="text/javascript" src="/zz/Public/Js/jquery.min.js"></script>
    <script type="text/javascript" src="/zz/Public/Js/javascript.js"></script>
    <script type="text/javascript" src="/zz/Public/Js/jquery.pjax.js"></script>

  </head>
  <body>
     <div id = "header" class="container-fluid">
        <a class="header_logo" href="#"><img class="header_logo_img" src="/zz/Public/Images/3.png" alt="" /> 致知信息管理系统</a>
        <a class="admin_logo" href="#"><img class="admin_logo_img" src="/zz/Public/Images/3.png" alt="" /> 管理员</a>
     </div>

     <div id = "side">
        <ul id = "list">
           <li><a class="Team" href="javascript:;">团队管理</a></li>
           <li>
             <a class="System" href="javascript:;">系统消息</a>
                <ul class="system_nav">
                   <li><a class="Not" href="javascript:;">发布公告</a></li>
                   <li><a class="Mes" href="javascript:;">发送消息</a></li>
                </ul>
           </li>
           <li class="Appeal"><a href="javascript:;">申诉处理</a></li>
           <li><a href="/zz/index.php/Home/Login/outlogin">退出登录</a></li>
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