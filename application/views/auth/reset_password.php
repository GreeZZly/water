<style type="text/css">
	body {
		background-color: #B2B2B2;

	}
</style>
<div id="new_pass_success" class="success_block">
<h2><?php echo lang('reset_password_heading');?></h2>

<div id="infoMessage"><?php echo $message;?></div>


<?php echo form_open('auth/reset_password/' . $code);?>

		<label for="new_password">Новый пароль (минимум 6 символов)</label> 
		<div class="new_pass_inp"><?php echo form_input($new_password);?></div>
	<!-- </p> -->

	<!-- <p> -->
		<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> 
		<div class="new_pass_inp"><?php echo form_input($new_password_confirm);?></div>
	<!-- </p> -->

	<?php echo form_input($user_id);?>
	<?php echo form_hidden($csrf); ?>
	<br />

	<input type="submit" value="Изменить" name="submit" class="btn btn-danger btn-large"> 

<?php echo form_close();?>
</div>