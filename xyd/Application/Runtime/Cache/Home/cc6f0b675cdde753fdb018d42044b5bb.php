<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学校微信公众号后台管理</title>
	<meta name="keywords" content="关键字">
	<meta name="description" content="描述">
	<link rel="stylesheet" href="/xibei/Public/admin/css/main.css">
	<link rel="stylesheet" href="/xibei/Public/admin/css/font-awesome.min.css">
</head>
<body>
	<div class="iframe-header">
		<ul class="breadcrumb">
			<li><i class="fa fa-home"></i>首页</li>
			<li><i class="fa fa-angle-right"></i>banner管理</li>
		</ul>
	</div>
	<div class="iframe-content p20">
		<div class="banner-wrapper">
			<div class="banner-notice">
				<p>banner图片最多可上传6张。推荐尺寸800像素*500像素。</p>
			</div>
			<ul class="banner-list">
                <?php if($data != nell): if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="banner-view-item">
					<img src="<?php echo ($v["banner_pos"]); ?>">
					<div class="delete-mask">
						<a href="javascript:;" class="btn-delete" title="删除"><i class="fa fa-trash"></i></a>
						<input type="hidden" class="bid" value="<?php echo ($v["id"]); ?>">
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
				<li class="banner-upload">
					<div class="uploadbox">
						<i class="fa fa-upload"></i>
						<p class="text">点击上传图片</p>
						<input type="file" name="upload_banner" id="upload">
					</div>
				</li>
			</ul>
		</div>
	</div>

	<script src="/xibei/Public/admin/js/jquery.min.js"></script>
	<script src="/xibei/Public/admin/js/common.js"></script>
	<script>
		(function(){

			// 删除
			$('.banner-list').on('click', '.btn-delete', function(){
				var $this = $(this),
					bid = $this.siblings('.bid').val();
				$(window.parent)[0].layer.confirm('确定要删除该图片？', {
					btns: ['确定', '取消']
				}, function(i){
					$.ajax({
						type: 'POST',
						url: "<?php echo U('Admin/banner_ext');?>",
						data: {id: bid},
						success: function(data){  // data => 1成功
							if (data == 1) {
								$(window.parent)[0].layer.close(i);
								$(window.parent)[0].layer.msg('已删除！');
								$this.closest('li').remove();
								$('.banner-upload').css({'display': $('.banner-view-item').length > 5 ? 'none' : 'block'});
							}
						}
					});
				}, function(){});
			});



			// 上传
			$('#upload').change(function(){
				var self = this;
				$.uploadFile({
					selector: self,
					frameName: $(self).attr('name'),
					url: "<?php echo U('Admin/banner_img');?>"/*'upload.php'*/,
					format: ['jpg', 'jpeg', 'gif', 'png'],
					callBack: function(data){
						var rt = {};
                        var arr = data.replace(/[\}|\{]*/g, '').split(',');
                        for(var i = 0; i < arr.length; i++) {
                        	var item = arr[i].split(':');
                        	rt[item[0]] = item[1];
                        	if (item[2]) {
                        		rt[item[0]] = item[1] + ':' + item[2];
                        	}
                        }
						$(self).val('');
						var str = 
							'<li class="banner-view-item">' +
								'<img src="' + rt.banner_pos + '">' +
								'<div class="delete-mask">' +
									'<a href="javascript:;" class="btn-delete" title="删除"><i class="fa fa-trash"></i></a>' +
									'<input type="hidden" class="bid" value="'+ rt.id+'">' +
								'</div>' +
							'</li>';
						$(self).closest('li').before(str);
						$('.banner-upload').css({'display': $('.banner-view-item').length > 5 ? 'none' : 'block'});
					}
				});
			});


		})();
	</script>
</body>
</html>