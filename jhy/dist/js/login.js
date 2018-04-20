"use strict";
require(['jquery','layer'], function ($,layer) {

    $('#login').click(function (e) {
        e.preventDefault()
        var phone = $.trim($('[name=PhoneNumber]').val())
        var password = $.trim($('[name=Password]').val())
        if (phone && phoneReg.test(phone) && password) {
            layer.open({
                type: 2,
                content: '登录中',
                shadeClose:false
            })
            $.ajax({
                url: '/api/SUser/Login?PhoneNumber=' + phone + '&Password=' + password,
                type: 'POST',
                success: function (data) {
                    layer.closeAll()

                    if (data.code == -1) {
                        layer.open({
                            content: data.message
                            , skin: 'msg'
                            , time: 2
                        });
                    } else if (data.code == 0) {
                        layer.open({
                            content: '请提交个人信息'
                            , skin: 'msg'
                            , time: 1
                            , end: function () {
                                location.href = 'name_auth.html?Phone=' + phone;
                            }
                        });
                    } else if (data.code == 1) {
                        sessionStorage.setItem('ApprenticeId', data.message.Id)
                        sessionStorage.setItem('AchieveType', data.message.AchieveType)
                        sessionStorage.setItem('Phone', data.message.Phone)
                        sessionStorage.setItem('Name', data.message.Name)
                        sessionStorage.setItem('Gender', data.message.Gender)
                        sessionStorage.setItem('IDNumber', data.message.IDNumber)
                        sessionStorage.setItem('Age', data.message.Age)
                        sessionStorage.setItem('BirthDate', data.message.BirthDate)
                        sessionStorage.setItem('CertCode', data.message.CertCode)
                        sessionStorage.setItem('CertOrgId', data.message.CertOrgId)
                        sessionStorage.setItem('CertOrgName', data.message.CertOrgName)
                        sessionStorage.setItem('CertStatus', data.message.CertStatus)
                        sessionStorage.setItem('CommunicationAddress', data.message.CommunicationAddress)
                        sessionStorage.setItem('CompanyName', data.message.CompanyName)
                        sessionStorage.setItem('Education', data.message.Education)
                        sessionStorage.setItem('Evaluation', data.message.Evaluation)
                        sessionStorage.setItem('IssueDate', data.message.IssueDate)
                        sessionStorage.setItem('Nation', data.message.Nation)
                        sessionStorage.setItem('Occupation', data.message.Occupation)
                        sessionStorage.setItem('OrgName', data.message.OrgName)
                        sessionStorage.setItem('Photo', data.message.Photo)
                        sessionStorage.setItem('Remark', data.message.Remark)
                        sessionStorage.setItem('Status', data.message.Status)
                        sessionStorage.setItem('TrainingBeginDate', data.message.TrainingBeginDate)
                        sessionStorage.setItem('TrainingEndDate', data.message.TrainingEndDate)
                        sessionStorage.setItem('Volunteer', data.message.Volunteer)
                        sessionStorage.setItem('Mail_Address', data.message.Mail_Address)
                        sessionStorage.setItem('Mail_Addressee', data.message.Mail_Addressee)
                        sessionStorage.setItem('Mail_Phone', data.message.Mail_Phone)
                        sessionStorage.setItem('IDCardFront', data.message.IDCardFront)
                        sessionStorage.setItem('IDCardBack', data.message.IDCardBack)
                        // 添加班级信息
                        sessionStorage.setItem('ClassId', data.message.ClassId)
                        location.href = 'index.html'
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
        }
    })
})