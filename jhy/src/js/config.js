require.config({
	baseUrl:'../../src/js',
	paths:{
		'jquery':'jquery-3.3.1.min',
		'swiper':'swiper-4.1.6.min'
	},
	shim:{
		'swiper':{
			deps:['jquery'],
			exports:'swiper'
		}
	}
})
function goBack(){
  	history.back();
  }
  function goHome(){
   	location.href='../index/index.html';
  }