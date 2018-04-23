<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/bootstrap.min.css" />

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/signin.css" />
    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/home.css" />
    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/pro_con.css" />

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script type="text/javascript" src="/zz/Public/Js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="/zz/Public/Js/jquery.min.js"></script>
    <script type="text/javascript" src="/zz/Public/Js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    #pro_nav_file,#pro_nav_posts{
      color: #fff;
    }
    .name{
      color: #000;
    }
    .file_input{
      width: 600px;
      height: 100px;
      border-radius: 10px;
      border: 1px solid #000;
      outline: none;
      resize: none;
    }
    .file_btn{
     border: none;
     background-color: #eee;
     outline: none;
    }

    p.file_introduce{
      width: 650px;
      height: 100px;
      padding-top: 15px;
      text-indent: 2em;
      border: 1px solid #ccc;
      border-radius: 10px solid #ccc;
      background: #ccc;
      position:relative;
      display: none;
      top: -5px;
      cursor: pointer;
      color: #000;
    }

    .tiezi_con{
      width: 550px;
      height: 200px;
      border:1px solid #000;
      resize: none;
    }


    </style>
  </head>
  <body>
    <header style="z-index: 2;">
       <a href="/zz/index.php/Home/Index/home.html"><img src="/zz/Public/Images/logo.png" /><a>
       <span><img src="/zz/Public/Images/zhifu.jpg"></span>
       <span class="glyphicon glyphicon-comment" id="show_chat" title="online Chat"></span>
       <span class="glyphicon glyphicon-envelope"></span>
    </header>
    <div id="pro_con" style="margin-top: 100px;">
        <ul id="pro_nav">
          <li id="pro_nav_file">项目资料</li>
          <li id="pro_nav_posts">项目帖子</li>
        </ul>

       <p style="clear:left;"><hr/></p> 
        <div id="file">
            <ul style="position: relative;">
            
            <?php if(is_array($file)): foreach($file as $k=>$vo): ?><li class="file_name">
               <span class="name"><?php echo ($vo["f_filename"]); ?></span>
               <a class="glyphicon glyphicon-download-alt" href="/zz/Public\Upload\<?php echo ($vo["file_path"]); ?>" download="<?php echo ($k); ?>" ></a>
             <!--  -->
            <!-- <a class="glyphicon glyphicon-download-alt" href="/zz/index.php/Home/File/down_upload/filename/<?php echo ($k); ?>"></a> --> 
            </li>
               <p class="file_introduce"><?php echo ($vo["f_filesummary"]); ?></p><?php endforeach; endif; ?>
           
           </ul>

         <!-- 上传文件 -->
          <form action="/zz/index.php/Home/File/upload/number/<?php echo ($number); ?>" enctype="multipart/form-data" method="POST" id="upload">
              <input type="file" name="file" class="file_btn" />
              <textarea name="info" placeholder="介绍下你要上传文件" class="file_input"></textarea>
              <input id="upload" type="submit" value="上传" >
          </form>

        </div>
        <div id="posts" style="display: none;position: relative;">
            <div id="left">
                <h4>团队帖子</h4>
               
                <!-- 帖子的展示部分 -->
               
               
                <ul id="posts_con" >
                <?php if(is_array($message)): foreach($message as $k=>$vo): ?><li style="height: 100px;">
                      <p>
                        <a href="/zz/index.php/Home/Message/content_show/id/<?php echo ($vo["s_id"]); ?>/number/<?php echo ($number); ?>" target="_blank"><h3 style="color: #ccc;margin-left:30px; "><?php echo ($vo["s_title"]); ?></h3></a>
                        <span  class="type">类型:<?php echo ($vo["s_type"]); ?></span>
                        <span class="author" style="position: relative;top:10px;">楼主:<?php echo ($vo["u_name"]); ?></span>
                      </p> 
                     <!--  <p style="text-align: right;"></p> -->
                      <p class="cont" style="max-width: 600px;max-height: 19px;margin-right: 45px;margin-top: 10px; overflow: hidden;color: #32323A"><?php echo ($vo["s_content"]); ?></p> <!-- 获得文章首部 -->
                      <p class="time"><?php echo (date("Y-m-d H:i:s",$vo["s_time"])); ?></p>  
                     <!--  <p class="Rp">回复人数:20</p>   -->
                      <!-- <span class="reply">回复</span> -->
                    </li><?php endforeach; endif; ?>
                </ul>
               
                  <!-- 我是截止线，请忽略我！ -->
               
<!--                 <div id="my_message">  
                  <form  name="message" action="/zz/index.php/Home/Message/getmessage/id/<?php echo ($number); ?>"  method="POST"  id="my_message_form" style=" visibility: hidden;">
                     <div class="send-T">标题:<input type="text" name="title" style="width: 450px;" />
                         <select name="choice" id="choice">
                           <option>问题</option>
                           <option>经验</option>
                           <option>心情</option>
                         </select>
                       </div>
                      <br/>
                       内容:<div><textarea name="content" ></textarea></div>
                       <div style="text-align: center;width: 600px;">
                       <input type="submit" class="button-style" value="发表" />
                       <input type="reset" class="button-style" value="重置" />
                       </div>
                  </form>
                
                </div> -->
            </div>
            <div id="right" style="position: absolute;top: 10px;right: 30px;">
              <ul style="list-style: none;">
                <li><button id="Ispeak" style="background:#32323A;color: #fff;border: none;outline: none;" data-toggle="modal" data-target="#myModal">我要发表</button></li>
              </ul>
            </div>
        </div>
    </div>


<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          &times;
        </button>
        <h4 class="modal-title" id="myModalLabel">
            发表帖子
        </h4>
      </div>
      <form  name="message" action="/zz/index.php/Home/Message/getmessage/id/<?php echo ($number); ?>"  method="POST"  id="my_message_form" >
      <div class="modal-body">
      
         <div class="send-T">标题:<input type="text" name="title" style="width: 450px;" required="" />
           <select name="choice" id="choice">
             <option>问题</option>
             <option>经验</option>
             <option>心情</option>
           </select>
         </div>
        <br/>
         内容:<div><textarea name="content"  class="tiezi_con"  required=""></textarea></div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭
        </button>
        <button type="submit" class="btn btn-primary">
          提交
        </button>
      </div>
       </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal -->
</div>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script type="text/javascript" src="/zz/Public/Js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="/zz/Public/Js/jquery.min.js"></script>
    <script type="text/javascript">
      $(function(){
        // 资料和帖子菜单的切换
         $("#pro_nav_file").click(function(){
           $('#posts').css("display","none");
           $('#file').css("display","block");
         
         })
          $("#pro_nav_posts").click(function(){
           $('#file').css("display","none");
           $('#posts').css("display","block");
         })
           
         // 显示与隐藏发表留言框
          // var flag=true;
          //  $("#Ispeak").click(function(){
                
          //       if(flag)
          //       {
          //         $("#my_message_form").css("visibility","visible");
          //         flag=false;
          //       }
          //       else
          //       {
          //         $("#my_message_form").css("visibility","hidden");
          //         flag=true;
          //       }
             
          //  })
          // $('#posts_con li').hover(function(){
          //        $(".reply").css("display","block");
          // },function(){
          //     $(".reply").css("display","none");
          // })
      })
    </script>

    <script type="text/javascript">
      $(function(){
           var len=$('.file_name').length;
           console.log(len);
          for(var i=0;i<len;i++)
          {
              (function(arg){
                  $('.file_name').eq(i).mouseover(function(){
                     $('.file_introduce').eq(arg).css("display","block");
                  })
                   $('.file_name').eq(i).mouseout(function(){
                     $('.file_introduce').eq(arg).css("display","none");
                  })
              })(i)
          }
      })
    </script>
  </body>
</html>