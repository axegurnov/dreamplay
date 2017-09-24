<?php
	top('Мой профиль');
?>
<div class="my_profile">
	<div class="img_my_profile" align="center"><img src="../<?php echo $_SESSION['image_profile_url']?>" width="100px" height="100px"></div>
	<div class="name_my_profile" align="center"><?php echo $_SESSION['login']?></div>
	<div class="videos_my_profile" >
<?php 
	$id_pro=$_SESSION['id'];
	$videos=mysqli_query($CONNECT,"SELECT * FROM `videos` WHERE `id_avtora`='$id_pro'"); 
	if (!mysqli_num_rows(mysqli_query($CONNECT, "SELECT * FROM `videos` WHERE `id_avtora` = '$id_pro'")))
	{
		?>
		<center><div style="font-weight: bold" align="center">У вас нет видео.</div></center>
		<?
	}
	else
	{
?>
<?php 	while($profile_video=mysqli_fetch_array($videos)): ?>
<li class="disin_pro">
<div class="cont_video">
			<div class="title">
                	<a href="../<?php echo $profile_video['url_video'] ?>">
                		<img src="../<?php echo $profile_video['path_image'] ?>" width="300" height="150"/>
                    </a>
                 	<span class="time_for_vid_pro"><?php echo $profile_video['time_video'] ?></span>
              </div>
            	<div>
            		<a href="/<?php echo $profile_video['url_video']?>"><?php echo $profile_video['name_video'] ?></a>
            		</div>
				<div class="count_view">
					<?php echo $profile_video['watch_video'] ?> просмотров
				</div>
</div>
</li>
<? endwhile; 
}
?> 
</div>	
</div>
<footer class="video_footer">
	<div style="float:left;padding-left:20px;">Dream Play © 2017</div>
	<div style="float:right;padding-right:20px;">Язык:Русский</div>
</footer>
</div>
</body>
</html>