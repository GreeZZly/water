<div id="order_form_bg">
</div>
	<div id="order_form_php">
		
		<div id="error_block"><?php echo validation_errors(); ?></div>
		
		<form action="/main/order" method="POST">
			<div id="form_title">Заполните заявку</div>
			<input type="text" class="input" name="name" placeholder="Ваше имя…" value="<?php echo set_value('name'); ?>">
			<input type="text" class="input" name="email" placeholder="Ваш email адрес…" value="<?php echo set_value('email'); ?>">
			<input type="text" class="input" name="phone" placeholder="Ваш номер телефона…" value="<?php echo set_value('phone'); ?>">
			<input type="submit" class="input" value="Отправить">
			<!-- <div id="submit_button" class="form_button">ОТПРАВИТЬ ЗАЯВКУ</div> -->

		</form>
	</div>