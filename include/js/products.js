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
					// text +='<li class="span4"><a href="#" id="'+data[i].id+'" class="thumbnail prod_name"  ><img data-src="holder.js/300x200" alt="" >'+data[i].name+'</a><p>'+data[i].rus_name+'</p><p>Цена: '+data[i].price+'</p></li>';
					text +=' <li class="span4"><div class="thumbnail"><img data-src="holder.js/300x200" alt="" src="'+data[i].img+'">  <h4>'+data[i].rus_name+'</h4>  <p>Цена: '+data[i].price+' руб.</p><p> <button type="button" id="'+data[i].id+'" class="prod_btn btn btn-success">В корзину</button></p></div></li>';
				};
				$('#products .thumbnails').html(text);
			}
			);

	});

	$(document).on('click', '#products .prod_btn', function(e){
		e.preventDefault();
		var prod_id = $(this).attr('id');
		$.post(
			"/main/product_insert_cart",
			{
				prod_id: prod_id
			},
			function(data){
				// alert(data[0].name);
				$('#product_modal').modal('toggle');
			}
			);

	});
});