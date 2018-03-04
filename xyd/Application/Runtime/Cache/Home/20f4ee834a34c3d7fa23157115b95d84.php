<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>教师风采</title> 
	<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/flexible.css">
	<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/style_two.css">
	<script type="text/javascript" src="/xibei/Public/admin/js/flexible.js"></script>
</head>
<style type="text/css">
	p {display: block;-webkit-margin-before: 0em;-webkit-margin-after: 0em;-webkit-margin-start: 0px;-webkit-margin-end: 0px;text-indent: 0pt;}
	a{display: block;}
	.baoguo{width: 100%;height: 1rem;overflow: hidden;}
	.im_span{width: 25%;height: 1rem;float: left;line-height: 1rem;color: #000;}
	.wenzi{width: 75%;height: 1rem;float: left;overflow: hidden;line-height: 1rem;}
	.wenzi p{width: 100%;height:1rem;display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
</style>
<body>
<div id="container">
	<div class="header">
		<div class="header_div">教师风采</div>
		<p class="item"><?php echo ($date); ?></p>
	</div>
	<div class="main">
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/xibei/Index/jiaoshixq?id=<?php echo ($v["id"]); ?>">
			<div class="main_st">
				<div class="st_img">
					<img src="<?php echo ($v["head"]); ?>">
				</div>
				<div class="st_message">
					<p>姓名：<?php echo ($v["name"]); ?></p>
					<p>岗位：<?php echo ($v["level"]); ?></p>
					<div class="baoguo">
						<span class="im_span">简介：</span>
						<div class="wenzi tetx_no"><?php echo ($v["content"]); ?></div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</a><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
</div>
</body>
</html>