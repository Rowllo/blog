<?php
	include("db.php");
    include("function.php");
	

   
    if($_SERVER['REQUEST_METHOD']== "POST"){
        $userid  = $_SESSION['userid'];
        $result = create_comment($_SESSION['userid'],$_POST,$_FILES,$_GET['id']);
        if($result == ""){
           header("location:profile.php");
           die;
        }
        print_r($result);
    }
   

    

    $ROW = false;
    
    $Error = "";
    if(isset($_GET['id'])){
        $row = get_one_post($_GET['id']);
        $ROW = mysqli_fetch_assoc($row);
        
    }else{
        $Error = "no information was found";
    }
 print_r($ROW);
 print_r($row);
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
                <?php 
               
              
           
                
                if(is_array($ROW)){

                   
                       $FRIENDs = get_user($ROW['userid']);
                       $info = mysqli_fetch_assoc($FRIENDs);
                                        
                      
                    
                  
                       include("post.php");
                   
                           
        
                       
                   
                }
                
                ?>
               
			</div>
            <div>
					<form action="" method="post" enctype="multipart/form-data">
						<textarea name="post" id="text" placeholder="what's on your mind" style="width:576px;height:80px;" cols="30" rows="10"></textarea><br>
						<input style="background-color:white;width:500px;margin-top:-6px;" type="file" name="file">
						<input type="submit" name="save" value="post" style="margin-right:-5px;height:25px;width:80px;color:white;background-color:blue;margin-top:-8px;">
                        <input type="hidden" name="parent" value="<?php echo $ROW['postid']?>">
					</form>
				</div><br>
                <?php
                
                $comment = get_comments($ROW['postid']);
                $comments = mysqli_fetch_assoc($comment);
              
                if($comments){
                    foreach ($comment as $Comm) {
                    
                        # code...
                       $comm_user = get_user($Comm['userid']);
                       $Comm_user = mysqli_fetch_assoc($comm_user);
                        include("comment.php");
                    }
                   
                }
               
             
                
                ?>
			
	</div>
</body>
</html>