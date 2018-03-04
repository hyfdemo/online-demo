<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学校微信公众号后台管理</title>
	<meta name="keywords" content="关键字">
	<meta name="description" content="描述">
	<link rel="stylesheet" href="/xibei/Public/admin/css/main.css">
	<link rel="stylesheet" href="/xibei/Public/admin/css/font-awesome.min.css">
	<link rel="stylesheet" href="/xibei/Public/admin/plugins/umeditor/themes/default/css/umeditor.min.css">
	<style>
        .edui-body-container {
            width: inherit!important;
            max-height: 550px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
	<div class="iframe-header">
		<ul class="breadcrumb">
			<li><i class="fa fa-home"></i>首页</li>
			<li><i class="fa fa-angle-right"></i>作息时间</li>
		</ul>
	</div>
	<div class="iframe-content">
		<div class="edit-wrapper">
			<script id="myEditor" type="text/plain"></script>
			<div class="edit-btns tr">
				<input type="button" class="btn btn-blue" value="提交">
			</div>
			<div id="con" style="display: none"><?php echo ($content); ?></div>
		</div>
	</div>

	<script src="/xibei/Public/admin/js/jquery.min.js"></script>
	<script src="/xibei/Public/admin/plugins/umeditor/third-party/template.min.js"></script>
	<script src="/xibei/Public/admin/plugins/umeditor/umeditor.config.js"></script>
	<script src="/xibei/Public/admin/plugins/umeditor/umeditor.min.js"></script>
	<script src="/xibei/Public/admin/plugins/umeditor/lang/zh-cn/zh-cn.js"></script>
	<script>
		$(function(){
			var um = UM.getEditor('myEditor', {
                toolbar: ["undo redo | bold italic underline strikethrough | forecolor backcolor | removeformat |", "insertorderedlist insertunorderedlist |  paragraph fontfamily fontsize", "| justifyleft justifycenter justifyright justifyjustify |", "link | emotion image", "source |"]
            });
			um.setWidth(800);
			um.setHeight(300);
			var con = $('#con').html();
			um.setContent((con == '' || con == null) ? '<p style="color: #666;">在这里输入内容</p>' : con);
			$('.btn').click(function () {
				var content = um.getContent();
				if(content == '' || content == '<p style="color: #666;">在这里输入内容</p>'){
					$(window.parent)[0].layer.msg('上传内容不能为空');
					um.focus();
				}else{
					$.post('./timetable',{content:content},function (data) {
						if(data){
							$(window.parent)[0].layer.msg('上传成功');
						}else {
							$(window.parent)[0].layer.msg('上传失败');
						}
					})
				}

			})
		});


	</script>
</body>
</html>