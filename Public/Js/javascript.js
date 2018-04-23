$(function(){

   var Width = document.documentElement.clientWidth ;
   var Height = document.documentElement.clientHeight ;
   var onoff = true;

   $('#header').css('width',Width);
   $('#side').css('width',Width*0.15).css('height',Height*0.93);
   $('#content').css('width',Width*0.83).css('height',Height*0.93);

   $('.Team').click(function(){
      $('#content').load('team.html',null,function(){});
      $('.system_nav').css('display','none');
   });
   $('.System').click(function(){
      $('.system_nav').css('display','block');
   });
   $('.Appeal').click(function(){
      $('#content').load('appeal.html',null,function(){});
      $('.system_nav').css('display','none');
   });
   $('.Not').click(function(){
      $('#content').load('system.html',null,function(){});
   })
   $('.Mes').click(function(){
      $('#content').load('send_message.html',null,function(){});
   })

   


});
