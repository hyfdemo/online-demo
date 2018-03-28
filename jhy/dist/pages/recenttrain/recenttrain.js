require(['jquery','template'],function($,template){
	var data={
		lessons:[
			{title:'【初级急救员急救知识培训】',time:'2018年2月28日 09:00',addr:'成都市成华区建设路173号二楼3号教室',num:30},
			{title:'【行车安全急救培训】',time:'2018年2月28日 09:00',addr:'成都市成华区建设路173号三楼1号教室',num:30}
		]
	}
	var html=template('tpl-recentlesson',data)
	$('section').html(html)
})