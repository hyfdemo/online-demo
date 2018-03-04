<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>学生详情</title> 
	<!-- <link rel="stylesheet" type="text/css" href="Css/flexible.css"> -->
	<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/style_two.css">
	<!-- <script type="text/javascript" src="Js/flexible.js"></script> -->
</head>
<style type="text/css">
	.jiaoshi{width: 100%;height: auto;margin: 0 auto;}
	.jiaoshi_img{width: 50%;height: auto;margin:0 auto;}
	.jiaoshi_name{width: 100%;height: auto;text-align: center;padding: 0.2rem 0;font-size: 20px;}
	.text_cn{width: 94%;height: auto;margin: 0 auto;font-size: 16px;}
	img{width: auto;max-width:100%;}
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
		<div class="header_div">学生详情</div>
		<p class="item"><?php echo ($data["date"]); ?></p>
	</div>
	<div class="main">
		<div class="jiaoshi">
			<div class="jiaoshi_img">
				<img src="<?php echo ($data["head"]); ?>">
			</div>
			<div class="jiaoshi_name tetx_no">姓名：<?php echo ($data["name"]); ?></div>
			<div class="text_cn">
				<?php echo ($data["content"]); ?>
			</div>
		</div>
	</div>
</div>
</body>
</html>