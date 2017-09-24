<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dream - VideoHosting</title>
<link rel="stylesheet" type="text/css" href="../css/css.css">
<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<script src="../js/jquery-2.2.4.js"></script>
<script>
function subr()
{
		$('#btn_subscribe').html("Подписка оформлена");
		$('#btn_subscribe').css("background-color","transparent");
		$('#btn_subscribe').css("color","#09F");
}
function like()
{
	start = parseInt(document.getElementById('like_1').innerHTML) + 1; 
    $('#like_1').html(start);
	$('#like_1').css("color","#0C0");
}
function dislike()
{
	start = parseInt(document.getElementById('dislike_1').innerHTML) + 1; 
    $('#dislike_1').html(start);
	$('#dislike_1').css("color","#F00");
}
</script>
</head>
<body>
<div style="height:45px;border-bottom:1px solid #303030;">
<div style="float:left" class="div_lg_re"><a href="../index.php"><img style="margin-left:45px;" src="../img/Dreamlogoblk.png" width="120" height="35"></a></div>
<div style="padding-top:9px;padding-bottom:8px;" class="div_lg_re">

<input style="margin-left:25px;height:25px;width:800px;background-color: #333 !important;color: #aaa !important;border: 1px solid #333;box-shadow: inset 0 0px 0px #eee;border-bottom:2px solid #333;" type="text" placeholder="&nbsp;&nbsp;Введите запрос">
<button id="a_search">Поиск</button>
<a href="../add_video.php" id="a_button">Добавить видео</a>
</div>
</div>
<div class="div_video">
  <video width="960" height="539" style="background-color:#000" controls>
    <source src="../video/1.mp4" type="video/mp4">
  </video>
</div>
<div class="div_downvideo">
<div class="div_vlc">
  19 780 просмотров
  <div>
  	<div style="float:left">
        	<button style="background-color:transparent;border:none;cursor:pointer;" onClick="like()"><img src="../img/like.png" width="20" height="20" alt=""/></button>
     </div>
        <div id="like" style="float:left">
    		<span id="like_1">1233</span>
        </div>
    <div style="float:left">
    	<button style="background-color:transparent;border:none;cursor:pointer;" onClick="dislike()"><img src="../img/dislike.png" width="20" height="20" alt=""/></button>
     </div>
      <div id="dislike" style="float:left">
    	<span id="dislike_1">23</span>
      </div>
  </div>
</div>
	<h1>Danny MacAskill - Cascadia</h1>
    
    <div><img src="../img/sub_img/1sub.png" width="50px" height="50px" class="d_sub_img"></div>
    <div class="d_sub_name">GoPro</div>
  	<div class="d_subb">
    	<button id="btn_subscribe" onClick="subr()">Подписаться</button>
        	<span id="btn_subscribe" style="background-color:transparent">674 678</span>
    </div>
</div>
<div class="div_opis">
    <p><span style="font-weight:bold">Описание:</span><br>
    	Join Danny MacAskill on an insane journey across the rooftops of Gran Canaria. Mixing vertigo-inducing lines and killer POV-footage, “Cascadia” delivers some incredible riding. 
    </p>
</div>
<div class="div_comment">
    <p style="padding-bottom:10px">
    	<strong>1 Комментарий</strong>
    </p>
    <textarea rows="3" cols="120" style="margin-left:20px"></textarea>
    <br>
    <div><img src="../img/doge.jpg" width="50px" height="50px" class="d_comm_img"></div>
    <div class="d_comm_name">Алексей</div>
    <div class="d_comm_date">03.04.2016</div>
    <div class="d_comm">Первый!</div>
</div>
<footer class="video_footer">
<div style="float:left;padding-left:20px;">Dream Play © 2016</div><div style="float:right;padding-right:20px;">Язык:Русский</div>
</footer>
</body>
</html>
