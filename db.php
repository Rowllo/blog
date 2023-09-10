<?php

$server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "blog_db";
$connection = mysqli_connect($server,$db_user,$db_pass,$db_name) or die("connection failed");

session_start();



?>