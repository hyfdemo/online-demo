"use strict"; require(["swiper", "template",'layer'], function (e, n,layer) {
    new e(".swiper-container", { autoplay: !0, loop: !0, pagination: { el: ".swiper-pagination" } }); var i = n("tpl-lesson", { lesson: [] }); $(".lesson").append(i);
    $.ajax({
        type: 'POST',
        url: '/api/SUser/ClassesForJoined?ApprenticeId=' + ApprenticeId,
        success: function (list) {
            if (list.code == 1) {
                sessionStorage.setItem('ClassName', list.message[0].Name);
                sessionStorage.setItem('ClassApplyStatus', list.message[0].ApplyStatus);
                sessionStorage.setItem('ClassStatus', list.message[0].ClassStatus);
                sessionStorage.setItem('ClassBeginTime', list.message[0].BeginTime);
                sessionStorage.setItem('ClassEndTime', list.message[0].EndTime);
                if (ClassId == null || ClassId==0) {
                    sessionStorage.setItem('ClassId', list.message[0].Id);
                }
            }
        }
    })
    if (ApprenticeId == null) {
        layer.open({
            content: '请重新登录'
            , skin: 'msg'
            , time: 2
            , end: function () {
                location.href = 'login.html';
            }
        });
    }

});