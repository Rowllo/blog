<?php

    include("db.php");
    include("function.php");

    $userid = $_SESSION['userid'];



if(isset($_SERVER['HTTP_REFERER'])){

    $return_to = $_SERVER['HTTP_REFERER'];
}else{
    $return_to = "profile.php";
}

if(isset($_GET['type']) && isset($_GET['id'])){

    $allowed[] = 'post';
    $allowed[] = 'user';
    $allowed[] = 'comment';

    if(in_array($_GET['type'], $allowed)){

        $post = like_post($_GET['id'],$_GET['type'],$_SESSION['userid']);
        $single_user = get_one_post($_GET['id']);
            foreach ($single_user as $key => $single_post) {
                # code...
            }
       

        if($_GET['type'] == "user"){
            $follow = follow_user($_GET['id'],$_GET['type'],$_SESSION['userid']);
            $single_user = get_user($_GET['id']);
            foreach ($single_user as $key => $single_post) {
                # code...
            }
           
        }
        $notification = add_notification($_SESSION['userid'],"like",$single_post);
            
    }     
       

}




    





    
  header("location: ". $return_to);
  die;


?>