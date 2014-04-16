$(document).ready(function(){
	var params = {
	    slideWidth: 180,
	    slideHeight:200,
	    minSlides: 3,
	    maxSlides: 5,
	    moveSlides: 1,
	    slideMargin: 10,
	    preloadImages: 'all',
	    touchEnabled: true,
	    captions: true
  	};

  	var clogos_params = {
  		slideWidth:175,
  		// adaptiveWidth: true,
  		// slideHeight: 100,
	    adaptiveHeight: true,
  		maxSlides: 6,
	    moveSlides: 1,
	    slideMargin: 10,
	    preloadImages: 'all',
	    touchEnabled: true,
	    captions: true
  	}

  		var pic_mas = [];
  		pic_mas[0] = "nedr.jpg";
  		pic_mas[1] = "dec_cong.jpg";
  		pic_mas[2] = "san_ped_zak.jpg";
  		pic_mas[3] = "dec_cong2.jpg";
  		pic_mas[4] = "sert_cong.jpg";
  		pic_mas[5] = "dec_cong3.jpg";
  		pic_mas[6] = "sert_cong2.jpg";
  		pic_mas[7] = "sert_cong3.jpg";
  		pic_mas[8] = "sert_cong_pril.jpg";

  		var pic_path_b = "/include/images/garanties/";
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
	var comp_path = "/include/images/companies/";
	var companies = [
		{
			"pic": comp_path+"voa.png"
		},
		{
			"pic": comp_path+"derevo.png"
		},
		{
			"pic": comp_path+"meb_grad.png"
		},
		{
			"pic": comp_path+"sm.png"
		},
		{
			"pic": comp_path+"vebvideo.png"
		},
		{
			"pic": comp_path+"sema.png"
		},
		{
			"pic": comp_path+"sta.png"
		},
		{
			"pic": comp_path+"biz_dialog.png"
		},
		{
			"pic": comp_path+"akbb.png"
		},
	]
	var html='';
	var html_c = '';
	for (var i=0, l=portfolio.length; i<l; i++){
		html += '<div class="slide"><a href="'+pic_path_b+pic_mas[i]+'" class="zoom"><img src="'+portfolio[i].pic+'" title="'+portfolio[i].name+'"></div>'
	}
	$('#portfolio_row').html(html).bxSlider(params);

	for (var j=0, n=companies.length; j<n; j++){
		html_c +='<li><img src="'+companies[j].pic+'"></li>'
	}
	$('#companies_trust ul').html(html_c).bxSlider(clogos_params);
});