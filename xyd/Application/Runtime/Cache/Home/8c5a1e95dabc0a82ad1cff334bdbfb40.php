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
		.edui-container, .edui-toolbar {
			box-shadow: none!important;
		}
		.edui-container {
			border: none!important;
		}
		.edui-body-container {
			width: inherit!important;
			padding: 10px 90px!important;
			overflow: hidden!important;
			margin-bottom: 10px!important;
		}
		.material-container {
			display: none;
		}
		.posa {
			position: absolute;
			top: 51px;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: #fff;
		}
		.apptips {
			display: none;
			margin-top: 100px;
			text-align: center;
			font-size: 16px;
		}
	</style>
</head>
<body>
	<div class="iframe-header">
		<ul class="breadcrumb">
			<li><i class="fa fa-home"></i>首页</li>
			<li><i class="fa fa-angle-right"></i>推送消息</li>
			<!-- <li><i class="fa fa-angle-right"></i>新增推送消息</li> -->
		</ul>
	</div>
	<div class="iframe-content p20 bg-gray posa">
		<div class="material-container">
			<div class="material-left">
				<div class="slimscroll">
					<div class="appmsg-wrap">
						<div class="appmsg-wrap-hd">
							<h3 class="appmsg-wrap-title">消息列表</h3>
						</div>
						<div class="appmsg-wrap-bd">
							<div class="appmsg-list">
								<div class="appmsg-item-fst js_appmsg_item current">
									<div class="appmsg-cover-bg">
										<h4 class="appmsg-title">标题</h4>
										<div class="appmsg-thumbnail"><i class="fa fa-picture-o"></i></div>
									</div>
									<div class="appmsg-edit-mask">
										<a href="javascript:;" title="下移" class="sort-down"><i class="fa fa-long-arrow-down"></i></a>
										<!-- <a href="javascript:;" title="上移" class="sort-up"><i class="fa fa-long-arrow-up"></i></a>
										<a href="javascript:;" title="删除" class="delete"><i class="fa fa-trash"></i></a> -->
									</div>
								</div>
								<!-- <div class="appmsg-item js_appmsg_item">
									<div class="appmsg-cover-bg">
										<h4 class="appmsg-title">标题</h4>
										<div class="appmsg-thumbnail"><i class="fa fa-picture-o"></i></div>
									</div>
									<div class="appmsg-edit-mask">
										<a href="javascript:;" title="下移" class="sort-down"><i class="fa fa-long-arrow-down"></i></a>
										<a href="javascript:;" title="上移" class="sort-up"><i class="fa fa-long-arrow-up"></i></a>
										<a href="javascript:;" title="删除" class="delete"><i class="fa fa-trash"></i></a>
									</div>
								</div> -->
							</div>
							<a href="javascript:;" class="add-appmsg" title="添加一条消息"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					</div>
				</div>
				<div class="material-right">
					<div class="appmsg-editor">
						<script type="text/plain" id="myEditor"></script>
						<div class="bot-fixed-operate">
							<div>
								<span class="btn-stretch"><i class="fa fa-plus-circle"></i><em>收起正文</em></span>
								<span class="btn btn-blue btn-publish" data-state="1" data-value="<?php echo ($action); ?>">发布</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		<div class="apptips">亲，今日已发布了一条消息，请明日再发！</div>
	</div>
	<script type="text/html" id="tpl_top_edit_area">
		<div class="top-edit-area">
			<div class="top-edit-row">
				<input type="text" class="top-edit-field title" placeholder="请在这里输入标题(必填)" maxlength="64">
				<span class="top-edit-tips tips-title">0/64</span>
			</div>
			<div class="top-edit-row">
				<input type="text" class="top-edit-field author" placeholder="作者" maxlength="8">
				<span class="top-edit-tips tips-author">0/8</span>
			</div>
		</div>
	</script>
	<script type="text/html" id="tpl_bot_edit_area">
		<div class="bot-edit-area">
			<div class="bot-edit-row cover-pic">
				<label class="bot-edit-label">
					<strong class="title">封面(必选)</strong>
					<p class="text">大图片建议尺寸：900像素 * 500像素</p>
				</label>
				<div class="cover-upload">
					<span class="cover-upload-bg">
						<input type="file" name="upload_cover" id="upload_cover" data-state="requesting"><span class="text">上传封面</span>
					</span>
				</div>
				<div class="cover-preview">
					<div class="cover-preview-bg">
						<img src="" class="cover-img">
						<a href="javascript:;" class="remove-cover-bg">
							<span class="btn-remove-cover" title="删除封面"><i class="fa fa-trash"></i></span>
						</a>
					</div>
				</div>
			</div>
			<!--<div class="bot-edit-row show-cover-tips">
				<input type="checkbox" id="checked_cover">
				<span class="cover-tips">封面图片显示在正文中</span>
			</div>-->
			<div class="bot-edit-row abstract">
				<label class="bot-edit-label">
					<strong class="title">摘要</strong>
					<p class="text">选填，如果不填写会默认抓取正文前54个字</p>
				</label>
				<div class="abstract-edit-area">
					<textarea id="abstract_txt" maxlength="120"></textarea>
					<em class="abstract-tips">0/120</em>
				</div>
			</div>
		</div>
	</script>

	<script src="/xibei/Public/admin/js/jquery.min.js"></script>
	<script src="/xibei/Public/admin/plugins/umeditor/third-party/template.min.js"></script>
	<script src="/xibei/Public/admin/plugins/umeditor/umeditor.config.js"></script>
	<script src="/xibei/Public/admin/plugins/umeditor/umeditor.min.js"></script>
	<script src="/xibei/Public/admin/plugins/umeditor/lang/zh-cn/zh-cn.js"></script>
	<script src="/xibei/Public/admin/plugins/jquery.slimscroll/jquery.slimscroll.min.js"></script>
	<script src="/xibei/Public/admin/js/common.js"></script>
	<script src="/xibei/Public/admin/js/createView.js"></script>

</body>
</html>