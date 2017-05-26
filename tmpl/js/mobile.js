/**
 * Created by bjwsl-001 on 2016/11/2.
 */
$(document).ready(function () {
    //$(window).scroll(function () {
    //    if ($(window).scrollTop() == 100) {
    //        alert('ok!!');
    //    }
    //});
    $('#header').load('data/header.php',function(){
        navText('移动终端');
    });
    $('#footer').load('data/footer.php',function(){
        inputText();
    });
    //添加动画
    $(document).scroll(function(){
        $(".container").each(function(i,val){
            //console.log(this);
            var contHeight = $(this).offset().top;
			//console.log(contHeight);
            var docHeight = $("body").scrollTop();
           //console.log(docHeight);
            var eheight=parseInt($(this).height()/2);
            var getheught = contHeight-docHeight+eheight;           
            var ceshi = (innerHeight-200)/2;
            if((getheught>ceshi)&&(getheught<(ceshi+200))){    
                $(this).children('.animated').eq(0).addClass('bounceInLeft');
                $(this).children('.animated').eq(1).addClass('bounceInRight');
            }else{    
                $(this).children('.animated').eq(0).removeClass('bounceInLeft');
                $(this).children('.animated').eq(1).removeClass('bounceInRight');
        }
        });
    });
});
