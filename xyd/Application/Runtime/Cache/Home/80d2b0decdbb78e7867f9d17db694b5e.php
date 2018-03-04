<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>成绩查询</title>
	<!-- <link rel="stylesheet" type="text/css" href="Css/flexible.css"> -->
	<link rel="stylesheet" type="text/css" href="/xibei/Public/admin/css/style_two.css">
	<!-- <script type="text/javascript" src="Js/flexible.js"></script> -->
	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
</head>
<script type="text/javascript"> 
    (function(win, doc){
        var docEl = doc.documentElement,
                resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
                recalc = function(){
                    var clientWidth = docEl.getBoundingClientRect().width;
                    if (!clientWidth) { return; }
                    if (clientWidth >= 640) {
                        docEl.style.fontSize = '64px';
                    } else {
                        docEl.style.fontSize = clientWidth / 6.4 + 'px';
                    }
                }; 
        if (!docEl.addEventListener) { return; }
        win.addEventListener(resizeEvt, recalc, false);
        doc.addEventListener('DOMContentLoaded', recalc, false);
    })(window, document);
</script>
<style type="text/css">
	.header{height: auto;margin-bottom: 1.2rem;}
	.header_div{padding-left: 2%;}
	.item{padding-left: 2%;padding-top: 0;}
	/*成绩查询*/
	.main_div2_con{width: 100%;height: 0.8rem;padding: 0.2rem 0;margin: 0 auto;font-size: 0.4rem;}
	.xueqi{width: 29%;height: 0.6rem;float: left;line-height: 0.78rem;color: #333333}
	.xuan{width: 71%;height: 0.6rem;float: left;line-height: 0.6rem;}
	.im_select{width: 100%;height: 0.6rem;line-height: 0.6rem;color: #999999;border-radius: 3px;border:1px solid #999999;}
	.im_input{width: 98%;height: 0.52rem;line-height: 0.6rem;color: #999999;border-radius: 3px;border: 1px solid #999999;padding-left: 2%;}
	.pad_err{font-size: 0.1rem;color: red;display: none;}
	.btn{width: 100%;text-align: center;color: #fff;padding: 0.16rem;font-size: 0.35rem;background-color: #408bd0;border: none;}

</style>
<body>
<div id="container">
	<div class="header">
		<div class="header_div">成绩查询</div>
		<p class="item"><?php echo ($date); ?></p>
		<p class="item clor">宣汉西北小学</p>
	</div>
	<div class="main">
		<div class="main_div2">
			<form action="/xibei/Index/chengji_jg" method="post" class="query_frm">
				<div class="main_div2_con">
					<div class="xueqi">学&nbsp;期:</div>
					<div class="xuan">
						<select class="im_select" name="semester">
                            <?php if(is_array($term)): $i = 0; $__LIST__ = $term;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option><?php echo ($v["semester"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
				</div>
				<div class="main_div2_con cdn">
					<div class="xueqi">学&nbsp;号:</div>
					<div class="xuan">
						<input class="im_input" id="xuehao" type="text" name="student">
						<span class="pad_err pad_err1">学号错误</span>
					</div>
				</div>
				<div class="main_div2_con">
					<div class="xueqi">密&nbsp;码:</div>
					<div class="xuan">
						<input class="im_input" type="password" name="pwd" id="pwd">
						<span class="pad_err">密码错误</span>
					</div>
				</div>
				<input class="btn" type="button" name="" value="查&nbsp;询">
			</form>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
$(".cdn").on("input","#xuehao",function(){
	var reg = /^[0-9]*$/; 
	var v = $(this).val();
	if(!reg.test(v)){
		$("#xuehao").val("");
	}
});

        $('.btn').click(function(){

            var  $student=$('#xuehao').val();
            var $pwd=$('#pwd').val();
            if ($student == '' || $pwd == '') {
                return false;
            }
            $('.query_frm').submit();
        });






</script>
</html>