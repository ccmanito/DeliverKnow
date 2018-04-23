<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title></title>
      <link rel="stylesheet" type="text/css" href="/zz/Public/Css/style.css" />
      <script type="text/javascript" src="/zz/Public/Js/jquery.min.js"></script>
   </head>
   <body>
      <div id="page">
         <div class="send_message">
         
         <form action="/zz/index.php/Home/Super/admin_send" method="POST">
            <p class="message_id">
               收件人:<input  type="text" name="username" placeholder="输入用户账号">
            </p>
            <p class="message_topic">
               主　题:<input  type="text" name="title" placeholder="主题" >
            </p>
            <textarea class="message_cont" name="content" value="正文"></textarea>
            <input class="message_btn_send" type="submit" name="name" value="发送">
         </form>

         </div>
      </div>
   </body>
</html>