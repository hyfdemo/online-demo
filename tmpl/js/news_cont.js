/**
 * Created by bjwsl-001 on 2016/11/2.
 */
$(function(){
    $('#header').load('data/header.php',function(){
        navText('新闻动态');
    });
    $('#footer').load('data/footer.php',function(){
        inputText();
    });
    var url = window.location.href;

    url=url.split("?")[1].split('=')[1];
    console.log(url);
    $.ajax({
        type:'POST',
        url:'data/news_cont_data.php',
        data:{'nid':url},
        success:function(msg){
            var cont=msg.data[0];
            console.log(cont);
            var html=`
                <div>${cont.conts}</div>
            `;
            $('.conts').html(html);
        }
    })
});