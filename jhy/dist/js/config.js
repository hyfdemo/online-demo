"use strict";function goBack(){history.back()}function goHome(){location.href="index.html"}function GetQueryString(e){var r=new RegExp("(^|&)"+e+"=([^&]*)(&|$)","i"),i=window.location.search.substr(1).match(r);return null!=i?i[2]:null}require.config({baseUrl:"../js",paths:{jquery:"jquery-3.3.1.min",swiper:"swiper-4.1.6.min",larea:"LArea.min",wx:"http://res.wx.qq.com/open/js/jweixin-1.2.0.js",template:"template-web"},shim:{swiper:{deps:["jquery"],exports:"swiper"}}});