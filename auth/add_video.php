<?php
	top('Добавить видео');
?>
<div class="upload_video">
	<label id="error" style="color: red"></label>
<form action="hendler" method="post" id="my_form" enctype="multipart/form-data">
	<h4>Добавление видео</h4><br>
      	Выберите файл видео в формате MP4 (до 100 Мб): <span class="span_required">*</span><br>
    <div align="center" style="margin-top: 15px;">
    	<input class="upload_button" type="file" name="myfile[]" accept="video/*" required>
	</div>
   <br>
   Название видео: <span class="span_required">*</span> <br>
        <input type="text" name="name_video" class="text_input" style="width: 100%" id="name_video" required></input><br>	
   		Описание: <span class="span_required">*</span> <br>
        <textarea type="text" name="description_video" class="text_input_area" required></textarea><br>
        Категория: <span class="span_required">*</span> <br>
        <select class="category" name="cat">
        	<option value="joke">Юмор</option>
        	<option value="music">Музыка</option>
        	<option value="sport">Спорт</option>
        	<option value="other">Другое</option>
        </select>
        <br>
        Длительность видео: <span class="span_required">*</span> <br>
        Минут:<input type="number" min="0" max="999" name="time_code_minits" class="text_input_time" required></input> 
        Секунд: <input type="number" min="0" max="60" name="time_code_seconds"  class="text_input_time" required></input> <br>
        Превью (.jpg до 1 Мб): <span class="span_required">*</span> <br>
        <div align="center" style="margin-top: 15px;">
        	<input type="file" name="myfile[]" class="upload_button" accept="image/jpeg" required></input>
        </div>
        <div align="center" style="margin-top: 15px;">
  		<input type="submit" class="send_input" id="submit" value="Отправить">
  	</div>
</form>
</div>
<?php
	bottom();
?>
