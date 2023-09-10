<?php
	include("db.php");
	include("function.php");
	echo $_SESSION['userid'];
	$userid = $_SESSION['userid'];

					$DATA = get_user($userid);
					foreach ($DATA as $key => $value) {
						# code...
					}

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
					if($_SERVER['REQUEST_METHOD']== "POST"){
						$userid  = $_SESSION['userid'];
						$result = create_post($userid,$_POST,$_FILES);
						if($result == ""){
							header("location:index.php");
							die;
						}
					}

					$ad_posts = get_admin_post();
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
	<h2>Rowllo's community</h2>
	<h3 style="float:right;margin-top:-40px;">
		<a href="log.php">
	 		<span class="span">Log out</span> 
	 	</a>
	</h3>
</header>
<body>
	
	
	<div style="display:flex;margin-top:20px;">
		<div style="min-height:400px;flex:1;background-color:grey;color:white;border-radius:10px;">
			<div style="margin-bottom:10px;heigh:50px;">
				<div style="height:300px;margin-top:-150px">
				<img class="pic" style="margin-left:100px;margin-top:150px;" src="<?php echo $image; ?>" alt="">
				</div>
			</div>
			
			
					
			<div style="height:60px;background-color:none;">
				<a href="profile.php">
					<h2 class="uname" ><?php echo $value['name'];?></h2>
				</a>
			</div>
    	</div>
		<div style="min-height:400px;flex:2;background-color:grey;margin-right:-3px;margin-left:100px;border-radius:10px;">
			<div>
					<form action="" method="post" enctype="multipart/form-data">
						<textarea name="post" id="text" placeholder="what's on your mind" style="width:830px;height:120px;" cols="30" rows="10"></textarea><br>
						<input style="background-color:white;width:757px;margin-top:-6px;" type="file" name="file">
						<input type="submit" name="save" value="post" style="float:right;margin-right:0px;height:30px;width:80px;color:white;background-color:blue;margin-top:-8px;">
					</form>
		</div><br><br>
			<div style="height:150px;background-color:grey;">
					
					
			

				<?php 
					// get current url
					$pg = pagination_link();

					
					

					$page_number = isset($_GET['page'])? (int)$_GET['page'] : 1;
					$page_number = ($page_number < 1)? 1 : $page_number;

					$limit = 2;
					$offset = ($page_number - 1) * $limit;


					
						$followers = get_following($_SESSION['userid'], "user")	;
						$follower_ids = false;
						if(is_array($followers)){
							$follower_ids = array_column($followers, "userid");
							$follower_ids = implode("','", $follower_ids);
						}
						if($follower_ids){
							$sql = "SELECT * FROM posts WHERE userid in('". $follower_ids."') order by id desc limit $limit offset $offset";
							$posts = mysqli_query($connection,$sql);
						}
						
							foreach ($DATA as $key => $info) {
								# code...
							}
								if($ad_posts){
									foreach ($ad_posts as  $ROW) {
										# code...
										include("postad.php");
									}
								}
								if($posts){
									foreach($posts as $ROW){
									
										$ROW_user = get_user($value['userid']);
										include("post.php");
										
		
									}
		
								}
								
							
				?>

			
				<div>
					<p style="color:white;margin-top:-5px;margin-left:5px;">
						<?php echo $ROW['post'];?>
					</p>
				</div><br>
					<a href="">Like</a> . <a href="">Comment</a>
					<span style="color:#999;">
						<?php echo $ROW['date'];?>      
					</span><br><br>
					<a href="index.php?page=<?php echo ($page_number + 1)?>">
					<input type="button" value="Next page" style="float:right;margin-right:0px;height:30px;width:80px;color:white;background-color:blue;margin-top:-8px;">	
					</a>
					<a href="index.php?page=<?php echo ($page_number - 1)?>">
					<input type="button" value="Prev page" style="margin-right:0px;height:30px;width:80px;color:white;background-color:blue;margin-top:-8px;">
					</a>
					

			</div>	
						
		</div><br>
	</div>

</body>
</html>