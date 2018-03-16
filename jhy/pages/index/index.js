require(['swiper','template'],function(Swiper,template){
	var mySwiper = new Swiper ('.swiper-container', {
	autoplay:true,
    loop: true,
    pagination: {
      el: '.swiper-pagination',
    }
  });  
	 var data={
        lesson:'【初级急救员急救知识培训】开班时间：2018年2月28日 09:00地点：成都市成华区建设路173号二楼3号教室开班人数：30人'
    };
    var html = template('tpl-lesson', data);
    $('.lesson').append(html);
})