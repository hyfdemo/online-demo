"use strict";
require(['jquery','template'],function ($,template) {
    $.ajax({
        type: 'POST',
        url: '/api/SUser/Cert?ApprenticeId=' + ApprenticeId,
        success: function (list) {
            if (list.code == 1) {
                list.message.IssueDate = dateReg(list.message.IssueDate);
                var chtml = template('tpl-cert', list.message);
                $('section').append(chtml)
                if (list.message.MailInfo != null) {
                    var mhtml = template('tpl-mail', list.message.MailInfo);
                    $('section').append(mhtml)
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