<?php
	include("db.php");
	
	$id = $_SESSION['userid'];
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

    if($_SERVER['REQUEST_METHOD']== "POST"){
        if(isset($_FILES['file']['name']) && ($_FILES['file']['name'] != "")){
			if($_FILES['file']['type']== "image/jpeg"){
				$allowed_size = (1024 * 1024) * 3;
				if($_FILES['file']['size'] <= $allowed_size){
					$filename = "uploads/".$_FILES['file']['name'];
					move_uploaded_file($_FILES['file']['tmp_name'],$filename);
					//$image = crop_image($filename,$filename,800,800);
				
					if(file_exists($filename)){
						$sql = "UPDATE users SET cover_image = '$filename' WHERE userid = '$id' limit 1";
						$query = mysqli_query($connection,$sql);
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
			<div>
				<form action="" method="post" enctype="multipart/form-data">
					<input type="file" name="file">
					<input type="submit" name="save" value="change" style="float:right;margin-right:0px;height:30px;width:80px;color:white;background-color:blue;">
				</form>
			</div><br><br>
			<div style="height:150px;background-color:grey;">
					
					

</body>
</html>