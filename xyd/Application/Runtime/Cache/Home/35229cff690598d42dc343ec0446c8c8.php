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
            color: #666;
        }
        section img{
            width: 100%;
        }
       a{
        position: absolute;
        top: 506px;
        left: 130px;
        width: 116px;
        height: 40px;
       }
    </style>

</head>
<body>
<section>
    <img src="http://www.51bszx.com/cx/Public/src/img/first.jpg" alt="">
    <a href="http://www.51bszx.com/cx/index/index_s"></a>
</section>
<script src="http://www.51bszx.com/cx/Public/src/js/jquery-3.3.1.min.js"></script>

<script>
function recalc(){
                var owidth='375',
                    oheight='667',
                    swidth=$(window).width(),
                    sheight=$(window).height();
                
                $('a').css({
                    'top':parseInt(swidth*506/owidth),
                    'left':parseInt(swidth*130/owidth),
                    'width':parseInt(swidth*116/owidth),
                    'height':parseInt(swidth*40/owidth)
                })
                
            }
    (function() {
       recalc();
                $(window).resize(function () {
                    recalc();
                })
                
    })()
</script>
</body>
</html>