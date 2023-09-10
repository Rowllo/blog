<?php

$userid = $_SESSION['userid'];


 
 $DATA = get_user($userid);
 foreach ($DATA as $key => $info) {
	 # code...
 }

	$image = "";
	
	if(($info['profile_image']== "") && ($info['gender']== "Female")){
		
			$image = "image/female.jpg";
	}elseif(($info['profile_image']== "") && ($info['gender']== "Male")){
			$image = "image/male.jpg";
	}else{
		$image = $info['profile_image'];
	}


?>
<div style="background-color:grey;">
					
					
	<div style="display:flex;">
		<div style="flex:1">
			<img style="max-height: 80px; border-radius: 100%; max-width: 80px;margin-left: 10px;margin-top: 3px;" src="<?php echo $image; ?>" alt="">
		</div>
		<div style="flex:4">
			<h3 style="color:white;"> <?php echo $info['name']; ?></h3>
		</div><br>
	</div>		
		<div style="color:white;margin-top:-5px;margin-left:5px;">
			
		  	<?php echo htmlspecialchars( $Row['post']);?>
			<br><br>
			
			<?php
			if(file_exists($Row['image'])){
				echo "<img src='$Row[image]' style='width:50%;' />";
			}
			?>
		</div><br>
			
					
</div><br>