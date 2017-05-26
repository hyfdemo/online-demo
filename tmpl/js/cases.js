/**
 * Created by Administrator on 2016/10/12.
 */
$(function(){
	$('#header').load('data/header.php',function(){
		navText('成功案例');
    });
	$('#footer').load('data/footer.php',function(){
        inputText();
    });
})
$(document).ready(function(){
    $(window).on("load",function(){
        imgLocation();
        var dataCont =[
            {'src':'1-1406240G4560-L.jpg','title':'深圳汇洁集团股份有限公','btn':'企业网站','con':'深圳汇洁集团股份有限公司（以下简称汇洁股份或公司），前身为深圳市曼妮芬针织品有限公司，2011年由有限责任公'},
            {'src':'1-1406240G0090-L.jpg','title':'深圳汇洁集团股份有限公','btn':'单位组织','con':'深圳汇洁集团股份有限公司（以下简称汇洁股份或公司），前身为深圳市曼妮芬针织品有限公司，2011年由有限责任公'},
            {'src':'1-1406240AJ7.jpg','title':'深圳汇洁集团股份有限公','btn':'微信平台','con':'深圳汇洁集团股份有限公司（以下简称汇洁股份或公司），前身为深圳市曼妮芬针织品有限公司，2011年由有限责任公'},
            {'src':'1-1406240G0090-L.jpg','title':'深圳汇洁集团股份有限公','btn':'商城网站֯','con':'深圳汇洁集团股份有限公司（以下简称汇洁股份或公司），前身为深圳市曼妮芬针织品有限公司，2011年由有限责任公'},
            {'src':'show.png','title':'深圳汇洁集团股份有限公','btn':'外贸网站','con':'深圳汇洁集团股份有限公司（以下简称汇洁股份或公司），前身为深圳市曼妮芬针织品有限公司，2011年由有限责任公'},
            {'src':'1-1406240G4560-L.jpg','title':'深圳汇洁集团股份有限公','btn':'企业网站','con':'深圳汇洁集团股份有限公司（以下简称汇洁股份或公司），前身为深圳市曼妮芬针织品有限公司，2011年由有限责任公'},
            {'src':'1-1406240G0090-L.jpg','title':'深圳汇洁集团股份有限公','btn':'外贸组织','con':'深圳汇洁集团股份有限公司（以下简称汇洁股份或公司），前身为深圳市曼妮芬针织品有限公司，2011年由有限责任公'},
            {'src':'1-1406240AJ7.jpg','title':'深圳汇洁集团股份有限公','btn':'微信平台','con':'深圳汇洁集团股份有限公司（以下简称汇洁股份或公司），前身为深圳市曼妮芬针织品有限公司，2011年由有限责任公'},
            {'src':'1-1406240G0090-L.jpg','title':'深圳汇洁集团股份有限公','btn':'单位组织֯','con':'深圳汇洁集团股份有限公司（以下简称汇洁股份或公司），前身为深圳市曼妮芬针织品有限公司，2011年由有限责任公'},
            {'src':'show.png','title':'深圳汇洁集团股份有限公','btn':'商城网站','con':'深圳汇洁集团股份有限公司（以下简称汇洁股份或公司），前身为深圳市曼妮芬针织品有限公司，2011年由有限责任公'}
        ];
        window.onscroll = function(){
            if(scrollside()){
                console.log(scrollside());
//                        var html='';
                $.each(dataCont,function(i,val){
                    var datame = dataCont[i];
                    var box = $('<div>').addClass('box').appendTo($('.cases-box'));
                    var img = $('<img>').attr('src','images/'+datame.src).appendTo(box);
                    var boxLm = $('<div>').addClass('box-lm').appendTo(box);
                    $('<p>').html(datame.title).appendTo(boxLm);
                    $('<a>').html(datame.btn).appendTo(boxLm);
                    $('<div>').addClass('box-txt').html(datame.con).appendTo(box);
                });
                imgLocation();
            }
        }
    });
});

function scrollside(){
    var box = $(".box");
    var lastboxHeight = box.last().get(0).offsetTop+Math.floor(box.last().height()/2);
    var documentHeight = $(document).width();
    var footerHeight = $('#footer').height();
    //console.log(footerHeight);
    var scrollHeight = $(window).scrollTop();
    console.log(scrollHeight);
    return (lastboxHeight<(scrollHeight-footerHeight)+documentHeight)?true:false;
}

function imgLocation(){
    var box = $('.box');
    var boxWidth = box.eq(0).width();
    var num = Math.floor($('.container').width()/boxWidth);
    var boxArr = [];
    var mr=10;
    box.each(function(index,val){
        var boxHeight = box.eq(index).height();
        if(index<num){
            boxArr[index] = boxHeight;
        }else{
            var minboxHeight = Math.min.apply(null,boxArr);
            var minboxIndex = $.inArray(minboxHeight,boxArr);
            $(val).css({
                'position':'absolute',
                'top':minboxHeight,
                'left':box.eq(minboxIndex).position().left
            });
            boxArr[minboxIndex]+=box.eq(index).height();
        }
    });
}