/**
 * Created by Administrator on 2016/10/23.
 */
function navText(text){
    $('.nav li').each(function(){
        var thisText = $(this).children('a').text();
        if(thisText==text){
            $('.nav li a').removeClass('navs');
            $(this).children('a').addClass('navs');
        }
    })
}
   
function inputText(){
	
    $('.there .btn-xx').on('click',function(e){
		
        var uname =$('.input-txt1').val();
        var uphone = $('.input-txt2').val();
        var ucont = $('.input-txt3').val();
        e.preventDefault();
        var req={
            "uname":uname,
            "uphone":uphone,
            "ucont":ucont
        };
        $(".alert").toggle(300);
        $.ajax({
            type:'POST',
            url:'data/index-tj.php',
            data:req,
            dataType:"json",
            success:function(data){
                var html=`
                       <span class="delete1">×</span>
                       <hr style="margin: 15px 0;color: #2EAFBB"/>
                       <div>姓名：${uname}</div>
                       <div>电话：${uphone}</div>
                       <div>信息：${ucont}</div>
                   `;
				
                $('.alert').html(html);
   
				$(".input-txt1").val("");
				
                $(".delete1").on("click", function(){
                    $(".alert").toggle(300);
					//$(".input-txt1").val("");
					
                });
            }
        });

    });
}
$(window).scroll(function(){
$(this).scrollTop()>200?$('#totop').show():$('#totop').hide();    
})
