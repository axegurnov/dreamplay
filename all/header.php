<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title; ?></title>
<link rel="stylesheet" type="text/css" href="../css/css2.css">
<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<script src="../js/jquery-2.2.4.js"></script>
<script src="../script.js"></script>
<script src="../script2.js"></script>
</head>
<body>
<div class="divTable">
	<div class="divTableBody">
		<div class="divTableRow">
			<div class="div_logo_top">
				<a href="/feed">
					<img src="/img/Dreamlogoblk.png" width="120" height="35" style="padding-top:5px;margin-bottom:-13px;padding-left:15px;">
				</a>
			</div>
			<div class="divTableCell" style="width: 65%">
			<form action="../search" method="get">
				<input class="search_input" type="text" name="srch" placeholder="&nbsp;&nbsp;Введите запрос">
				<input type="submit" id="a_search" value="Поиск">
			</form>
			</div>
			<div class="divTableCell">
				<?php if ($_SESSION['id']): ?>
				<a href="../profile"><?php echo $_SESSION['login'] ?></a>
					<img src="../<?php echo $_SESSION['image_profile_url'] ?>" class="img_profile" width="25px" height="25px"><a href="../add_video" id="a_button">Добавить видео</a><a href="../logout" id="a_button">Выход</a> 
				<?php else: ?>
					<a href="../login" id="a_button">Войти</a>
					<a href="../register" id="a_button">Зарегистрироваться</a>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>