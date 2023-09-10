<?php
	include("db.php");
    include("function.php");
	echo $_SESSION['userid'];

   

   

    
    $Error = "";
    if(isset($_GET['id'])){
        $row = get_one_post($_GET['id']);
        foreach ($row as  $Row) {
            # code...
        }
        if(!$row){
            $Error = "no such post was found";
        }else{
            
            if($Row['userid'] != $_SESSION['userid'] ){
                $Error = "Access denied! you can not delete this post";
            }
        }
    }else{
        $Error = "no such post was found";
    }
    print_r($_GET);
    // if something was posted
    if($_SERVER['REQUEST_METHOD']== "POST"){
       
        $post = edit_post($_POST,$_FILES);
        header("location:profile.php");
        die;

    }
?>
<!DOCTYPE html>
<html lang="en" style="background-color:grey;">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rowllo's community | delete</title>
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
		
		<div style="min-height:400px;flex:2;background-color:grey;margin-right:-3px;margin-left:100px;border-radius:10px;">
			<div>
                <h2>Edit post</h2><br>
				<form action="" method="post" enctype="multipart/form-data">
					
                    <hr>
                        <?php 
                            if($Error != ""){
                                echo $Error;
                            }else{
                            
                               
                                echo '<textarea name="post" id="text" placeholder= "whats on your mind" style="width:830px;height:120px;" cols="30" rows="10">'.$Row['post'].'</textarea><br>
                                <input style="background-color:white;width:757px;margin-top:-6px;" type="file" name="file">';
                               
                                echo "<input type='hidden' name='postid' value= '$Row[postid]'>" ;
                                echo "<input type='submit' name='save' value='save' style='margin-right:0px;margin-top:10px;height:30px;width:80px;color:white;background-color:blue;'>" ;

                                if(file_exists($Row['image'])){
                                    echo "<img src='$Row[image]' style='width:50%;' />";
                                }
                            }
                           
                           
                        
                        ?>
                    <hr>
                   
				</form>
			</div><br><br>
			
	</div>
</body>
</html>