require(['jquery'],function(){
	let time=setTimeout( () => { 
		$('.authing img').removeClass('loading').attr('src','../img/实名认证_已认证.png');
		$('.authing p').text('已认证');
		$('.hide').show();
		},3000)
})