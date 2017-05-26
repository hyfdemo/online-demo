/**
 * Created by Administrator on 2016/10/13.
 */
$(function(){
	$('#header').load('data/header.php',function(){
		navText('服务范围');
    });
	$('#footer').load('data/footer.php',function(){
        inputText();
    });
})
 $('.animated').on('mouseout',function(){
     $(this).addClass('bounce').siblings('.animated').removeClass('bounce');
 })
