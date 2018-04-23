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
 
  <body>

    <div class="container" >

      <form name="myform" action="/zz/index.php/Home/Registered/reg_succ" method="POST" class="form-signin">
          <h2 class="form-signin-heading">注册新用户</h2>
          <input id="u_email" name="username" type="email"  class="form-control" placeholder="用户名邮箱" required autofocus>
          <input name="password" type="password" class="form-control" placeholder="密码" required>
          <input name="password1" type="password" class="form-control" placeholder="密码确认" required>

          <input type="text"  class="form-control" placeholder="验证码" required id="inputCode">
          <img id="img" src="/zz/index.php/Home/Code/index" onclick='this.src=this.src+"?"+Math.random()'/>
          <button id="button" class="btn btn-lg btn-primary btn-block">注册</button>
          <a href="/zz/index.php/Home/Login/login" class="noReg">已有账号？马上去登录-></a>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script type="text/javascript" src="/zz/Public/Js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="/zz/Public/Js/jquery.min.js"></script>
    

    <script type="text/javascript"> 
       $(function(){
           var error=new Array();
           //测试用户是否注册过
           $('#u_email').blur(function(){                 //绑定失去焦点方法
               var username=$(this).val();                //获取表单的值
               $.get('/zz/index.php/Home/Registered/checkName',{'username':username},function(jdata){  
                   if(jdata.status!=0){
                      error['info']=0;
                      $('#u_email').after('<p id="p" style="color:red">该用户已被注册</p>');
                      $('#u_email').focus(function(){
                          $('#p').remove();
                      }); 
                   }
                   if(jdata.status==0){       
                       error['info']=1;             
                       $('#p').remove();
                   }
               });
           });
           //提交表单
           $('#button').click(function(){
              if(error['info']==1){
                  $('form[name="myform"]').submit();
              }else{
                  return false;
              }
           });
     });

</script>

  </body>
</html>