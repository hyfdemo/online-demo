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
          return '<li class="active tcolor">志愿活动</li><li>我参加的</li>';
          case 2:
          return '<li>志愿活动</li><li class="active tcolor">我参加的</li>';
          default:
          return '<li class="active tcolor">志愿活动</li><li>我参加的</li>';
    		}
        },
  }
});
	$(mySwiper.pagination.$el[0]).on('click','li',function(){
			$(this).addClass('active').siblings('.active').removeClass('active');
			mySwiper.slideTo($(this).index(), 300, false);
		})
})