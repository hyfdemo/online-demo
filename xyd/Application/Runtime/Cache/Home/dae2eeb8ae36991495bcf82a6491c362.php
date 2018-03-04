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
			<li><i class="fa fa-angle-right"></i>教师风采</li>
		</ul>
	</div>
	<div class="iframe-content p20">
		<div class="js_pageshow">
			<div class="search-row">
				<select class="select">
					<option value="全部" selected>全部</option>
					<option value="名字">名字</option>
					<option value="职称">职称</option>
				</select>
				<input type="text" name="search" class="search-field" placeholder="输入教师名字、职称">
				<button class="btn btn-blue js_search" type="button" title="搜索"><i class="fa fa-search"></i></button>
			</div>
			<div class="operate-row">
				<div class="operate-left">
					<button type="button" class="btn btn-danger btn-remove-batch"><i class="fa fa-trash"></i>批量删除</button>
					<button type="button" class="btn btn-blue btn-add"><i class="fa fa-plus"></i>新增教师</button>
				</div>
				<!--<div class="operate-right">
					<div class="filter">
						<select class="filter-select">
							<option value="id" selected>ID</option>
							<option value="职称">职称</option>
							<option value="更新时间">更新时间</option>
						</select>
						<button type="button" class="btn btn-default"><i class="fa fa-sort"></i>排序</button>
					</div>
				</div>-->
			</div>

			<table class="table-list">
				<thead>
					<tr>
						<th><input type="checkbox" class="checked-all">全选</th>
						<th>头像</th>
						<th>教师姓名</th>
						<th>教师职称</th>
						<th>更新时间</th>
						<th>详情</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
						<td><input type="checkbox" name="checked_list"></td>
						<td><img src="<?php echo ($v["head"]); ?>" width="30" height="42" alt=""></td>
						<td><?php echo ($v["name"]); ?></td>
						<td><?php echo ($v["level"]); ?></td>
						<td><?php echo ($v["date"]); ?></td>
						<td><a href="javascript:;" class="btn-view">查看</a></td>
						<td>
							<button type="button" class="btn btn-default btn-edit"><i class="fa fa-pencil"></i>编辑</button>
							<button type="button" class="btn btn-danger btn-trash"><i class="fa fa-trash"></i>删除</button>
							<input type="hidden" class="uid" value="<?php echo ($v["id"]); ?>">
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
				<td class="tr">教师姓名：</td>
				<td><input type="text" id="uname" class="edit-field js_disabled" value=""></td>
				<td rowspan="5" class="tc">
					<div class="edit-preview">
						<img id="avatar" src="" width="100" height="140">
					</div>
					<span class="edit-upload">
						<input type="file" id="edit_upload" class="js_disabled" name="upload_avatar"><span class="text">上传头像</span>
					</span>
					<p class="notice">注：图片尺寸比例5:7，推荐尺寸300像素*420像素</p>
				</td>
			</tr>
			<tr>
				<td class="tr">教师性别：</td>
				<td>
					<input type="radio" class="js_disabled" name="gender" value="男" checked>男
					<input type="radio" class="js_disabled" name="gender" value="女">女
				</td>
			</tr>
			<tr>
				<td class="tr">出生日期：</td>
				<td><input type="text" id="birth" class="edit-field js_disabled" value="" placeholder="点击选择日期"></td>
			</tr>
			<tr>
				<td class="tr">家庭住址：</td>
				<td><input type="text" id="addr" class="edit-field js_disabled" value=""></td>
			</tr>
			<tr>
				<td class="tr">教师职称：</td>
				<td><input type="text" id="post" class="edit-field js_disabled" value=""><span class="notice">注：多个职称以“、”隔开</span></td>
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
	<!--<script src="/xibei/Public/admin/js/teachers.js"></script>-->

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
                    '<td><img src="' + item.head + '" width="30" height="42" alt=""></td>' +
                    '<td>' + item.name + '</td>' +
                    '<td>' + item.level + '</td>' +
                    '<td>' + item.date + '</td>' +
                    '<td><a href="javascript:;" class="btn-view">查看</a></td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-default btn-edit"><i class="fa fa-pencil"></i>编辑</button>' +
                    '<button type="button" class="btn btn-danger btn-trash"><i class="fa fa-trash"></i>删除</button>' +
                    '<input type="hidden" class="uid" value="' + item.id + '">' +
                    '</td>' +
                    '</tr>';
            result.push(str);
        }
        $('.table-list tbody').html(result.join(''));
    }

    // 更新数据
    function updateData(data) {
        var curRow =
                '<tr>' +
                '<td><input type="checkbox" name="checked_list"></td>' +
                '<td><img src="' + data.head + '" width="30" height="42" alt=""></td>' +
                '<td>' + data.name + '</td>' +
                '<td>' + data.level + '</td>' +
                '<td>' + data.date + '</td>' +
                '<td><a href="javascript:;" class="btn-view">查看</a></td>' +
                '<td>' +
                '<button type="button" class="btn btn-default btn-edit"><i class="fa fa-pencil"></i>编辑</button>' +
                '<button type="button" class="btn btn-danger btn-trash"><i class="fa fa-trash"></i>删除</button>' +
                '<input type="hidden" class="uid" value="' + data.id + '">' +
                '</td>' +
                '</tr>';
        $('.table-list .uid').each(function(){
            if ($(this).val() == data.id) {
                $(this).closest('tr').remove();
            }
        });
        $('.table-list tbody').prepend(curRow);
    }

    // 重置表格数据
    function resetEditTableData() {
        var $table = $('.table-edit');
        $table.find('.js_disabled').prop('disabled', false);
        $table.find('.edit-field').each(function(){
            $(this).val('');
        });
        $table.find('.edit-preview img').attr('src', '').hide();
        $table.find('.edit-upload').show().find('.text').text('上传头像');
        $table.find('[name="gender"]').each(function(){
            $(this).prop('checked', $(this).val() == 'boy');
        });
        UM.getEditor('myEditor').setEnabled();
        UM.getEditor('myEditor').setContent('<p style="color:#999;">输入教师详情介绍</p>');
        $('.btn-confirm').show();
    }

    // 设置表格数据
    function setEditTableData(data, isView) {
        $('#uname').val(data.name);
        $('#avatar').attr('src', data.head);
        $('#birth').val(data.birth);
        $('#addr').val(data.addr);
        $('#post').val(data.level);
        $('[name="gender"]').each(function(){
            $(this).prop('checked', $(this).val() == data.gender);
        });
        UM.getEditor('myEditor').setContent(((data.content == '' || data.content == null) || data.content == null) ? '<p style="color:#999;">输入教师详情介绍</p>' : data.content);
        if (isView === false) {
            $('.btn-confirm').attr('uid', data.id);
            $('.table-edit').find('.edit-upload').show().find('.text').text('更新头像');
            $('.btn-confirm').show();
           /* $('.edit-field').each(function(){
                $(this).prop('disabled');
            });*/
            $('.js_disabled').prop('disabled', false);
            UM.getEditor('myEditor').setEnabled();
        } else {
            $('.table-edit').find('.edit-upload').hide();
            $('.btn-confirm').hide();
            $('.js_disabled').prop('disabled', true);
            UM.getEditor('myEditor').setDisabled();
        }
    }

    // 获取编辑区内容
    function getEditData() {
        return {
            name: $('#uname').val(),//名字
            avatar: $('#avatar').attr('src'),//头像
            birth: $('#birth').val(),//生日
            post: $('#post').val(),//职务
            gender: $('[name="gender"]:checked').val(),//性别
            addr: $('#addr').val(),//住址
            content: UM.getEditor('myEditor').getContent(),//内容
            id: $('.btn-confirm').attr('uid')
        };
    }


    (function(){

        var um = UM.getEditor('myEditor', {
                toolbar: ["undo redo | bold italic underline strikethrough | forecolor backcolor | removeformat |", "insertorderedlist insertunorderedlist |  paragraph fontfamily fontsize", "| justifyleft justifycenter justifyright justifyjustify |", "link | emotion image", "source |"]
            });
        um.setWidth('98%');
        um.setHeight(250);


        // 切换搜索类型及搜索框placeholder
        $('.search-row .select').change(function(){
            if ($(this).val() == '全部') {
                $('.search-field').attr('placeholder', '输入教师名字、职称');
                return false;
            }
            $('.search-field').attr('placeholder', '输入教师' + $(this).val());
        });

        // 搜索
        $('.js_search').click(function(){
            var searchType = $('.search-row :selected').val(),
                    searchTxt = $('.search-field').val();
            $.ajax({
                type: 'POST',
                url: "<?php echo U('Admin/tea_search');?>",
                data: {type: searchType, val: searchTxt},
                success: function(data){
                    addTableRow(data);
                }
            });
        });

        // 排序

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
                checkedIds.push($(this).closest('tr').find('.uid').val());
            });
            if (checkedIds.length > 0) {
                $(window.parent)[0].layer.confirm('确定要删除所有选择的数据项？', {
                    btns: ['确定', '取消']
                }, function(i){
                    $.ajax({
                     type: 'POST',
                     url: "<?php echo U('Admin/tea_text');?>",
                     data: {id: checkedIds},
                     success: function(data){ // data包含要删除的一个或多个id(数组)
                     if (data) {
                     $('.uid').each(function(){
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

        // 新增教师
        $('.btn-add').click(function(){
            resetEditTableData();
            $('.js_pageshow').fadeOut('fast', function(){
                $('.table-edit').fadeIn('fast').find('.btn-confirm').attr('data-state', 'add');
                $('.breadcrumb').append('<li class="active"><i class="fa fa-angle-right"></i>新增</li>');
            });
        });

        // 编辑与删除
        $('.table-list').on('click', '.btn', function(){
            var $this = $(this);
            var uid = $this.closest('tr').find('.uid').val();
            if ($this.is('.btn-edit')) {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo U('Admin/tea_editor');?>",  // 编辑 => 请求当前uid相关的数据
                    data: {id: uid},
                    success: function(data) {
                        if (data) {
                           // console.log(data)
                            $('.js_pageshow').fadeOut('fast', function(){
                                $('.table-edit').fadeIn('fast').find('.btn-confirm').attr('data-state', 'edit');
                                setEditTableData(data, false);
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
                        url: "<?php echo U('Admin/tea_ext');?>",  // 删除当前数据提交的url
                        data: {id: uid},
                        success: function(data){  // 是否删除成功的状态
                            if (data) {
                                $('.table-list .uid').each(function(){
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

        // 查看
        $('.table-list').on('click', '.btn-view', function(){
            var uid = $(this).closest('tr').find('.uid').val();
            $.ajax({
                type: 'POST',
                url: "<?php echo U('Admin/teachers_view');?>",
                data: {id: uid},
                success: function(data) {
                    //console.log(data);
                    if (data) {
                     $('.js_pageshow').fadeOut('fast', function(){
                     $('.table-edit').fadeIn('fast').find('.btn-confirm').attr('data-state', 'edit');
                     setEditTableData(data, true);
                     });
                     }
                }
            });
            return false;
        });


        // 提交表格
        $('.btn-confirm').click(function(){
            var state = $(this).attr('data-state'),
                    url = '';
            if (state == 'edit') {  // 编辑
                url = "<?php echo U('Admin/teachers_edit');?>";  // 编辑教师提交的url
            } else if (state == 'add') {  // 新增
                url = "<?php echo U('Admin/teachers_add');?>";  // 新增教师提交的url
            }

            if (url != '') {
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: getEditData(),
                    success: function(data){
                        if (data) {
                            console.log(data)
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
            });
        });


        // 图片上传
        $('#edit_upload').change(function(){
            var el = this;
            $.uploadFile({
                selector: el,
                frameName: $(el).attr('name'),
                url: "<?php echo U('Admin/upload');?>",
                format: ['png', 'jpg', 'jpeg', 'gif'],
                callBack: function(data){
                    //console.log(data)
                    $(el).val('');
                    $('.edit-upload .text').text('上传中...');
                    var img = new Image();
                    img.src = data;
                    img.onload = function(){
                        $('#avatar').attr('src', data).show();
                        $('.edit-upload .text').text('更新头像');
                    }
                }
            });
        });

        // 选择日期
        laydate({
            elem: '#birth'
        });
    })();





</script>