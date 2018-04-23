<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/home.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
      .pro a{
        display: block;
        width:220px;
        height: 100px;
      }
    </style>
  </head>
  <body>
    <header style="z-index: 2;">
       <a href="/zz/index.php/Home/Index/home"><img src="/zz/Public/Images/logo.png" /><a>
       <span><img src="/zz/Public/Images/zhifu.jpg"></span>
       <span class="glyphicon glyphicon-comment" id="show_chat" title="online Chat"></span>
       <span class="glyphicon glyphicon-envelope"></span>
    

    </header>
    <aside>
      <div id="user_pic">
         <img src="/zz/Public/Images/zhifu.jpg">
         <p><?php echo ($username); ?></p>
      </div>
      <ul id="nav">
        <li class="active" id="myproject"><span class="glyphicon glyphicon-file"></span>我的项目</li>
        <li id="notify"><span class="glyphicon glyphicon-envelope" ></span>我的消息</li>
        <li id="person_info"><span class="glyphicon glyphicon-cog"></span>个人设置</li>
        <li id="search"><span class="glyphicon glyphicon-search"></span>站内搜索</li>
        <li><a href="/zz/index.php/Home/Login/outlogin"><span class="glyphicon glyphicon-off"></span>退出系统</a></li>
      </ul>
    </aside>
    <article id="content">
      <div id="pro_box">
          
      
       <?php if(is_array($team_show)): foreach($team_show as $k=>$vo): ?><div class="pro">        
               <a href="/zz/index.php/Home/Team/pro_show/id/<?php echo ($k); ?>" class="pro_name"><?php echo ($vo["t_name"]); ?></a>
            </div>
            <div class="pro_item"  style="display: none;">
              <p>项目名称:<?php echo ($vo["t_name"]); ?></p>
               <p>项目人数:<?php echo ($vo["t_num"]); ?></p>
               <p>项目介绍:<?php echo ($vo["t_abstract"]); ?></p>
            </div>
            
            <!-- <p>项目时间<?php echo (date('Y-m-d H:i:s',$vo["t_time"])); ?></p> -->
            <!-- <p>项目编号:<?php echo ($vo["t_number"]); ?></p> --><?php endforeach; endif; ?>
  


         <div id="add">
          新建项目+
        </div>
        </div>
  </article>
  

  <!-- 请忽视我，我只是个截止线 -->
    <div id="chat" style="display: none;">
        <h3>在线聊天室<span class="glyphicon glyphicon-remove-circle" id="remove_chat"></span></h3>
        <nav>
      <!-- 这是foreach的地方 -->
          <?php if(is_array($team_show)): foreach($team_show as $key=>$vo): ?><ul>
            <li style="overflow: hidden;"><?php echo ($vo); ?></li>
          </ul><?php endforeach; endif; ?>
      <!-- 这是foreach的截止地点 -->
        </nav>
        <div id="chat_con">
        

         <!-- 这是一个截止线  用于显示消息 --> 
          <ul id="CH">
             <li>
                <span><img src="/zz/Public/Images/zhifu.jpg"></span> 
                <span>张三</span>   
                <span class="time">09:20</span> <br/>
                <span class="chat_con">有人看见我聊天么</span>
             </li>

          </ul>
         <!-- 这是停止线  -->
           

           <form>
            <input id="con" type="text"/>
            <input id="ajax" type="button" value="发送" />
           </form>
         
    </div>     
    </div>
<!--   我是下分割线    -->    


    <script type="text/javascript" src="/zz/Public/Js/jquery.min.js"></script>
    <script type="text/javascript" src="/zz/Public/Js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/zz/Public/Js/common.js"></script> 
  
    <script type="text/javascript">
      
   
    $(function(){
             
            //设置按钮能否点击        
         　$('#ajax').attr("disabled",true);
  
           $('#con').blur(function(){ 
            content=$('#con').val();
           if("" == jQuery.trim(content)){
              　$('#ajax').attr("disabled",true);
           }else{
                $('#ajax').attr("disabled",false);
           }
           }); 
           
           // 点击按钮后将表单信息存入数据库
           $('#ajax').click(function(){
                $.get('/zz/index.php/Home/ChatInfo/setchat',{'content':content},function(jdata){
                     if(jdata){
                      $('#con').val(""); 
                     }
                }); 
          });
          //测试  获取发送的信息
          // var timer=setInterval(function(){
          //     $.ajax({
          //       url:   ,
          //       methord:GET,
          //       async:true,
          //       success:function(data){
          //           var txt=$("<li>");
          //      var span1=$("<span>").appendTo(txt);
          //       var img=$("<img>").attr("").appendTo(span1);
          //     var span2=$("<span>").text("").appendTo(txt);
          //     var span3=$("<span>").text("").addClass("time").appendTo(txt);
          //     var span4=$("<span>").text("").addClass("chat_con").appendTo(txt);
              
          //     $("#CH").append(txt);
          //       },
          //       error:function(){
          //         alert("error");
          //       }
          //     });

              // }
          //},1500);
       });
    </script>
 <!--  <script type="text/javascript">
      // $(function(){

      //      // ajax请求用户所有的项目返回值有id,name
      //      $.ajax({
      //         url:"",
      //         type:"POST",
      //         success:function(data){
      //           var obj=eval("("+data+")");
      //           for(var i=0;i<obj.data.length;i++)
      //           {
      //              $("<div class="pro"></div").insertBefore("#add");
      //           }
      //           for(var i=0;i<obj.data.length;i++)
      //           {
      //               $("div.pro").eq(i).html(obj.data[i].t_name);
      //           }
               

      //         }
      //      })
      // })
    </script> -->



    <script type="text/javascript">
      $(function(){
        // 添加一个新项目
        $('#add').click(function(){
           window.location="/zz/index.php/Home/Team/add_pro";

        })
        // var aPro=$(".pro");
        // for(var i=0;i<aPro.length;i++)
        // {
        //   (function(arg){
        //       $('.pro').eq(i).click(function(){
        //          $('article').load('/zz/index.php/Home/Team/add_pro?t='+Math.random());
        //      })
        //   })(i);
         
        //}

      })
    </script> 

    <script type="text/javascript">
      $(function(){
         $("#show_chat").click(function(){
             $("#chat").show();
        })
        $("#remove_chat").click(function(){
             $("#chat").hide();
        })

        $("#search").hover(function(){

        })
      })
    </script>

    <script type="text/javascript">
             $('#myproject').click(function(){
            
                window.location="./home.html";
              })

             $('#person_info').click(function(){

                 $('article').load('/zz/index.php/Home/Index/person_info');
             })
             $('#notify').click(function(){

                 $('article').load('/zz/index.php/Home/Index/notify');
             })
        
            $('#search').click(function(){

                   $('article').load('/zz/index.php/Home/Index/search');
            })
    </script>

    <script type="text/javascript">
      $(function(){
          var len=$('.pro_name').length;

          console.log(len);
          for(var i=0;i<len;i++)
          {
            (function(arg){

                 // $('.pro_name').eq(i).mouseover(function(){
                    // name= $(this).html();
                    //  $(this).css("line-height","25px");
                    //   $(this).css("font-size","12px");
                    //  $(this).css("tex-align","left");
                    //   $(this).css("overflow","hidden");
                    //  $(this).html($('.pro_item').eq(arg).html());
                     
                 // })
                 // $('.pro_name').eq(i).mouseout(function(){
                      // $(this).html(name);
                      // $(this).css("line-height","100px");
                      //   $(this).css("font-size","18px");
                      //    $(this).css("tex-align","center");
                 // })
                 $('.pro_name').eq(i).hover(function(){
                  name= $(this).html();
                     $(this).css({"line-height":"25px","font-size":"12px","tex-align":"left","overflow":"hidden"});
                     $(this).html($('.pro_item').eq(arg).html());
                   },function(){
                    $(this).html(name);
                      $(this).css({"line-height":"100px","font-size":"18px","tex-align":"center"});
                        // $(this).css("font-size","18px");
                        //  $(this).css("tex-align","center");
                       });
            })(i)
          }
      })
    </script>

  </body>
</html>