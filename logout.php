<?php

include("db.php");

if($_SESSION['userid']){
    $_SESSION['userid'] = NULL;
    unset($_SESSION['userid']);

}
header("location:login.php");
die;



?>