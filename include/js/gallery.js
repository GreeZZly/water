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
	 var portfolio = [
		{
			"pic":"/include/images/garanties/1.jpg",
			"name": "Лицензия на пользование недрами"
		},
		{
			"pic":"/include/images/garanties/1.jpg",
			"name": "Санитарно-эпидемиологическое заключение"
		},
		{
			"pic":"/include/images/garanties/1.jpg",
			"name": "Декларация о соответствии"
		},
		{
			"pic":"/include/images/garanties/1.jpg",
			"name": "Сертификат соответствия"
		},
		{
			"pic":"/include/images/garanties/1.jpg",
			"name": "Приложение к сертификату соответствия"
		}
		

	]
	var html='';
	for (var i=0, l=portfolio.length; i<l; i++){
		html += '<div class="slide"><a href="'+portfolio[i].pic+'" class="zoom"><img src="'+portfolio[i].pic+'" title="'+portfolio[i].name+'"></div>'
	}
	$('#portfolio_row').html(html).bxSlider(params);
});