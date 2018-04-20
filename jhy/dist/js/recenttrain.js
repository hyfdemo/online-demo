"use strict";
require(['jquery', 'template'], function ($, template) {
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
            url: '/api/SUser/ClassesForJoin?OrgCode='+code,
            success: function (list) {
                if (list.code == 1) {
                 data.lessons = list.message;
                var html = template('tpl-recentlesson', data)
                $('section').html(html)
                } else if (list.code == -1) {
                  alert(list.message)
                }
            }
        })
    })
    /*var data = {
        lessons: [
            { Name: '【初级急救员急救知识培训】', Begin: '2018年2月28日 09:00', Address: '成都市成华区建设路173号二楼3号教室', OrgId: 30 },
            { Name: '【初级急救员急救知识培训】', Begin: '2018年2月28日 09:00', Address: '成都市成华区建设路173号二楼3号教室', OrgId: 30 },
        ]
    }
    //var data = {};
    $.ajax({
        type: 'POST',
        url: '/api/SUser/ClassesForJoin?OrgCode=511109',
        success: function (list) {
            //if (list.code == 1) {
               // data.lessons = list.message;
                var html = template('tpl-recentlesson', data)
                $('section').html(html)
            //} else if (list.code == -1) {
              //  alert(list.message)
            //}
        }
    })*/
})
function signup(Id) {
    $.ajax({
        type: 'POST',
        url: '/api/SUser/JoinClassApply?ApprenticeId=' + ApprenticeId+'&ClassId='+Id,
        success: function (list) {
            if (list.code == 1) {
                alert(list.message)
            } else if (list.code == -1) {
              alert(list.message)
            }
        }
    })
}