<?php

   class signup{
	   
	   private $error = "";
	   public function evaluate($data){
		   
		   foreach($data as $key => $value){
			   
			   if(empty($value)){
				   $this->error = $this->error . $key . "is empty!<br>";
			   }
			   
		   }
		   if($this->error == ""){
			   
			   //no error
			   $this->create_user($data);
		   }else{
			   
			   return $this->error;
		   }
		   
	   }
	   
	   public function create_user($data){
		   
		   $fullname = $data['fullname'];
		   
		   $email = $data['email'];
		   $password = $data['password'];
		   $phone = $data['phone'];
		  
		   
		   //create these
		   $url_address = strtolower($fullname). "." .strtolower($phone);
		   $userid = $this->create_userid();
		   
		   $query = "INSERT INTO users(userid,fullname,gender,email,password,url_address,phone,dob) 
		   VALUES('$userid','$fullname','$email','$password','$url_address','$phone')";
		   return $query;
		   
		   $Db = new Database();
		   $Db->save($query);
		   
		   
	   }
	   
	   private function create_userid(){
		   
		   $length = rand(4,19);
		   $number = "";
           for($i = 0; $i < $length; $i++){
			   
			   $new_rand = rand(0,9);
			   
			   $number = $number . $new_rand;
			   
		   }		   
		   
		   return $number;
	   }
   }


include("sign_up.php");
    
	$fullname ="";
	$gender ="";
	$email = "";
	
	
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
	  
	$signup = new signup();
    $result = $signup->evaluate($_POST);	
	
	
	
	if($result!= ""){
		
		echo "<div style='text-aligncenter;font-size:12px;color:white;background-color:grey;'";
		echo "the following errors occured<br>";
		echo $result;
		echo "</div>";
	}
	$fullname =$_POST['fullname'];
	$email = $_POST['email'];

  }
   

?>