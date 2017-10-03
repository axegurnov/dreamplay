<?
	
    $url_array = explode('/',$_SERVER['REQUEST_URI']);  
    $video_id = $url_array[2];
    $query = mysqli_query($CONNECT, "SELECT * FROM `videos` WHERE `id` = '$video_id'");
    if (mysqli_num_rows($query)) {
		$row = mysqli_fetch_assoc( $query );
		//echo "<pre style='color:white'>";
		//		print_r($row);
		//		echo "</pre>";
	}
    else {
		echo "error";
		exit();
	}

	$a = array("a","b","c");
	
	


	$query2t = mysqli_query($CONNECT, "SELECT * FROM `name` LEFT JOIN `descs` using(id)");
	
	//var_dump($query2t);
	
		echo "<pre style='color:white'>";
		?>
		<table style="color: white">
		<?
		while($rw = mysqli_fetch_assoc($query2t)){
			?>
					<tr>
						<td><? echo $rw['name'] ?></td><td><? 
				if(is_null($rw['dist']))	{
					echo "errrrr";
				}		else{
				echo $rw['dist']; }
						?></td>
					</tr>
				
			<?
		}
			?>
			</table>
			<?


		echo "</pre>";
	
	

	//просмотры
    $views = $row['watch_video'];
   	$views++;
    mysqli_query($CONNECT, "UPDATE `videos` SET `watch_video` = '$views' WHERE `id` = '$video_id'");
	
	//коментарии
	$query2 = mysqli_query($CONNECT, 'SELECT * FROM `comments` WHERE `id_video` = '.$row['id'].' ORDER BY id DESC'); 
    $count_comments = mysqli_num_rows($query2);
	
	//ифна об авторе
	$query3 = mysqli_query($CONNECT, 'SELECT * FROM `users` WHERE `id` = ("'.$row['id_avtora'].'")');
	$user_row = mysqli_fetch_assoc($query3);

	//VIDEOS
	$all_videos = mysqli_query($CONNECT,"SELECT * FROM `videos` ORDER BY id DESC LIMIT 3");

?>


<? top($row['name_video']); ?>         

<div class="video_block_content">
<div class="div_video">
  <video width="100%" height="100%" style="background-color:#000" controls>
    <source src="../<?php echo $row['path_video']; ?>" type="video/mp4">
  </video>
</div>
<div class="about_video">
<div class="div_downvideo">
<div class="div_vlc">
  <?php echo $row['watch_video']; ?> просмотров
  <div align="center">
  	<div style="float:left; padding: 5px;">
       <form action="../likes" method="post" id="likes" enctype="multipart/form-data">
       		<input type="hidden" name="video" value="<?php echo $video_id; ?>">
        	<input type="submit" class="like_up" value="">
     	</div>
        	<div id="like" style="float:left">
        		<input type="hidden" name="video_l" value="<?php echo $row['likes_video']; ?>">
    			<span id="like_1"><?php echo $row['likes_video']; ?></span>
       		 </div>
       	</form>
        
    <div style="float:left;padding: 5px;">
    <form action="../dislikes" method="post" id="dislikes" enctype="multipart/form-data">
       		<input type="hidden" name="video" value="<?php echo $video_id; ?>">
        	<input type="submit" class="dislike_up" value="">
    	</div>
    	<div id="dislike" style="float:left">
    	<input type="hidden" name="video_d" value="<?php echo $row['dislikes_video']; ?>">
    		<span id="dislike_1"><?php echo $row['dislikes_video']; ?></span>
    	</div>
    </form>
  </div>
</div>
  <div class="video_user">
	<label class="name_video"><?php echo $row['name_video']; ?></label>
    <div><img src="../<?php echo $user_row['image_profile_url']; ?>" width="50px" height="50px" class="sub_img"></div>
	  <div class="d_sub_name"><a href="../user/<?php echo $row['id_avtora']; ?>"><?php echo $row['user_video']; ?></a></div>
  	<div class="d_subb">
    	<label>Категория: <a href="../category/<?php echo $row['category_eng']; ?>"><?php echo $row['category']; ?></a></label>
    </div>
  </div>
</div>
<div class="div_opis">
    <p><span style="font-weight: bolder">Описание:</span><br>
    	<label class="descrip"><?php echo $row['description']; ?></label>
    </p>
</div>
<div class="div_comment">
    <p style="padding-bottom:10px">
    	<strong>Комментарии (<? echo $count_comments; ?>)</strong>
    </p>
    <? if (isset($_SESSION['id'])): ?>
          <label id="error" style="color: red"></label>
           <form action="../comment" method="post" id="commentary" enctype="multipart/form-data">
            <div class="add_comment clear">
               <input type="hidden" name="video" value="<?php echo $video_id; ?>">
                <textarea cols="40" rows="4" name="text-comment" class="text-comment"></textarea>
                <div>
               	 <input type="submit" class="a_button_comm" id="submit" value="Комментировать"> 
                </div>
            </div>
		   </form>
    <? endif; ?>
    
    <? if (!(isset($_SESSION['id']))): ?>
            <div align="center"><p><strong>Пожалуйста, авторизируйтесь для написания комментария.</strong></p></div>
    <? endif; ?>
    
    <? while ( $row3 = mysqli_fetch_assoc($query2) ): ?>
    	<?
    		$com_users = mysqli_fetch_assoc(mysqli_query($CONNECT, 'SELECT * FROM `users` WHERE `id` = '.$row3['id_avtora'].''));
    	?>
    <div class="comment">
    <div class="comment_img">
    	<img src="../<? echo $com_users['image_profile_url']; ?>" width="50px" height="50px" class="d_comm_img">
    </div>
    <div class="d_comm_name"><a href="../user/<? echo $com_users['id']; ?>"><? echo $com_users['login']; ?></a></div>
    <div class="d_comm_date"><? echo $row3['date_add']; ?></div>
    <div class="d_comm"><? echo $row3['comment']; ?></div>
    </div>
    <? endwhile; ?>  
</div>
</div>
<div class="other_video">
	<? while  ($videos = mysqli_fetch_array($all_videos)): ?>
	<div class="cont_video">
			<div class="title" id="vd5">
                	<a href="/<?php echo $videos['url_video'] ?>">
                		<img src="../<?php echo $videos['path_image'] ?>" width="150" height="80" alt=""/>
                    </a>
                 	
              </div>
            	<div>
            		<a href="/<?php echo $videos['url_video']?>"><?php echo $videos['name_video'] ?></a></div>
            	<div class="profile">
            		<?php echo $videos['user_video'] ?>
            	</div>
				<div class="count_view">
					<?php echo $videos['watch_video'] ?> просмотров вчерa
				</div>
    </div>
	<? endwhile; ?>   
</div>
</div>

<?php bottom(); ?>