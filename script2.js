$(function(){
	$('#my_form').on('submit', function(e){
		e.preventDefault();
		var $that = $(this),
				formData = new FormData($that.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму
				formData.append('date_upl', new Date()); // добавляем данные, не относящиеся к форме
		$.ajax({
			url: $that.attr('action'),
			type: $that.attr('method'),
			contentType: false, // важно - убираем форматирование данных по умолчанию
			processData: false, // важно - убираем преобразование строк по умолчанию
			data: formData,
			dataType: 'json',
			success: function(json){
					jk=json;
					if (jk=='ok')
					{
						window.location.replace('/feed');
					}
					else if (jk=='error_size_video')
					{
						document.getElementById("error").innerHTML = "Слишком большой размер файла видео!";
					}
					else
					{
						document.getElementById("error").innerHTML = "Неизвестная ошибка";
					}
			}
		});
	});
});


$(function(){
	$('#registration').on('submit', function(e){
		e.preventDefault();
		var $that = $(this),
				formData = new FormData($that.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму
				formData.append('date_upl', new Date()); // добавляем данные, не относящиеся к форме
		$.ajax({
			url: $that.attr('action'),
			type: $that.attr('method'),
			contentType: false, // важно - убираем форматирование данных по умолчанию
			processData: false, // важно - убираем преобразование строк по умолчанию
			data: formData,
			dataType: 'json',
			success: function(json){
					jk=json;
					if(jk=='login_already')
						{
							document.getElementById("error").innerHTML = "Такой логин уже есть!";
						}
					else if (jk=='img_much')
						{
							document.getElementById("error").innerHTML = "Слишком большой размер фото!";
						}
					else if (jk=='ok')
						{
							window.location.replace('/login');
						}
					else
						{
							document.getElementById("error").innerHTML = "Неизвестная ошибка";
						}
			}
		});
	});
});



$(function(){
	$('#loginchk').on('submit', function(e){
		e.preventDefault();
		var $that = $(this),
				formData = new FormData($that.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму
				formData.append('date_upl', new Date()); // добавляем данные, не относящиеся к форме
		$.ajax({
			url: $that.attr('action'),
			type: $that.attr('method'),
			contentType: false, // важно - убираем форматирование данных по умолчанию
			processData: false, // важно - убираем преобразование строк по умолчанию
			data: formData,
			dataType: 'json',
			success: function(json){
					jk=json;
					if(jk=='error')
						{
							document.getElementById("error").innerHTML = "Неверный логин или пароль";
						}
					else if (jk=='ok')
						{
							window.location.replace('/feed');
						}
					else
						{
							document.getElementById("error").innerHTML = "Неизвестная ошибка";
						}
			}
		});
	});
});


$(function(){
	$('#likes').on('submit', function(e){
		e.preventDefault();
		var $that = $(this),
				formData = new FormData($that.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму
				formData.append('date_upl', new Date()); // добавляем данные, не относящиеся к форме
		$.ajax({
			url: $that.attr('action'),
			type: $that.attr('method'),
			contentType: false, // важно - убираем форматирование данных по умолчанию
			processData: false, // важно - убираем преобразование строк по умолчанию
			data: formData,
			dataType: 'json',
			success: function(json){
					jk=json;
					if (jk=='ok')
					{
						start = parseInt(document.getElementById('like_1').innerHTML) + 1; 
    					$('#like_1').html(start);
						$('#like_1').css("color","#0C0");
						$('.like_up').attr("type","image");
						$('.like_up').attr("src","../img/like.png");
						$('.like_up').attr("width","20px");
						$('.like_up').attr("height","20px");
					}
			}
		});
	});
});



$(function(){
	$('#dislikes').on('submit', function(e){
		e.preventDefault();
		var $that = $(this),
				formData = new FormData($that.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму
				formData.append('date_upl', new Date()); // добавляем данные, не относящиеся к форме
		$.ajax({
			url: $that.attr('action'),
			type: $that.attr('method'),
			contentType: false, // важно - убираем форматирование данных по умолчанию
			processData: false, // важно - убираем преобразование строк по умолчанию
			data: formData,
			dataType: 'json',
			success: function(json){
					jk=json;
					if (jk=='ok')
					{
						start = parseInt(document.getElementById('dislike_1').innerHTML) + 1; 
    					$('#dislike_1').html(start);
						$('#dislike_1').css("color","red");

					}
			}
		});
	});
});





$(function(){
	$('#commentary').on('submit', function(e){
		e.preventDefault();
		var $that = $(this),
				formData = new FormData($that.get(0)); // создаем новый экземпляр объекта и передаем ему нашу форму
				formData.append('date_upl', new Date()); // добавляем данные, не относящиеся к форме
		$.ajax({
			url: $that.attr('action'),
			type: $that.attr('method'),
			contentType: false, // важно - убираем форматирование данных по умолчанию
			processData: false, // важно - убираем преобразование строк по умолчанию
			data: formData,
			dataType: 'json',
			success: function(json){
					jk=json;
					if (jk=='ok')
					{
						location.reload();
					}
					else if (jk=='empty')
					{
						document.getElementById("error").innerHTML = "Пустой комментарий";
					}
					else
					{
						document.getElementById("error").innerHTML = "Неизвестная ошибка";
					}
			}
		});
	});
});






(function($){
var files;

// Вешаем функцию на событие
// Получим данные файлов и добавим их в переменную
$('input[type=file]').change(function(){
	files = this.files;
});


// Вешаем функцию ан событие click и отправляем AJAX запрос с данными файлов
$('.submit.button').click(function( event ){
	event.stopPropagation(); // Остановка происходящего
	event.preventDefault();  // Полная остановка происходящего

	// Содадим данные формы и добавим в них данные файлов из files
	var data = new FormData();
	$.each( files, function( key, value ){
		data.append( key, value );
	});

	// Отправляем запрос
	$.ajax({
		url: 'submit',
		type: 'POST',
		data: data,
		cache: false,
		dataType: 'json',
		processData: false, // Не обрабатываем файлы (Don't process the files)
		contentType: false, // Так jQuery скажет серверу что это строковой запрос
		success: function( respond, textStatus, jqXHR ){
			// Если все ОК
			if( typeof respond.error === 'undefined' ){
				// Файлы успешно загружены, делаем что нибудь здесь

				// выведем пути к загруженным файлам в блок '.ajax-respond'
				var files_path = respond.files;
				var html = '';
				$.each( files_path, function( key, val ){ html += val +'<br>'; } )
				$('.ajax-respond').html( html );
			}
			else{
				console.log('ОШИБКИ ОТВЕТА сервера: ' + respond.error );
			}
		},
		error: function( jqXHR, textStatus, errorThrown ){
			console.log('ОШИБКИ AJAX запроса: ' + textStatus );
		}
	});
	
});


})(jQuery)