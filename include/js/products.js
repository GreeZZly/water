$(document).ready(function(){
	$('#products .prod_type').on('click', function(e){
		e.preventDefault();
		var type = $(this).attr('id');
		// console.log(type);
		$.post(
			"/main/productLabels",
			{
				prod_type: type
			},
			function(data){
				// console.log(data.length);	
				text = '';
				for (var i = 0; i < data.length; i++) {
					// console.log(data[i].label);
					text +='<li class="span4"><a href="/main/productNames" id="'+data[i].label+'" class="thumbnail prod_label"><img data-src="holder.js/300x200" alt="" >'+data[i].label+'</a></li>';
				};
				$('#products .thumbnails').html(text);
			}
			);
	});

	$(document).on('click','#products .prod_label', function(e){
		e.preventDefault();
		var label = $(this).attr('id');
		// console.log(label);
		$.post(
			"/main/productNames",
			{
				prod_label: label
			},
			function(data){
				text = '';
				for (var i = 0; i < data.length; i++) {
					// console.log(data[i].label);
					text +='<li class="span4"><a href="#" id="'+data[i].id+'" class="thumbnail prod_name" data-toggle="modal" data-target="#product_modal"><img data-src="holder.js/300x200" alt="" >'+data[i].name+'</a></li>';
				};
				$('#products .thumbnails').html(text);
			}
			);

	});

	$(document).on('click', '#products .prod_name', function(e){
		e.preventDefault();

	});
});