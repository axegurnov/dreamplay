<?
//разбиваем url
    $url_array = explode('/',$_SERVER['REQUEST_URI']);  
    $cat_name = $url_array[2];
    $query = mysqli_query($CONNECT, "SELECT * FROM `videos` WHERE `category_eng` = '$cat_name'");
	//проверка на есть ли категория
    if (mysqli_num_rows($query)) {
		$row = mysqli_fetch_assoc($query);
	}
    else {
		echo "error";
		exit();
	}
	top('Категория - '.$row['category']);
?>
<div class="my_profile">
	<div class="cat" align="center"><label>Категория - <?php echo $row['category']?></label></div>
	<div class="videos_my_profile" >
<? $catt = mysqli_query($CONNECT, "SELECT * FROM `videos` WHERE `category_eng` = '$cat_name'"); ?>
<?php while($cat_video=mysqli_fetch_array($catt)): ?>
<li class="disin_pro">
<div class="cont_video">
			<div class="title">
                	<a href="../<?php echo $cat_video['url_video'] ?>">
                		<img src="../<?php echo $cat_video['path_image'] ?>" width="300" height="150"/>
                    </a>
                 	<span class="time_for_vid_pro"><?php echo $cat_video['time_video'] ?></span>
              </div>
            	<div>
            		<a href="/<?php echo $cat_video['url_video']?>"><?php echo $cat_video['name_video'] ?></a>
            		</div>
				<div class="count_view">
					<?php echo $cat_video['watch_video'] ?> просмотров
				</div>
</div>
</li>
<? endwhile; ?> 
	</div>	
	</div>
	<footer class="video_footer">
		<div style="float:left;padding-left:20px;">Dream Play © 2017</div>
		<div style="float:right;padding-right:20px;">Язык:Русский</div>
	</footer>
	</div>
	</body>
</html>