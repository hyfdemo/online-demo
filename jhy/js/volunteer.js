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
//           return '<li class="active tcolor">志愿活动</li><li>我参加的</li>';
//           case 2:
//           return '<li>志愿活动</li><li class="active tcolor">我参加的</li>';
//           default:
//           return '<li class="active tcolor">志愿活动</li><li>我参加的</li>';
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
			{time:'2018.02.28 14:00',enter:'10',title:'志愿活动名称',desi:'活动简介活动简介活动简介活动简…',need:'30',addr:'成都市成华区建设南路137号'},
		],
		endtrain:[
			{time:'2018.02.28 14:00',title:'志愿活动名称',desi:'活动简介活动简介活动简介活动简…',need:'30',addr:'成都市成华区建设南路137号'},
		]
	}
	var shtml=template('tpl-starttrain',data)
	var ehtml=template('tpl-endtrain',data)
	$('#starttrain').html(shtml)
	$('#endtrain').html(ehtml)

})