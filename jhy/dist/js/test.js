"use strict";
require(['jquery', 'template', 'layer'], function ($, template, layer) {
    layer.open({
        type: 2,
        content: '加载中',
        shadeClose: false
    })
    $.ajax({
        url: '/api/SUser/AppEval?ApprenticeId=' + ApprenticeId,
        type:'POST',
        success: function (data) {
            layer.closeAll()
            if (data.code == 1) {
                //if (data.message.length > 0) {
                    var sort = [], count = 0;
                    data.message.forEach(function (item, index) {
                        sort.push(item.TotalScore)
                        item.SubmitTime != null ? count++ : count;
                    })
                    var scores = {
                        score: Math.max.apply(null, sort)
                    };
                    var html = template('tpl-testResult', scores);
                    $('section').prepend(html)
                $('.overplus').text(2 - count)
                sessionStorage.setItem('Count',count)
                if ((sessionStorage.getItem('ClassStatus') != '考试中' || sessionStorage.getItem('ClassApplyStatus') != '申请已通过' )) {
                        $('.bottombutton.totestdetail').addClass('disabled').attr('disabled', true)
                }
                if (count == 2) {
                    $('.bottombutton.totestdetail').addClass('hide')
                    $('.bottombutton.tomakeup').removeClass('hide')
                }
             /*   } else {
                    var scores = {
                        score: ''
                    };
                    var html = template('tpl-testResult', scores);
                    $('section').prepend(html)
                    $('.overplus').text(2)
                }*/
            } else {
                layer.open({
                    content: data.message
                    , skin: 'msg'
                    , time: 2
                });
            }
        },
        error: function (error) {
            layer.closeAll()
            layer.open({
                content: error
                , skin: 'msg'
                , time: 2
            });
        }
    })
    $('.classname').html(sessionStorage.getItem('ClassName'))
    $('.classstatus').html(sessionStorage.getItem('ClassStatus'))
})
function makeup() {
    sessionStorage.setItem('Markup',true)
    location.href='testdetail.html'
}
function enterTest() {
    let num = (localStorage.getItem('num'));
    location.href = 'testdetail.html?num='+num;
}