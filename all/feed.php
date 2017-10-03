<?php
	top('Главная');
?>
<div class="video_block">
<ul class="disin">

<?php
	
	$videos=mysqli_query($CONNECT,"SELECT * FROM `videos` ORDER BY id DESC");
	
	while($all_videos=mysqli_fetch_array($videos))
                  {
					  echo "<li class='disin'>
					<div style='margin-left:20px;' class='cont_video'>
        			<div class='title' id='vd".$all_videos['id']."'>
                	<a href='".$all_videos['url_video']."'>
                		<img src='".$all_videos['path_image']."' width='196' height='110' style='padding-top:6px' alt=''/>
                    </a>
                 	<span class='time'>".$all_videos['time_video']."</span>
                    <span id='imv".$all_videos['id']."' hidden=''>
                    <a href='".$all_videos['url_video']."'>
                    	<img src='img/v_hover.png' width='196' height='110' alt=''/>
                        </a>
                    </span>
                 </div>
            		<div>
                    	<a href='".$all_videos['url_video']."'>".$all_videos['name_video']."</a>
                    </div>
            		<div class='profile'>".$all_videos['user_video']." </div>
					<div class='count_view'>".$all_videos['watch_video']." просмотров · ".$all_videos['date_add']."</div>
       				</div>
    				</li>";	
                  }
?>
</ul>
</div>
<div style="margin:10px;">&nbsp</div>
<?php
	bottom();
?>