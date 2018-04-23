<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-cache,must-revalidate" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!-- <link rel="stylesheet" type="text/css" href="/zz/Public/Css/bootstrap.min.css" /> -->
    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/home.css" />
    <link rel="stylesheet" type="text/css" href="/zz/Public/Css/person_info.css" />
    <script type="text/javascript" src="/zz/Public/Js/jquery.min.js"></script>
    <script type="text/javascript" src="/zz/Public/Js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/zz/Public/Js/echarts.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   <style type="text/css">
   .exit{
    width:100px;
  height: 30px;
  line-height: 30px;
  text-align: center;
  border: 1px solid #ccc;
  cursor: pointer;
   }
   .exit:hover{
    background: #ccc;
   }

   #person_info  .info_con{
  width:400px;
  height: 300px;
}
   #edit{
    display: block;
    width: 400px;
    height: 400px;
    /*border: 1px solid #ccc;*/
    float: left;
   }
   </style>
  </head>
  <body>
  <div id="person_info">
     <h2>设置中心</h2>
    <!--  <ul id="person_info_nav">
       <li>个人信息</li>
       <li>账户安全</li>
       <li>项目管理</li>
     </ul> -->
     <div style="clear: left;"></div>
     <div id="user_info">
       <h4>个人信息</h4>
       <div class="info_pho">
         <img src="/zz/Public/Images/zhifu.jpg">
       </div>
       <div class="info_con">
       
        <?php if(is_array($info)): foreach($info as $key=>$vo): ?><ul>
              <li><span>账    号</span><span><?php echo (session('username')); ?></span></li>
              <li><span>用户姓名</span><span><?php echo ($vo["u_name"]); ?></span></li>
              <li><span>单位学校</span><span><?php echo ($vo["u_school"]); ?></span></li>
              <li><span>部门班级</span><span><?php echo ($vo["u_class"]); ?></span></li>
              <li><span>个人介绍</span><span><?php echo ($vo["u_label"]); ?></span></li>
          </ul><?php endforeach; endif; ?> 
       
       </div>
       <div id="edit">
         <!-- <span >编辑</span> -->
       </div>
     </div>
     <div style="clear: left;"></div>
     <div id="user_account">
       <h4>账户安全</h4>
       <p>
           <span class="glyphicon glyphicon-lock"></span>
           账号密码
            <span type="button" id="modify" data-toggle="modal" data-target="#myModal">
           修改
            </span>

       </p>
     </div>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">密码修改</h4>
                  </div> 
                
                 <form action="/zz/index.php/Home/User/savepw" method="POST">
                    <div class="modal-body">
                        初始密码:<input name=oldpw type="password" /><br/><br/>
                        修改密码:<input name=newpw type="password" /><br/><br/>
                        再次输入:<input name=nextpw type="password" />
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">save change</button>
                    </div>
                  </form>
                
                </div>
              </div>
            </div>
     <div id="pro_manage">
        <h4>项目管理</h4>
        <ul>

<!-- kaishi -->
        <?php if(is_array($team_create)): foreach($team_create as $k=>$vo): ?><li>
            <span class="pro_name"><a style="color:green" href="/zz/index.php/Home/Team/pro_show/id/<?php echo ($k); ?>"><?php echo ($vo); ?></a></span>
            <span class="item_id" style="display: none;"><?php echo ($k); ?></span>
            <span class="add_people" data-toggle="modal" data-target="#myModa2">增加成员</span>
             
             <!-- 以下是增添成员的页面信息 -->
              <div class="modal fade" id="myModa2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times; </span>
                    <span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">增加成员</h4>
                  </div> 

                 <form action="/zz/index.php/Home/Team/add_people/id/<?php echo ($k); ?>" method="POST" id="add_form">
                    <div class="modal-body">
                       用户账号:<input name="u_email" type="text" /><br/><br/>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" class="add_save">save change</button>
                    </div>
                  </form> 
                
                </div>
              </div>
            </div>

           
            <!--  我是一个截止线,请不要忽略我 -->

            <span js-delete="delete'+ +'" class="del_people" data-toggle="modal" data-target="#myModa3">删除成员</span>

            <!-- 以下是删除成员的页面信息 -->



  <div class="modal fade" id="myModa3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">删除成员</h4>
      </div> 
     <form  method="GET"  id="del_form">
        <div class="modal-body" id="user_list">
        <!--此处请求项目所有成员-->
         
         <!--  <input type="checkbox" name="user_name"><label class="user_name">user_2</label><br/>
          <input type="checkbox" name="user_name"><label class="user_name">user_3</label><br/> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">save change</button>
        </div>
      </form>
    </div>
  </div>
</div>

            <span  class="pro_del" data-toggle="modal" data-target="#myModa4">删除</span>
             <!--  我是一个截止线,请不要忽略我 -->
         <div class="modal fade" id="myModa4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
          <div class="modal-content">
           <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>   
           <h4 class="modal-title" id="myModalLabel">删除团队</h4>
              
           <form  id="del_pro_form" action="/zz/index.php/Home/Team/del_team/id/<?php echo ($k); ?>">
                    
                    <div class="modal-body">
                       用户密码:<input  type="password" name="password" id="del_pro_pass" /><br/><br/>
                    </div>
                    
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                      <button type="submit" class="btn btn-primary"  id="del_pro">确定</button>
                    </div>
           </form> 

              </div>
              </div>
              </div>
      </li><?php endforeach; endif; ?>


        <!-- jieshu -->

        <!--以下是加入团的的问题-->
        <?php if(is_array($team_add)): foreach($team_add as $key=>$v): ?><li>
            <span class="pro_name"><a style="color:green"  href="/zz/index.php/Home/Team/pro_show/id/<?php echo ($key); ?>"><?php echo ($v); ?></a></span>
            <span style="display: none;" class="item_add_id"><?php echo ($key); ?></span>
            <span class="exit" >退出</span>
          </li><?php endforeach; endif; ?>

        </ul>
     </div>
    





      <script type="text/javascript">
          $(".pro_people").click(function(){
            $("#manage_people").show();
          })
      </script>



  </body>


   <script type="text/javascript">
               var aId=document.getElementsByClassName("item_id");
               var aAdd_people=document.getElementsByClassName("add_people");
               var aDel_people=document.getElementsByClassName("del_people");
               var aDel_pro=document.getElementsByClassName("pro_del");
               var aAdd_form=document.getElementById("add_form");
               var aDel_form=document.getElementById("del_form");
               var aDel_pro_form=document.getElementById("del_pro_form");

               var oDel_pro_btn=document.getElementById("del_pro");

          // <!--增加成员 -->
               for(var i=0;i<aId.length;i++)
               {
                  (function(arg){
                     aAdd_people[i].onclick=function()
                     {
                      aAdd_form.action="/zz/index.php/Home/Team/add_people/id/"+aId[arg].innerHTML;
                     }
                  })(i)
               }

           // 删除成员
               for(var i=0;i<aId.length;i++)
               {
                  (function(arg){
                     aDel_people[i].onclick=function()
                     {
                       $.ajax({
                          url:"/zz/index.php/Home/Team/people/id/"+aId[arg].innerHTML,
                          success:function(data){  
                              var obj=eval("("+data+")");
                              $("#user_list").empty();
                              for(var i=0;i<obj.name.length;i++)
                              {
                                  $("#user_list").append('<input type="checkbox" name="user_name[]" value=""    class="user_name_input"><label class="user_name"></label><br/>')
                              }

                               for(var i=0;i<obj.name.length;i++)
                               {
                                  $(".user_name").eq(i).html(obj.name[i]);
                                  $(".user_name_input").eq(i).val(obj.id[i]);
                               }
                               $(".user_name_input").eq(0).after("&nbsp;&nbsp;&nbsp;")
                              $(".user_name_input").eq(0).remove();
                              aDel_form.action="/zz/index.php/Home/Team/del_people/id/"+aId[arg].innerHTML;
                             
                            },
                            error:function()
                            {
                              console.log("error");
                            }
                       })
                     }
                  })(i)
               }

            // 删除项目
               for(var i=0;i<aId.length;i++)
               {
                  (function(arg){

                    aDel_pro[i].onclick=function()
                    {
                    aDel_pro_form.action="/zz/index.php/Home/Team/del_team/id/"+aId[arg].innerHTML;
                    }
                        
                   })(i);
               }

               

  </script>

  <!-- 退出团队 -->
  <script type="text/javascript">
     
          var aItem_add_id=document.getElementsByClassName("item_add_id");
          var aExit_team=document.getElementsByClassName("exit");
          console.log(aItem_add_id.length);
          console.log(aExit_team.length);
          for(var i=0;i<aItem_add_id.length;i++)
           {
              (function(arg){
                 aExit_team[i].onclick=function(){
                     $.ajax({
                      url:"/zz/index.php/Home/Team/my_del/id/"+aItem_add_id[arg].innerHTML,
                      success:function(data){
                         window.location="/zz/index.php/Home/Index/home";
                      }
                     })
                 }
              })(i)
           }
    
  </script>

<!-- 经验分布图 -->
   <script type="text/javascript">
        var myChart = echarts.init(document.getElementById('edit'));
        var option = {
    title: {
        text: '个人经验分布图',
    },
    tooltip: {
      show:true,
      trigger: 'axis'
    },
    legend: {
        data: ['能力分布（Ability Distribution）']
    },
    radar: {
        // shape: 'circle',
        indicator: [
           { name: '专业能力', max: 100},
           { name: '学习能力', max: 100},
           { name: '沟通与合作', max: 100},
           { name: '责任心', max: 100},
           { name: '抗压能力', max: 100},
           { name: '集体荣誉感', max: 100}
        ],
        
    },
    series: [{
        name: '能力（Ability）',
        type: 'radar',
        radius : '75%',
        center:['10%',0],
        // areaStyle: {normal: {}},
        data : [
            {
                    value : [56,69,89,78,45,69],     
                //name : '能力分布（Ability Distribution）'
                          }           
        ]
    }]
};
        myChart.setOption(option);
       
 
 </script>
</html>