<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学校微信公众号后台管理</title>
	<meta name="keywords" content="关键字">
	<meta name="description" content="描述">
	<link rel="stylesheet" href="/xibei/Public/admin/css/main.css">
	<link rel="stylesheet" href="/xibei/Public/admin/css/font-awesome.min.css">
	<link rel="stylesheet" href="/xibei/Public/admin/plugins/layer/laydate/skins/default/laydate.css">
</head>
<body>
	<div class="iframe-header">
		<ul class="breadcrumb">
			<li><i class="fa fa-home"></i>首页</li>
			<li><i class="fa fa-angle-right"></i>新闻分类</li>
		</ul>
	</div>
	<div class="iframe-content p20">
		<div class="newsCate">
			<div class="l">
				请将
				<select class="cate-select">
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				修改为
				<input type="text" class="cate">
			</div>
			<div class="r">
				<button type="button" class="btn btn-blue js_modify">修改</button>
			</div>
		</div>
	</div>

	<script src="/xibei/Public/admin/js/jquery.min.js"></script>
	<script src="/xibei/Public/admin/plugins/layer/laydate/laydate.js"></script>
	<script>
		(function(){

			$(function(){
				$('.js_modify').click(function(){
					var type = $('.cate-select :selected').val(),
						v = $.trim($('.cate').val());
					if (v == '') {
						$(window.parent)[0].layer.msg('输入框不能为空！');
						$('.cate').focus();
						return false;
					}
					$.ajax({
						type: 'POST',
						url: "<?php echo U('Admin/cation_ext');?>",
						data: {id: type, name: v},
						success: function(data){
							if (data == 1) {
								$(window.parent)[0].layer.msg('修改成功！');
								$('.cate').val('');
								$('.cate-select option').each(function(){
									if ($(this).val() == type) {
										$(this).text(v);
									}
								});
							} else {
								$(window.parent)[0].layer.msg('操作失败！');
							}
						},
						error: function(){
							$(window.parent)[0].layer.msg('操作失败！');
						}
					});
				});
			});



		})();
	</script>
</body>
</html>