<?php
	
	if($_SERVER['REQUEST_URI']=='/')  {
		header('location: /feed');
		$page ='home';
	}
	else{
		$page = substr($_SERVER['REQUEST_URI'], 1);
	}

//подключение к БД
	$mysql_login='root';
	$mysql_host='localhost';
	$mysql_pass='';
	$mysql_db='video_hosting';
	$CONNECT=mysqli_connect('localhost','root','','video_hosting');

 	session_start();
	
//вход
	if ($_COOKIE['userLogin'] and $_COOKIE['userPassword']) {
    $row = mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT * FROM `users` WHERE `login` = '$_COOKIE[userLogin]' AND `password` = '$_COOKIE[userPassword]'"));
		
    foreach ($row as $key => $value) 
        $_SESSION[$key] = $value;
}

	if (!$CONNECT) exit('MySql ERROR');

	if(file_exists('all/'.$page.'.php')) include 'all/'.$page.'.php';
	elseif ($_SESSION['id'] and file_exists('auth/'.$page.'.php')) include 'auth/'.$page.'.php';
	elseif (!$_SESSION['id'] and file_exists('guest/'.$page.'.php')) include 'guest/'.$page.'.php';
	elseif ( preg_match('/^video\/[-0-9\/A-z]{1,150}$/', $page) ) include 'all/video.php';
	elseif ( preg_match('/^user\/[-0-9\/A-z]{1,150}$/', $page) ) include 'all/user.php';
	elseif ( preg_match('/^category\/[-0-9\/A-z]{1,150}$/', $page) ) include 'all/category.php';
	elseif ( preg_match('/^search/', $page) ) include 'all/search.php';
	else echo('Ухoди!');
	
	function top($title)
	{
		include 'all/header.php';
	}

	function bottom()
	{
		include 'all/bottom.php';
	}
	function random_str($num=15)
	{
		return substr(str_shuffle('0123456789abcdefjklmopABCEDFIGJKMNNBZX'),0,$num);
	}
	
	function login_valid(){
		if(!preg_match('/^[\-+]?[0-9]*\.*\,?[0-9]+$/',$_POST['login']))
			message('Минимально 2-20 символов и только латинский алфавит и "_"');
	}

	function email_valid(){
		if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
			message('E-mail неверный');
	}
	
	function password_valid(){
		if(!preg_match('/^[A-z,0-9]{5-15}$/',$_POST['password']))
			message('Введите пароль 5-15 символов и только латинский алфавит');
	}

	function img_valid(){
		$size_image = $_FILES['up_image']['size'];
		if ($size_image>1000000){
			echo("Выбери файл меньшего размера.");
			exit();
		}
		$uploadfileimg = "img/".$_FILES['up_image']['name'];
		move_uploaded_file($_FILES['up_image']['tmp_name'], $uploadfileimg);
	}
	
	function message($text){
		exit ('{ "message" : "'.$text.'"}');
	}

	function go($url){
		exit ('{ "go" : "'.$url.'"}');
	}

?>
