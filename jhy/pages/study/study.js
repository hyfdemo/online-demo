require(['swiper'],function(Swiper){
	var mySwiper = new Swiper('.swiper-container',{
	pagination: {
    el: '.swiper-pagination',
    clickable :true,
    slideToClickedSlide: true,
    type : 'custom',
    renderCustom: function (swiper, current, total) {
    	switch(current){
    		case 1:
          return '<li class="active tcolor">选课中心</li><li>已完成课程</li><li>未完成课程</li>';
          case 2:
          return '<li>选课中心</li><li class="active tcolor">已完成课程</li><li>未完成课程</li>';
          case 3:
          return '<li>选课中心</li><li>已完成课程</li><li class="active tcolor">未完成课程</li>';
          default:
          return '<li class="active tcolor">选课中心</li><li>已完成课程</li><li>未完成课程</li>';
    		}
        },
  }
});
	$(mySwiper.pagination.$el[0]).on('click','li',function(){
			$(this).addClass('active').siblings('.active').removeClass('active');
			mySwiper.slideTo($(this).index(), 300, false);
		})
})