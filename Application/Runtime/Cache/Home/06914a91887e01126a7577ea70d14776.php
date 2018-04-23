<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>致知信息管理系统</title>
    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/home.css" />
    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/person_info.css" />
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
    .notify{
      width:700px;
      height:150px;
     border:1px solid #3287D0;
     border-radius: 10px;
     margin-bottom: 25px;
     position: relative;
     overflow: auto;  
    }
    .notify .title{
      font-size: 25px;
      font-weight: bold;
      margin-left: 10px;
    }
    .notify .time{
      position:absolute;
      bottom: 10px;
      right: 20px;
    }
    .notify .notify_con{
      text-indent: 2em;
      padding:15px 50px;
      font-weight: bold;
      font-family: "幼圆"
    }
     .notify .system_inform{
       position:absolute;
       bottom: 10px;
       left: 20px;
       font-weight: bold;
       font-size: 20px;
       color:red;
    }
    .notify .glyphicon-trash{
      float: right;
      font-size: 20px;
      margin-right: 35px;
      margin-top: 10px;
      cursor: pointer;
    }
    </style>
  </head>
  <body >
      <h2>消息中心</h2>
    
      <?php if(is_array($ss)): foreach($ss as $key=>$vo): ?><div class="notify">
        <p>
          <span class="title"><?php echo ($vo["ss_title"]); ?></span>
          <span class="time"><?php echo (date("Y-m-d H:i:s",$vo["ss_time"])); ?></span>
          <span class="system_inform">系统通知</span>
          <span class="glyphicon glyphicon-trash delete_message">
             <span style="display: none;" class="del_id"><?php echo ($vo["ss_id"]); ?></span>
          </span>
        </p>
        <p class="notify_con"><?php echo ($vo["ss_content"]); ?></p>
      </div><?php endforeach; endif; ?>
    
    <script type="text/javascript" src="/zz/Public/Js/jquery.min.js"></script>
    <script type="text/javascript" src="/zz/Public/Js/bootstrap.min.js"></script>
  </body>

  <script type="text/javascript">
    $(function(){
        var $aDel_Mess=$('.delete_message');
        var $aDel_id=$('.del_id');
        var $aNotify=$('.notify');
        for(var i=0;i<$aDel_Mess.length;i++)
        {
            (function(arg){
                $('.delete_message').eq(i).click(function(){
                    $.ajax({
                       url:"/zz/index.php/Home/Index/del_message/id/"+$aDel_id.eq(arg).html(),
                       success:function(data){
                           if(data==1)
                           {
                              $aNotify.eq(arg).remove();
                           }
                       },
                       error:function(){

                       }
                    })
                })
            })(i);
        }
    })
  </script>
</html>