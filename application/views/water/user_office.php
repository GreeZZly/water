<div class="block_bg" id="user_office_bg">
	<div class="container" id="user_office">
		<div class="row-fluid">
			<!-- <h3 class="row-fluid block_title">Кабинет пользователя</h3> -->
			<div class="row-fluid">
				<form action="/main/change_user_data" method="POST">
				  <fieldset>
				    <legend>Кабинет пользователя</legend>
				    <label>Город:</label>
				    <input type="text" name="delivery_city" value="<?=$delivery_city?>">
				    <br>
				    <label>Адрес доставки воды:
				    </label>
				    <textarea rows="4" name="delivery_adress">
				    	<?=$delivery_address?>
				    </textarea>
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