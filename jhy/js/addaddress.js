require(['jquery','larea','template'],function($,larea,template){
    $(function(){
        var name=decodeURI(GetQueryString('name')),phone=GetQueryString('phone'),addr=decodeURI(GetQueryString('addr')),used=GetQueryString('default');
        if(name && phone && addr && used){
        var area=addr.split('省'),
        prov=area[0],
        area1=area[1].split('市'),
        city=area1[0],
        area2=area1[1].split('区'),
        dist=area2[0],
        street=area2[1];
        var data={
        form:{name:name,phone:phone,addr:prov+'省,'+city+'市,'+dist+'区',street:street,used:used}
        };
    }else{
        var data={
        form:{}
        };
    }
    var html=template('tpl-form',data);
    $('form').html(html);

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

        $('.setdefault').on('click',function(){
        $('#default').prop('checked',!($('#default').prop('checked')));
        if($('#default').prop('checked')){
            $('.toselected').attr('src','../img/个人中心_邮寄信息_设为默认_选中.png')
        }else{
            $('.toselected').attr('src','../img/个人中心_邮寄信息_设为默认_未选.png')
        }
    });
    })
})
