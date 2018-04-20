"use strict"; require(["jquery","jqueryForm",'layer'], function () {
    
    $(".uploadfront").click(function () { $("#frontphoto").trigger("click") }), $(".uploadback").click(function () { $("#backphoto").trigger("click") });
    $(".uploadPhoto").click(function () { $("#Photo").trigger("click") });
    
    $('.checkboxwrapper').click(function () {
        $(this).children('.checkboxicon').toggleClass('active');
        if ($('.checkboxicon').hasClass('active')) {
            $('#Volunteer').prop('checked', true)
        } else {
            $('#Volunteer').prop('checked', false)
        }
    })
    $('.genderContainer').on('click', '.gradiowrapper', function () {
        $(this).children('.gradioicon').addClass('active').parents('.gradiowrapper').siblings().children('.active').removeClass('active')
        if ($('.tomale').hasClass('active')) {
            $('#male').prop('checked', true)
        } else {
            $('#female').prop('checked', true)
        }
    })
    $('.AchieveTypeContainer').on('click', '.radiowrapper', function () {
        $(this).children('.radioicon').addClass('active').parents('.radiowrapper').siblings().children('.active').removeClass('active')
        if ($('.tomail').hasClass('active')) {
            $('#mail').prop('checked', true)
            $('.mailContainer').removeClass('hide')
        } else {
            $('#self').prop('checked', true)
            $('.mailContainer').addClass('hide')
        }
    })
    $('#BirthDate').focus(function () {
        var birthDate = $('#IdNumber').val().substr(6, 8)
        $(this).val(birthDate.substr(0, 4) + '-' + birthDate.substr(4, 2) + '-' + birthDate.substr(6, 2))
    })
    $('#PhoneNumber').val(GetQueryString('Phone'))
    if (ApprenticeId) {
        $('#back').click(goBack)
        switch (Status) {
            case '0':
                $('.status span').text('未审核')
                break;
            case '-1':
                $('.status img').attr('src', '../img/实名认证_已认证.png')
                $('.status span').text('已审核')
                break;
            case '1':
                $('.status span').text('培训中')
                break;
            case '2':
                $('.status span').text('考试合格')
                break;
            case '3':
                $('.status span').text('证书已生成')
                break;
            case '4':
                $('.status span').text('证书已打印')
                break;
            case '5':
                $('.status span').text('证书已发布')
                break;
            case '-11':
                $('.status span').text('注销')
                break;
            case '-12':
                $('.status span').text('锁定')
                break;
            case '-13':
                $('.status span').text('逾期')
                break;
            default:
                $('.status span').text('未审核')
                break;
        }
        $('[name=Phone]').val(Phone)
        $('[name=Name]').val(Name)
        if (Gender == '男') {
            $('#male').prop('checked', true)
            $('.tomale').addClass('active')
            $('.tofemale').removeClass('active')
        } else if (Gender == '女') {
            $('#female').prop('checked', true)
            $('.tofemale').addClass('active')
            $('.tomale').removeClass('active')
        }
        $('[name=IDNumber]').val(IDNumber)
        $('[name=BirthDate]').val(dateReg(BirthDate))
        $('[name=CommunicationAddress]').val(CommunicationAddress)
        $('[name=Company]').val(CompanyName)
        $('[name=Education]').val(Education)
        $('[name=Evaluation]').val(Evaluation)
        $('[name=Nation]').val(Nation)
        $('[name=Occupation]').val(Occupation)
        if (Photo != 'undefined' || Photo != 'null') {
            $('[name=Photo]').siblings('img').attr('src', 'data:image/png;base64,' + Photo);
        }
        if (IDCardFront != 'undefined') {
            $('[name=IDCardFront]').siblings('img').attr('src', 'data:image/png;base64,' + IDCardFront);
        }
        if (IDCardBack != 'undefined') {
            $('[name=IDCardBack]').siblings('img').attr('src', 'data:image/png;base64,' + IDCardBack);
        }
        if (Volunteer == 'true') {
            $('[name=Volunteer]').prop('checked', true)
            $('.checkboxicon').addClass('active')
        } else {
            $('[name=Volunteer]').prop('checked', false)
            $('.checkboxicon').removeClass('active')
        }
        if (AchieveType == 1) {
            $('#mail').prop('checked', true)
            $('.tomail').addClass('active')
            $('.toself').removeClass('active')

            if (Mail_Address && Mail_Addressee && Mail_Phone) {
                $('[name=Mail_Address]').val(Mail_Address)
                $('[name=Mail_Addressee]').val(Mail_Addressee)
                $('[name=Mail_Phone]').val(Mail_Phone)
            } else {
                $('#Mail_Address').focus(function () {
                    $(this).val($('[name=CommunicationAddress]').val())
                })
                $('#Mail_Addressee').focus(function () {
                    $(this).val($('[name=Name]').val())
                })
                $('#Mail_Phone').focus(function () {
                    $(this).val($('[name=Phone]').val())
                })
            }
        } else {
            $('#self').prop('checked', true)
            $('.toself').addClass('active')
            $('.tomail').removeClass('active')

                $('.mailContainer').addClass('hide')
        }
        $('#dbform').attr('action', '/api/SUser/UpdateApprentice').append(`<input type="hidden" name="ApprenticeId" value="${ApprenticeId}"/>`)
    } else {
            $('#Mail_Address').focus(function () {
                $(this).val($('[name=CommunicationAddress]').val())
            })
            $('#Mail_Addressee').focus(function () {
                $(this).val($('[name=Name]').val())
            })
            $('#Mail_Phone').focus(function () {
                $(this).val($('[name=Phone]').val())
            })
        $('#back').click(goHome)
    }
})
function submitInfo() {
    if (IDReg.test($('#IdNumber').val()) && phoneReg.test($('#PhoneNumber').val())) {
        $("#dbform").ajaxSubmit(function (data) {
            if (data.code == 1) {
                if (ApprenticeId) {
                    sessionStorage.setItem('AchieveType', data.message.AchieveType)
                    sessionStorage.setItem('Phone', data.message.PhoneNumber)
                    sessionStorage.setItem('Name', data.message.Name)
                    sessionStorage.setItem('Gender', data.message.Gender)
                    sessionStorage.setItem('IDNumber', data.message.IDNumber)
                    sessionStorage.setItem('BirthDate', data.message.BirthDate)
                    sessionStorage.setItem('CommunicationAddress', data.message.HomeAddress)
                    sessionStorage.setItem('CompanyName', data.message.Employer)
                    sessionStorage.setItem('Education', data.message.Education)
                    sessionStorage.setItem('Nation', data.message.Nation)
                    sessionStorage.setItem('Occupation', data.message.Occupation)
                    sessionStorage.setItem('Photo', data.message.Photo)
                    sessionStorage.setItem('Volunteer', data.message.Volunteer)
                    sessionStorage.setItem('Mail_Address', data.message.Mail_Address)
                    sessionStorage.setItem('Mail_Addressee', data.message.Mail_Addressee)
                    sessionStorage.setItem('Mail_Phone', data.message.Mail_Phone)
                    sessionStorage.setItem('IDCardFront', data.message.IDCardFront)
                    sessionStorage.setItem('IDCardBack', data.message.IDCardBack)
                    layer.open({
                        content: '更新成功，现在去报名？'
                        , btn: ['好的', '再等等']
                        , yes: function (index) {
                            $.ajax({
                                type: 'POST',
                                url: '/api/SUser/JoinClassApply?ApprenticeId=' + ApprenticeId + '&ClassId=' + ClassId,
                                success: function (list) {
                                    if (list.code == 1) {
                                        layer.open({
                                            content: list.message
                                            , skin: 'msg'
                                            , time: 2
                                            , end: function () {
                                                location.href = 'train.html';
                                            }
                                        });
                                    } else if (list.code == -1) {
                                        layer.open({
                                            content: list.message
                                            , skin: 'msg'
                                            , time: 2
                                            , end: function () {
                                                location.href = 'train.html';
                                            }
                                        });
                                    }
                                }
                            })
                        }
                        , no: function (index) {
                            location.href = 'member.html';
                        }
                    });
                } else {
                    sessionStorage.setItem('ApprenticeId', data.message)
                    sessionStorage.setItem('AchieveType', $('[name=AchieveType]').val()=='邮寄' ? 1 : 2)
                    sessionStorage.setItem('Phone', $('[name=Phone]').val())
                    sessionStorage.setItem('Name', $('[name=Name]').val())
                    sessionStorage.setItem('Gender', $('[name=Gender]').val())
                    sessionStorage.setItem('IDNumber', $('[name=IDNumber]').val())
                    sessionStorage.setItem('BirthDate', $('[name=BirthDate]').val())
                    sessionStorage.setItem('CommunicationAddress', $('[name=CommunicationAddress]').val())
                    sessionStorage.setItem('CompanyName', $('[name=Company]').val())
                    sessionStorage.setItem('Education', $('[name=Education]').val())
                    sessionStorage.setItem('Nation', $('[name=Nation]').val())
                    sessionStorage.setItem('Occupation', $('[name=Occupation]').val())
                    sessionStorage.setItem('Photo', $('#Photo').siblings('img').attr('src').split(',')[1])
                    sessionStorage.setItem('Volunteer', $('[name=Volunteer]').val()==1 ? true : false)
                    sessionStorage.setItem('Mail_Address', $('[name=Mail_Address]').val())
                    sessionStorage.setItem('Mail_Addressee', $('[name=Mail_Addressee]').val())
                    sessionStorage.setItem('Mail_Phone', $('[name=Mail_Phone]').val())
                    sessionStorage.setItem('IDCardFront', $('#frontphoto').siblings('img').attr('src').split(',')[1])
                    sessionStorage.setItem('IDCardBack', $('#backphoto').siblings('img').attr('src').split(',')[1])
                    layer.open({
                        content: '提交成功'
                        , skin: 'msg'
                        , time: 1
                        , end: function () {
                            location.href = 'index.html'
                        }
                    });
                }
            } else {
                layer.open({
                    content: data.message
                    , skin: 'msg'
                    , time: 2
                });
            }
        })
        /*
        var data = $('form').serialize()
        $.ajax({
            url: '/api/SUser/RegisApprentice',
            type: 'POST',
            data: data,
            contentType: 'application/x-www-form-urlencoded',
            success: function (data) {
                if (data.code == -1) {
                    alert(data.message)
                } else if (data.code == 1) {
                    sessionStorage.setItem('ApprenticeId', data.message)
                    location.href = 'index.html'
                }
            }
        })
    } else {
        alert('请正确填写资料')
    }*/
    }
}
function valiPicSize(file,id) {
    var fileSize = 0;
    var fileMaxSize = 1024;//1M  
    var filePath = file.value;
    if (filePath) {
        fileSize = file.files[0].size;
        var size = fileSize / 1024;
        if (size > fileMaxSize) {
            alert("文件大小不能大于1M！");
            file.value = "";
            return false;
        } else if (size <= 0) {
            alert("文件大小不能为0M！");
            file.value = "";
            return false;
        }
        var img = new FileReader();
        img.readAsDataURL(file.files[0])
        img.onload = function (e) {
            $('#' + id).siblings('img').attr('src', this.result)
        }
    } else {
        return false;
    }
} 