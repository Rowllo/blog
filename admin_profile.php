<?php
 include("db.php");
 include("function.php");

 $email = $_SESSION['email'] ;


$name = $_SESSION['name'] ;

$userid = $_SESSION['userid'];






$userid = $_SESSION['userid'];


if($_SERVER['REQUEST_METHOD']== "POST"){
	$userid  = $_SESSION['userid'];
	$result = create_admin_post($userid,$_POST,$_FILES);
	if($result == ""){
		header("location:admin_profile.php");
		die;
	}
}


 
 
 
 
	
 
 
	
	
 
 

 $posts = get_admin_post();

 
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
</head>
<header class="heada" style="color:blue;">
	<a href="admin_profile.php">
		<h2>Rowllo's community</h2>
	</a>
	<a href="admin_post.php"><span style="margin:10px;font-size:20px;">Posts</span></a>
	<a href="admin_users.php"><span  style="margin:10px;font-size:20px;">Users</span></a>
	<a href=""><span  style="margin:10px;font-size:20px;">Settings</span></a>
	
 	<form action="search.php" method="get">
		<textarea style="float:right;height:20px;margin-top:-40px;margin-right:30px;" name="find" id="" cols="30" rows="10"></textarea>
		<input type="submit" name="save" value="search" style="float:right;margin-right:30px;height:20px;width:80px;color:white;background-color:blue;margin-top:-8px;">
	</form>
</header>
<body>
	<div style="height:300px;background-color:;margin-top:40px;text-align:center;">
		<img style="width:200px;height:200px;margin-top:20px;border-radius:30%;" src="image/forest.jpg" alt="">
		<p style="color:blue;">Admin</p>

	</div>
	<div  style="display:flex;">
				<div style="flex:1;margin:10px;color:blue;">
					<h4>Admin details</h4>
					<p><?php echo $name ?></p>
					<p><?php echo $email ?></p>

				</div>
				<div style="margin-left:0px;flex:2;">
					<div>
					<form action="" method="post" enctype="multipart/form-data">
						<textarea name="post" id="text" placeholder="what's on your mind" style="width:830px;height:120px;" cols="30" rows="10"></textarea><br>
						<input style="background-color:white;width:757px;margin-top:-6px;" type="file" name="file">
						<input type="submit" name="save" value="post" style="margin-right:0px;height:30px;width:80px;color:white;background-color:blue;margin-top:-8px;">
					</form>

					</div><br><br>
					<div>
					<?php 
						
					
					
						if($posts){
							foreach($posts as $ROW){
							
								
								include("postad.php");
								

							}

						}
					
					?>
				</div>
					
				</div><br>
				
			</div>

	</div>

	
</body>
</html>