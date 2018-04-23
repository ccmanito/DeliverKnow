<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title></title>
      <script type="text/javascript" src="/zz/Public/Js/jquery.min.js"></script>
      <style media="screen">
      .appeal_mes{
        border: 1px solid black;
        width: 600px;
        border-radius: 10px;
        margin-top: 5px;
        position: relative;
        height: 220px;
      }
      .appeal_mes .t_name,.t_content{
        margin-left: 15px;
      }
      .t_content .s_content{
        display: block;
        padding: 0 20px;
        text-indent: 42px;
      }
      .appeal_mes .t_usr{
        position: absolute;
        right: 0;
        bottom: 20px;
      }
      .appeal_mes .t_time{
        position: absolute;
        left: 368px;
        bottom: 0;
      }
      .span{
        font-weight: bold;
      }
      .s_name,.s_content,.s_usr,.s_time{
        display: inline-block;
        text-indent: 10px;
      }
      </style>
   </head>
   <body>
      <div id="page">
         <?php if(is_array($report)): foreach($report as $key=>$vo): ?><div class="appeal_mes">
              <p class="t_name"><span class="span">帖子名称:</span><span class="s_name"><?php echo ($vo["s_title"]); ?></span></p>
              <p class="t_content"><span class="span">举报内容:</span><span class="s_content"><?php echo ($vo["r_content"]); ?></span></p>
              <p class="t_usr"><span class="span">举报用户:</span><span class="s_usr"><?php echo ($vo["u_email"]); ?></span></p>
              <p class="t_time"><span class="span">举报时间:</span><span class="s_time"><?php echo (date('Y-m-d H:i:s',$vo["r_time"])); ?></span></p>
              <a class="dE" href="/zz/index.php/Home/Team/sup_del_appeal/id/<?php echo ($vo["r_id"]); ?>">删除</a>
            </div><?php endforeach; endif; ?>
      </div>
      <script>
      $(function(){
         $('.dE').click(function(){
            $(this).parents('div .appeal_mes').remove();
     
         })
       })

     </script>
   </body>
   
</html>