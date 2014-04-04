<div class="block_bg" id="orderform_bg">
	<div class="container" id="orderform"> <a name="orderform"></a>
		<h2 class="row-fluid block_title">Заявка на доставку воды</h2>
		<div class="row-fluid">
			<div class="span9">
				<form class="form-horizontal" action="/main/order" method="POST" id="formorder">
				  
					<?if(!$log_on){?>
				 
				  <div class="control-group">
				    <label class="control-label" for="inputAdress">Адрес доставки</label>
				    <div class="controls">
				      <!-- <input type="text" id="inputAdress" name="adress" value=""> -->
				      <input type="text" id="inputAdress" name="adress">
				    </div>
				  </div>
				  <div class="control-group">
				    <div class="controls">
				     <label class="radio">
					  <input type="radio" name="optionsRadios" id="optionsRadios1" value="yur_lico" >
					  Юридическое лицо
					 </label>
				      <label class="radio">
						  <input type="radio" name="optionsRadios" id="optionsRadios2" value="fiz_lico" checked>
						  Физическое лицо
					  </label> 
				    </div>
				  </div>
				  
				  <div class="control-group hidden" id="org_block">
				    <label class="control-label" for="inputNameOrg">Название организации:</label>
				    <div class="controls">
				      <input type="text"  id="inputNameOrg" name="nameOrg" value="<?php echo set_value('name'); ?>">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="inputName">Контактное лицо:</label>
				    <div class="controls">
				      <input type="text"  id="inputName" name="name" value="<?php echo set_value('name'); ?>">
				    </div>
				  </div>
				   <div class="control-group">
				    <label class="control-label" for="inputPhone">Телефон</label>
				    <div class="controls">
				      <input type="text" id="inputPhone" name="phone" value="<?php echo set_value('phone'); ?>">
				    </div>
				  </div>
				   <div class="control-group">
				    <label class="control-label" for="inputEmail">Email</label>
				    <div class="controls">
				      <input type="text" id="inputEmail" name="email" value="<?php echo set_value('email'); ?>">
				    </div>
				  </div>
				 <?} else {?>

				 	<!-- <input type="hidden" id="inputCity" name="city" value="<?=$delivery_city?>"> -->
				    <input type="hidden" id="inputAdress" name="adress" value="<?=$delivery_address?>">
				    <input type="hidden" name="optionsRadios" value="">
					<!-- <input type="radio" name="optionsRadios" id="optionsRadios2" value="fiz_lico" > -->
				    <input type="hidden"  id="inputName" name="name" value="<?=$name?>">
				    <input type="hidden" id="inputPhone" name="phone" value="<?=$phone?>">
				    <input type="hidden" id="inputEmail" name="email" value="<?=$email?>">
				    
				 <?}?>
				  <div class="control-group">
				    <label class="control-label" >Количество бутылей:</label>
				    <div class="controls">
				      <select class="span2" name="full_count" id="full_count">
				      	<? for ($i=0; $i < 100; $i++) { 
				      		echo "<option>".$i."</option>";
				      	}?>
						  
					  </select>
					  <span>  Цена воды: 110 р.</span>
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
				    <label class="control-label" >Стоимость заказа:</label>
				    <div class="controls">
				      <input type="hidden" name="cost" id="order_cost_input">
				      <div class="span4"><span id="order_cost">0</span> р.</div>
				      <div class="span3">1 бутыль = 18,9л</div>
				    </div>
				  </div>
				  <div class="control-group">
				   
				    <div class="controls">
				      <input type="submit" value="Заказать воду" id="submitBtn">
				    </div>
				  </div>
				 
				</form>
			</div>
			<div class="span3">
				<img src="/include/images/call_manager.jpg">
			</div>
		</div>
	</div>
</div>