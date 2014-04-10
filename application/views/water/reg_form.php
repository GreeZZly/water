<div id="reg_form">

	

	<div class="modal hide fade myModal" id="reg_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Регистрация</h3>
	  </div>
	  <div class="modal-body">
	    
	  	<form method='POST' action='/auth/register' id="regForm">
		  <fieldset>
		    <!-- <legend>Название формы</legend> -->
		    <!-- <label>Описание поля</label> -->
		    <input type="text" name="name" placeholder="Ваше имя">
		    <input type="text" name="surname" placeholder="Ваша фамилия">
		    <input type="text" name="phone" placeholder="Ваш номер телефона">
		    <input type="text" name="email" placeholder="Ваш e-mail" id="reg_email_user">
		    <div class="hidden" id="reg_org_name">
		    	<input type="text" name="company" placeholder="Название организации">
		    </div>
		    <label class="radio">
		      <input type="radio" name="lico" value="yur_lico"> Юридическое лицо
		    </label>
		    <label class="radio">
		      <input type="radio" name="lico" value="fiz_lico" checked> Физическое лицо
		    </label>
		    <input type="password" name="password" placeholder="Пароль" id="password">
		    <input type="password" name="repassword" placeholder="Подтверждение">
		    <!-- <span class="help-block">Подсказка или доп. информация.</span> -->
		    <!-- <button type="submit" class="btn">Регистрация</button> -->
	    	<button class="btn btn-primary pull-right" id="reg_submit">Регистрация</button>
		  </fieldset>
		</form>

	  </div>
	  
	</div>


	<div class="modal hide fade myModal" id="auth_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Авторизация</h3>
	  </div>
	  <div class="modal-body">
	    
	  	<form method='POST' action='/auth/login'>
		  <fieldset>
		    <!-- <legend>Название формы</legend> -->
		    <!-- <label>Описание поля</label> -->
		    <input type="text" name="email" placeholder="E-mail">
		    <input type="password" name="password" placeholder="Пароль">
		    <div  class="auth_links">
		    	<span data-toggle="modal" data-target="#remember_modal" data-dismiss="modal" aria-hidden="true"><a href="#">Забыли пароль?</a></span><span class="pull-right " data-toggle="modal" data-target="#reg_modal" data-dismiss="modal" aria-hidden="true"><a href="#">Регистрация</a></span>
		    </div>
		    <!-- <span class="help-block">Подсказка или доп. информация.</span> -->
		    <!-- <button type="submit" class="btn">Регистрация</button> -->
	    	<button type="submit" class="btn btn-primary pull-right">Войти</button>
		  </fieldset>
		</form>

	  </div>
	  
	</div>

	<div class="modal hide fade myModal" id="remember_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Востановление пароля</h3>
	  </div>
	  <div class="modal-body">
	    
	  	<form method='POST' action='/auth/forgot_password' id="remember_form">
		  <fieldset>
		    <!-- <legend>Название формы</legend> -->
		    <!-- <label></label> -->
		    <input type="text" name="email" placeholder="E-mail">
		    <!-- <div  class="auth_links">
		    	<span ><a href="#">Забыли пароль?</a></span><span class="pull-right " data-toggle="modal" data-target="#reg_modal" data-dismiss="modal" aria-hidden="true"><a href="#">Регистрация</a></span>
		    </div> -->
		    <!-- <span class="help-block">Подсказка или доп. информация.</span> -->
		    <!-- <button type="submit" class="btn">Регистрация</button> -->
	    	<button type="submit" class="btn btn-primary pull-right" id="remember_btn">Восстановить</button>
		  </fieldset>
		</form>

	  </div>
	  
	</div>




</div>