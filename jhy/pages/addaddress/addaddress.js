require(['jquery','larea'],function(){
    $(function(){
        var area = new LArea();
        area.init({
        'trigger': '#pcd',
        'valueTo': '#pcdvalue',
        'keys': {
            id: 'value',
            name: 'text'
        },
        'type': 2,
        'data': [provs_data, citys_data, dists_data]
    });
    })
	$('.setdefault').on('click',function(){
		$('#default').prop('checked',!($('#default').prop('checked')));
		if($('#default').prop('checked')){
			$('.toselected').attr('src','../../src/img/个人中心_邮寄信息_设为默认_选中.png')
		}else{
			$('.toselected').attr('src','../../src/img/个人中心_邮寄信息_设为默认_未选.png')
		}
	});
	
})
