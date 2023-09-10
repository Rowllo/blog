<?php
  
  include("db.php");
  
  $fullname = "";
  $password = "";
  $gender = "";
  $email = "";
  $dob = "";
  $phone = "";
  $username = "";
  
  if(isset($_POST['save'])){


	  
	  $fullname = $_POST['fullname'];
	  $password = $_POST['password'];
	  $gender = $_POST['gender'];
	  $email = $_POST['email'];
	  $dob = $_POST['dob'];
	  $phone = $_POST['phone'];
	  $username = $_POST['username'];
	  
      $Password = hash("sha1", $password);

      $number = rand(1,999);
		   
           
         $userid = $username . $number;

        $sql = "INSERT INTO users(name,password,gender,email,dob,phone,username,userid) 
        VALUES('$fullname','$Password','$gender','$email','$dob','$phone','$username','$userid')";
  
         $query = mysqli_query($connection,$sql);

        
	  
         if($query==true){
           // header("location:log.php");
           echo $phone;
      
        }else{
            echo "Registration was not successful";
        }
  }

  

    
  


  
 
   
  
  
   
   
   
   
   
   
   
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rowllo's community</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<style>
.background{
	background-color:#aaa;
	background-image: url(image/forest.jpg);
	color: white;
}
.bar{
	height:100px; 
	background-color:aquamarine; 
	color:white; 
	font-size:20px;
}
.bar{
	height:100px; 
	background-color:none; 
	 
	padding:4px;
}
.signup_button{
	background-color:blue;
	width:70px;
	text-align:center;
	height: 20px;
	margin-right: 10px;
	padding:4px;
	border-radius:4px;
	float:right;
	color: white;
}
.login{
    font-weight:bold;	
	width:500px;  
	margin:auto; 
	color:aquamarine;
	margin-top:4px;
	padding:20px;
	padding-top:70px;
	text-align:center;
}

.box{
	height:40px;
	width:300px;
	border-radius:4px;
	border:solid 1px #888;
	padding:4px;
	font-size:14px;
}
.login_button{
	background-color:blue;
	height:30px;
	width:100px;
	border-radius:4px;
	color:white;
	border:none;
}
</style>
<body class="background" class="img-responsive">
    <div class="bar"> 
	  
         <div style="font-size:35px; color:blue; font-weight:bold;"> Rowllo's community</div>
        <a href="log.php">
         <div class="signup_button" style="font-size:15px;">Log in</div>
        </a>
   </div>
   <div class="login">
       <span style="color:white; font-weight:bold"> REGISTRATION</span>
    <br><br><br>
     
     <form method="POST" class="form-control" action="">
     
        <input type="email"  class="box" placeholder="Email" name="email"><br><br>
     
        <input type="password"  class="box"  placeholder="password" name="password"><br><br>
     
        <input type="password" class="box"  placeholder="retype password" name="password"><br><br>
     
        <input type="text" class="box"   placeholder="Fullname" name="fullname"><br><br>
     
             <span style="font-weight:normal;">Gender</span><br>
         <select class="box" name = "gender">
             <option>Male</option>
             <option>Female</option>
     </select><br><br>
     
         <input type="text" class="box"  placeholder="username" name="username"><br><br>
     
         <input type="text" class="box"  placeholder="phone nunber" name="phone"><br><br>
     
         <input type="text" class="box"  placeholder="yyyy-mm-dd" name="dob"><br><br>
     
     
     <input type="submit" class="login_button"  name="save" value="sign up">
     <br><br><br>
     </form>
   </div>
    
</body>
</html>