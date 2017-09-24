<?php

if(isset($_POST['text-comment'])){
	
	if (!$_POST['text-comment'])
	{
		ob_start();
		echo 'empty';
		$req = ob_get_contents();
		ob_end_clean();
		echo json_encode($req);
	}
	else{
		$date_upload = date('d.m.Y');
		mysqli_query($CONNECT, 'INSERT INTO `comments`
		VALUES ("","'.$_SESSION['id'].'","'.$_POST['video'].'","'.$date_upload.'","'.$_POST['text-comment'].'")');
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