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
			<li><i class="fa fa-angle-right"></i>成绩查询</li>
		</ul>
	</div>
	<div class="iframe-content">
		
		<div class="qs-wrapper">
			<div class="importbox">
				<div class="import-hd">
					<h3 class="title">成绩导入</h3>
				</div>
				<div class="import-bd">
					<form action="./results_excel" method="post" enctype="multipart/form-data">
						<div class="import-row">
							<span class="text">输入学期：</span>
							<input type="text" name="term" class="term qs-field" placeholder="如170503期中测试">
						</div>
						<div class="import-row">
							<span class="import-upload">
								<span class="btn-upload">
									导入Excel
									<input type="file" name="fname" accept="application/msexcel">
								</span><i>：</i>
							</span>
							<input type="text" class="filename qs-field" value="">
							<input type="submit" class="btn btn-blue" value="上传">
						</div>
					</form>
				</div>
			</div>

			<div class="querybox">
				<div class="query-hd">
					<h3 class="title">成绩查询</h3>
				</div>
				<div class="query-bd">
					<div class="query-group">
						<span class="text">学期：</span>
						<select class="query-select qs-field">
							<?php if(is_array($term)): $i = 0; $__LIST__ = $term;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$term): $mod = ($i % 2 );++$i;?><option value="<?php echo ($term["semester"]); ?>"><?php echo ($term["semester"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
					<div class="query-group">
						<span class="text">学号：</span>
						<input type="text" class="sid qs-field" placeholder="201702202">
					</div>
					<div class="query-group query-btn">
						<button type="button" class="btn btn-blue js_query">查询</button>
					</div>
				</div>	
			</div>


			<div class="query-result">
				<div class="qr-hd">
					<div class="qr-title">成绩查询><span class="curTerm">2017上学期</span></div>
				</div>
				<div class="qr-bd">
					<table class="qr-table">
						<thead>
							<tr>
								<th>学号</th>
								<th>姓名</th>
								<th>科目名称</th>
								<th>分数</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>




	</div>

	<script src="/xibei/Public/admin/js/jquery.min.js"></script>
	<script>
		(function(){
			
			$(function(){

				// 验证上传文件
				$('[name="fname"]').change(function(){
					if (!/\.xls|\.xlsx$/g.test($(this).val())) {
						$(window.parent)[0].layer.msg('请选择正确的文件格式！');
						return false;
					}
					$('.filename').val((this.files && this.files[0]) ? this.files[0].name : $(this).val());
				});

				// 查询
				$('.js_query').click(function(){
					var $sid = $('.sid'),
						term = $('.query-select :selected').val(),
						v = $.trim($sid.val());
					if (v == '') {
						$(window.parent)[0].layer.msg('请先输入学号再点击查询！');
						$sid.focus();
						return false;
					}
					
					$.ajax({
						type: 'POST',
						url: './queryScore',
						data: {term: term, sid: v},
						success: function(data) {
							if (data) {  // 有数据
								/*
									data格式：
										{
											name: '学生姓名',
											sid: '学号',
											term: '学期',
											scoreList: [
												{
													subject: '课目名称',
													score: '分数'
												}, {
													subject: '课目名称',
													score: '分数'
												},
												......
											]
										}
								*/
								var $result = $('.query-result'), 
									rt = [];
								for (var i = 0; i < data.scoreList.length; i++) {
									var item = data.scoreList[i];
									rt.push('<tr><td>' + data.sid + '</td><td>' + data.name + '</td><td>' + item.subject + '</td><td>' + item.score + '</td></tr>');
								}

								$('.curTerm').text(data.term);
								$('.qr-table tbody').html(rt.join(''));
								$sid.val('');
								if ($result.is(':visible')) {
									$result.fadeOut('fast', function(){
										$(this).fadeIn('fast');
									})
								} else {
									$result.fadeIn('fast');
								}
							} else {  // false
								$(window.parent)[0].layer.msg('查询失败，请检查或重新输入学号！');
								$sid.focus();
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