<?php
	include("db.php");
	
	$id = $_SESSION['userid'];

	function create_post($userid,$data,$files){
		global $connection;
			
		if(!empty($data['post']) || !empty($_FILES['file']['name']) || isset($data['is_profle']) || isset($data['is_cover'])){
			$myimage = "";
			$has_image = 0;
			$is_profile = 0;
			$is_cover = 0;
			
			if(isset($data['is_profle']) || isset($data['is_cover'])){
				$myimage = $_FILES;
				$has_image = 1;
				if(isset($data['is_profile'])){
					$is_profile = 1;
				}
				if(isset($data['is_cover'])){
					$is_cover = 1;
				}
			}else{
	
				
				if(!empty($_FILES['file']['name'])){
					$folder = "uploads/".$userid."/";
					if(!file_exists($folder)){
						mkdir($folder,0777,true);
						file_put_contents($folder . "index.php", "");
					}
					$image_name = generate_filename(15);
					$myimage = $folder.$image_name;
					move_uploaded_file($_FILES['file']['tmp_name'],$myimage);
					
				}
				$has_image = 1;
				$is_profile = 1;
				$is_cover = 0;
			}
			$post = "";
			if(isset($data['post'])){
				$post = addslashes($data['post']);
	
			}
			
			$postid = create_postid();
			$sql = "INSERT INTO posts(post,postid,userid,image,has_image,is_profile,is_cover) VALUES('$post','$postid','$userid','$myimage','$has_image','$is_profile','$is_cover')";
			$query = mysqli_query($connection,$sql);
		}else{
			echo "compose a post";
		}
	}
	function create_postid(){
		$lenght = rand(4,19);
		$number = "";
		for ($i=0; $i < $lenght ;$i++) { 
		 # c
		  $new_rand = rand(0,9);
		  $number = $number . $new_rand;
		}
		return $number;
	}


	function get_user($id){
		global $connection;
		$sql = "SELECT * FROM users WHERE userid = '$id' limit 1";
		$query = mysqli_query($connection,$sql);
		if($query){
			return $query;
	
		}else{
			return false;
		}
	}
	 $data = get_user($id);
	 $DATA = get_user($id);
	 foreach ($DATA as $key => $value) {
		 # code...
	 }

	
	/*
	function crop_image($original_file,$cropped_file,$max_width,$max_height){
		if(file_exists($original_file)){
			$original_image = imagecreatefromjpeg($original_file);
			$original_width = imagesx($original_image);
			$original_height = imagesy($origal_image);
			if($original_height > $original_width){
				$ratio = $max_width / $original_width;
				$new_width = $max_width;
				$new_height = $original_height * $ratio;
			}else{
				$ratio = $max_height / $original_height;
				$new_height = $max_height;
				$new_width = $original_width * $ratio;
			}
		}
		$new_image = imagecreatetruecolor($new_width,$new_height);
		imagecopyresampled($new_image,$origal_image,0,0,0,0,$new_width,$new_height,$original_width,$original_height);
		imagejpeg($cropped_file,90);
	}
	*/
	function generate_filename($length){
		$array = array(0,1,2,3,4,5,6,8,9,0,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
			$text="";
			for ($x=0; $x < $length; $x++) { 
				$random = rand(0,61);
				$text = $array[$random];
			}
			return $text;
		
	}

    if($_SERVER['REQUEST_METHOD']== "POST"){
        if(isset($_FILES['file']['name']) && ($_FILES['file']['name'] != "")){
			if($_FILES['file']['type']== "image/jpeg"){
				$allowed_size = (1024 * 1024) * 3;
				if($_FILES['file']['size'] <= $allowed_size){
					$folder = "uploads/".$id."/";
					// create folder...
					if(!file_exists($folder)){
						mkdir($folder,0777,true);
					}
					
					
					//$image = crop_image($filename,$filename,800,800);
					$image_name = generate_filename(15);
					$filename = $folder. $image_name;
					move_uploaded_file($_FILES['file']['tmp_name'],$filename);
					if(file_exists($filename)){
						$sql = "UPDATE users SET profile_image = '$filename' WHERE userid = '$id' limit 1";
						$query = mysqli_query($connection,$sql);

						// create post
						$_POST['is_profile'] = 1;
						$result = create_post($id,$_POST,$filename);
				
						header("location:profile.php");
						die;
					}

				}else{
					echo "only images of 3mb are allowed";
				}
			}else{
				echo "only jpeg images are allowed";
			}
            
        }else{
            echo "please upload a photo";
        }
    
        
        
    
    }
    

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
				
			</div>
			
			
			
    	</div>
		<div style="min-height:400px;flex:2;background-color:grey;margin-right:-3px;margin-left:100px;border-radius:10px;">
			<div style="text-align:center;">
				
				<form action="" method="post" enctype="multipart/form-data">
					<input type="file" name="file">
					<input type="submit" name="save" value="change" style="float:right;margin-right:0px;height:30px;width:80px;color:white;background-color:blue;">
					<?php

				$change = "profile";
				if(isset($_GET['change'])){
					$change = $_GET['change'];
					echo "<img src='$value[profile]' style='max-width:500px' alt=''>";
				}
				?>
				</form>
			</div><br><br>
			<div style="height:150px;background-color:grey;">
					
					

</body>
</html>