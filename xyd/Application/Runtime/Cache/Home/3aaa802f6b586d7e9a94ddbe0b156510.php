<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>教师详情</title> 
	<!-- <link rel="stylesheet" type="text/css" href="Css/flexible.css"> -->
	<link rel="stylesheet" type="text/css" href="Css/style_two.css">
	<!-- <script type="text/javascript" src="Js/flexible.js"></script> -->
</head>
<style type="text/css">
	.jiaoshi{width: 94%;height: auto;margin: 0 auto;}
	.jiaoshi_img{width: 50%;height: auto;margin:0 auto;}
	.jiaoshi_name{width: 100%;height: auto;text-align: center;padding: 0.2rem 0;font-size: 20px;}
	.text_cn{width: 94%;height: auto;margin: 0 auto;font-size: 16px;}
</style>
<script type="text/javascript"> 
    (function(win, doc){
        var docEl = doc.documentElement,
                resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
                recalc = function(){
                    var clientWidth = docEl.getBoundingClientRect().width;
                    if (!clientWidth) { return; }
                    if (clientWidth >= 640) {
                        docEl.style.fontSize = '64px';
                    } else {
                        docEl.style.fontSize = clientWidth / 6.4 + 'px';
                    }
                };
        if (!docEl.addEventListener) { return; }
        win.addEventListener(resizeEvt, recalc, false);
        doc.addEventListener('DOMContentLoaded', recalc, false);
    })(window, document);
</script>
<body>
<div id="container"> 
	<div class="header">
		<div class="header_div">【教师详情】</div>
		<p class="item">2017-1-2</p>
	</div>
	<div class="main" style="margin-top: 1.5rem;">
		<div class="jiaoshi">
			<div class="jiaoshi_img">
				<img src="http://www.5fwc.com/xibei/Public/Uploads/2017-02-20/58aa45c10b173.jpg">
			</div>
			<div class="jiaoshi_name">姓名：杨燕</div>
			<div class="text_cn">
				手机分辨率是640960，但页面渲染下来的实际像素是320480。但是页面设计稿是基于640*960做的，这样页面的一张切图就会是400实际像素宽，放在页面上大于了手机能否渲染出来的页面。手机分辨率是640960，但页面渲染下来的实际像素是320480。但是页面设计稿是基于640*960做的，这样页面的一张切图就会是400实际像素宽，放在页面上大于了手机能否渲染出来的页面。手机分辨率是640960，但页面渲染下来的实际像素是320480。但是页面设计稿是基于640*960做的，这样页面的一张切图就会是400实际像素宽，放在页面上大于了手机能否渲染出来的页面。手机分辨率是640960，但页面渲染下来的实际像素是320480。但是页面设计稿是基于640*960做的，这样页面的一张切图就会是400实际像素宽，放在页面上大于了手机能否渲染出来的页面。
			</div>
		</div>
	</div>
</div>
</body>
</html>