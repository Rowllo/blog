<?php

 class Database{
	 private $host = "localhost";
	 private $db_user = "root";
	 private $db_pass = "";
	 private $db_name = "blog_db"; 
	 
	 function connect(){
		 $connection = mysqli_connect($this->host,$this->db_user,$this->db_pass,$this->db_name);
		 return $connection;
	 }
	 function read($query){
		 $conn = $this->connect();
		 $result = mysqli_query($conn,$query);
		 if(!$result){
			 return false;
	 }else{
		 $data = false;
		 while($row = mysqli_fetch_assoc($result)){
			 $data[] = $row;
		 }
		 return $data;
	 }
	 }
	 function save($query){
		 
		 $conn = $this->connect();
		 $result = mysqli_query($conn,$query);
		 
		 if(!$result){
			 return false;
		 }else{
			 return true;
		 }
	 }
 }
    
	
?>