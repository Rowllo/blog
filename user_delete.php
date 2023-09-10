<?php
	include("db.php");
    include("function.php");
	echo $_SESSION['userid'];

   

    
    
    // if something was posted
    if($_SERVER['REQUEST_METHOD']== "POST"){
       
        $post = delete_user($_GET['id']);
        header("location:admin_users.php");
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
                <h2>Delete post</h2><br>
				<form action="" method="post">
					
                    <hr>
                        <?php 
                           
                            
                                echo "Are you sure want to delete this user??";
                               // $Row_user = get_user($Row['userid']);
                               // include("post_delete.php");
                                echo "<input type='hidden' name='postid' value= '$_GET[id]'>" ;
                                echo "<br>";
                                echo "<input type='submit' name='save' value='Delete' style='margin-right:0px;margin-top:10px;height:30px;width:80px;color:white;background-color:blue;'>" ;
                            
                           
                           
                        
                        ?>
                    <hr>
                   
				</form>
			</div><br><br>
			
	</div>
</body>
</html>