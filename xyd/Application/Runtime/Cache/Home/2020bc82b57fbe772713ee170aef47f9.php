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
			<li><i class="fa fa-angle-right"></i>学校介绍</li>
		</ul>
	</div>
	<div class="iframe-content">
		<div class="edit-wrapper">
			<script type="text/plain" id="myEditor"></script>
			<div class="edit-btns tr">
				<input type="button" class="btn btn-blue js_confirm" value="提交">
			</div>
            <div id="con" style="display: none"><?php echo ($abtou); ?></div>
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
            var content = $('#con').html();
            um.setWidth(800);
            um.setHeight(250);
            um.setContent((content == '' || content == null) ? '<p style="color: #999;">输入学校介绍内容</p>' : content);


            $('.js_confirm').click(function(){
                var text = um.getContent();
                if (text == '' || text == '<p style="color: #666;">学校荣誉</p>') {
                    $(window.parent)[0].layer.msg('请先输入一段内容');
                    um.focus();
                    return false;
                }
                $.ajax({
                    type: 'POST',
                    url: "<?php echo U('Admin/introl_add');?>",
                    data: {content: text},
                    success: function (data) {
                        if(data ==1) {
                            $(window.parent)[0].layer.msg('提交成功！');
                        }
                    }
                });
            });
        });
	</script>
</body>
</html>