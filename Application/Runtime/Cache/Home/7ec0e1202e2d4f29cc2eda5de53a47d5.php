<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>帖子内容及回复</title>
	<link rel="stylesheet" type="text/css" href="/zz/Public/Css/pro_con.css" />
	<link rel="stylesheet" type="text/css" href="/zz/Public/Css/content.css" />
  <link rel="stylesheet" type="text/css" href="/zz/Public/Css/bootstrap.min.css" />
  <script type="text/javascript" src="/zz/Public/Js/jquery.min.js"></script>
  <script type="text/javascript" src="/zz/Public/Js/bootstrap.min.js"></script>

  <style type="text/css">

    .reason{
      width: 300px;
      height: 130px;
      border-radius: 10px;
      outline: none;
      margin-left: 100px;
      resize: none;
    }
    .resp button{
      margin-left: 15px;
      position: relative;
      right: 30px;
      background-color: #32323A;
      border:none;
      outline: none;
      color: #fff;
    }
    .response{
      border-radius: 12px;
      margin-bottom: 10px;
      border:1px solid #32323A;
      width: 600px;
      min-height: 150px;
      border: 1px solid #32323A;
      margin-left: 20px;
      padding:20px;
      position: relative;
    }
    .cont1,.content{
      border: 1px solid #32323A;
    }
    .cont1{
      margin-bottom: 10px;
    }
    .left{
      border-right: 1px solid #32323A;
      height: 200px;
    }
  </style>
</head>
<body>
 
  <div class="big">
      <div class="content">
        <div class="left"> 
           <div class="intro">
         	<img src="/zz/Public/Images/image.jpg"style="margin:5px;" alt="文字说明">
         	<p style="text-align: center;"  ><?php echo ($name); ?>的留言板</p>
          </div> 
        </div>
           <div class="right">
 
         <?php if(is_array($message)): foreach($message as $key=>$vo): ?><div class="cont1">
           <h3>标题:<?php echo ($vo["s_title"]); ?></h3> 
           <div class="resp">
              <button type="button" id="modify" data-toggle="modal" data-target="#myModal">举报</button>
              <button id="quick_reply">回复</button>
           </div>
           <div class="text">
            <p><?php echo ($vo["s_content"]); ?></p>
   
           </div>
           <div><span style="position: absolute;left:5px;bottom: 0px;color:blue;">回复人数:<?php echo ($re_count); ?></span><p class="time"><?php echo (date("Y-m-d H:i:s",$vo["s_time"])); ?></p></div>
           </div><?php endforeach; endif; ?>
          
          <?php if(is_array($reply)): foreach($reply as $k=>$vo): ?><div class="response">
     	 	    <p><?php echo ($vo["r_content"]); ?></p>
     	 	      <div>
              <span style="position: absolute;left:15px;bottom: 0px;color:red;">用户名:<?php echo ($vo["u_name"]); ?></span>
              <p class="time">回复时间:<span><?php echo (date("Y-m-d H:i:s",$vo["r_time"])); ?></span></p>
            </div>
     	    </div><?php endforeach; endif; ?>


           <!-- 点击回复 --> 
           <div id="box">
               
               <form action="/zz/index.php/Home/Message/response/id/<?php echo ($id); ?>/number/<?php echo ($number); ?>" name="response" method="POST">
           	       <textarea name="response" id="reText" placeholder="请在此回复...."></textarea>
           	       <input type="submit" class="button-style" value="发表" />
                   <input type="reset" class="button-style" value="重置" />
               </form>

           </div>
     	 </div>    	
      </div>
    </div>

     <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">举报帖子理由</h4>
                  </div>

              <!--  举报 --> 
                 <form action="/zz/index.php/Home/Super/report/id/<?php echo ($id); ?>" method="POST">
                    <textarea  name="content" class="reason">
                      
                    </textarea>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">save change</button>
                    </div>
                  </form>
               <!-- 举报 --> 

                </div>
              </div>
            </div>

  
     <script type="text/javascript" src="/zz/Public/Js/jquery.min.js"></script>
     <script>
     	 $(function(){
     	 	 //回复的点击
     	 	 $('#quick_reply').on('click', function() {
        document.body.scrollTop=document.body.scrollHeight;
           $("#reText").focus();
        })
       
       //资料和帖子菜单的切换
        $("#pro_nav_file").click(function(){
           location.href="pro_show.html";
         
         })
          $("#pro_nav_posts").click(function(){
           location.href="pro_show.html";
         
         })
    });
         	
     </script>
</body>
</html>