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

	<p style="display:inline-block;"><?php echo form_submit('', 'Обновить корзину'); ?></p>
	<p style="display:inline-block;"><?php echo form_submit('', 'Очистить корзину'); ?></p>
	<p style="display:inline-block;"><?php echo form_submit('', 'Оформить заказ'); ?></p>

</div>