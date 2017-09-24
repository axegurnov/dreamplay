<?php


if(isset($_FILES['myfile'])){
	$size_img = $_FILES['myfile']['size'][0];
	
	if (mysqli_num_rows(mysqli_query($CONNECT, 'SELECT * FROM `users` WHERE `login` = ("'.$_POST['login'].'")')))
	{
		ob_start();
		echo 'login_already';
		$req = ob_get_contents();
		ob_end_clean();
		echo json_encode($req);
	}
	elseif($size_img>100000){
		ob_start();
		echo 'img_much';
		$req = ob_get_contents();
		ob_end_clean();
		echo json_encode($req);
	}
	else{
		$name_img = $_FILES['myfile']['name'][0];
		//перемещаем
		$uploadfileimage = "img/".$_FILES['myfile']['name'][0];
		move_uploaded_file($_FILES['myfile']['tmp_name'][0], $uploadfileimage);
		//путь для DATA BASE
		$urlimg = "img/".$name_img;
		//В Бд
		mysqli_query($CONNECT,'INSERT INTO `users` VALUES ("", "'.$_POST['login'].'", "'.$_POST['password'].'", "'.$_POST['email'].'","'.$urlimg.'")');
		
		ob_start();
		echo 'ok';
		$req = ob_get_contents();
		ob_end_clean();
		echo json_encode($req); // вернем полученное в ответе
		exit;
		}
	}
	else{
		echo "Доступ запрещен!";
	}
?>