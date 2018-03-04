<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>成绩查询</title>
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
	.header{height: auto;}
	.item{padding-left: 2%;}
	/*查询结果*/
.header2{text-align: center;position: relative;top: 0;color: #000;font-size: 0.3rem;padding: 0.28rem 0;border-bottom: 1px solid #ccc;}
.fanhui{padding: 0.25rem;background: url(../Public/admin/images/left_03.png)no-repeat;background-size:48%; position: absolute;left: 0.25rem;}
.qi{width: 100%;height: auto;text-align: center;font-size: 0.3rem;padding: 0.2rem 0;}
.biaotou{width: 99.5%;height: auto;background-color: #f2f3f3;border-left: 2px solid #2781ba;}
.biaotou_1{width: 50%;padding: 0.05rem 0;color: #2781ba;text-align: center;float: left;font-size: 0.25rem;}
.biaocon{width: 100%;height: auto;padding: 0.2rem 0;border-bottom: 1px solid #ccc;}
.biaocon1{width: 50%;text-align: center;height: auto;color: #575757;font-size: 0.25rem;float: left;}
.biaocon2{width: 50%;text-align: center;height: auto;color: #ff1a1a;font-size: 0.25rem;float: left;}
</style>
<body>
<div id="container">
	<div class="header header2">
		<a class="fanhui" href="ResultInquiry.html"></a>
		成绩查询
	</div>
	<div class="main">
		<div class="main_div2">
			<p class="qi">2017年下学期</p>
			<div class="biaotou">
				<div class="biaotou_1">课程名称</div>
				<div class="biaotou_1">分数</div>
				<div class="clear"></div>
			</div>
            <div class="clear"></div>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="biaocon">
				<div class="biaocon1"><?php echo ($v["subject"]); ?></div>
				<div class="biaocon2"><?php echo ($v["results"]); ?></div>
				<div class="clear"></div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>
</div>
</body>
</html>