$(function(){

  // 侧边导航栏鼠标点击效果
            var len=$('#nav li').length;
            for(var i=0;i<len;i++)
            {
               $('#nav li').eq(i).click(function(){
                 $(this).addClass('active');
                $(this).siblings().removeClass('active');
               })
            }
           
         
        
             $('#myproject').click(function(){
            
                window.location="./home.html";
              })

             $('#person_info').click(function(){

                 $('article').load('./person_info.html?t='+Math.random());
             })
             $('#notify').click(function(){

                 $('article').load('./notify.html?t='+Math.random());
             })
        
            $('#search').click(function(){

                   $('article').load('./search.html?t='+Math.random());
               })
        
            

          


       
      })