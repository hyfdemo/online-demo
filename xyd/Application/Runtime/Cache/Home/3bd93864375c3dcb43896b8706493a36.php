<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>学校课程</title>
	<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/flexible.css">
	<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/style_two.css">
	<script type="text/javascript" src="/xibei/Public/admin/js/flexible.js"></script>
</head>
<style type="text/css">
	.header_2{height:1.3rem;border-bottom: 1px solid #ccc;}
	.main{width: 90%;}
	.main_con{width: 100%}
</style>
<body>
<div id="container">
	<div class="header_2">
		<div class="header_news">课程介绍</div>
	</div>
	<div class="main">
        <?php if(is_array($aer)): $i = 0; $__LIST__ = $aer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/xibei/Index/kechengxq?id=<?php echo ($v["id"]); ?>">
		<div class="main_con">
			<div class="jiesao_img">
				<img src="<?php echo ($v["img"]); ?>">
			</div>
			<div class="jiesao_fontdiv">
				<h1><?php echo ($v["header"]); ?></h1>
				<div class="jiesao_fontcon text_pad tetx_no"><?php echo ($v["content"]); ?></div>
				<!-- <div class="jiesao_fonttitle text_pad tetx_no">教务处</div> -->
			</div>
			<div class="clear"></div>
		</div>
                </a><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
</div>
</body>
</html>