



<?

$query=$_GET['srch'];

    $query = trim($query); 
    $query = htmlspecialchars($query);
//вызов шапки
	top('Поиск - '.$query);
?>
	<div class="my_profile">
	<div class="videos_my_profile">
<?
    if (!empty($query)) 
    { 
        if (strlen($query) < 3) {
            $text = '<p>Слишком короткий поисковый запрос.</p>';
			echo $text;
        } else if (strlen($query) > 128) {
            $text = '<p>Слишком длинный поисковый запрос.</p>';
			echo $text;
        } else {
			
			//поиск по слову
            $result = mysqli_query($CONNECT, "SELECT * FROM `videos` WHERE `name_video` LIKE '%$query%'");
			
			//проверка на наличие совподений
            if (mysqli_num_rows($result)) {  
                $num = mysqli_num_rows($result);?>
 <p>По запросу <? echo $query; ?> найдено <? echo $num ?> совпадений</p>
                
<?php 	while($srch_arr=mysqli_fetch_array($result)): ?>
<div class="cont_video">
	<div class="title">
      <a href="../<?php echo $srch_arr['url_video'] ?>">
          <img src="../<?php echo $srch_arr['path_image'] ?>" width="300" height="150"/>
       </a>
          <span class="time_for_vid_pro"><?php echo $srch_arr['time_video'] ?></span>
    </div>
    <div>
            <a href="/<?php echo $srch_arr['url_video']?>"><?php echo $srch_arr['name_video'] ?></a>
    </div>
	<div class="count_view">
		<?php echo $srch_arr['watch_video'] ?> просмотров
	</div>
</div>
<? endwhile; ?> 
<?
				
            } else {
                $text = '<p>По вашему запросу ничего не найдено.</p>';
				echo $text;
            }
        } 
    } else {
        $text = '<p>Задан пустой поисковый запрос.</p>';
		echo $text;
    }
?>
</div>	
</div>
<? 
	
?>