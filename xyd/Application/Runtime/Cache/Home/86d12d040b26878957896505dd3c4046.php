<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>学校介绍</title>
	<!-- <link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/flexible.css"> -->
	<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/style_two.css">
	<!-- <script type="text/javascript" src="/xibei/Public/admin/js/flexible.js"></script> -->
</head>
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
<style type="text/css">
	/*.main_0{width: 94%;height: auto;margin: 0 auto;font-size: 16px;}*/
    .main_0 img{width: auto;max-width:100%;}
</style>
<body>
<div id="container">
	<div class="header">
		<div class="header_div">学校介绍</div>
		<p class="item"><?php echo ($data["date"]); ?></p>
	</div>
	<div class="main_0"><?php echo ($data["content"]); ?></div>
    
</div>
</body>
</html>