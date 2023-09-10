<?php


// profile functions

function generate_filename($length){
	$array = array(0,1,2,3,4,5,6,8,9,0,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$text="";
		for ($x=0; $x < $length; $x++) { 
			$random = rand(0,61);
			$text = $array[$random];
		}
		return $text;
	
}
function get_profile($id){
	global $connection;
	$id = addslashes($id);
	$sql = "SELECT * FROM users WHERE userid = '$id' limit 1";
	$query = mysqli_query($connection,$sql);
	return $query;
}

function create_admin_post($userid,$data,$files){
	global $connection;
	if(!empty($data['post']) || !empty($_FILES['file']['name'])){
		$myimage = "";
		$has_image = 0;
		$is_profile = 0;
		$is_cover = 0;
		if(isset($data['is_profle']) || isset($data['is_cover'])){
			$myimage = $files;
			$has_image = 1;
			if(isset($data['is_profile'])){
				$is_profile = 1;

			}
			if(isset($data['is_cover'])){
				$is_cover = 1;

			}
			

		}else{

			
			if(!empty($_FILES['file']['name'])){
				$folder = "uploads/".$userid."/";
				if(!file_exists($folder)){
					mkdir($folder,0777,true);
					file_put_contents($folder . "index.php", "");
				}
				$image_name = generate_filename(15);
				$myimage = $folder.$image_name;
				move_uploaded_file($_FILES['file']['tmp_name'],$myimage);
				$has_image = 1;
			}
			
		}
		$post = "";
		if(isset($data['post'])){
			$post = addslashes($data['post']);

		}
        $parent = 0;
        if(isset($data['parent'])){
            $parent = $data['parent'];
        }
		
		$postid = create_postid();
		$sql = "INSERT INTO admin_post(post,postid,userid,image,has_image) VALUES('$post','$postid','$userid','$myimage','$has_image')";
		$query = mysqli_query($connection,$sql);
	}else{
		echo "compose a post";
	}
}


function create_post($userid,$data,$files){
	global $connection;
	if(!empty($data['post']) || !empty($_FILES['file']['name'])){
		$myimage = "";
		$has_image = 0;
		$is_profile = 0;
		$is_cover = 0;
		if(isset($data['is_profle']) || isset($data['is_cover'])){
			$myimage = $files;
			$has_image = 1;
			if(isset($data['is_profile'])){
				$is_profile = 1;

			}
			if(isset($data['is_cover'])){
				$is_cover = 1;

			}
			

		}else{

			
			if(!empty($_FILES['file']['name'])){
				$folder = "uploads/".$userid."/";
				if(!file_exists($folder)){
					mkdir($folder,0777,true);
					file_put_contents($folder . "index.php", "");
				}
				$image_name = generate_filename(15);
				$myimage = $folder.$image_name;
				move_uploaded_file($_FILES['file']['tmp_name'],$myimage);
				$has_image = 1;
			}
			
		}
		$post = "";
		if(isset($data['post'])){
			$post = addslashes($data['post']);

		}
        $parent = 0;
        if(isset($data['parent'])){
            $parent = $data['parent'];
        }
		
		$postid = create_postid();
		$sql = "INSERT INTO posts(post,postid,userid,image,has_image,is_profile,is_cover,parent) VALUES('$post','$postid','$userid','$myimage','$has_image','$is_profile','$is_cover','$parent')";
		$query = mysqli_query($connection,$sql);
	}else{
		echo "compose a post";
	}
}

function create_comment($userid,$data,$files,$id){
	global $connection;
	if(!empty($data['post']) || !empty($_FILES['file']['name'])){
		$myimage = "";
		$has_image = 0;
		
		if(isset($data['is_profle']) || isset($data['is_cover'])){
			$myimage = $files;
			$has_image = 1;
			if(isset($data['is_profile'])){
				$is_profile = 1;

			}
			if(isset($data['is_cover'])){
				$is_cover = 1;

			}
			

		}else{

			
			if(!empty($_FILES['file']['name'])){
				$folder = "uploads/".$userid."/";
				if(!file_exists($folder)){
					mkdir($folder,0777,true);
					file_put_contents($folder . "index.php", "");
				}
				$image_name = generate_filename(15);
				$myimage = $folder.$image_name;
				move_uploaded_file($_FILES['file']['tmp_name'],$myimage);
				$has_image = 1;
			}
			
		}
		$comment = "";
		if(isset($data['post'])){
			$comment = addslashes($data['post']);

		}
        $parent = 0;
        if(isset($data['parent'])){
            $parent = $data['parent'];
        }
		
		$commentid = create_postid();
		$sql = "INSERT INTO comments(userid,postid,comment,commentid,parent,image,has_image) VALUES('$userid','$id','$comment','$commentid','$parent','$myimage','$has_image')";
		$query = mysqli_query($connection,$sql);
	}else{
		echo "compose a post";
	}
}


function create_postid(){
	$lenght = rand(2,85);
	$number = "";
	for ($i=0; $i < $lenght ;$i++) { 
	 # c
	  $new_rand = rand(4,259);
	  $numb = rand(6,907);
	  $rannumb = rand(34,778);
	  $randnu = rand(5,877);
	  $numb1 = rand(2,85);
	  $number =$numb . $new_rand . $rannumb;
	}

	return $number;
}

function get_user($id){
	global $connection;
	$sql = "SELECT * FROM users WHERE userid = '$id' limit 1";
	$query = mysqli_query($connection,$sql);
	if($query){
		return $query;

	}else{
		return false;
	}
}

function get_user_admin($id){
	global $connection;
	$sql = "SELECT * FROM users WHERE userid = '$id' limit 1";
	$query = mysqli_query($connection,$sql);
	if($query){
		return $query;

	}else{
		return false;
	}
}
function get_admin($id){
	global $connection;
	$sql = "SELECT * FROM admin_user WHERE userid = '$id' limit 1";
	$query = mysqli_query($connection,$sql);
	if($query){
		return $query;

	}else{
		return false;
	}
}

function get_post($id){
	global $connection;
	$sql = "SELECT * FROM posts WHERE userid = '$id' order by id desc limit 10";
	$query = mysqli_query($connection,$sql);

	if($query){
		return $query;
	}else{
		return false;
	}
}

function get_admin_post(){
	global $connection;
	$sql = "SELECT * FROM admin_post  order by id desc limit 10";
	$query = mysqli_query($connection,$sql);

	if($query){
		return $query;
	}else{
		return false;
	}
}

function get_comments($id){
	global $connection;
	$sql = "SELECT * FROM comments WHERE postid = '$id' order by id asc limit 20";
	$query = mysqli_query($connection,$sql);

	if($query){
		return $query;
	}else{
		return false;
	}
}

function get_friends($id){
    global $connection;
    $sql = "SELECT * FROM users WHERE userid != '$id'";
    $query = mysqli_query($connection,$sql);
    if($query){
       return $query;
    }else{
        return false;
    }
}

function my_post($postid,$userid){
	global $connection;
	if(!is_numeric($postid)){
		return false;
	}
	$sql = "SELECT * FROM posts WHERE postid = '$postid' limit 1";
	$query = mysqli_query($connection,$sql);

	$result = mysqli_fetch_assoc($query);

	if(is_array($result)){
		if($result['userid']== $userid){
			return true;
		}
	
	}
	return false;
}

function my_post_admin($postid){
	global $connection;
	if(!is_numeric($postid)){
		return false;
	}
	$sql = "SELECT * FROM posts WHERE postid = '$postid' limit 1";
	$query = mysqli_query($connection,$sql);

	foreach ($query as $key => $result) {
		# code...
	}

	
}
//profile_following functions
function get_following($id,$type){
    global $connection;

    if($type == "post"){

            //get likes details
        $sql2 = "SELECT followings FROM likes WHERE type = 'post' && contentid = '$id' limit 1 ";
        $results = mysqli_query($connection,$sql2);
        $result = mysqli_fetch_assoc($results);
        if(is_array($result)){
            $following = json_decode($result['followings'],true);
            return $following;
        }
    }elseif($type == "user"){
             //get likes details
             $sql2 = "SELECT likes FROM follows WHERE type = 'user' && contentid = '$id' limit 1 ";
             $results = mysqli_query($connection,$sql2);
             $result = mysqli_fetch_assoc($results);
             if(is_array($result)){
                 $following = json_decode($result['likes'],true);
                 return $following;
             }

    }
    return false;
}
function like_post($id,$type,$userid){
    global $connection;
    if($_GET['type'] == "post"){

        //save likes details
        $sql = "SELECT likes FROM likes WHERE type = '$type' && contentid = '$id' limit 1 ";
        $query = mysqli_query($connection,$sql);

       $results = mysqli_fetch_assoc($query);
        
        if(is_array($results)){
            $likes = json_decode($results['likes'],true);

            $user_ids = array_column($likes, "userid");
            if(!in_array($userid, $user_ids)){

                $arr["userid"] = $userid;
                $arr["date"] = date("Y-m-d H:i:s");
                $likes[] = $arr;
    
                $likes_string = json_encode($likes);
    
                $sql = "UPDATE likes set likes = '$likes_string' WHERE type = 'post' && contentid='$id' limit 1";
                $query= mysqli_query($connection,$sql);

                // increment post like
                $sql = "UPDATE posts SET likes = likes + 1 WHERE postid = '$id' limit 1 ";
                $query = mysqli_query($connection,$sql);

            }else{
                $key = array_search($userid, $user_ids);
                unset($likes[$key]);

                $likes_string = json_encode($likes);
    
                $sql = "UPDATE likes set likes = '$likes_string' WHERE type = 'post' && contentid='$id' limit 1";
                $query= mysqli_query($connection,$sql);

                // decrement post like
                $sql = "UPDATE posts SET likes = likes - 1 WHERE postid = '$id' limit 1 ";
                $query = mysqli_query($connection,$sql);
            }
        
        }else{
            $arr["userid"] = $userid;
            $arr["date"] = date("Y-m-d H:i:s");

            $arr2[] = $arr;

            $likes = json_encode($arr2);

            $sql = "INSERT INTO likes(type,contentid,likes) VALUES('$type','$id','$likes')";
            $query= mysqli_query($connection,$sql);

            // increment post like
            $sql = "UPDATE posts SET likes = likes + 1 WHERE postid = '$id' limit 1 ";
            $query = mysqli_query($connection,$sql);
        }
   }elseif($_GET['type'] == "user"){

               //save likes details
           $sql = "SELECT likes  FROM likes WHERE type = '$type' && contentid = '$id' limit 1 ";
           $query = mysqli_query($connection,$sql);
       

       $results = mysqli_fetch_assoc($query);

      
       
           
       if(is_array($results)){
               $likes = json_decode($results['likes'],true);
           

               $user_ids = array_column($likes, "userid");
               
           if(!in_array($userid, $user_ids)){

                   $arr["userid"] = $userid;
                   $arr["date"] = date("Y-m-d H:i:s");
                   $likes[] = $arr;
       
                   $likes_string = json_encode($likes);
               
       
                   $sql = "UPDATE likes set likes = '$likes_string' WHERE type = 'user' && contentid='$id' limit 1";
                   $query= mysqli_query($connection,$sql);

                   // increment post like
                   $sql = "UPDATE users SET likes = likes + 1 WHERE userid = '$id' limit 1 ";
                   $query = mysqli_query($connection,$sql);

           }else{
                   $key = array_search($userid, $user_ids);
                   unset($likes[$key]);
               

                   $likes_string = json_encode($likes);
                   
       
                   $sql = "UPDATE likes set likes = '$likes_string' WHERE type = 'user' && contentid='$id' limit 1";
                   $query= mysqli_query($connection,$sql);
               

                   // decrement post like
                   $sql = "UPDATE users SET likes = likes - 1 WHERE userid = '$id' limit 1 ";
                   $query = mysqli_query($connection,$sql);
           }
           
       }else{
               $arr["userid"] = $userid;
               $arr["date"] = date("Y-m-d H:i:s");

           

               $arr2[] = $arr;
           

               $likes = json_encode($arr2);
           
               $sql = "INSERT INTO likes(type,contentid,likes) VALUES('$type','$id','$likes')";
               $query= mysqli_query($connection,$sql);
           

               // increment post like
               $sql = "UPDATE users SET likes = likes + 1 WHERE userid = '$id' limit 1 ";
               $query = mysqli_query($connection,$sql);
       }
   }

}

function follow_user($id,$type,$my_userid){
    global $connection;

        //save likes details
        $sql = "SELECT likes FROM follows WHERE type = 'user' && contentid = '$my_userid' limit 1 ";
        $query = mysqli_query($connection,$sql);

       $results =  mysqli_fetch_assoc($query);

      
        
        if(is_array($results)){
            $likes = json_decode($results['likes'],true);

            $user_ids = array_column($likes, "userid");
            if(!in_array($id, $user_ids)){

                $arr["userid"] = $id;
                $arr["date"] = date("Y-m-d H:i:s");
                $likes[] = $arr;
    
                $likes_string = json_encode($likes);
    
                $sql = "UPDATE follows set likes = '$likes_string' WHERE type = 'user' && contentid='$my_userid' limit 1";
                $query= mysqli_query($connection,$sql);

               

            }else{
                $key = array_search($id, $user_ids);
                unset($likes[$key]);

                $likes_string = json_encode($likes);
    
                $sql = "UPDATE follows set likes = '$likes_string' WHERE type = 'user' && contentid='$my_userid' limit 1";
                $query= mysqli_query($connection,$sql);

               
            }
        
        }else{
            $arr["userid"] = $id;
            $arr["date"] = date("Y-m-d H:i:s");

            $arr2[] = $arr;

            $likes = json_encode($arr2);

            $sql = "INSERT INTO follows(type,contentid,likes) VALUES('$type','$my_userid','$likes')";
            $query= mysqli_query($connection,$sql);

           
        }

   
}


// likes functions
function get_one_post($postid){
    global $connection;
    if(!is_numeric($postid)){
        return false;
    }
    $sql = "SELECT * FROM posts WHERE postid = '$postid' limit 1";
    $query = mysqli_query($connection,$sql);

    if($query){
        return $query;
    }else{
        return false;
    }
}

function delete_post($postid){
    global $connection;
    if(!is_numeric($postid)){
        return false;
    }
    $sql = "DELETE FROM posts WHERE postid = '$postid' limit 1";
    $query = mysqli_query($connection,$sql);

   
}

function delete_user($id){
    global $connection;
    
    $sql = "DELETE FROM users WHERE userid = '$id' limit 1";
    $query = mysqli_query($connection,$sql);

}

function get_likes($id,$type){
    global $connection;

    if($type == "post"){

            //get likes details
        $sql2 = "SELECT likes FROM likes WHERE type = 'post' && contentid = '$id' limit 1 ";
        $results = mysqli_query($connection,$sql2);
        foreach ($results as $key => $result) {
            # code...
        }
        if(is_array($result)){
            $likes = json_decode($result['likes'],true);
            return $likes;
        }
    }elseif($type == "user"){
             //get likes details
             $sql2 = "SELECT likes FROM likes WHERE type = 'user' && contentid = '$id' limit 1 ";
             $results = mysqli_query($connection,$sql2);
             $result = mysqli_fetch_assoc($results);
             if(is_array($result)){
                 $likes = json_decode($result['likes'],true);
                 return $likes;
             }

    }
    return false;
}
/*
// the like function
function like_post($id,$type,$userid){
    global $connection;
    
            //save likes details
            $sql = "SELECT likes FROM likes WHERE type = 'post' && contentid = '$id' limit 1 ";
            $results = mysqli_query($connection,$sql);
            
            if(is_array($results)){
                $likes = json_decode($results[0]['likes'],true);

                $user_ids = array_column($likes, "userid");
                if(!in_array($userid, $user_ids)){

                    $arr["userid"] = $userid;
                    $arr["date"] = date("Y-m-d H:i:s");
                    $likes[] = $arr;
        
                    $likes_string = json_encode($likes);
        
                    $sql = "UPDATE likes set likes = '$likes_string' WHERE type = '{$type}' && contentid='$id' limit 1";
                    $query= mysqli_query($connection,$sql);

                    // increment post like
                    $sql = "UPDATE {$type}s SET likes = likes + 1 WHERE {$type}id = '$id' limit 1 ";
                    $query = mysqli_query($connection,$sql);

                }else{
                    $key = array_search($userid, $user_ids);
                    unset($likes[$key]);

                    $likes_string = json_encode($likes);
        
                    $sql = "UPDATE likes set likes = '$likes_string' WHERE type = '$type' && contentid='$id' limit 1";
                    $query= mysqli_query($connection,$sql);

                    // decrement post like
                    $sql = "UPDATE {$type}s SET likes = likes - 1 WHERE {$type}id = '$id' limit 1 ";
                    $query = mysqli_query($connection,$sql);
                }
            
            }else{
                $arr["userid"] = $userid;
                $arr["date"] = date("Y-m-d H:i:s");

                $arr2[] = $arr;

                $likes = json_encode($arr2);

                $sql = "INSERT INTO likes(type,contentid,likes) VALUES('$type','$id','$likes')";
                $query= mysqli_query($connection,$sql);

                // increment post like
                $sql = "UPDATE {$type}s SET likes = likes + 1 WHERE {$type}id = '$id' limit 1 ";
                $query = mysqli_query($connection,$sql);
            }

    
   
}*/

// the edit function
function edit_post($data,$files){
    global $connection;
    if(!empty($data['post']) || !empty($_FILES['file']['name'])){
        $myimage = "";
        $has_image = 0;
      
       

            
            if(!empty($_FILES['file']['name'])){
                $folder = "uploads/".$userid."/";
                if(!file_exists($folder)){
                    mkdir($folder,0777,true);
                    file_put_contents($folder . "index.php", "");
                }
                $image_name = generate_filename(15);
                $myimage = $folder.$image_name;
                move_uploaded_file($_FILES['file']['tmp_name'],$myimage);
                $has_image = 1;
            }
            
        
        $post = "";
        if(isset($data['post'])){
            $post = addslashes($data['post']);

        }
        
        $postid = addslashes($data['postid']) ;

        if($has_image){
            $sql = "UPDATE posts SET post = '$post', image = '$myimage' WHERE postid = '$postid' limit 1";
        }else{
            $sql = "UPDATE posts SET post = '$post' WHERE postid = '$postid' limit 1";
        }
        
        $query = mysqli_query($connection,$sql);
    }else{
        echo "compose a post";
    }
}

function pagination_link(){
    // get current url
    global $page_number;
    $url = "http://.".$_SERVER['SERVER_NAME']. $_SERVER['SCRIPT_NAME'];
    $url .= "?";
    $num = 0;
    $next_page_link = $url;
    $prev_page_link = $url;
    $page_found = false;
    $arr['next_page'] = "";
    $arr['prev_page'] = "";
    foreach ($_GET as $key => $value) {
        # code...
        $num++;
        if($num == 1){
            if($key == "page"){
                $next_page_link .= $key . "=" .($page_number + 1);
                $prev_page_link .= $key . "=" .($page_number - 1);
                $page_found = true;
    
            }else{
                $next_page_link .= "$" .$key ."=" .$value;
                $prev_page_link .= "$" .$key ."=" .$value;
            }

        }else{
            if($key == "page"){
                $next_page_link .= $key . "=" .($page_number + 1);
                $prev_page_link .= $key . "=" .($page_number - 1);
                $page_found = true;
            }else{
                $next_page_link .= "$" .$key ."=" .$value;
                $prev_page_link .= "$" .$key ."=" .$value;
            }
        }
       
       
    }
    $arr['next_page'] = $next_page_link;
    $arr['prev_page'] = $prev_page_link;

    return $arr;

}

function add_notification($id,$activity,$row){
    global $connection;
    $content_owner = $row['userid'];
    $userid = esc($id);
    $activity = esc($activity);
    $contentid = 0;
    $content_type = "";
    $date = date("y-m-d h:i:s");

    if(isset($row['postid'])){
        $contentid = $row['postid'];
        $content_type = "post";

        if($row->parent > 0){
            $content_type = "comment";
        }
    }
    if(isset($row['gender'])){
        $content_type = "profile";
    }
    

    $sql = "INSERT INTO notifications(userid,activity,contentid,content_owner,content_type,date) VALUES('$userid','$activity','$contentid','$content_owner','$content_type','$date')";
    $query = mysqli_query($connection,$sql);
}

function content_i_follow($id,$row){
   
    $userid = esc($id);
   
    $contentid = 0;
    $content_type = "";
    $date = date("y-m-d h:i:s");

    if(isset($row->postid)){
        $contentid = $row->postid;
        $content_type = "post";

        if($row->parent > 0){
            $content_type = "comment";
        }
    }
    if(isset($row->gender)){
        $content_type = "profile";
    }

    $sql = "INSERT INTO notifications(userid,contentid,content_type,date) VALUES('$userid','$contentid','$content_type','$date')";
    $query = mysqli_query($connection,$sql);
}

function esc($value){

    return addslashes($value);
    
}

?>