"use strict";
require(['jquery'], function () {
    $('.classname').html(dateReg(sessionStorage.getItem('ClassName')))
    $('.classtime').html(dateReg(sessionStorage.getItem('ClassBeginTime')) + ' 至 ' + dateReg(sessionStorage.getItem('ClassEndTime')))
})