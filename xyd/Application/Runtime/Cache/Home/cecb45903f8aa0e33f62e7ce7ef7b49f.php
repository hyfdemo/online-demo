<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>学校新闻</title>
	<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/flexible.css">
	<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/swiper-3.4.1.min.css">
	<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/style_two.css">
	<script type="text/javascript" src="/xibei/Public/admin/js/flexible.js"></script>
	<script type="text/javascript" src="/xibei/Public/admin/js/jquery.min.js"></script>
</head>
<style type="text/css">
    .main{width:100%;}
    .list_left{width: 20%;height: 2rem;overflow: hidden;float: left;}
    .list_right{width: 77%;height: 2rem;float: left;padding-left: 3%;}
    .list{padding: 0.2rem 0.2rem 0.2rem 0.2rem;}
    .list a{display: block;}
    .list_right_top{width: 100%;height: 1rem;}
    .list_right_top_con{width: 65%;height: 1.2rem;float: left;text-align: left;font-size: 30px;color: #070707;line-height: 1.6rem;}
    .list_right_top_time{width: 30%;height: 1rem;float: right;text-align: right;font-size: 24px;line-height: 0.95rem;color: #7a7a7a;}
    .list_right_bottom{width: 80%;height: 0.6rem;font-size: 24px;color: #999;}
    .im_news1{border-bottom: 3px solid #4795c6;}
    [data-dpr="1"] .list_right_top_con{font-size:15px;} 
    [data-dpr="2"] .list_right_top_con{font-size:30px;}
    [data-dpr="3"] .list_right_top_con{font-size:45px;}
    [data-dpr="1"] .list_right_top_time{font-size:12px;} 
    [data-dpr="2"] .list_right_top_time{font-size:24px;}
    [data-dpr="3"] .list_right_top_time{font-size:36px;}
    [data-dpr="1"] .list_right_bottom{font-size:12px;} 
    [data-dpr="2"] .list_right_bottom{font-size:24px;}
    [data-dpr="3"] .list_right_bottom{font-size:36px;}
</style>
<body>
<div id="container">
	<div class="header_2">
		<div class="header_news">新闻快讯</div>
		<div class="tab">
			<ul class="ul_news">
				<li class="im_news1">最新新闻</li>
				<li>教育新闻</li>
				<li>党政新闻</li> 
				<li>领导新闻</li>
				<div class="clear"></div>
			</ul>
		</div>
	</div>
	<div class="con">
		<div class="main main_1">
			<div class="swiper-container swiper-container-h">
		        <div class="swiper-wrapper">
                    <?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
		            		<img src="<?php echo ($v["banner_pos"]); ?>" style="height: 4.5rem;">
		            	</div><?php endforeach; endif; else: echo "" ;endif; ?>
		        </div>
		        <div class="swiper-pagination swiper-pagination-h"></div>
		    </div>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="list">
	                <a href="/xibei/Index/showNews?id=<?php echo ($v["id"]); ?>">
			    		<!-- <span><?php echo ($v["header"]); ?></span>
                        <p class="date">(<?php echo ($v["time"]); ?>)</p> -->
                        <div class="list_left">
                            <img src="<?php echo ($v["img"]); ?>" style="height: 2rem;">
                        </div>
                        <div class="list_right">
                            <div class="list_right_top">
                                <div class="list_right_top_con tetx_no"><?php echo ($v["header"]); ?></div>
                                <div class="list_right_top_time"><?php echo ($v["time"]); ?></div>
                                <div class="clear"></div>
                            </div>
                            <div class="list_right_bottom tetx_no"><?php echo ($v["content"]); ?></div>
                        </div>
                        <div class="clear"></div>
	                </a>
		    	</div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
		<div class="main main_2">
			<div class="swiper-container swiper-container-i">
		        <div class="swiper-wrapper">
                    <?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
                        	<img src="<?php echo ($v["banner_pos"]); ?>" style="height: 4.5rem;">
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
		        </div>
		        <div class="swiper-pagination swiper-pagination-i"></div>
		    </div>
            <?php if(is_array($nav_j)): $i = 0; $__LIST__ = $nav_j;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?><div class="list">
	                <a href="/xibei/Index/showNews?id=<?php echo ($s["id"]); ?>">
			    		<!-- <span><?php echo ($s["header"]); ?></span>
                        <p class="date">(<?php echo ($s["time"]); ?>)</p> -->
                        <div class="list_left">
                            <img src="<?php echo ($s["img"]); ?>" style="height: 2rem;">
                        </div>
                        <div class="list_right">
                            <div class="list_right_top">
                                <div class="list_right_top_con tetx_no"><?php echo ($s["header"]); ?></div>
                                <div class="list_right_top_time"><?php echo ($s["time"]); ?></div>
                                <div class="clear"></div>
                            </div>
                            <div class="list_right_bottom tetx_no"><?php echo ($s["content"]); ?></div>
                        </div>
                        <div class="clear"></div>
	                </a>
		    	</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="main main_3">
			<div class="swiper-container swiper-container-j">
		        <div class="swiper-wrapper">
                    <?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
                        	<img src="<?php echo ($v["banner_pos"]); ?>" style="height: 4.5rem;">
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
		        </div>
		        <div class="swiper-pagination swiper-pagination-j"></div>
	        </div>
            <?php if(is_array($nav_z)): $i = 0; $__LIST__ = $nav_z;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="list">
                    <a href="/xibei/Index/showNews?id=<?php echo ($v["id"]); ?>">
                    	<!-- <span><?php echo ($v["header"]); ?></span>
                        <p class="date">(<?php echo ($v["time"]); ?>)</p> -->
                        <div class="list_left">
                            <img src="<?php echo ($v["img"]); ?>" style="height: 2rem;">
                        </div>
                        <div class="list_right">
                            <div class="list_right_top">
                                <div class="list_right_top_con tetx_no"><?php echo ($v["header"]); ?></div>
                                <div class="list_right_top_time"><?php echo ($v["time"]); ?></div>
                                <div class="clear"></div>
                            </div>
                            <div class="list_right_bottom tetx_no"><?php echo ($v["content"]); ?></div>
                        </div>
                        <div class="clear"></div>
                    </a>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="main main_4">
			<div class="swiper-container swiper-container-k">
		        <div class="swiper-wrapper">
                    <?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
                        	<img src="<?php echo ($v["banner_pos"]); ?>" style="height: 4.5rem;">
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="swiper-pagination swiper-pagination-k"></div>
            </div>
            <?php if(is_array($nav_l)): $i = 0; $__LIST__ = $nav_l;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="list">
                    <a href="/xibei/Index/showNews?id=<?php echo ($v["id"]); ?>">
                    	<!-- <span><?php echo ($v["header"]); ?></span>
                        <p class="date">(<?php echo ($v["time"]); ?>)</p> -->
                        <div class="list_left">
                            <img src="<?php echo ($v["img"]); ?>" style="height: 2rem;">
                        </div>
                        <div class="list_right">
                            <div class="list_right_top">
                                <div class="list_right_top_con tetx_no"><?php echo ($v["header"]); ?></div>
                                <div class="list_right_top_time"><?php echo ($v["time"]); ?></div>
                                <div class="clear"></div>
                            </div>
                            <div class="list_right_bottom tetx_no"><?php echo ($v["content"]); ?></div>
                        </div>
                        <div class="clear"></div>
                    </a>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>
</div>
</body>
<script type="text/javascript" src="/xibei/Public/admin/js/swiper-3.4.1.min.js"></script>
<script>
	var swiperH = new Swiper('.swiper-container-h', {
        pagination: '.swiper-pagination-h',
        paginationClickable: true,
        spaceBetween: 50
    });

	var swiperI = new Swiper('.swiper-container-i', {
        pagination: '.swiper-pagination-i',
        paginationClickable: true,
        spaceBetween: 50
    });

	var swiperJ = new Swiper('.swiper-container-j', {
        pagination: '.swiper-pagination-j',
        paginationClickable: true,
        spaceBetween: 50
    });

	var swiperK = new Swiper('.swiper-container-k', {
        pagination: '.swiper-pagination-k',
        paginationClickable: true,
        spaceBetween: 50
    });
	
    $("li").click(function(){
    	$(this).css("border-bottom","3px solid #47c64d").siblings().css("border-bottom","none")
    	$(".main").hide().eq($(this).index()).show();
    	// $(".main").eq($(this).index()).show();
    })
    $(document).ready(function(){
    	$(".main_2").css("display","none");
    	$(".main_3").css("display","none");
    	$(".main_4").css("display","none");
    })
</script>
</html>