<?php
	include("db.php");
    include("function.php");
	echo $_SESSION['userid'];

   

   
    if(isset($_GET['find'])){

        $find = addslashes($_GET['find']);
        $sql = "SELECT * FROM users WHERE name like '%$find%' limit 30";
        $query = mysqli_query($connection,$sql);
        
        $result = mysqli_fetch_assoc($query);

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
               
              
                
                
                if(is_array($result)){

                   foreach ($query as  $Likes) {
                       # code...
                       $FRIENDs = get_user($result['userid']);
                      
                                        
                       foreach ($FRIENDs as $key => $FRIEND) {
                           # code...
                       }
                    
                  
                       include("users.php");
                   
                           
        
                       
                   
                    }
                }else{

                    echo "no results were found";
                   }
                
                ?>
               
			</div><br><br>
			
	</div>
</body>
</html>