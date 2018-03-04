require(['swiper'],function(Swiper){
	var mySwiper = new Swiper ('.swiper-container', {
	autoplay:true,
    loop: true,
    pagination: {
      el: '.swiper-pagination',
    },
    
  })  
})