<?php


include("db.php");

function hash_pass($text){
    $text = hash("sha1", $text);
    return $text;
}

if(isset($_POST['email']) && isset($_POST['password'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    $email = validate($_POST['email']);
    $password = validate(($_POST['password']));

   
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' AND status = 'admin'";
    $result = mysqli_query($connection,$sql);

    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_assoc($result);
        

            $_SESSION['email'] = $row['email'];
           
            $_SESSION['userid'] = $row['userid'];
            $_SESSION['name'] = $row['name'];
           

           header("location:admin_profile.php");
    }else{
        
        header('location:admin_log.php');
        echo "incorrect email or password";
        exit();
    }
}


?>

<!DOCTYPE html>
<html lang="en" class="" style="background-color:#aaa;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rowllo's community</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <style>
.background{
	background-color:#aaa;
	
	color: white;
}
.header{
    color: white;
    background-color:rgb(98, 0, 255);
    text-align: center;
    height: 90px;
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
.form-control{
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    border-style: hidden;
    background-clip: padding-box;
    border: 1px hidden #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }
.login{
	
    font-weight:bold;	
	width:500px;  
	margin:auto; 
	color:blue;
	margin-top:50px;
	padding:20px;
	padding-top:70px;
	text-align:center;
}

.box2{
    height:50px;
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
.bar{
	height:100px; 
	background-color:aquamarine; 
	color:white; 
	font-size:20px;
}


</style>
</head>
    <header>
        <div class="bar">
            
            <div style="font-size:35px; color:blue; font-weight:bold;">Rowllo's community</div>
            
           

        </div>
    
        
    </header>
<body>
    <div class="login"">
        <h3>Admin Log In</h3>
        <br><br>
        <form action=""  class="form-control" method="post">
                <input type="text" class="box2" placeholder="Email" name="email"><br><br>
		    	<input type="password" class="box2"  placeholder="password" name="password"><br><br>
				<input type="submit" class="login_button"  name="button" value="Log in">
        </form>
    </div>
</body>
</html>