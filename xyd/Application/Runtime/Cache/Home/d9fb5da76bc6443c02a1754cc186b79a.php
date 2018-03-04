<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>学校活动</title>
	<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/flexible.css">
	<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/style_two.css">
	<script type="text/javascript" src="/xibei/Public/admin/js/flexible.js"></script>
</head>
<style type="text/css">
	.main_div{background-color: #fff;}
</style>
<body>
<div id="container">
	<div class="header">
		<div class="header_div">学校活动</div>
		<p class="item"><?php echo ($date); ?></p>
	</div>
	<div class="main">
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="main_div">
			<a href="/xibei/Index/EventDetails?id=<?php echo ($v["id"]); ?>">
				<!-- <i class="i_bg i_bg1"></i> -->
				<!-- <i class="i_bg i_bg2"></i> -->
				<!-- <div class="clear"></div> -->
				<div class="main_div_con">
					<img src="<?php echo ($v["img"]); ?>">
					<div class="news_n tetx_no"><?php echo ($v["header"]); ?></div>
					<span class="dianji">点击查看详情</span>
					<div class="clear"></div>
				</div>
			</a>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
</div>
</body>
</html>