<?php
	include("db.php");
    include("function.php");
	echo $_SESSION['userid'];

   

   

    

    $likes = false;
    
    $Error = "";
    if(isset($_GET['id']) && isset($_GET['type'])){
        $likes = get_likes($_GET['id'] ,$_GET['type']);
        
    }else{
        $Error = "no information was found";
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
                <?php 
               
              
           
                
                if(is_array($likes)){

                   foreach ($likes as $key => $Likes) {
                       # code...
                       $FRIENDs = get_user($Likes['userid']);
                                        
                       foreach ($FRIENDs as $key => $FRIEND) {
                           # code...
                       }
                    
                  
                       include("users.php");
                   }
                           
        
                       
                   
                }
                
                ?>
               
			</div><br><br>
			
	</div>
</body>
</html>