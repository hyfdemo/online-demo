<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学校微信公众号后台管理</title>
	<meta name="keywords" content="关键字">
	<meta name="description" content="描述">
	<link rel="stylesheet" href="/xibei/Public/admin/css/main.css">
	<link rel="stylesheet" href="/xibei/Public/admin/css/font-awesome.min.css">
	<link rel="stylesheet" href="/xibei/Public/admin/plugins/layer/skin/default/layer.css">
	<!--[if lte IE 9]> 
	<link rel="stylesheet" href="/xibei/Public/admin/css/ie_style.css">
	<![endif]--> 
	<script src="/xibei/Public/admin/js/jquery.min.js"></script>
	<script>
		checkIE();
		function checkIE() {
			if ($.browser.msie) {
				var version = parseInt($.browser.version);
				if (version < 8) {
					alert('浏览器版本过低，请更新版本或使用其他浏览器!');
					window.location.href = './index';
					return false;
				}
				alert('为了更好的体验，建议在其他浏览器里操作！');
			}
		}
	</script>
</head>
<body>
	<div class="header">
		<h1 class="header-logo">
			<a href="./template">学校微信后台管理</a>
		</h1>
		<div class="header-panel">
			<ul class="header-custom-menu">
				<li class="user">
					<a href="javascript:;"><i class="fa fa-user-o"></i>你好 管理员</a>
				</li>
				<!-- <li class="switch">
					<a href="javascript:;"><i class="fa fa-compress"></i>隐藏菜单</a>
				</li> -->
				<!--<li class="changepwd">
					<a href="#"><i class="fa fa-lock"></i>修改密码</a>
				</li>-->
				<li class="signout">
					<a href="./index"><i class="fa fa-sign-out"></i>安全退出</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="sidebar">
		<div class="sidebar-menu">
			<ul class="sidebar-menu-list">
				<li class="header">菜单导航</li>
				<li><a href="javascript:;" data-href="./banner"><i class="fa fa-picture-o"></i>banner管理</a></li>
				<li><a href="javascript:;" data-href="./introl"><i class="fa fa-history"></i>学校介绍</a></li>
				<li><a href="javascript:;" data-href="./honor"><i class="fa fa-trophy"></i>学校荣誉</a></li>
				<li><a href="javascript:;" data-href="./leaders"><i class="fa fa-users"></i>领导班子</a></li>
				<li><a href="javascript:;" data-href="./students"><i class="fa fa-graduation-cap"></i>学生成就</a></li>
				<li><a href="javascript:;" data-href="./teachers"><i class="fa fa-user-o"></i>教师风采</a></li>
				<li><a href="javascript:;" data-href="./timetable"><i class="fa fa-clock-o"></i>作息时间</a></li>
				<li><a href="javascript:;" data-href="./course"><i class="fa fa-file-text-o"></i>课程介绍</a></li>
				<li><a href="javascript:;" data-href="./activities"><i class="fa fa-tags"></i>学校活动</a></li>
				<li><a href="javascript:;" data-href="./news"><i class="fa fa-newspaper-o"></i>学校新闻</a></li>
				<li class="current"><a href="javascript:;" data-href="./createView"><i class="fa fa-pencil-square-o"></i>消息推送</a></li>
				<li><a href="javascript:;" data-href="./queryScore"><i class="fa fa-table"></i>成绩查询</a></li>
                <li><a href="javascript:;" data-href="./editNewsCate"><i class="fa fa-table"></i>新闻分类</a></li>
			</ul>
		</div>
	</div>
	<div class="main">
		<div class="main-content">
			<div class="loading">
				<img src="/xibei/Public/admin/images/loading.gif">
			</div>
			<iframe src="./createView" class="js_iframe" frameborder="0"></iframe>
		</div>
	</div>

	
	<script src="/xibei/Public/admin/plugins/layer/layer.js"></script>
	<script>
		$(function(){
			loadIframe();

			/*$('.switch').click(function(){
				var $sidebar = $('.sidebar'),
					$main = $('.main');
				if ($sidebar.width() !== 0) {
					$(this).children('a').html('<i class="fa fa-expand"></i>显示菜单');
					$sidebar.animate({width: 0, opacity: 0}, 'fast');
					$main.animate({left: 0}, 'fast');
				} else {
					$(this).children('a').html('<i class="fa fa-compress"></i>隐藏菜单');
					$sidebar.animate({width: 220, opacity: 1}, 'fast');
					$main.animate({left: 220}, 'fast');
				}
			});*/
			$('.sidebar-menu-list').on('click', 'li>a', function(){
				var dataHref = $(this).attr('data-href');
				if (!dataHref || dataHref == '') { return false; }
				$(this).parent('li').addClass('current').siblings('li.current').removeClass('current');
				$('.js_iframe').attr('src', dataHref);
				loadIframe();
				return false;
			});
		});


		function loadIframe() {
			$('.loading').show();
			$('.js_iframe').hide();
			$('.js_iframe').on('load', function(){
				var $this = $(this);
				$('.loading').fadeOut('fast', function() {
					$this.fadeIn('fast');
				});
				
			});
		}


	</script>
</body>
</html>