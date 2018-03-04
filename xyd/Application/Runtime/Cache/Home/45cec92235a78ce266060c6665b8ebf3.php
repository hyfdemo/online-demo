<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>新闻详情</title>
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
<body>
<div id="container">
	<div class="header">
		<div class="header_div"><?php echo ($result["header"]); ?></div>
		<div class="item"><?php echo ($result["time"]); ?></div>
	</div>
	<div class="main">
		<!-- <div class="main_div">
			<a href="#">
				<i class="i_bg i_bg1"></i>
				<i class="i_bg i_bg2"></i>
				<div class="clear"></div>
				编辑的内容放在这个div内
			</a>
		</div> -->
		<!-- <div class="main_div_con_5"> -->
					<?php echo ($result["content"]); ?>
					<!-- <img src="Image/2.4.jpg">
					<div class="news_n">学校举行春季运动会学校举行春季运动会学校举行春季运动会学校举行春季运动会学校举行春季运动会学校举行春季运动会学校举行春季运动会</div>
					<img src="Image/12.jpg">
					<div class="news_n">学校举行春季运动会学校举行春季运动会学校举行春季运动会学校举行春季运动会学校举行春季运动会学校举行春季运动会学校举行春季运动会</div>
					<div class="clear"></div> -->
		<!-- </div> -->
	</div>
	<!-- <p class="end">&mdash;&mdash; End &mdash;&mdash; </p> -->
</div>
</body>
<style type="text/css">
	.main{font-size: 16px;width: 90%;margin: 0 auto;}
	.main_div_con_5{width: 94%;height:auto;font-size: 16px;margin: 0 auto;color: #000;padding: 0.3rem 0rem 0.5rem 0rem;}
	.item{padding-left: 0;font-size: 18px;color: #666;padding-top: 0rem;padding-bottom: 0.6rem;}
	.header{width: 90%;height:auto;overflow: hidden;margin: 0 auto}
	.header_div{padding: 0.12rem 0rem 0rem 0rem;}
	img{width: auto;max-width:100%;}
</style>
</html>