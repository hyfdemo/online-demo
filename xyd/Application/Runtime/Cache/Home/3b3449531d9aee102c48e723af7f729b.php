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
	<link rel="stylesheet" href="/xibei/Public/admin/plugins/layer/laydate/skins/default/laydate.css">
</head>
<body>
	<div class="iframe-header">
		<ul class="breadcrumb">
			<li><i class="fa fa-home"></i>首页</li>
			<li><i class="fa fa-angle-right"></i>课程介绍</li>
		</ul>
	</div>
	<div class="iframe-content p20">
		<div class="js_pageshow">
			<div class="search-row">
				<input type="text" name="search" class="search-field" placeholder="输入关键字">
				<button class="btn btn-blue js_search" type="button" title="搜索"><i class="fa fa-search"></i>搜索</button>
			</div>
			<div class="operate-row">
				<div class="operate-left">
					<button type="button" class="btn btn-danger btn-remove-batch"><i class="fa fa-trash"></i>批量删除</button>
					<button type="button" class="btn btn-blue btn-add"><i class="fa fa-plus"></i>新增课目</button>
				</div>
			</div>

			<table class="table-list">
				<thead>
					<tr>
						<th><input type="checkbox" class="checked-all">全选</th>
						<th>首图</th>
						<th>课目名称</th>
						<th>特色课目</th>
						<th>更新时间</th>
						<th>详情</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
						<td><input type="checkbox" name="checked_list"></td>
						<td><img src="<?php echo ($v["img"]); ?>" width="72" height="40" alt=""></td>
						<td><?php echo ($v["header"]); ?></td>
						<td><?php echo ($v["activity"]); ?></td>
						<td><?php echo ($v["time"]); ?></td>
						<td><a href="javascript:;" class="btn-view">查看</a></td>
						<td>
							<button type="button" class="btn btn-default btn-edit"><i class="fa fa-pencil"></i>编辑</button>
							<button type="button" class="btn btn-danger btn-trash"><i class="fa fa-trash"></i>删除</button>
							<input type="hidden" class="cid" value="<?php echo ($v["id"]); ?>">
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			<div class="pagination">
				<div> 
					<?php echo ($page); ?>
				</div>
			</div>
		</div>

		<table class="table-edit">
			<tr>
				<td class="tr">课目名称：</td>
				<td><input type="text" id="subject" class="edit-field js_disabled" value=""></td>
				<td rowspan="2" class="tc">
					<div class="edit-preview">
						<img id="figure_fst" src="" width="180" height="100">
					</div>
					<span class="edit-upload">
						<input type="file" id="edit_upload" name="upload_avatar"><span class="text">上传首图</span>
					</span>
					<p class="notice">注：图片尺寸比例9:5，推荐尺寸900像素*500像素</p>
				</td>
			</tr>
			<tr>
				<td class="tr">特色课目：</td>
				<td>
					<input type="radio" class="js_disabled" name="feature" value="是" checked>是
					<input type="radio" class="js_disabled" name="feature" value="否">否
				</td>
			</tr>
			<tr>
				<td class="tr">详情介绍：</td>
				<td colspan="2"><script type="text/plain" id="myEditor"></script></td>
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
	<script src="/xibei/Public/admin/plugins/layer/laydate/laydate.js"></script>
	<script src="/xibei/Public/admin/js/common.js"></script>
	<script>
		(function(){

			// 重新渲染表格
			function renderTable(data) {
				var results = [];
				for (var i = 0; i < data.length; i++) {
                    var item = data[i];
					var buffer = 
						'<tr>' +
							'<td><input type="checkbox" name="checked_list"></td>' +
							'<td><img src="' + item.img + '" width="72" height="40" alt=""></td>' +
							'<td>' + item.header + '</td>' +
							'<td>' + item.activity + '</td>' +
							'<td>' + item.time + '</td>' +
							'<td><a href="javascript:;" class="btn-view">查看</a></td>' +
							'<td>' +
								'<button type="button" class="btn btn-default btn-edit"><i class="fa fa-pencil"></i>编辑</button>' +
								'<button type="button" class="btn btn-danger btn-trash"><i class="fa fa-trash"></i>删除</button>' +
								'<input type="hidden" class="cid" value="' + item.id + '">' +
							'</td>' +
						'</tr>';
					results.push(buffer);
				}
				$('.table-list tbody').html(results.join(''));
				
			}

			// 更新数据
			function updateCurData(data) {
				var buffer = 
					'<tr>' +
						'<td><input type="checkbox" name="checked_list"></td>' +
						'<td><img src="' + data.img + '" width="72" height="40" alt=""></td>' +
						'<td>' + data.header + '</td>' +
						'<td>' + data.activity + '</td>' +
						'<td>' + data.time + '</td>' +
						'<td><a href="javascript:;" class="btn-view">查看</a></td>' +
						'<td>' +
							'<button type="button" class="btn btn-default btn-edit"><i class="fa fa-pencil"></i>编辑</button>' +
							'<button type="button" class="btn btn-danger btn-trash"><i class="fa fa-trash"></i>删除</button>' +
							'<input type="hidden" class="cid" value="' + data.id + '">' +
						'</td>' +
					'</tr>';
				$('.cid').each(function(){
					if ($(this).val() == data.id) {
						$(this).closest('tr').remove();
					}
				});
				$('.table-list tbody').prepend(buffer);
			}

			// 设置表格内容
			function setTableData(data, isView) {
				if (arguments.length === 0) {
					$('#subject, #edit_upload').val('');
					$('#figure_fst').attr('src', '').hide();
					$('.edit-upload .text').text('上传首图');
					$('.js_disabled').prop('disabled', false);
					$('.js_disabled').prop('disabled', false);
					$('[name="feature"]').each(function(){
						$(this).prop('checked', $(this).val() == 'yes');
					});
					$('.edit-upload, .btn-confirm').show();
					um.setContent('<p style="color: #999;">详情从这里开始</p>');
					return false;
				}

				$('#subject').val(data.header);
				$('#figure_fst').attr('src', data.figure == '' ? '' : data.img).show();
				$('.edit-upload .text').text('更新首图');
				$('[name="feature"]').each(function(){
					$(this).prop('checked', $(this).val() == data.activity);
				});
				$('.btn-confirm').attr('data-cid', data.id);
				um.setContent((data.content == '' || data.content == null) ? '<p style="color: #999;">详情从这里开始</p>' : data.content);
				$('.js_disabled').prop('disabled', isView === true ? true : false);
				isView === true ? $('.edit-upload, .btn-confirm').hide() : $('.edit-upload, .btn-confirm').show();
			}

			// 清除全选
			function resetChecked() {
				$('.checked-all').prop('checked', false);
				$('.table-list').prop('checked', false);
			}

			// 获取表格数据
			function getTableData() {
				return {
					id: $('.btn-confirm').attr('data-cid'),
					name: $('#subject').val(),
					figure: $('#figure_fst').attr('src'),
					isFigure: $('[name="feature"]:checked').val(),
					content: um.getContent() == '<p style="color: #999;">详情从这里开始</p>' ? '' : um.getContent()
				};
			}

			var um = UM.getEditor('myEditor', {
                toolbar: ["undo redo | bold italic underline strikethrough | forecolor backcolor | removeformat |", "insertorderedlist insertunorderedlist |  paragraph fontfamily fontsize", "| justifyleft justifycenter justifyright justifyjustify |", "link | emotion image", "source |"]
            });
			um.setWidth('98%');
			um.setHeight(250);
			um.setContent('<p style="color: #999;">详情从这里开始</p>');

			$(function(){

				// 搜索
				$('.js_search').click(function(){
					var v = $.trim($('.search-field').val());
					if (v == '') {
						$(window.parent)[0].layer.msg('请输入搜索关键字！');
						$('.search-field').focus();
						return false;
					}
					$.ajax({
						type: 'POST',
						url: "<?php echo U('Admin/cou_search');?>",
						data: {val: v},
						success: function(data){  // 当前搜索结果，数组或fasle
                            console.log(data);
							if (data) {
								renderTable(data);
								$('.search-field').val('');
							} else {
								$(window.parent)[0].layer.msg('什么都没有，请重新输入');
								$('.search-field').val('').focus();
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
						checkedIds.push($(this).closest('tr').find('.cid').val());
					});
					if (checkedIds.length > 0) {
						$(window.parent)[0].layer.confirm('确定要删除所有选择的数据项？', {
							btns: ['确定', '取消']
						}, function(i){
							$.ajax({
								type: 'POST',
								url: "<?php echo U('Admin/cou_exts');?>",
								data: {ids: checkedIds},
								success: function(data){ // data包含要删除的一个或多个id(数组)
									if (data) {
										$('.cid').each(function(){
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
										$('.checked-all').prop('checked', false);
									}
								}
							});
						}, function(){});
					}
				});

				// 新增
				$('.btn-add').click(function(){
					$('.js_pageshow').fadeOut('fast', function(){
						setTableData();
						$('.btn-confirm').attr('data-state', 'add');
						$('.table-edit').fadeIn('fast');
					});
				});

				// 查看
				$('.table-list').on('click', '.btn-view', function(){
					var cid = $(this).closest('tr').find('.cid').val();
					$.ajax({
						type: 'POST',
						url: "<?php echo U('Admin/cou_view');?>",
						data: {id: cid},
						success: function(data) {  // 当前id对应的数据
							if (data) {
								$('.js_pageshow').fadeOut('fast', function(){
									setTableData(data, true);
									$('.btn-confirm').attr('data-state', 'view');
									$('.table-edit').fadeIn('fast');
								});
							}
						}
					});
					return false;
				});

				// 编辑与删除
				$('.table-list').on('click', '.btn', function(){
					var $this = $(this),
						cid = $this.closest('tr').find('.cid').val();
					if ($this.is('.btn-edit')) {  // 编辑
						$.ajax({
							type: 'POST',
							url: "<?php echo U('Admin/cou_editor');?>",
							data: {id: cid},
							success: function(data) {  // 当前id对用的数据
								if (data) {
									$('.js_pageshow').fadeOut('fast', function(){
										setTableData(data, false);
										$('.btn-confirm').attr('data-state', 'edit');
										$('.table-edit').fadeIn('fast');
									});
								}
							}
						});
						return false;
					}
					if ($this.is('.btn-trash')) {  // 单项删除
						$(window.parent)[0].layer.confirm('确定要删除该项数据？', {
							btns: ['确定', '取消']
						}, function(i){
							$.ajax({
								type: 'POST',
								url: "<?php echo U('Admin/cou_ext');?>",
								data: {id: cid},
								success: function(data) {  // 当前id
									if (data) {
										$(window.parent)[0].layer.close(i);
										$('.cid').each(function(){
											if ($(this).val() == data) {
												$(this).closest('tr').remove();
											}
										});
										$(window.parent)[0].layer.msg('删除成功！');
										resetChecked();
									}
								}
							})
						}, function(){});
						return false;
					}
				});

				// 上传图片
				$('#edit_upload').change(function(){
					var el = this;
					$.uploadFile({
						selector: el,
						frameName: $(el).attr('name'),
						url: "<?php echo U('Admin/upload');?>",
						format: ['png', 'jpg', 'jpeg', 'gif'],
						callBack: function(data){  // 当前图片url
							$(el).val('');
							$('.edit-upload .text').text('上传中...');
							var img = new Image();
							img.src = data;
							img.onload = function(){
								$('#figure_fst').attr('src', data).show();
								$('.edit-upload .text').text('更新首图');
							}
							
						}
					});
				});

				// 提交表格
				$('.btn-confirm').click(function(){
					var state = $(this).attr('data-state'), url;
					if (state == 'edit') {  // 编辑提交的url
						url = "<?php echo U('Admin/cou_edit');?>";
					} else if (state == 'add') {  // 新增提交的url
						url = "<?php echo U('Admin/cou_add');?>";
					}
					$.ajax({
						type: 'POST',
						url: url,
						data: getTableData(),
						success: function(data){  // 当前id对应的数据对象
                            //console.log(data);
							if (data) {
								$(window.parent)[0].layer.msg('操作成功！');
								$('.table-edit').fadeOut('fast', function(){
									updateCurData(data);
									$('.btn-confirm').attr('data-state', 'edit');
									$('.js_pageshow').fadeIn('fast');
								});
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


		})();
	</script>
</body>
</html>