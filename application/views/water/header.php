<div class="block_bg" id="header_bg">
	<div class="container" id="header">
		<div class="row-fluid">
			<div class="span6">
				<div class="row"><a href="/"><img src="/include/images/logo.png"></a></div>
				<?if ($log_on){?><div class="row">Здравствуйте, <?=$username;?>!</div><?}?>
			</div>
			<div class="span6">
				<div class="row" id="entreg">
					<?if (!$log_on) {?>
					<div class="pull-right" data-toggle="modal" data-target="#reg_modal">Регистрация</div>
					<div class="pull-right">&nbsp;|&nbsp;</div>
					<div class="pull-right" data-toggle="modal" data-target="#auth_modal">Вход</div>
					<?} else {?>
					<div class="pull-right"><a href="/main/logout">Выход</a></div>
					<div class="pull-right">&nbsp;|&nbsp;</div>
					<div class="pull-right"><a href="/main/view_cart">Корзина: <span><?=$this->cart->total_items();?></span></a></div>
					<div class="pull-right">&nbsp;|&nbsp;</div>
					<div class="pull-right"><a href="/main/user_office">Ваш кабинет</a></div>
					<?}?>

				</div>
				<div class="row header_cont">Закажите воду</div>
				<div class="row text-right">По телефону <span class="header_cont">(8352) 37-30-37</span></div>
				<div class="row text-right">По-email <span class="header_cont">lineofhealth@mail.ru</span></div>
			</div>
		</div>
	</div>
</div>