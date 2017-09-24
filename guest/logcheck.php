<?
	if(isset($_POST['login'])){
		if (!mysqli_num_rows(mysqli_query($CONNECT, "SELECT `id` FROM `users` WHERE `login` = '$_POST[login]' AND `password` = '$_POST[password]'")))
		{
    		ob_start();
			echo 'error';
			$req = ob_get_contents();
			ob_end_clean();
			echo json_encode($req); // вернем полученное в ответе
			exit;
		}
		setcookie('userLogin',$_POST['login'],strtotime('+30 days'));
    	setcookie('userPassword',$_POST['password'],strtotime('+30 days')); 
		$row = mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT * FROM `users` WHERE `login` = '$_POST[login]'"));
	
		foreach ($row as $key => $value)
    	    $_SESSION[$key] = $value;
		
		ob_start();
			echo 'ok';
			$req = ob_get_contents();
			ob_end_clean();
			echo json_encode($req); // вернем полученное в ответе
			exit;
		
	}
	echo "GTFO";
	exit();

?>