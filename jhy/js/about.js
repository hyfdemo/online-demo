require(['jquery','template'],function($,template){
	var imgbase='../src/img/';
	var data={
		about:
			{avater:imgbase+'头像.jpg',qr:imgbase+'qr.jpg',phone:imgbase+'个人中心_关于_联系热线.png'}
	}
	var html=template('tpl-about',data)
	$('section').html(html)
})