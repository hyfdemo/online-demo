<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>活动详情</title>
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
<style>
    .main_div_con{font-size: 16px;padding: 0.1rem 0rem 0.2rem 0rem;}
    .i_bg{margin: 0.17rem 0.37rem;}
    .header_div{font-size: 22px;padding: 0.13rem 0.13rem 0.13rem 0.28rem;}
    .main_div{background-color: #fff;}
    img{width: auto;max-width:100%;}
    .item{padding-left: 0.28rem;}
</style>
<body>
<div id="container">
	<div class="header">
		<div class="header_div"><?php echo ($data["header"]); ?></div>
		<p class="item"><?php echo ($data["date"]); ?></p>
	</div>
	<div class="main">
		<div class="main_div">
				<!-- <i class="i_bg i_bg1"></i> -->
				<!-- <i class="i_bg i_bg2"></i> -->
				<!-- <div class="clear"></div> -->
				<!-- 编辑的内容放在这个div内 -->
				<div class="main_div_con">
					<?php echo ($data["content"]); ?>
				</div>
		</div>
	</div>
</div>
</body>
</html>