$(document).ready(function(){
	$(document).on('change', '.prod_count', function(){
		// var this = $(this);
		var sel = $(this).val();
		var row_id = $(this).attr('pr_id');
		// console.log(sel);
		$.post(
				"/main/update_cart",
				{
					sel_val : sel,
					row_id : row_id
				},
				function(data){
						console.log('data ' , data);
						for (var i = 0; i < data['products'].length; i++) {
							$('#'+data['products'][i]['rowid']+' .row_subtotal').html(data['products'][i]['subtotal']+' руб.')
						};
						$('#total_sum').html(data['total_sum']+' руб.');

						//$('tr[trid=12]').html()
						console.log('$(\'tr[trid=12]\').html() ' , $('tr[trid=12] .row_subtotal').html());
						// $('tr').each(function(){
						// 	if($(this).attr('trid')==)
						// });
						// $('.row_subtotal')
					// for (var i = 0; i < data.length; i++) {
					// 	console.log(data[i].subtotal);
					// };
				}
			);
	});
});