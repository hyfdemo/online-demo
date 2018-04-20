"use strict";
require(['jquery','template','layer'], function ($,template,layer) {
    var tests,gurl;
    layer.open({
        type: 2,
        content: '加载中',
        shadeClose: false
    })
    if (sessionStorage.getItem('Markup')) {
        gurl = '/api/exam/getmarkup?classId=' + ClassId + '&uid=' + ApprenticeId
    } else {
        gurl = '/api/Exam/get?classId=' + ClassId + '&uid=' + ApprenticeId
    }
    $.ajax({
        url: gurl,
    type: 'GET',
        success: function (data) {
            layer.closeAll()

        if (data.code == 0) {
            //type=0 选择题 type=1 判断题
           /* var data={
                datas:[
                {
                    Content:'请问二千万特务',
                    Options:[
                    {Value:'A',Text:'哈哈'},
                    {Value:'B',Text:'嘻嘻'},
                    {Value:'C',Text:'呵呵'},
                    {Value:'D',Text:'么么'}
                ],
                Type:0
                    },
                    {
                    Content:'请问二千万特务',
                    Options:[
                    {Value:'A',Text:'正确'},
                    {Value:'B',Text:'错误'},
                ],
                Type:1
                    },
                    {
                    Content:'阿斯蒂芬IoT',
                    Options:[
                    {Value:'A',Text:'哈哈'},
                    {Value:'B',Text:'嘻嘻'},
                    {Value:'C',Text:'呵呵'},
                    {Value:'D',Text:'么么'}
                ],
                Type:0
                    }
                ]
            }*/
            var html = template('tpl-test', data)
            var chtml = template('tpl-count', data)

            $('section').append(html)
            $('.countContent').html(chtml)
    $('.countTest small').html(data.datas.length)
    $('.countHeader small').html(data.datas.length)
            tests = data.datas.length;
            selectedTest();

            var times = 30, time = times * 60, countM = parseInt(time / 60), countS = time % 60 >= 10 ? time % 60 : '0' + time % 60;
            $('.timeCount').text(countM + ':' + countS);
            var IntervalTime = setInterval(() => {
                time--;
                if (time >= 0) {
                    var countM = parseInt(time / 60), countS = time % 60 >= 10 ? time % 60 : '0' + time % 60;
                    $('.timeCount').text(countM + ':' + countS)
                } else {
                    clearInterval(IntervalTime)
                    return false;
                }
            }, 1000)
            var Timeout = setTimeout(() => {
                $('.submit').trigger('click')
                $('.submitModal').addClass('hide')
                clearTimeout(Timeout)
            }, time * 1000)
        } else {
            layer.open({
                content: data.msg
                , skin: 'msg'
                , time: 2
                , end: function () {
                   location.href = 'test.html'
                }
            });
        }
        },
        error: function (error) {
            layer.closeAll()

            layer.open({
                content: error
                , skin: 'msg'
                , time: 2
                , end: function () {
                    location.href = 'test.html'
                }
            });
        }
    })
    $('section').on('click','.testContainer li',function(){
        $(this).addClass('active').siblings().removeClass('active')
        selectedTest()
    })
    $('.countTest').click(function () {
        var id=$('.show.testContainer').data('id')
        $('.countContent li[data-id=' + id + ']').addClass('active').siblings('.active').removeClass('active')
        $('.countTestContainer').toggleClass('fade hide')
    })
    $('.countContent').on('click','li',function () {
        var id = $(this).data('id')
        $('.countContent li[data-id=' + id + ']').addClass('active').siblings('.active').removeClass('active')
        $('.testContainer[data-id=' + id + ']').addClass('show').removeClass('hide').siblings('.show').removeClass('show').addClass('hide')
        $('.countTestContainer').toggleClass('fade hide')
    })
    $('.close').click(function () {
        $('.countTest').trigger('click')
    })
    $('.prev').click(function () {
        toggleTest('prev')
        var id = $('.show.testContainer').data('id')
        $('.countContent li[data-id=' + id + ']').addClass('active').siblings('.active').removeClass('active')
    })
    $('.next').click(function () {
        toggleTest('next')
        var id = $('.show.testContainer').data('id')
        $('.countContent li[data-id=' + id + ']').addClass('active').siblings('.active').removeClass('active')
    })
    function toggleTest(opt) {
        var id = $('.testContainer.show').data('id')
        opt=='next' ? id++ : id--;
        if (opt == 'next' ? id < tests : id>=0){
        $('.testContainer[data-id='+id+']').addClass('show').removeClass('hide').siblings('.show').removeClass('show').addClass('hide')
}else{
    return false;
}
    }
    function selectedTest() {
        var count = 0;
        $('.testContainer').each(function (i, v) {
            if ($('.testContainer').eq(i).find('li').hasClass('active')) {
                $('.countContent li[data-id=' + i + ']').addClass('tcolor')
                count++;
            }
        })
        $('.countTest strong').text(count)
        $('.countHeader strong').text(count)
        $('.tipContent span.todo').text(tests-count)
    }
    $('.submitTest').click(function () {
        if ($('.countTest strong').text() == tests) {
            //$('.submit').trigger('click')
            $('.tipContent span.todo').text('0')
            $('.submitModal .tipContent .closeModal').text('检查一下')
            $('.submitModal').toggleClass('fade hide')
        } else {
            $('.submitModal').toggleClass('fade hide')
        }
    })
    $('.submit').click(function () {
        $('.submitModal').toggleClass('fade hide')
        var result = [],purl;
        $('.testContainer').each(function (i, v) {
            var QuesId = $('.testContainer').eq(i).children('ul').data('id'), Answer;
            if ($('.testContainer').eq(i).find('li').hasClass('active')) {
                Answer = $('.testContainer').eq(i).find('li.active').children('.testValue').text()
            } else {
                Answer=''
            }
            result.push({
                QuesId: QuesId, Answer: Answer
            })
        })
        if (sessionStorage.getItem('Markup')) {
            gurl = '/api/exam/savemarkup'
        } else {
            gurl = '/api/exam/save'
        }
        $.ajax({
            type: 'POST',
            url: purl,
            data: JSON.stringify({ classId: ClassId, ApprenticeId: ApprenticeId, results: JSON.stringify(result) }),
            contentType:'application/json',
            success: function (data) {
                if (data.code == 0) {
                    $('.testResultModal .score').text(data.datas[0].Score)
                    $('.testResultModal .corrent').text(data.datas[0].Correct)
                    $('.testResultModal .error').text(data.datas[0].Error)
                } else {
                    layer.open({
                        content: data.msg
                        , skin: 'msg'
                        , time: 2
                    });
                }
            }
        })
        $('.testResultModal').toggleClass('fade hide')
    })
    $('.closeModal').click(function () {
        $('.submitModal').toggleClass('fade hide')
    })
    $('.closeResultModal').click(function () {
        $('.testResultModal').toggleClass('fade hide')
    })
    $('#back').click(function () {
        $('.exitModal').toggleClass('fade hide')
    })
    $('.closeExitModal').click(function () {
        $('#back').trigger('click')
    })
})
function totest() {
    let num = GetQueryString('num')
    num--;
    if (num >= 0) {
        localStorage.setItem('num', num)
        location.href = 'test.html?num=' + num;
    } else {
        return false;
    }
}
