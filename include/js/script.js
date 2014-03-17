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

	

// ПЛАВНЫЙ ЯКОРь
   $('a[href*=#]').bind("click", function(e){
      e.preventDefault();
      var anchor = $(this);
      $('html, body').stop().animate({
         scrollTop: $(anchor.attr('href')).offset().top
      }, 1000);
   });



	$('.bxslider').bxSlider();

	$('#full_count').on('change', function(){
		var full_cnt = parseInt($('#full_count option:selected').val());
		$('#empty_count option').remove();
		var text='';
		for (var i = 0; i < full_cnt+1; i++) {
			text += '<option>'+i+'</option>';
		};
		$('#empty_count').html(text);
		var empty_cnt = parseInt($('#empty_count option:selected').val());
		$('#order_cost_input').val(full_cnt*105 + (full_cnt-empty_cnt)*220);
		$('#order_cost').html(full_cnt*105 + (full_cnt-empty_cnt)*220);
	});
	$('#empty_count').on('change', function(){
		var full_cnt = parseInt($('#full_count option:selected').val());
		var empty_cnt = parseInt($('#empty_count option:selected').val());
		$('#order_cost_input').val(full_cnt*105 + (full_cnt-empty_cnt)*220);
		$('#order_cost').html(full_cnt*105 + (full_cnt-empty_cnt)*220);
	});
});