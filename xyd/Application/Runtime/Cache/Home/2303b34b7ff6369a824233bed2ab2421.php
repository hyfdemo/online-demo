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
			<li><i class="fa fa-angle-right"></i>学校活动</li>
		</ul>
	</div>
	<div class="iframe-content p20">
		<div class="js_pageshow">
			<div class="search-row">
				<!--<select class="select">
					<option value="全部" selected>全部</option>
					<option value="主题">活动主题</option>
					<option value="类型">活动类型</option>
				</select>-->
				<input type="text" name="search" class="search-field" placeholder="输入活动主题">
				<button class="btn btn-blue js_search" type="button"><i class="fa fa-search"></i>搜索</button>
			</div>
			<div class="operate-row">
				<div class="operate-left">
					<button type="button" class="btn btn-danger btn-remove-batch"><i class="fa fa-trash"></i>批量删除</button>
					<button type="button" class="btn btn-blue btn-add"><i class="fa fa-plus"></i>新增活动</button>
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
						<th>活动主题</th>
						<!-- <th>活动类型</th> -->
						<th>开始时间</th>
						<th>发布时间</th>
						<th>详情</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
						<td><input type="checkbox" name="checked_list"></td>
						<td><?php echo ($v["header"]); ?></td>
						<!-- <td><?php echo ($v["activity"]); ?></td> -->
						<td><?php echo ($v["date"]); ?></td>
						<td><?php echo ($v["time"]); ?></td>
						<td><a href="javascript:;" class="btn-view">查看</a></td>
						<td>
							<button type="button" class="btn btn-default btn-edit"><i class="fa fa-pencil"></i>编辑</button>
							<button type="button" class="btn btn-danger btn-trash"><i class="fa fa-trash"></i>删除</button>
							<input type="hidden" class="fid" value="<?php echo ($v["id"]); ?>">
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>
			<div class="pagination">
                <?php echo ($page); ?>
            </div>
		</div>
		<table class="table-edit">
			<tr>
				<td class="tr">活动主题：</td>
				<td><input type="text" class="edit-field js_disabled" id="themes" value=""></td>
				<td rowspan="2" class="tc">
					<div class="edit-preview">
						<img src="" id="upload_img" width="180" height="100">
					</div>
					<span class="edit-upload">
						<input type="file" name="upload_img" class="edit" id="edit_upload"><span class="text">上传首图</span>
					</span>
					<!--<div class="check-pic">
						<input type="checkbox" class="js_disabled" id="checked_pic">首图显示在正文中
					</div>-->
					<p class="notice">注：图片尺寸比例9:5，推荐尺寸900像素*500像素</p>
				</td>
			</tr>
			<!-- <tr>
                <td class="tr">活动类型：</td>
                <td>
                    <select class="edit-select js_disabled" id="acitive_type">
                        <option value="请选择" selected>请选择</option>
                        <option value="校园">校园活动</option>
                        <option value="户外">户外活动</option>
                    </select>
                </td>
            </tr> -->
			<tr>
				<td class="tr">开始时间：</td>
				<td><input type="text" class="edit-field js_disabled" id="start_time" value=""></td>
			</tr>
			<tr>
				<td class="tr">活动内容：</td>
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
    <script src="/xibei/Public/admin/plugins/layer/laydate/laydate.js"></script>
	<script src="/xibei/Public/admin/js/common.js"></script>
	<!--<script src="/xibei/Public/admin/js/activities.js"></script>-->
</body>
</html>
<script>
    // 搜索返回数据后显示在表格中
    function addTableRow(data) {
        var result = [], str;
        for (var i = 0; i < data.length; i++) {
            var item = data[i];
            str =
                    '<tr>' +
                    '<td><input type="checkbox" name="checked_list"></td>' +
                    '<td>' + item.header + '</td>' +
                    /*'<td>' + item.activity + '</td>' +*/
                    '<td>' + item.date + '</td>' +
                    '<td>' + item.time + '</td>' +
                    '<td><a href="javascript:;" class="btn-view">查看</a></td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-default btn-edit"><i class="fa fa-pencil"></i>编辑</button>' +
                    '<button type="button" class="btn btn-danger btn-trash"><i class="fa fa-trash"></i>删除</button>' +
                    '<input type="hidden" class="fid" value="' + item.id + '">' +
                    '</td>' +
                    '</tr>';
            result.push(str);
        }
        $('.table-list tbody').html(result.join(''));
    }

    // 重置内容
    function resetEditTableData() {
        $('.js_disabled').each(function(){
            if($(this).is(':disabled')) {
                $(this).prop('disabled', false);
            }
        });
        $('.edit-field').each(function(){
            $(this).val('');
        });
        $('#upload_img').attr('src', '').hide();
        $('.edit-upload').show().find('.text').text('上传首图');
        UM.getEditor('myEditor').setEnabled();
        UM.getEditor('myEditor').setContent('<p style="color: #999;">输入详细内容</p>');
        if (!$('.btn-confirm').is(':visible')) {
            $('.btn-confirm').show();
        }
    }

    // 设置表格数据
    function setEditTableData(data, isView) {
        $('#themes').val(data.header);
        $('#upload_img').attr('src', data.img);
        //$('#checked_pic').prop('checked', data.isShowInContent);
        /*$('.acitive_type :selected').each(function(){
            $(this).prop('selected', $(this).val() == data.activity);
        });*/
        $('#start_time').val(data.date);
        UM.getEditor('myEditor').setContent((data.content == '' || data.content == null) ? '<p style="color: #999;">输入详细内容</p>' : data.content);
        if (isView === false) {
            $('.js_disabled').each(function(){
                $(this).prop('disabled', true);
            });
            $('.edit-upload').hide();
            $('.btn-confirm').hide();
            UM.getEditor('myEditor').setDisabled();
        } else if(isView === true) {
            $('.js_disabled').each(function(){
                $(this).prop('disabled', false);
            });
            $('.edit-upload').show();
            $('.btn-confirm').show();
            $('#upload_img').show();
            UM.getEditor('myEditor').setEnabled();
        }

    }

    function getEditData() {
        return {
            title: $('#themes').val(),
            img: $('#upload_img').attr('src'),
            isShowInContent: $('#checked_pic').is(':checked'),
            //type: $('#acitive_type :selected').val(),
            startTime: $('#start_time').val(),
            content: UM.getEditor('myEditor').getContent(),
            id: $('.btn-confirm').attr('data-id')
        }
    }

    function updateData(data) {
        var curRow =
                '<tr>' +
                '<td><input type="checkbox" name="checked_list"></td>' +
                '<td>' + data.header + '</td>' +
                /*'<td>' + data.activity + '</td>' +*/
                '<td>' + data.date + '</td>' +
                '<td>' + data.time + '</td>' +
                '<td><a href="javascript:;" class="btn-view">查看</a></td>' +
                '<td>' +
                '<button type="button" class="btn btn-default btn-edit"><i class="fa fa-pencil"></i>编辑</button>' +
                '<button type="button" class="btn btn-danger btn-trash"><i class="fa fa-trash"></i>删除</button>' +
                '<input type="hidden" class="fid" value="' + data.id + '">' +
                '</td>' +
                '</tr>';
        $('.table-list .fid').each(function(){
            if ($(this).val() == data.id) {
                $(this).closest('tr').remove();
            }
        });
        $('.table-list tbody').prepend(curRow);
    }

    (function(){


        var um = UM.getEditor('myEditor', {
                toolbar: ["undo redo | bold italic underline strikethrough | forecolor backcolor | removeformat |", "insertorderedlist insertunorderedlist |  paragraph fontfamily fontsize", "| justifyleft justifycenter justifyright justifyjustify |", "link | emotion image", "source |"]
            });
        um.setWidth('98%');
        um.setHeight(250);


        /*// 切换搜索类型及搜索框placeholder
        $('.search-row .select').change(function(){
            if ($(this).val() == '全部') {
                $('.search-field').attr('placeholder', '输入活动主题、类型');
                return false;
            }
            $('.search-field').attr('placeholder', '输入活动' + $(this).val());
        });*/

        // 搜索
        $('.js_search').click(function(){
            var searchType = $('.search-row :selected').val(),
                    searchTxt = $('.search-field').val();
            $.ajax({
                type: 'POST',
                url: "<?php echo U('Admin/act_search');?>",
                data: {type: searchType, val: searchTxt},
                success: function(data){
                    addTableRow(data);
                }
            });
        });

        // 筛选

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
                        url: "<?php echo U('Admin/act_exts');?>",
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

        // 新增活动
        $('.btn-add').click(function(){
            resetEditTableData();
            $('.js_pageshow').fadeOut('fast', function(){
                $('.table-edit').fadeIn('fast').find('.btn-confirm').attr('data-state', 'add');
                $('.breadcrumb').append('<li class="active"><i class="fa fa-angle-right"></i>新增</li>');
            });
        });

        // 查看
        $('.table-list').on('click', '.btn-view', function(){
            var fid = $(this).closest('tr').find('.fid').val();
            $.ajax({
                type: 'POST',
                url: "<?php echo U('Admin/act_view');?>",
                data: {fid:fid},
                success: function(data) {
                    if (data) {
                        $('.js_pageshow').fadeOut('fast', function(){
                            $('.table-edit').fadeIn('fast').find('.btn-confirm').attr('data-state', 'edit');
                            setEditTableData(data, false);
                        });
                    }
                }
            });
            return false;
        });

        // 编辑或删除
        $('.table-list').on('click', '.btn', function(){
            var $this = $(this);
            var fid = $this.closest('tr').find('.fid').val();
            if ($this.is('.btn-edit')) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo U('Admin/act_the');?>",  // 编辑 => 请求当前uid相关的数据
                    data: {fid: fid},
                    success: function(data) {

                        if (data) {
                            console.log(data)
                            $('.js_pageshow').fadeOut('fast', function(){
                                $('.table-edit').fadeIn('fast').find('.btn-confirm').attr('data-state', 'edit');
                                setEditTableData(data, true);
                                $('.btn-confirm').attr('data-id', data.id);
                                $('.breadcrumb').append('<li class="active"><i class="fa fa-angle-right"></i>编辑</li>');
                            });
                        }
                    }
                });
                return false;
            }
            if ($this.is('.btn-trash')) {
                $(window.parent)[0].layer.confirm('确定要删除当前数据？', {
                    btns: ['确定', '取消']
                }, function(i){
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo U('Admin/act_s');?>",  // 删除当前数据提交的url
                        data: {fid: fid},
                        success: function(data){  // 是否删除成功的状态
                            if (data) {
                                $('.table-list .fid').each(function(){
                                    if ($(this).val() == data) {
                                        $(this).closest('tr').remove();
                                    }
                                });
                                $(window.parent)[0].layer.msg('删除成功！');
                            }
                        }
                    });
                }, function(){});
                return false;
            }
        });

        // 提交表格
        $('.btn-confirm').click(function(){
            var state = $(this).attr('data-state'),
                    url = '';
            if (state == 'edit') {  // 编辑
                url = "<?php echo U('Admin/act_ext');?>";  // 编辑教师提交的url
            } else if (state == 'add') {  // 新增
                url = "<?php echo U('Admin/act_add');?>";  // 新增教师提交的url
            }
            if (url != '') {
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: getEditData(),
                    success: function(data){
                        if (data) {
                            $(window.parent)[0].layer.msg('提交成功！');
                            updateData(data);
                            $('.table-edit').fadeOut('fast', function() {
                                $('.js_pageshow').fadeIn('fast');
                            });
                        }
                    }
                });
            }
        });



        // 返回
        $('.btn-cancel').click(function(){
            $('.table-edit').fadeOut('fast', function(){
                $('.js_pageshow').fadeIn('fast');
                $('.breadcrumb').find('.active').remove();
            })
        });

        // 图片上传
        $('#edit_upload').change(function(){
            var el = this;
            $.uploadFile({
                selector: el,
                frameName: $(el).attr('name'),
                url: "<?php echo U('Admin/uploads');?>",
                format: ['png', 'jpg', 'jpeg', 'gif'],
                callBack: function(data){
                    $(el).val('');
                    $('.edit-upload .text').text('上传中...');
                    var img = new Image();
                    img.src = data;
                    img.onload = function(){
                        $('#upload_img').attr('src', data).show();
                        $('.edit-upload .text').text('更新首图');
                    }
                    
                }
            });
        });

        // 选择日期
        laydate({
            elem: '#start_time'
        });
    })();
</script>