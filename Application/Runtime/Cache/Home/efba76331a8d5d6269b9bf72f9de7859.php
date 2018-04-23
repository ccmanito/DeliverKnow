<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title></title>
      <link rel="stylesheet" type="text/css" href="/zz/Public/Css/style.css" />
      <script type="text/javascript" src="/zz/Public/Js/jquery.min.js"></script>
      <script type="text/javascript">
      $(function(){
         $('.dele_o').click(function(){
            $(this).parents('tr').remove();
         })
         var aChe = document.getElementsByClassName('form1');
         var aChec = aChe.getElemetsByTagName('input');
         alert(aChec.length)
         if($('.tr_ckeck').checked){
            for (var i = 0; i < aChec.length; i++) {
               aChec[i].checked = true;
            }
         }
         function ReSel(){
            for(i=0;i<document.form1.logs.length;i++){  //这一用法只对form表单有效
               document.form1.logs[i].checked = true;  //如果是实现【全不选】的话，改成false即可
           }
         }
      })
      </script>
   </head>
   <body>
      <div id="page">
         <div class="search">
            <input class="search_text" type="text" name="name" placeholder="请输入团队编号">
            <input class="search_btn" type="button" name="name" value="搜索">
            <input class="search_all" type="button" name="name" value="平台共有<?php echo ($count); ?>个团队">
            <a class="delete_sel" >删除选中</a>
         </div>
         <table>
            <thead>
               <tr>
                  <th><input class="tr_check" type="checkbox" name="name" value=""></th>
                  <th>团队编号</th>
                  <th>团队名称</th>
                  <th>创建人</th>
                  <th>创建时间</th>
                  <th>成员数量</th>
                  <th>操作</th>
               </tr>
            </thead>
            <tbody>
           
            <?php if(is_array($info)): foreach($info as $key=>$vo): ?><tr>
                  <td><input class="td_check" type="checkbox" name="name" value=""></td>
                  <td><?php echo ($vo["t_number"]); ?></td>
                  <td><?php echo ($vo["t_name"]); ?></td>
                  <td><?php echo ($vo["u_id"]); ?></td>
                  <td><?php echo (date("Y-m-d",$vo["t_time"])); ?></td>
                  <td><?php echo ($vo["t_num"]); ?></td>
                  <td><a class="dele_o" href="/zz/index.php/Home/Team/sup_del_team/id/<?php echo ($vo["t_id"]); ?>">删除</a></td>
               </tr><?php endforeach; endif; ?>

            </tbody>
         </table>
      </div>
   </body>
</html>