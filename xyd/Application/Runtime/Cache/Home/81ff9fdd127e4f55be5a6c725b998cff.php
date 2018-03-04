<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>优秀学生</title>
	<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/flexible.css">
	<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/style_two.css">
	<script type="text/javascript" src="/xibei/Public/admin/js/flexible.js"></script>
</head>
<style type="text/css">
	a{display: block;}
</style>
<body>
<div id="container">
	<div class="header">
		<div class="header_div">优秀学生</div>
		<p class="item"><?php echo ($date); ?></p>
	</div>
	<div class="main">
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="/xibei/Index/xueshengxq?id=<?php echo ($v["id"]); ?>">
				<div class="main_num main_num_left">
					<div class="im_imgdiv">
						<img src="<?php echo ($v["head"]); ?>" style="height:5.5rem;">
					</div>
					<div class="message">
						<p>姓名：<?php echo ($v["name"]); ?></p>
						<p>荣誉：<?php echo ($v["level"]); ?></p>
					</div>
				</div>
            </a><?php endforeach; endif; else: echo "" ;endif; ?>
    	<div class="clear"></div>
	</div>
</div>
</body>
</html>