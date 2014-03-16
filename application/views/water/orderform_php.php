<div class="container" id="orderform">
		<h2 class="row-fluid block_title">Заявка на доставку воды</h2>
		<div class="row-fluid">
			<div id="error_block"><?php echo validation_errors(); ?></div>
		</div>
		<div class="row-fluid">

			<div class="span9">
				<form class="form-horizontal" action="/main/order" method="POST" id="formorder">
				  <div class="control-group">
				    <label class="control-label" for="inputCity">Город</label>
				    <div class="controls">
				      <input type="text" id="inputCity" name="city" value="<?php echo set_value('city'); ?>">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="inputAdress">Адрес доставки</label>
				    <div class="controls">
				      <input type="text" id="inputAdress" name="adress" value="<?php echo set_value('adress'); ?>">
				    </div>
				  </div>
				  <div class="control-group">
				    <div class="controls">
				     <label class="radio">
					  <input type="radio" name="optionsRadios" id="optionsRadios1" value="yur_lico" checked>
					  Юридическое лицо
					 </label>
				      <label class="radio">
						  <input type="radio" name="optionsRadios" id="optionsRadios2" value="fiz_lico">
						  Физическое лицо
					  </label> 
				    </div>
				  </div>
				   <div class="control-group">
				    <label class="control-label" for="inputName">Название организации / Контактное лицо:</label>
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
				 
				  <div class="control-group">
				    <label class="control-label" >Количество бутылей:</label>
				    <div class="controls">
				      <select class="span2" name="full_count">
				      	<? for ($i=0; $i < 100; $i++) { 
				      		echo "<option>".$i."</option>";
				      	}?>
						  
					  </select>
					  <span>  Цена воды: 105 р.</span>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" >Сдаваемая оборотная тара:</label>
				    <div class="controls">
				      <select class="span2" name="empty_count">
				      	<? for ($i=0; $i < 100; $i++) { 
				      		echo "<option>".$i."</option>";
				      	}?>
						  
					  </select>
					  <span>  Цена тары: 220 р.</span>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" >Стоимость заказа:</label>
				    <div class="controls">
				      <div class="span2">0 р.</div>
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