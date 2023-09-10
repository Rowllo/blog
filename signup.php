<?php
  
  include("db.php");
  
  $fullname = $_POST['fullname'];
  $password = $_POST['password'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $dob = $_POST['dob'];
  $phone = $_POST['phone'];
  $username = $_POST['username'];
  
  if(isset($_POST['save'])){
	  
	  $fullname = $_POST['fullname'];
	  $password = $_POST['password'];
	  $gender = $_POST['gender'];
	  $email = $_POST['email'];
	  $dob = $_POST['dob'];
	  $phone = $_POST['phone'];
	  $username = $_POST['username'];
	  
	  
	   
  }
  $sql = "INSERT INTO users(name,password,gender,email,dob,phone,username) 
  VALUES('$fullname','$password','$gender','$email','$dob','$phone','$username')";
  
  $query = mysqli_query($connection,$sql);
 
  
   
   
   
   
   
   
   
   
?>
<!DOCTYPE>
<html
<link rel = "boostrap" href = "boostrap">
<link rel="stylesheet" href = "stylesheet.css">
  <head>
    <title>DANIEL'SBLOG | signup</title>
  </head>
  <style>
  
.bar{
	height:100px; 
	background-color:blue; 
	color:white; 
	padding:4px;
}
.signup_button{
	background-color:indigo;
	width:70px;
	text-align:center;
	padding:4px;
	border-radius:4px;
	float:right;
}
.login{
	background-color:white;
    font-weight:bold;	
	width:800px;  
	margin:auto; 
	margin-top:50px;
	padding:10px;
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
	background-color:indigo;
	height:30px;
	width:300px;
	border-radius:4px;
	color:white;
	border:none;
}

html{
	height:100%;
}

*{
	padding:0;
	margin:0;
}

  </style>
  <body style="font-family:tahoma; background-color:grey; background-image:url(image/abstract.jpg)">
      <div class="bar"> 
	  
	     <div style="font-size:20px; font-weight:bold;"> DANIEL'SBLOG</div>
		 
 		  <div class="signup_button" style="font-size:15px;">Log in</div>
		  
	  </div>
      <div class="login">
	    REGISTRATION<br><br><br>
		
		<form method="POST" action="">
		
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