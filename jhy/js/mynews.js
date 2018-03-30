require(['jquery','template'],function($,template){
	var data={
		news:[
			{time:'2018.02.28 14:00',desi:'【考试提醒】消息内容消息内容消息内容消息内容消息内容消息内容消息内容消息内容消息内容消息内容消息内容消息内容消息内容消息内容。'},
			{time:'2018.02.28 14:00',desi:'【考试提醒】消息内容消息内容消息内容消息内容消息内容消息内容消息内容消息内容消息内容消息内容消息内容消息内容消息内容消息内容。'}
		]
	}
	var html=template('tpl-news',data)
	$('section').html(html)

})