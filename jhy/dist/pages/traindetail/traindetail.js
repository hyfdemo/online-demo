require(['jquery','template'],function($,template){
	var data={
		train:{time:'2月28日14:00-17:00',title:'培训名称',teacher:'张某某',num:30,desi:'培训课程主要内容简述培训课程主要内容简述培训课程主要内容简述培训课程主要内容简述培训课程主要内容简述培训课程主要内容简述培训课程主要内容简述培训课程主要内容简述培训课程主要内容简述培训课程主要内容简述培训课程主要内容简述',addr:'成都市锦江区红星路二段'}
	}
	var html=template('tpl-train',data)
	$('section').html(html)
})