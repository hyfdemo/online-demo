<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>领导班子</title> 
	<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/flexible.css">
	<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/style_two.css">
	<script type="text/javascript" src="/xibei/Public/admin/js/flexible.js"></script>
</head>
<style type="text/css">
	a{display: block;}
	img{width: 100%;height: 100%;max-width: 100%;max-height: 100%;}
</style>
<body>
<div id="container">
	<div class="header">
		<div class="header_div">领导班子</div>
		<p class="item"><?php echo ($date); ?></p>
	</div>
	<div class="main">
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/xibei/Index/lingdaoxq?id=<?php echo ($v["id"]); ?>">
			<div class="main_st">
				<div class="st_img">
					<img src="<?php echo ($v["head"]); ?>">
				</div>
				<div class="st_message">
					<p>姓名：<?php echo ($v["name"]); ?></p>
					<p>职位：<?php echo ($v["level"]); ?></p>
					<p class="tetx_no">简介：<?php echo ($v["content"]); ?></p>
				</div>
				<div class="clear"></div>
			</div>
		</a><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
</div>
</body>
</html>