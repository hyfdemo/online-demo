"use strict";
require(['jquery','template'], function (template) {
    $('button').click(function () {
        var data = $('form').serialize(), ClassId = GetQueryString('Id'), date = new Date(), AssDateTime = date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
        $.ajax({
            type: 'POST',
            url: '/api/SUser/Appraise',
            data: data + '&ClassId=' + ClassId + '&ApprenticeId=' + ApprenticeId + '&AssDateTime=' + AssDateTime,
            success: function (list) {
                if (list.code == 1) {
                    alert(list.message)
                } else if (list.code == -1) {
                    alert(list.message)
                }
            }
        })
    })
})