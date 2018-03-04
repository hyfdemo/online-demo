<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>作息时间</title>
	<!--<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/flexible.css">-->
	<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/style_two.css">
	<!--<script type="text/javascript" src="/xibei/Public/admin/js/flexible.js"></script>-->
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
<body>
<style>
    #container table{margin:0 auto;font-size: 16px;}
    .header_div{height: 1rem;}
    .header{height: 1rem;}
    .fuck{width: 90%;height: auto;margin: 0 auto;}
</style>
<div id="container">
    <div class="header">
        <div class="header_div">作息时间</div>
        <!-- <div class="item"><?php echo ($result["time"]); ?></div> -->
    </div>
    <div class="fuck">
       <?php echo ($content); ?> 
    </div>
	
</div>
</body>
</html>