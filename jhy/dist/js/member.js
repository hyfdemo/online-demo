"use strict";
require(['jquery','layer'], function ($,layer) {
    $('.phone').text(Phone)
})
function confirmExit() {
    layer.open({
        content: '确认注销？'
        , btn: ['确定', '不了']
        , yes: function (index) {
            sessionStorage.clear();
            location.href = 'login.html';
        }
        , no: function (index) {
            layer.close(index)
        }
    });
}