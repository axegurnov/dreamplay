<?php
$name_video = $_POST["name_video"];
$size_video = $_FILES['myfile']['size'][0];
$size_image = $_FILES['myfile']['size'][1];
$original_name_video = $_FILES['myfile']['name'][0];
$name_img = $_FILES['myfile']['name'][1];
$des_video=$_POST["description_video"];
$uploadfilevideo = "video/".$_FILES['myfile']['name'][0];
$uploadfileimage = "img/".$_FILES['myfile']['name'][1];

if(isset($_FILES['myfile'])){
	
	if($size_video > 104857600){
		ob_start();
		echo 'error_size_video';
		$req = ob_get_contents();
		ob_end_clean();
		echo json_encode($req); // вернем полученное в ответе
	}
	else{
		
  	$req = false; // изначально переменная для "ответа" - false
	//перемещаемфайлы из временной директории
	move_uploaded_file($_FILES['myfile']['tmp_name'][0], $uploadfilevideo);
	move_uploaded_file($_FILES['myfile']['tmp_name'][1], $uploadfileimage);
	//прописываем путь
	$urlimg = "img/".$name_img;
	$urlvideo = "video/".$original_name_video;
	$urlpathvideo1 = mysqli_num_rows(mysqli_query($CONNECT, "SELECT * FROM `videos`")) + 1;
	$urlpathvideo2 = "../video/".$urlpathvideo1;
	$date_upload = date('d.m.Y');
	$timecode=$_POST["time_code_minits"].":".$_POST["time_code_seconds"];
	$category_eng=$_POST["cat"];
	switch ($_POST["cat"]) {
    case "joke":
        $category="Юмор";
        break;
    case "music":
        $category="Музыка";
        break;
    case "sport":
        $category="Спорт";
        break;
	case "other":
        $category="Другое";
        break;
}
	//добавляем в бд
	mysqli_query($CONNECT, 'INSERT INTO `videos`
	VALUES ("","'.$name_video.'","'.$urlpathvideo2.'","0","'.$_SESSION["login"].'","0","0","'.$category.'","'.$category_eng.'","'.$des_video.'","'.$timecode.'","'.$urlimg.'","'.$urlvideo.'","'.$date_upload.'","'.$_SESSION['id'].'")');
	
	// Приведём полученную информацию в удобочитаемый вид
	ob_start();
	echo 'ok';
	$req = ob_get_contents();
	ob_end_clean();
	echo json_encode($req); // вернем полученное в ответе
	}
}
else{
	echo "Доступ запрещен!";
}
?>