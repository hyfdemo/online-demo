"use strict";
require(['jquery','template','layer'], function ($,template,layer) {
    $.ajax({
        type: 'POST',
        url: '/api/SUser/SignRecord?ApprenticeId=' + ApprenticeId,
        success: function (data) {
            if (data.code == 1) {
                var html = template('tpl-sign', data)
                $('body').append(html)
            } else {
                layer.open({
                    content: data.message
                    , skin: 'msg'
                    , time: 2
                });
            }
        }
    })
})
function timeReg(date) {
    return date.split('T')[0] +' '+ date.split('T')[1]
}