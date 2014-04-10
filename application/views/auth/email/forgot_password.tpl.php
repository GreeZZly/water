<html>
<body>
	<h1><?php echo sprintf(lang('email_forgot_password_heading'), $identity);?></h1>
	<p>{unwrap}<a href='http://water.loc/auth/reset_password/<?php echo $forgotten_password_code?>'>Сбросить пароль</a>{/unwrap}</p>
</body>
</html>