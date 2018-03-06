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
          return '<li class="active tcolor">未开班</li><li>已结束</li>';
          case 2:
          return '<li>未开班</li><li class="active tcolor">已结束</li>';
          default:
          return '<li class="active tcolor">未开班</li><li>已结束</li>';
    		}
        },
  }
});
	$(mySwiper.pagination.$el[0]).on('click','li',function(){
			$(this).addClass('active').siblings('.active').removeClass('active');
			mySwiper.slideTo($(this).index(), 300, false);
		})
})