"use strict";
require(['template','layer'], function (template,layer) {

    var cityData = {
        citys: { 'cd': '成都市' },
        dists: {
            'cd':
                {
                    '510100': '成都市',
                    '510101': '高新区',
                    '510102': '天府新区',
                    '510103': '锦江区',
                    '510104': '青羊区',
                    '510105': '金牛区',
                    '510106': '武侯区',
                    '510107': '成华区',
                    '510108': '龙泉驿区',
                    '510109': '青白江区',
                    '510110': '新都区',
                    '510111': '温江区',
                    '510112': '双流区',
                    '510113': '都江堰市',
                    '510114': '彭州市',
                    '510115': '邛崃市',
                    '510116': '崇州市',
                    '510117': '郫都区',
                    '510118': '金堂县',
                    '510119': '新津县',
                    '510120': '大邑县',
                    '510121': '浦江县',
                    '510199': '红县'
                }
        }
    }
    var chtml = template('tpl-citys', cityData)
    $('.citys').append(chtml)
    $('.citys').change(function () {
        var city = $(this).val(), dist = {};
        for (var key in cityData.dists) {
            key == city ? dist.dist = cityData.dists[key] : dist = {}
        }
        var dhtml = template('tpl-dists', dist)
        $('.dists').append(dhtml)
    })
    $('.dists').change(function () {
        var code = $(this).val(), data = {}
        $.ajax({
            type: 'POST',
            url: '/api/SUser/ClassesForJoin?OrgCode=' + code,
            success: function (list) {
                if (list.code == 1) {
                    data.lessons = list.message;
                    var html = template('tpl-recentlesson', data)
                    $('section').html(html)
                } else if (list.code == -1) {
                    layer.open({
                        content: list.message
                        , skin: 'msg'
                        , time: 2
                    });
                }
            }
        })
    })
    /*var data = {
        starttrain: [
            { time: '2018.02.28 14:00', title: '培训名称', teacher: '张某某', desi: '培训简介培训简介培训简介培训简…', addr: '成都市成华区建设南路137号' },
            { time: '2018.03.18 09:00', title: '培训名称', teacher: '张某某', desi: '培训简介培训简介培训简介培训简…', addr: '成都市锦江区红星路137号' }
        ],
        endtrain: [
            { time: '2018.02.28 14:00', check: '合格', title: '培训名称', teacher: '张某某', desi: '培训简介培训简介培训简介培训简…', addr: '成都市成华区建设南路137号' },
            { time: '2018.03.18 09:00', check: '不合格', title: '培训名称', teacher: '张某某', desi: '培训简介培训简介培训简介培训简…', addr: '成都市锦江区红星路137号' }
        ]
    }*/
    /*var data = {};
    var starttrain = []
    var endtrain = [];*/
    loadtrain()
   

})
function loadtrain() {
    require(['template'], function (template) {
    $.ajax({
        type: 'POST',
        url: '/api/SUser/ClassesForJoined?ApprenticeId=' + ApprenticeId,
        success: function (list) {
            if (list.code == 1) {
                /* list.message.forEach(function (v) {
                     v.ClassStatus == '开班中' ? starttrain.push(v) : endtrain.push(v)
                 })
                 data.endtrain = endtrain*/
                var ehtml = template('tpl-mytrain', list)
                $('#mytrain').html(ehtml)
                $(".train").addClass('active').siblings('.active').removeClass('active');
                mySwiper.slideTo($(".train").index(), 300, false);
                if (ClassId == null || ClassId==0) {
                    sessionStorage.setItem('ClassId', list.message[0].Id);
                }
                if (sessionStorage.getItem('Count')==2) {
                    $('.totest').text('补考')
                }
            } else if (list.code == -1) {
                layer.open({
                    content: list.message
                    , skin: 'msg'
                    , time: 2
                });
            }
        }
        })
    })
}
function signup(Id) {
    $.ajax({
        type: 'POST',
        url: '/api/SUser/JoinClassApply?ApprenticeId=' + ApprenticeId + '&ClassId=' + Id,
        success: function (list) {
            if (list.code == 1) {
                loadtrain()
                layer.open({
                    content: list.message
                    , skin: 'msg'
                    , time: 2
                });
            } else if (list.code == -1) {
                layer.open({
                    content: list.message
                    , skin: 'msg'
                    , time: 2
                });
            }
        }
    })
}