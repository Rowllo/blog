<?php

include "db.php";
include "function.php";

$_SESSION['email'] ;


$_SESSION['name'] ;








$userid = $_SESSION['userid'];


if($_SERVER['REQUEST_METHOD']== "POST"){
	$userid  = $_SESSION['userid'];
	$result = create_post($userid,$_POST,$_FILES);
	if($result == ""){
		header("location:profile.php");
		die;
	}
}


 
 $DATA = get_user($userid);
 foreach ($DATA as $key => $value) {
	 # code...
 }
 
 if(isset($_GET['id'])){
	$profile_data = get_profile($_GET['id']);
	foreach ($profile_data as $key => $Value) {
		# code...
	}
	
 
 
	if(is_array($Value)){
		$value = $Value;
		$DATA = $profile_data;
	}
	
 }
 

 $posts = get_post($value['userid']);
 $ad_posts = get_admin_post();

 
 $friends = get_following($userid, "user");
 

 

 
?>
<!DOCTYPE html>
<html lang="en" style="background-color:grey;">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rowllo's community | profile</title>
	<link rel="stylesheet" href="style3.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<header class="heada">
	<a href="profile.php">
		<h2>Rowllo's community</h2>
	</a>
 	<form action="search.php" method="get">
		<textarea style="float:right;height:20px;margin-top:-40px;margin-right:30px;" name="find" id="" cols="30" rows="10"></textarea>
		<input type="submit" name="save" value="search" style="float:right;margin-right:30px;height:20px;width:80px;color:white;background-color:blue;margin-top:-8px;">
	</form>
</header>
<nav class="nav">
     <h3  style="float:right;">
	 <a href="index.php">
	 	<span style="color:blue;" class="span">Timeline</span>
	 </a>
	   <?php
	   		if($value['userid'] == $_SESSION['userid']){			

				echo '<a href="profile.php?section=settings&id= '.$value['userid'].'"> <span style="color:blue;" class="span">settings</span></a>';

			}
	 		 
 	   ?>
	<a href="profile.php?section=photos&id=<?php echo $value['userid'] ?>"> <span style="color:blue;" class="span">photos</span></a>   
	
	<a href="profile.php?section=followers"> <span style="color:blue;" class="span">followers</span></a>
	<a href="profile.php?section=following"> <span style="color:blue;" class="span">following</span></a>
	<a href="profile.php?section=notifications"> <span style="color:blue;" class="span">notifications</span></a>
	 <a href="logout.php">
	 	<span class="span">Log out</span> 
	 </a>
	 
	</h3>
</nav>
<body>
	<div>
		<div class="" style="height:0px;">
			<?php
					$cover_Image = "";
					if(file_exists($value['cover_image'])){
						$cover_image = $value['cover_image'];
					}elseif(($value['cover_image']== "") && ($value['gender']== "Female")){
				
						$cover_image = "image/forest.jpg";
					}elseif(($value['profile_image']== "") && ($value['gender']== "Male")){
						$cover_image = "image/forest.jpg";
					}else{
						echo "does not exist";
					}
			?>
		
				<img src="<?php echo $cover_image; ?>" style="height:500px;width:1490px;margin-top:-19px;" alt="">
				
				<?php
					$Image = "";
					if(file_exists($value['profile_image'])){
						$image = $value['profile_image'];
					}elseif(($value['profile_image']== "") && ($value['gender']== "Female")){
				
						$image = "image/female.jpg";
					}elseif(($value['profile_image']== "") && ($value['gender']== "Male")){
						$image = "image/male.jpg";
					}else{
						echo "does not exist";
					}
				?>
				<div style="margin-top:-870px;">
					<img class="pic" style="margin-left:620px;margin-top:600px;" src="<?php echo $image; ?>" alt="">
					<br>
					<div >
						<span style="color:white;margin-left:640px;">
							<a href="change_profile_image.php" style="color:white;">Change profile</a> ||
							<a href="change_cover_image.php" style="color:white;">Change cover</a>
						</span>
				</div>
					

			</div>
				
				
			
		</div>
		<div style="height:70px;background-color:black;">
			<h2 style="" class="uname"><?php echo $value['name']?></h2>
			<h3 class="span" style="float:right;color:blue;margin-top:-35px;margin-right:50px;">
				<a href="like.php?type=user&id=<?php echo $value['userid'] ?>">
				<input type="button" name="save" value="Follow(<?php echo $value['likes'];?>)" style="float:right;margin-right:0px;height:30px;width:80px;color:white;background-color:blue;margin-top:-8px;">
				</a>
			</h3>
			
		</div><br>
			<div>
					<?php

						$section = "default";
						if(isset($_GET['section'])){
							$section = $_GET['section'];
						}

						if($section == "default"){
							include("profile_default.php");
						}elseif($section == "photos"){
							include("profile_photos.php");
						}elseif($section == "followers"){
							include("profile_followers.php");
						}elseif($section == "following"){
							include("profile_following.php");
						}elseif($section == "settings"){
							include("profile_setting.php");
						}elseif($section == "notifications"){
							include("profile_notifications.php");
						}



					?>
			</div>
					
		
		</div>
	</div>
</body>
</html>