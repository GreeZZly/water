$(document).ready(function(){
	$('.consult_content_item').on('click',function(){
		var item_id = $(this).attr('itid');
		var n = $('.consult_change[itid="'+item_id+'"]').height();
		$('#consult_content_info_rel').animate({'height':n+20});
		$('.consult_content_item').removeClass('active_item');
		$(this).addClass('active_item');
		$('.consult_change').fadeOut(200);
		$('.consult_change[itid="'+item_id+'"]').delay(200).fadeIn();

		// $('.consult_change').removeClass('hidden');
		// $('.consult_change:not([itid='+item_id+'])').addClass('hidden');
	console.log(n);
	});
	$('.icon_rev_right').on('click', function(){
		$('#reviews_content').animate({"left": "+=900px"}, "slow");
	});
	$('.icon_rev_left').on('click', function(){
		$('#reviews_content').animate({"left": "-=900px"}, "slow");
	});







	$('.bxslider').bxSlider();
	var recalculate = function(){
		var full_cnt = parseInt($('#full_count option:selected').val());
		var empty_cnt = parseInt($('#empty_count option:selected').val());
		$('#order_cost_input').val(full_cnt*130 + (full_cnt-empty_cnt)*180);
		$('#order_cost').html(full_cnt*130 + (full_cnt-empty_cnt)*180);
	}
	$('#full_count').on('change', function(){
		var full_cnt = parseInt($('#full_count option:selected').val());
		$('#empty_count option').remove();
		var text='';
		for (var i = 0; i < full_cnt+1; i++) {
			text += '<option>'+i+'</option>';
		};
		$('#empty_count').html(text);
		recalculate();
	});
	$('#empty_count').on('change', function(){
		recalculate();
	});

	// $('#calc_full').on('change', function(){

	// });
	$('#morelink_link').on('click', function(e){
		e.preventDefault();
		$(this).css({'display':'none'});
		$('#more_link').fadeIn();
		$('#lesslink').fadeIn();
	});
	$('#lesslink').on('click', function(){
		$('#more_link').fadeOut();
		$('#lesslink').fadeOut();
		$('#morelink_link').delay(400).fadeIn();

	});

	// ПЛАВНЫЙ ЯКОРь
   $('a[href*=#]').bind("click", function(e){
      e.preventDefault();
      var el = $($(this).attr('href'));
      if (el.length){
	      $('html, body').stop().animate({
	         scrollTop: el.offset().top
	      }, 1000);      	
      }
  	
   });

   var suc_w = $('.success_block').width()/2;
   var win_w = $(window).width()/2;
   var suc_left = win_w - suc_w;
   var suc_h = $('.success_block').height()/2;
   var win_h = $(window).height()/2;
   var suc_top = win_h - suc_h;
   $('.success_block').css({'margin-left':suc_left, 'margin-top':suc_top});
   $(window).resize(function(){
   		var win_w = $(window).width()/2;
   		var suc_left = win_w - suc_w;
		var win_h = $(window).height()/2;
   		var suc_top = win_h - suc_h;
   		$('.success_block').css({'margin-left':suc_left, 'margin-top':suc_top});
   });
   // $(window).resize(function)
   // console.log(suc_left, suc_top);
});
