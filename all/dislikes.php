<?php
if(isset($_POST['video'])){
	
		$video_id = $_POST['video'];
		$query = mysqli_query($CONNECT, "SELECT * FROM `videos` WHERE `id` = '$video_id'");
		$row = mysqli_fetch_assoc($query);
		$chk_dislikes = $_POST['video_d'];
	
		if($chk_dislikes==$row['dislikes_video']){
			mysqli_query($CONNECT, 'UPDATE `videos`
			SET `dislikes_video`=`dislikes_video`+1 WHERE (`id`="'.$_POST['video'].'")');
			ob_start();
			echo 'ok';
			$req = ob_get_contents();
			ob_end_clean();
			echo json_encode($req); // вернем полученное в ответе
		}
		else{
			ob_start();
			echo 'error';
			$req = ob_get_contents();
			ob_end_clean();
			echo json_encode($req);
	}
}
else{
	echo "Доступ запрещен!";
}
?>