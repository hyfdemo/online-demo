require(['jquery','template'],function($,template){
	var data={
		notices:[
			{time:'2018.02.28 14:00',desi:'系统通知信息系统通知信息系统通知信息系统通知信息系统通知信息系统通知信息系统通知信息系统通知信息系统通知信息系统通知信息'},
			{time:'2018.02.28 14:00',desi:'系统通知信息系统通知信息系统通知信息系统通知信息系统通知信息系统通知信息系统通知信息系统通知信息系统通知信息系统通知信息'}
		]
	}
	var html=template('tpl-notices',data)
	$('section').html(html)

})