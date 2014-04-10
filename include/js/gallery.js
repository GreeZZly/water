$(document).ready(function(){
	var params = {
	    slideWidth: 180,
	    // adaptiveHeight: false,
	    slideHeight:200,
	    minSlides: 3,
	    maxSlides: 5,
	    moveSlides: 1,
	    slideMargin: 10,
	    preloadImages: 'all',
	    touchEnabled: true,
	    captions: true
  	};
  	 var pic_path = "/include/images/garanties/min/";
	 var portfolio = [
		{
			"pic":pic_path+"nedr.jpg",
			"name": "Лицензия на пользование недрами"
		},
		{
			"pic":pic_path+"dec_cong.jpg",
			"name": "Декларация о соответствии"
		},
		{
			"pic":pic_path+"san_ped_zak.jpg",
			"name": "Санитарно-эпидемиологическое заключение"
		},
		{
			"pic":pic_path+"dec_cong2.jpg",
			"name": "Декларация о соответствии"
		},
		{
			"pic":pic_path+"sert_cong.jpg",
			"name": "Сертификат соответствия"
		},
		{
			"pic":pic_path+"dec_cong3.jpg",
			"name": "Декларация о соответствии"
		},
		{
			"pic":pic_path+"sert_cong2.jpg",
			"name": "Сертификат соответствия"
		},
		{
			"pic":pic_path+"sert_cong3.jpg",
			"name": "Сертификат соответствия"
		},
		{
			"pic":pic_path+"sert_cong_pril.jpg",
			"name": "Приложение к сертификату соответствия"
		}
		

	]
	var html='';
	for (var i=0, l=portfolio.length; i<l; i++){
		html += '<div class="slide"><a href="'+portfolio[i].pic+'" class="zoom"><img src="'+portfolio[i].pic+'" title="'+portfolio[i].name+'"></div>'
	}
	$('#portfolio_row').html(html).bxSlider(params);
});