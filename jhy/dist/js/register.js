require(['jquery','layer'], function ($,layer) {
    
    var valiCode = true;
    $('#getValiCode').on('click',function () {
        var PhoneNumber = $.trim($('[name=PhoneNumber]').val())
        var $this = $(this);
        var time = 60;
        if (PhoneNumber && phoneReg.test(PhoneNumber) && valiCode) {
            valiCode = false;
            $this.text(time + '秒');
            var timeCount=setInterval(() => {
                time--;
                $this.text(time + '秒');
                if (time == 0) {
                    $this.text('重新获取')
                    clearInterval(timeCount)
                    valiCode = true;
                }
            }, 1000)
            $.ajax({
                url: '/api/SMS/SendValiCode?PhoneNumber='+ PhoneNumber,
                type: 'POST',
                success: function (data) {
                    if (data == 'sucess') {
                        //alert('短信发送成功')
                    } else {
                        layer.open({
                            content: data
                            , skin: 'msg'
                            , time: 2
                        });
                    }
                },
                error: function (error) {
                    layer.open({
                        content: error
                        , skin: 'msg'
                        , time: 2
                    });
                }
            })
        } else {
            layer.open({
                content: '请输入正确的手机号码'
                , skin: 'msg'
                , time: 1
            });
        }
    })
    $('[name="Password"]').focus(function () {
        $('.tip').removeClass('hide')
    }).blur(function () {
        $('.tip').addClass('hide')
    })
    $('#register').click(function (e) {
        e.preventDefault();
        var valiCode = $.trim($('[name=ValiCode]').val())
        var PhoneNumber = $.trim($('[name=PhoneNumber]').val())
        var pwd = $.trim($('[name=Password]').val())

        if (PwdSecurity() && confirmPwd()  && valiCode && PhoneNumber && pwd) {
            $.ajax({
                url: '/api/SUser/Register?PhoneNumber=' + PhoneNumber + '&ValiCode=' + valiCode + '&Password=' + pwd,
                type: 'POST',
                success: function (data) {
                    if (data == 'success') {
                        layer.open({
                            content: '注册成功'
                            , skin: 'msg'
                            , time: 1
                            , end: function () {
                                location.href = 'login.html'
                            }
                        });
                    } else {
                        layer.open({
                            content: data
                            , skin: 'msg'
                            , time: 1
                        });
                    }
                },
                error: function (error) {
                    layer.open({
                        content: error
                        , skin: 'msg'
                        , time: 2
                    });
                }
            })
        }
    })
    function PwdSecurity() {
        var pwd = $.trim($('[name=Password]').val())
        if (pwdReg.test(pwd)) {
            return true;
        } else {
            layer.open({
                content: '密码格式不正确'
                , skin: 'msg'
                , time: 1
            });
            return false;
        }
    }
    function confirmPwd() {
        var pwd = $.trim($('[name=Password]').val())
        var confirmPwd = $.trim($('[name=ConfirmPwd]').val())
        if (pwd === confirmPwd) {
            return true
        
        } else {
            layer.open({
                content: '两次密码不一致'
                , skin: 'msg'
                , time: 1
            });
            return false;
        }
    }
 })
