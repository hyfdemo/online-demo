require(['jquery','template'],function($,template){
	var data={
		addr:[
			{name:'张三',phone:'18012341234',default:1,addr:'四川省成都市锦江区传媒大厦二栋1单元14号'},
			{name:'李四',phone:'18012345678',default:0,addr:'四川省成都市锦江区红星路二段173号'}
		]
	}
	var html=template('tpl-addr',data)
	$('.container').html(html)
	$('.edit').click(function(){
		var index=$(this).parents('.address').index();
		var datas=data.addr[index];
		var urldata='';
		for(var i in datas){
			urldata+=`${i}=${datas[i]}&`
		}
		location.href="addaddress.html?"+urldata;
	})
})