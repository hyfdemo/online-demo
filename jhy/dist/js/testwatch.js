"use strict";
require(['jquery', 'template','layer'], function ($, template,layer) {
    layer.open({
        type: 2,
        content: '加载中',
        shadeClose: false
    })
    $.ajax({
        url: '/api/SUser/AppEval?ApprenticeId=' + ApprenticeId,
        type: 'POST',
        success: function (data) {
            layer.closeAll()

            if (data.code == 1) {
                if (data.message.length ==1) {
                    loadTest(data.message[0],1)
                }
                if (data.message.length == 2) {
                    loadTest(data.message[0], 1)
                    loadTest(data.message[1], 2)
                }
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
})
function loadTest(data, num) {
    require(['template'], function (template) {
    var html = 'html' + num, error = 'error' + num, total ='total'+num;
    html = template('tpl-test', data);
    $('#test'+num).html(html)
    /*error = 0, total = 0;
    data.List.forEach(function (item) {
        item.List.forEach(function (v) {
            total++;
            v.Correct == 0 ? error++ : error;
        })
    })*/
        $('#test' + num + ' .error').text(data.Error);
        $('#test' + num + ' .total').text(data.Error+data.Correct)
    })
}