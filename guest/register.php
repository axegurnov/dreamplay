<?php
	top('Регистрация');
?>
<div class="upload_video">
	<form action="regcheck" method="post" id="registration" enctype="multipart/form-data">
		<h4>Регистрация</h4><center><label id="error" style="color: red"></label></center><br>
     	<div class="form_line">
      		<label>Логин:</label><span class="span_required">*</span>
      		<div class="div_input">
      			<input class="text_input" type="text" name="login" required>
      		</div>
      	</div>
      	
      	<div class="form_line">
      		<label>Пароль:</label><span class="span_required">*</span>
      		<div class="div_input">
      			<input type="password" name="password" class="text_input" required>
      		</div>
      	</div>
      	<div class="form_line">
      		<label>E-mail:</label><span class="span_required">*</span>
      		<div class="div_input">
      			<input type="email" name="email" class="text_input" required>
      		</div>
      	</div>
      	<div class="form_line">
      		<label>Фото профиля 100кб .jpg </label><span class="span_required">*</span>
      		<div class="div_input" align="center" >
      			<input type="file" name="myfile[]" class="upload_button" accept="image/jpeg" required></input>
      		</div>
      		</div>
      		<div align="center">
      			<input type="submit" class="send_input" id="submit" value="Зарегистрироваться">
      		</div>
	</form>
</div>
<footer class="video_footer_fixed">
	<div style="float:left;padding-left:20px;">Dream Play © 2017</div>
	<div style="float:right;padding-right:20px;">Язык:Русский</div>
</footer>
</div>
</body>
</html>