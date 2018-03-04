<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui">
    <meta name="screen-orientation" content="portrait"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <meta name="full-screen" content="yes">
    <meta name="x5-fullscreen" content="true">
    <title>返校心愿单</title>
    <style>
        body,section{
            margin: 0;
            padding: 0;
        }
        html,body,section{
            width: 100%;
            height: 100%;
            color:#666;
        }
        section img{
            width: 100%;
        }
        input,textarea,#preimg{
            border: 0;
            outline: 0;
            position: absolute;
        }
        #name{
            top: 302px;
            left: 120px;
        }
        #phone{
            top: 350px;
            left: 120px;
        }
        #addr{
            top: 400px;
            left: 104px;
            background: transparent;
            padding-left: 16px;
        }
        #wish{
            top: 446px;
            left: 56px;
            display: inline-block;
            width: 110px;
            height: 110px;
            border-radius: 6px;
            resize: none;
            background: transparent;
        }
        #image{
            top: 443px;
            left: 204px;
            display: inline-block;
            width: 120px;
            height: 120px;
            z-index: 999;
        }
        #image{
            opacity: 0;
        }
        #upload{
            top: 581px;
            left: 135px;
            display: inline-block;
            width: 100px;
            height: 30px;
            opacity: 0;
        }
        #preimg{
            top: 448px;
            left: 207px;
            width: 110px;
            height: 110px;
            border-radius: 8px;
            display: none;
        }
        #son {width:0; height:10px; background-color:#84caec; text-align:center; line-height:10px; font-size:14px;color: #000;
    position: absolute;
    top: 470px;
    left: 202px;}
    </style>
    <script src="http://www.51bszx.com/cx/Public/src/js/jquery-3.3.1.min.js"></script>
</head>
<body>
        <section>
            <img src="http://www.51bszx.com/cx/Public/src/img/info.jpg" alt="">
            <input id="name" type="text">
            <input id="phone" type="tel" >
            <input id="addr" type="text">
            <textarea name="" id="wish"></textarea>
            <input id="image" type="file" accept="image/png,image/jpeg,image/gif,image/jpg">
                <input id="upload" type="button">
            <img id="preimg" src="" alt="">
            <div id="son"></div>
        </section>
        <script>
            function recalc(){
                var owidth='375',
                    oheight='667',
                    swidth=$(window).width(),
                    sheight=$(window).height();
                $('#name').css({
                    'top':parseInt(swidth*302/owidth),
                    'left':parseInt(swidth*120/owidth)
                })
                $('#phone').css({
                    'top':parseInt(swidth*350/owidth),
                    'left':parseInt(swidth*120/owidth)
                })
                $('#addr').css({
                    'top':parseInt(swidth*400/owidth),
                    'left':parseInt(swidth*104/owidth)
                })
                $('#wish').css({
                    'top':parseInt(swidth*446/owidth),
                    'left':parseInt(swidth*56/owidth)
                })
                $('#image').css({
                    'top':parseInt(swidth*443/owidth),
                    'left':parseInt(swidth*204/owidth)
                })
                $('#upload').css({
                    'top':parseInt(swidth*581/owidth),
                    'left':parseInt(swidth*135/owidth)
                })
                $('#preimg').css({
                    'top':parseInt(swidth*448/owidth),
                    'left':parseInt(swidth*207/owidth)
                })
            }
            function onprogress(evt){
  var loaded = evt.loaded;     //已经上传大小情况 
  var tot = evt.total;      //附件总大小 
  var per = Math.floor(100*loaded/tot);  //已经上传的百分比 
  $("#son").html( per +"%" );
  $("#son").css("width" , per*1.2 +"px");
  if(per==100)$("#son").css("opacity" , '0');
 }
            (function() {

                recalc();
                $(window).resize(function () {
                    recalc();
                })
                $('#addr').focus(function () {
                    $(this).css('background','#fff')
                })
                $('#wish').focus(function () {
                    $(this).css('background','#fff')
                })
                $('#image').change(function (data) {
                	$("#son").html();
  $("#son").css({"width":'0','opacity':'1'});
                    var imgdata=new FormData();
                    imgdata.append("file", $(this)[0].files[0]);
                    if(imgdata) {
                        $.ajax({
                            url: 'http://www.51bszx.com/cx/index/img',
                            type: 'POST',
                            data: imgdata,
                            processData: false,
                            contentType: false,
                            xhr: function(){
    var xhr = $.ajaxSettings.xhr();
    if(onprogress && xhr.upload) {
     xhr.upload.addEventListener("progress" , onprogress, false);
     return xhr;
    }
   },
                            success: function (data) {
                                if(data!=1){
                                    $('#preimg').attr('src',data).show();
                                }
                            }
                        })
                    }
                })
                $('#upload').click(function () {
                	var phonereg=/(^1[3|4|5|6|7|8|9]\d{9}$)|(^09\d{8}$)/;
                    var name=$.trim($('#name').val()),
                        coll=$.trim($('#phone').val()),
                    address=$.trim($('#addr').val()),
                    content=$.trim($('#wish').val()),
                    img=$('#preimg').attr('src')
                    if(name!='' && coll!='' && content!='' && phonereg.test(coll)){
                    $.ajax({
                        url:'http://www.51bszx.com/cx/index/name',
                        type:'POST',
                        data:{name:name,coll:coll,address:address,content:content,img:img},
                        success:function (data) {
                            if(data==1){
                                location.href='http://www.51bszx.com/cx/index/wait'
                            }else if(data==0){
                            	alert('您已提交过')
                            }
                        }
                    })
                }else{
                	alert('请正确填写')
                }
                })
            })()
        </script>
</body>
</html>