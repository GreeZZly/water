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

	<p style="display:inline-block;"><input type="submit" id="del_cart" name="delete_cart" value="Очистить корзину"></p>
	<p style="display:inline-block;"><input type="submit" id="makeOrder" name="make_order" value="Оформить заказ"></p>

</div>

<div class="modal hide fade myModal" id="cart_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3>Благодарим за заказ!</h3>
	  </div>
	  <div class="modal-body"><form method='POST' id="dsda"></form>
	  <form method='POST' id="products_order" action="/">
	  	<div class="control-group">
	  		Выберите удобное время доставки
	  </div>
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

		  <fieldset>
		    <!-- <legend>Название формы</legend> -->
		    <!-- <label>Описание поля</label> -->
		   
	    	<button class="btn btn-primary pull-right" id="cart_submit">Завершить заказ</button>
		  </fieldset>
		</form>

	  </div>
	  
	</div>