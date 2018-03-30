// require(['swiper'],function(Swiper){
// 	var mySwiper = new Swiper('.swiper-container',{
// 	pagination: {
//     el: '.swiper-pagination',
//     clickable :true,
//     slideToClickedSlide: true,
//     type : 'custom',
//     renderCustom: function (swiper, current, total) {
//     	switch(current){
//     		case 1:
//           return '<li class="active tcolor">未开班</li><li>已结束</li>';
//           case 2:
//           return '<li>未开班</li><li class="active tcolor">已结束</li>';
//           default:
//           return '<li class="active tcolor">未开班</li><li>已结束</li>';
//     		}
//         },
//   }
// });
// 	$(mySwiper.pagination.$el[0]).on('click','li',function(){
// 			$(this).addClass('active').siblings('.active').removeClass('active');
// 			mySwiper.slideTo($(this).index(), 300, false);
// 		})
// })
require(['template'],function(template){
	var data={
		starttrain:[
			{time:'2018.02.28 14:00',title:'培训名称',teacher:'张某某',desi:'培训简介培训简介培训简介培训简…',addr:'成都市成华区建设南路137号'},
			{time:'2018.03.18 09:00',title:'培训名称',teacher:'张某某',desi:'培训简介培训简介培训简介培训简…',addr:'成都市锦江区红星路137号'}
		],
		endtrain:[
			{time:'2018.02.28 14:00',check:'合格',title:'培训名称',teacher:'张某某',desi:'培训简介培训简介培训简介培训简…',addr:'成都市成华区建设南路137号'},
			{time:'2018.03.18 09:00',check:'不合格',title:'培训名称',teacher:'张某某',desi:'培训简介培训简介培训简介培训简…',addr:'成都市锦江区红星路137号'}
		]
	}
	var shtml=template('tpl-starttrain',data)
	var ehtml=template('tpl-endtrain',data)
	$('#starttrain').html(shtml)
	$('#endtrain').html(ehtml)

})