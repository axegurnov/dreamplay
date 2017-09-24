<?php
	top('Вход');
?>
<div class="wrapper">
<div class="login">
	<form action="logcheck" method="post" id="loginchk" enctype="multipart/form-data">
		<div align="center"><h4>Вход</h4></div>
    	<center><label id="error" style="color: red;"></label></center>
     	<div class="form_line">
      		<label>Логин</label><span class="span_required"></span>
      		<div class="div_input">
      			<input class="text_input" type="text" name="login" required>
      		</div>
      	</div>
      	<div class="form_line">
			<label>Пароль</label><span class="span_required"></span>
      		<div class="div_input">
      			<input class="text_input" type="password" name="password"  required>
      		</div>
      	</div>
      	<div align="center">	
      		<input type="submit" class="send_input" value="Войти">
      	</div>
      </form>
	</div>
	</div>
<footer class="video_footer_fixed">
	<div style="float:left;padding-left:20px;">Dream Play © 2017</div>
	<div style="float:right;padding-right:20px;">Язык:Русский</div>
</footer>
</body>
</html>