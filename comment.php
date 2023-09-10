<?php

	$userid = $_SESSION['userid'];

	$image = "";
	
	if(($Comm_user['profile_image']== "") && ($Comm_user['gender']== "Female")){
		
			$image = "image/female.jpg";
	}elseif(($Comm_user['profile_image']== "") and ($Comm_user['gender']== "Male")){
			$image = "image/male.jpg";
	}else{
		$image = $Comm_user['profile_image'];
	}

	


?>
<div style="background-color:grey;">
					
					
	<div style="display:flex;">
		<div style="flex:1">
			<img style="max-height: 80px; border-radius: 100%; max-width: 80px;margin-left: 10px;margin-top: 3px;" src="<?php echo $image; ?>" alt="">
		</div>
		<div style="flex:4">
			<h3 style="color:white;"> <?php echo $Comm_user['name']; ?></h3>
		</div><br>
	</div>		
		<div style="color:white;margin-top:-5px;margin-left:5px;">
			
		  	<?php echo htmlspecialchars( $Comm['comment']);?>
			<br><br>
			
			<?php
			if(file_exists($ROW['image'])){
				echo "<img src='$Comm[image]' style='width:50%;' />";
			}
			?>
		</div><br>
		<?php

			$likes = "";
			
			$likes = ($Comm['likes'] > 0) ? "(" .$Comm['likes']. ")" : "";


		?>
			<a href="like.php?type=post&id=<?php echo $Comm['postid'] ?>">Like<?php echo $likes; ?></a> . <a href="single_post.php?id=<?php echo $Comm['postid'] ?>">Comment</a>
			<span style="color:#999;">
				<?php echo $Comm['date'];?>      
			</span>

		<?php
			
			$postd = my_post($Comm['postid'],$_SESSION['userid']);
			if($postd){
				echo"
				<a href='edit.php?id= $Comm[postid]'><span style='color:#999;margin-left:60px;'>Edit</span></a>
			
			<a href='delete.php?id= $Comm[postid]'><span style='color:#999;margin-left:40px;'>Delete</span></a>";

			}
			$i_liked = false;
			$result = "";

			if(isset($_SESSION['userid'])){
				
				$sql2 = "SELECT likes FROM likes WHERE type = 'post' && contentid = '$Comm[postid]' limit 1 ";
				$results = mysqli_query($connection,$sql2);
				
				foreach ($results as $key => $result) {
					# code...
				}
				if(is_array($result)){
					$likes = json_decode($result['likes'],true);
		
					$user_ids = array_column($likes, "userid");
					if(!in_array($userid, $user_ids)){

						$i_liked = true;

					}
				}

			}
			
			if($Comm['likes'] > 0){
				echo "<br/>";
				echo "<a href='likes.php?type=post&id=$Comm[postid]'>";
				if($Comm['likes'] == 1){
					if($i_liked){
						echo "<div style='text-align:left;'>you liked this post</div>";
					}else{
						echo "<div style='text-align:left;'> 1 person liked this post</div>";
					}
					
				}else{
					if($i_liked){
						echo "<div style='text-align:left;'>You and" .($Comm['likes'] - 1) . "people liked this post</div>";
					}else{
						echo "<div style='text-align:left;'>" .$Comm['likes'] . "people liked this post</div>";
					}
					
				}
				echo "</a>";
			}
		
		
		?>
			
			
		
			

		
					
</div><br>