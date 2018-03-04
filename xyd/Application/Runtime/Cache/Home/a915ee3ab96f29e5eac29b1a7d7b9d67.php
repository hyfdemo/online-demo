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
		}
	</style>
</head>
<body>
	<div class="iframe-header">
		<ul class="breadcrumb">
			<li><i class="fa fa-home"></i>首页</li>
			<li><i class="fa fa-angle-right"></i>学校新闻</li>
		</ul>
	</div>
	<div class="iframe-content p20">
		<div class="js_pageshow">
			<div class="search-row">
				<select class="select">
					<option value="全部" selected>全部</option>
					<option value="类型">类型</option>
                    <option value="标题">标题</option>
				</select>
				<input type="text" name="search" class="search-field" placeholder="输入关键字">
				<button class="btn btn-blue js_search" type="button" title="搜索"><i class="fa fa-search"></i>搜索</button>
			</div>
			<div class="operate-row">
				<div class="operate-left">
					<button type="button" class="btn btn-danger btn-remove-batch"><i class="fa fa-trash"></i>批量删除</button>
					<button type="button" class="btn btn-blue btn-add"><i class="fa fa-plus"></i>新增新闻</button>
				</div>
				<!--<div class="operate-right">
					<div class="filter">
						<select class="filter-select">
							<option value="全部" selected>全部</option>
							<option value="校园">校园活动</option>
							<option value="户外">户外活动</option>
						</select>
						<button type="button" class="btn btn-default btn-filter"><i class="fa fa-filter"></i>筛选</button>
					</div>
				</div>-->
			</div>

			<table class="table-list">
				<thead>
					<tr>
						<th><input type="checkbox" class="checked-all">全选</th>
						<th>新闻标题</th>
						<th>新闻类型</th>
						<th>发布时间</th>
						<th>详情</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
						<td><input type="checkbox" name="checked_list"></td>
						<td><?php echo ($v["header"]); ?></td>
						<td><?php echo ($v["activity"]); ?></td>
						<td><?php echo ($v["time"]); ?></td>
						<td><a href="javascript:;" class="btn-view">查看</a></td>
						<td>
							<button type="button" class="btn btn-danger btn-trash"><i class="fa fa-trash"></i>删除</button>
							<input type="hidden" class="fid" value="<?php echo ($v["id"]); ?>">
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			<div class="pagination"><?php echo ($page); ?></div>
		</div>
		<table class="table-edit">
			<tr>
				<td class="tr">新闻标题：</td>
				<td><input type="text" class="edit-field js_disabled" id="title" value=""></td>
				<td rowspan="2" class="tc">
					<div class="edit-preview">
						<img src="" id="upload_img" width="60" height="60">
					</div>
					<span class="edit-upload">
						<input type="file" name="upload_img" class="edit" id="edit_upload"><span class="text">上传图标</span>
					</span>
					<!-- <div class="check-pic">
						<input type="checkbox" class="js_disabled" id="checked_pic">首图显示在正文中
					</div> -->
					<p class="notice">注：图片尺寸比例1:1，推荐尺寸60像素*60像素</p>
				</td>
			</tr>
			<tr>
				<td class="tr">新闻类型：</td>
				<td>
					<select class="edit-select js_disabled" id="news_type">
                        <?php if(is_array($cat)): $i = 0; $__LIST__ = $cat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["name"]); ?>" selected><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td class="tr">新闻内容：</td>
				<td colspan="2">
					<script type="text/plain" id="myEditor"></script>
				</td>
			</tr>
			<tr>
				<td colspan="3" class="tc">
					<button type="button" class="btn btn-blue btn-confirm">确定</button>
					<button type="button" class="btn btn-default btn-cancel">返回</button>
				</td>
			</tr>
		</table>
		
	</div>

	<script src="/xibei/Public/admin/js/jquery.min.js"></script>
	<script src="/xibei/Public/admin/plugins/umeditor/third-party/template.min.js"></script>
	<script src="/xibei/Public/admin/plugins/umeditor/umeditor.config.js"></script>
	<script src="/xibei/Public/admin/plugins/umeditor/umeditor.min.js"></script>
	<script src="/xibei/Public/admin/plugins/umeditor/lang/zh-cn/zh-cn.js"></script>
	<script src="/xibei/Public/admin/js/common.js"></script>
	<script>
		
		(function(){

			var um = UM.getEditor('myEditor', {
                toolbar: ["undo redo | bold italic underline strikethrough | forecolor backcolor | removeformat |", "insertorderedlist insertunorderedlist |  paragraph fontfamily fontsize", "| justifyleft justifycenter justifyright justifyjustify |", "link | emotion image", "source |"]
            });
			um.setWidth('98%');
			um.setHeight(200);
			um.setContent('<p style="color: #999;">新闻内容从这里开始</p>');


			$(function(){
				// 搜索
				$('.js_search').click(function(){
					var type = $('.search-row :selected').val(),
						txt = $('.search-field').val();
					$.ajax({
						type: 'POST',
						url: "<?php echo U('Admin/news_search');?>",
						data: {type: type, val: txt},
						success: function(data){  
							if (data) {
								var results = [];
								for (var i = 0; i < data.length; i++) {
									var item = data[i];
									var buffer = 
										'<tr>' +
											'<td><input type="checkbox" name="checked_list"></td>' +
											'<td>' + item.header + '</td>' +
											'<td>' + item.activity + '</td>' +
											'<td>' + item.time + '</td>' +
											'<td><a href="javascript:;" class="btn-view">查看</a></td>' +
											'<td>' +
												'<button type="button" class="btn btn-danger btn-trash"><i class="fa fa-trash"></i>删除</button>' +
												'<input type="hidden" class="fid" value="' + item.id + '">' +
											'</td>' +
										'</tr>';
									results.push(buffer);
								}
								$('.table-list tbody').html(results.join(''));
							}
						}
					});
				});

				// 全选
				$('.checked-all').change(function(){
					var $this = $(this);
					$('[name="checked_list"]').each(function(){
						$(this).prop('checked', $this.is(':checked'));
					});
				});
				$('.table-list').on('click', '[name="checked_list"]', function(){
					$('.checked-all').prop('checked', $('[name="checked_list"]:checked').length > 0);
				});

				// 批量删除
				$('.btn-remove-batch').click(function(){
					var checkedIds = [],
						$checkedItems = $('[name="checked_list"]:checked');
					if ($checkedItems.length === 0) {
						$(window.parent)[0].layer.msg('请先选择要删除的数据项！');
						return false;
					}
					$checkedItems.each(function(){
						checkedIds.push($(this).closest('tr').find('.fid').val());
					});
					if (checkedIds.length > 0) {
						$(window.parent)[0].layer.confirm('确定要删除所有选择的数据项？', {
							btns: ['确定', '取消']
						}, function(i){
							$.ajax({
								type: 'POST',
								url: "<?php echo U('Admin/news_deletes');?>",
								data: {ids: checkedIds},
								success: function(data){ // data包含要删除的一个或多个id(数组)
									if (data) {
										$('.fid').each(function(){
											var $this = $(this),
												curId = $this.val();
											for (var i = 0; i < data.length; i++) {
												if (data[i] == curId) {
													$this.closest('tr').remove();
												}
											}
										});
										$(window.parent)[0].layer.close(i);
										$(window.parent)[0].layer.msg('成功删除' + checkedIds.length + '项数据！');
									}
								}
							});
						}, function(){});
					}
				});

				// 添加
				$('.btn-add').click(function(){
					setTableData();
					$('.js_pageshow').fadeOut('fast', function() {
						$('.table-edit').fadeIn('fast');
					});
				});

				// 单个删除
				$('.table-list').on('click', '.btn-trash', function(){
					var $this = $(this),
						fid = $this.siblings('.fid').val();
					$(window.parent)[0].layer.confirm('确定要删除该新闻？', {
						btns: ['确定', '取消']
					}, function(i){
						$.ajax({
							type: 'POST',
							url: "<?php echo U('Admin/new_delete');?>",
							data: {id: fid},
							success: function(data){
								if (data == 1) {
									$(window.parent)[0].layer.close(i);
									$(window.parent)[0].layer.msg('已删除！');
									$this.closest('tr').remove();
								}
							}
						});
					}, function(){});
				});

				// 查看
				$('.table-list').on('click', '.btn-view', function(){
					var fid = $(this).closest('tr').find('.fid').val();
					$.ajax({
						type: 'POST',
						url: "<?php echo U('Admin/news_view');?>",
						data: {id: fid},
						success: function(data) {
							if (data) {
								setTableData(data);
								$('.js_pageshow').fadeOut('fast', function() {
									$('.table-edit').fadeIn('fast');
								});
							}
						}
					});
                    return false;
				});

				// 提交表格
				$('.btn-confirm').click(function(){
					var curData = {
						title: $('#title').val(),
						type: $('#news_type :selected').val(),
						icon: $('#upload_img').attr('src'),
						content: um.getContent()
					};
					$.ajax({
						type: 'POST',
						url: "<?php echo U('Admin/news_add');?>",
						data: curData,
						success: function(data){
							if (data) {
								var buffer = 
									'<tr>' +
										'<td><input type="checkbox" name="checked_list"></td>' +
										'<td>' + data.header + '</td>' +
										'<td>' + data.activity + '</td>' +
										'<td>' + data.time + '</td>' +
										'<td><a href="javascript:;" class="btn-view">查看</a></td>' +
										'<td>' +
											'<button type="button" class="btn btn-danger btn-trash"><i class="fa fa-trash"></i>删除</button>' +
                                            '<input type="hidden" class="fid" value="'+ data.id +'">'+
										'</td>' +
									'</tr>';
								$('.table-list tbody').prepend(buffer);
								$(window.parent)[0].layer.msg('添加成功！');
								$('.table-edit').fadeOut('fast', function() {
									$('.js_pageshow').fadeIn('fast');
								});
							}
						}
					});
				});

				// 上传图片
				$('#edit_upload').change(function(){
					var self = this;
					$.uploadFile({
						selector: self,
						frameName: $(self).attr('name'),
                        url: "<?php echo U('Admin/news_img');?>",
						format: ['jpg', 'jpeg', 'gif', 'png'],
						callBack: function(data) {
							$(self).val('');
							$('.edit-upload .text').text('上传中...');
							var img = new Image();
							img.src = data;
							img.onload = function(){
								$('#upload_img').attr('src', data).show();
								$('.edit-upload .text').text('更新图标');
							}
						}
					});
				});

				// 返回
				$('.btn-cancel').click(function(){
					$('.table-edit').fadeOut('fast', function(){
						$('.js_pageshow').fadeIn('fast');
					});
				});

			});

			function setTableData(data) {
				if (data) {
					if (typeof data == 'object') {
						$('#title').val(data.header);
						$('#upload_img').attr('src', data.img).show();
						$('#edit_upload').hide();
						$('#news_type option').each(function(){
							$(this).prop('selected', $(this).val() == data.activity);
						});
						UM.getEditor('myEditor').setContent((data.content == '' || data.content == null) ? '<p style="color: #999;">新闻内容从这里开始</p>' : data.content);
						UM.getEditor('myEditor').setDisabled();
						$('.btn-confirm, .edit-upload').hide();
					}
				} else {
					$('#title').val('');
					$('#upload_img').attr('src', '').hide();
					$('#edit_upload').show();
					$('#news_type option').each(function(){
						$(this).prop('selected', $(this).val() == '全部');
					});
					UM.getEditor('myEditor').setContent('<p style="color: #999;">新闻内容从这里开始</p>');
					UM.getEditor('myEditor').setEnabled();
					$('.btn-confirm, .edit-upload').show();
				}
			}


		})();

	</script>
</body>
</html>