/**
 * Created by Administrator on 2016/10/12.
 */
$(function(){
	$('#header').load('data/header.php',function(){
		navText('网站首页');
    });
	$('#footer').load('data/footer.php',function(){
        inputText();
    });
    //异步加载数据新闻列表
    $.ajax({
        type: "GET",
        url: "data/index_data.json",
        success: function(msg){
            var html='';
            $.each(msg,function(i,val){
                html+=`
                <div class="casei">
					<div class="img_box">
						<div class="front">
						<img src="images/${val.pic}">
						</div>
						<div class="blak">
							<img src="images/heide.png">
						</div>
					</div>
					<h3>${val.title}</h3>
					<p>${val.cont}</p>
				</div>
                `;
            });
            $(".case").html(html);
        }
    });
    //news异步数据加载
    $.ajax({
       type:"GET",
        url:"data/index_news_data.json",
        success:function(msg){
            console.log(msg);
            var newsl='';
            var newsr='';
            $.each(msg,function(i,val){
                var size = msg.length/2;
                if(i<size){
                    newsl+=`
                <div class="newsborder">
					<h3><a href="news_cont.html?nid=${val.nid}">${val.title}</a></h3>
					<p><a href="#">${val.cont}</a></p>
				</div>
                    `;
                }else{
                    newsr+=`
                    <div class="newsborder">
                        <h3><a href="news_cont.html?nid=${val.nid}">${val.title}</a></h3>
                        <p><a href="#">${val.cont}</a></p>
                    </div>
                    `;
                }

            });
            $('.cases .lt').html(newsl);
            $('.cases .gt').html(newsr);
        }
    });
    //bannder部分
    function banner(){
        var imgsize = $(window).width();
        $('.bg .banner').css({
            width:imgsize+'px'
        });
        $('.banner .img li a>img').css({
            width:imgsize+'px'
        });
        var i=0;//控制无缝拼接
        //克隆一个元素可调整css做无缝拼接
        var clone=$(".banner .img li").first().clone();
        //追加克隆的元素
        $(".banner .img").append(clone);
        //获取小圆点的数量
        var size = $(".banner .img li").size();
        //循环动态添加小圆点
        for(var j=0;j<size-1;j++){
            $(".banner .num").append("<li></li>")
        }
        //当前选中得到小圆点添加class样式
        $(".banner .num li").first().addClass("on")

        //鼠标移到圆点的效果切换
        $(".banner .num li").hover(function(){
            var index=$(this).index();
            i=index;
            $(".banner .img").stop().animate({left:-index*imgsize},500)
            $(this).addClass('on').siblings().removeClass('on')
        })

        // 自动轮播
        var t=setInterval(function () {
            i++;
            move()
        },4000);

        // 对定时器操作鼠标移上去停止
        $(".banner").hover(function(){
            clearInterval(t);
        },function(){
            t=setInterval(function () {
                i++;
                move()
            },4000);
        });

        //封装轮播的方法
        function move(){
            if(i==size){
                $(".banner .img").css({left:0})
                i=1;
            }
            if(i==-1){
                $(".banner .img").css({left:-(size-1)*imgsize})
                i=size-2;
            }

            $(".banner .img").stop().animate({left:-i*imgsize},500)

            if(i==size-1){
                $(".banner .num li").eq(0).addClass('on').siblings().removeClass('on')
            }else{
                $(".banner .num li").eq(i).addClass('on').siblings().removeClass('on')
            }

        }
        //调用左边
        $(".banner .btn_l").click(function(){
            i++;
            move();
        })

        //调用右边
        $(".banner .btn_r").click(function(){
            i--;
            move();
        })
    }
    banner();
    //banner以下部分
    $(".link .button").hover(function(){
        var title = $(this).attr("data-title");
        $(".tip em").text(title);
        var pos= $(this).offset().left;
        var dis = ($(".tip").outerWidth()-$(this).outerWidth())/2;
        var f = pos-dis;
        $(".tip").css({"left":f+"px"}).animate({"top":762,"opacity":1},300);
    },function(){
        $(".tip").animate({"top":160,"opacity":0},300);
    });

})