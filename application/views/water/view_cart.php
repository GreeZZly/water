<div id="display_cart" class="container">
		<?php echo form_open('path/to/controller/update/function'); ?>

	<table cellpadding="6" cellspacing="1" style="width:100%" border="0">

	<tr>
	  <th>Количество</th>
	  <th>Продукт</th>
	  <th style="text-align:right">Цена шт.</th>
	  <th style="text-align:right">Общая цена</th>
	</tr>

	<?php $i = 1; ?>

	<?php foreach ($this->cart->contents() as $items): ?>

		
		<input type="hidden" <?="name='".$i."[rowid]"."' value='".$items['rowid']."' sr_id='".$i."'";?>>
		<tr <?="id='".$items['rowid']."'"?> trid = '12'>
		  <td>
		  	<select class="span2 prod_count" <? echo "name='".$i."[qty]"."' value='".$items['qty']."' pr_id='".$items['rowid']."'";?>>
				      	<? for ($j=0; $j < 100; $j++) { 
				      		if($j == $items['qty']){
				      			echo "<option selected>".$j."</option>";
				      		} else {
				      			echo "<option>".$j."</option>";
				      		}

				      	}?>
						  
					  </select>
		  </td>
		  <td>
			<?php echo $items['name']; ?>

				<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

					<p>
						<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

							<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

						<?php endforeach; ?>
					</p>

				<?php endif; ?>

		  </td>
		  <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
		  <td style="text-align:right" class="row_subtotal"><?php echo $this->cart->format_number($items['subtotal']); ?> руб.</td>
		</tr>

	<?php $i++; ?>

	<?php endforeach; ?>

	<tr>
	  <td colspan="2"> </td>
	  <td class="right"><strong>Итого</strong></td>
	  <td class="right" id = 'total_sum'><?php echo $this->cart->format_number($this->cart->total()); ?> руб.</td>
	</tr>

	</table>

	<p style="display:inline-block;"><button class="btn btn-warning" id="del_cart" name="delete_cart">Очистить корзину</button></p>
	<?php if(!$empty_cart){?>
	<p style="display:inline-block;"><button class="btn btn-success" id="makeOrder" name="make_order">Оформить заказ</button></p>
	<?php } ?>
</form>
</div>

<div class="modal hide fade myModal" id="cart_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	    <form method='POST' id="products_order" action="/">
			<div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			    <h3>Благодарим за заказ!</h3>
		  	</div>
		  	<div class="modal-body">
			  	<div class="control-group">Выберите удобное время доставки</div>
			  	<div class="control-group">
				    <div class="controls">
						    	с <select id="inputTimeS" name="delivery_time_since">
						    		<option opt-id="1">09:00</option>
						    		<option opt-id="2">10:00</option>
						    		<option opt-id="3">11:00</option>
						    		<option opt-id="4">12:00</option>
						    		<option opt-id="5">13:00</option>
						    		<option opt-id="6">14:00</option>
						    		<option opt-id="7">15:00</option>
						    		<option opt-id="8">16:00</option>
						    		<option opt-id="9">17:00</option>
						    		<option opt-id="10">18:00</option>
						    		<option opt-id="11" disabled>19:00</option>
						    	</select>
						    
						    	до <select name="delivery_time_po" id="inputTimeDo">
						    		<!-- <option opt-id="1">09:00</option> -->
						    		<option opt-id="2">10:00</option>
						    		<option opt-id="3">11:00</option>
						    		<option opt-id="4">12:00</option>
						    		<option opt-id="5">13:00</option>
						    		<option opt-id="6">14:00</option>
						    		<option opt-id="7">15:00</option>
						    		<option opt-id="8">16:00</option>
						    		<option opt-id="9">17:00</option>
						    		<option opt-id="10">18:00</option>
						    		<option opt-id="11">19:00</option>
						    	</select>
						    </div>
				</div>
				<div class="control-group">
				    <label class="control-label" for="user_phone">Ваш телефон:</label>
				    <div class="controls">
				      	<input type="text" name="user_phone" value="" id="user_phone">
				    </div>
				</div>
				<div class="control-group">
				    <label class="control-label" for="inputAdressModal">Ваш адрес:</label>
				    <div class="controls">
				      	<input type="text" id="inputAdressModal" name="delivery_adress" value="">
				    </div>
				</div>
				<div class="control-group">
				    <label class="control-label">Количество бутылей:</label>
				    <div class="controls">
				     	<select class="span2" name="full_count" id="full_count">
					      	<? for ($i=0; $i < 100; $i++) { 
					      		echo "<option>".$i."</option>";
					      	}?>
					  	</select>
						<?if(!$log_on){?>
					  		<span>  Цена воды: 110 р.*</span>
					  	<?} else{?>
					  		<span>  Цена воды: 99 р.*</span>
					  	<?}?>
				    </div>
				</div>
				<div class="control-group">
				    <label class="control-label" >Сдаваемая оборотная тара:</label>
				    <div class="controls">
				      	<select class="span2" name="empty_count" id="empty_count">
				      		<option>0</option>
					 	</select>
					  	<span>  Цена тары: 180 р.</span>
				    </div>
				</div>
				<div class="control-group">
				    <label class="control-label" >Стоимость воды:</label>
				    <div class="controls">
				      	<input type="hidden" name="cost" id="order_cost_input">
				      	<div class="span4"><span id="order_cost">0</span> р.</div>
				      	<!-- <div class="span4">1 бутыль = 18,9л</div> -->
				    </div>
				</div>
		  	</div>
		 	<div class="modal-footer">
		  		<input type="hidden" id="cart_modal_total_input" value="<?=$total_sum;?>">
		  		<div class="span2 text-left">Итого: <span id="cart_modal_total"><?=$total_sum;?></span> руб.</div>
		    	<button class="btn btn-primary pull-right" id="cart_submit">Завершить заказ</button>
		 	</div>
		</form>
	  
	</div>