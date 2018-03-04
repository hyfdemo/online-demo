<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>英语</title>
	<!-- <link rel="stylesheet" type="text/css" href="Css/flexible.css"> -->
	<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/style_two.css">
	<!-- <script type="text/javascript" src="Js/flexible.js"></script> -->
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
	.header{height: auto;width: 90%;margin: 0 auto;}
	.header_div{padding-left: 0%;}
	.item{padding-left: 0%;}
	.tou_t{width: 77%;}
	.on_1 {height: 0.65rem;line-height: 0.65rem;font-size: 16px;padding: 0 0.3rem;background-color: #f0f8ed;color: #333}
	.text_color00{font-size: 16px;color: #333}
    .main_div2{font-size: 16px;width: 100%;margin: 0 auto;}
</style>
<body>
<div id="container">
	<div class="header">
		<div class="header_div"><?php echo ($data["header"]); ?></div>
		<p class="item"><?php echo ($data["date"]); ?></p>
		<p class="item clor">宣汉西北小学</p>
	</div>
	<div class="main">
		<div class="main_div2">
            <?php echo ($data["content"]); ?>
		</div>
	</div>
</div>
</body>
</html>