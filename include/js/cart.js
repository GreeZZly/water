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

	$(document).on('click', '#makeOrder', function(e){
		e.preventDefault();
		$.post(
				"/main/pre_order",
				{},
				function(data){
					// console.log(data[0].phone);

					$('#cart_modal #user_phone').val(data[0].phone);
					$('#cart_modal #inputAdressModal').val(data[0].delivery_address);
					$('#cart_modal').modal();
				}
			);
	});

	$(document).on('click', '#cart_submit', function(e){
		e.preventDefault();
		var inputTimeS = $('#inputTimeS selected').val();
		var inputTimeDo = $('#inputTimeDo selected').val();
		var user_phonec = $('#user_phone').val();
		var inputAdressModal = $('#inputAdressModal').val();
		if ($('#products_order').valid()){
			$.post(
					"/main/make_order",
					{
						time_s: inputTimeS,
						time_po: inputTimeDo,
						user_phone: user_phonec,
						delivery_adress: inputAdressModal
					},
					function(data){
						// alert('OK');
						// console.log('ok');
						$('#cart_modal').modal('hide');
						location.reload();
						// $('#cart_modal #user_phone').val(data.phone);
						// $('#cart_modal #inputAdressModal').val(data.adress);
						// $('#cart_modal').modal();

					}
				);
		}
	});
});