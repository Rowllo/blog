<?php
    include("db.php");
    include("function.php");

       

  
?>

        <!DOCTYPE html>
        <html lang="en" style="background-color:#aaa;"">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Rowllo's community | profile</title>
            <link rel="stylesheet" href="style3.css">
            <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

            <style>
                .bar{
	height:100px; 
	background-color:#5f9ea0; 
	color:white; 
	font-size:20px;
    margin-top:-18px;
}

            </style>
        </head>
        <header class="bar">
            <h2>Rowllo's community</h2>
            <h3 style="float:right;margin-top:-40px;">
                <a href="log.php">
                     <span class="span">Log out</span> 
                 </a>
            </h3>
        </header><br>
        <body>
            
            
            <div style="display:flex;margin-top:20px;">
                
                
                    <div style="height:150px;background-color::#aaa;">
                            
                            
                    
        
                        <?php 
        
        
                            
                            $sql = "SELECT * FROM users";
                            $query = mysqli_query($connection,$sql);
                            $result = mysqli_fetch_assoc($query);
                            foreach ($query as $key => $value) {

                                # code...
                                $friend = get_user($value['userid']);
                                foreach ($friend as $key => $FRIEND) {
                                    # code...
                                    include("users_admin.php");
                                }
                            
                            }
                                    
                        ?>
        
                    
                                    
                </div><br><br>
            </div>
        </body>
        </html>