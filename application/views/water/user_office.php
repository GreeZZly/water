<div class="block_bg" id="user_office_bg">
	<div class="container" id="user_office">
		<div class="row-fluid">
			<!-- <h3 class="row-fluid block_title">Кабинет пользователя</h3> -->
			<div class="row-fluid">
				<form action="/main/change_user_data" method="POST" id="user_office_form">
				  <fieldset>
				    <legend>Кабинет пользователя</legend>
				    
				    <label>Адрес доставки воды:
				    </label>
				   	<input type="text" id="inputAdress" name="delivery_adress" value="<?=$delivery_address?>">
				    <!-- <textarea rows="4" name="delivery_adress">
				    	
				    </textarea> -->
				    <span class="help-block">Вам достаточно один раз ввести адрес, чтоб при очередном заказе не вводить его еще раз.</span>
				    <label>Номер вашего телефона:
				    </label>
				    <input type="text" name="user_phone" value="<?=$phone?>">
				    <br>
				    <button type="submit" class="btn">Изменить</button>
				  </fieldset>
				</form>
			</div>
			<div class="row-fluid"></div>
		</div>
	</div>
</div>