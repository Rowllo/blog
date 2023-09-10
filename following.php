<?php
 include("db.php");
 
 $userid = $_SESSION['userid'];
 if(isset($_GET['type']) && isset($_GET['id'])){

            //save likes details
            $sql = "SELECT likes  FROM likes WHERE type = 'user' && contentid = '$_GET[id]' limit 1 ";
            $query = mysqli_query($connection,$sql);
            $sql2 = "SELECT follows  FROM likes WHERE type = 'user' && contentid = '$userid' limit 1 ";
            $query2 = mysqli_query($connection,$sql2);

           $results = mysqli_fetch_assoc($query);
           $results2 = mysqli_fetch_assoc($query2);
            
          if(is_array($results) && is_array($results2)){
                $likes = json_decode($results['likes'],true);
                $follows = json_decode($results2['follows'],true);

                $user_ids = array_column($likes, "userid");
                $user_idsf = array_column($follows, "userid");
               if(!in_array($userid, $user_ids) && !in_array($_GET['id'], $user_idsf)){

                    $arr["userid"] = $userid;
                    $arr["date"] = date("Y-m-d H:i:s");
                    $likes[] = $arr;

                    $arrf["userid"] = $_GET['id'];
                    $arrf["date"] = date("Y-m-d H:i:s");
                    $follows[] = $arrf;
        
                    $likes_string = json_encode($likes);
                    $follows_string = json_encode($follows);
        
                    $sql = "UPDATE likes set likes = '$likes_string' WHERE type = 'user' && contentid='$_GET[id]' limit 1";
                    $query= mysqli_query($connection,$sql);
                    $sql = "UPDATE likes set follows = '$follows_string' WHERE type = 'user' && contentid='$userid' limit 1";
                    $query= mysqli_query($connection,$sql);

                    // increment post like
                    $sql = "UPDATE users SET likes = likes + 1 WHERE userid = '$_GET[id]' limit 1 ";
                    $query = mysqli_query($connection,$sql);

               }else{
                    $key = array_search($userid, $user_ids);
                    unset($likes[$key]);
                    $key = array_search($_GET['id'], $user_idsf);
                    unset($follows[$key]);

                    $likes_string = json_encode($likes);
                    $follows_string = json_encode($follows);
        
                    $sql = "UPDATE likes set likes = '$likes_string' WHERE type = 'user' && contentid='$_GET[id]' limit 1";
                    $query= mysqli_query($connection,$sql);
                    $sql = "UPDATE likes set follows = '$follows_string' WHERE type = 'user' && contentid='$userid' limit 1";
                    $query= mysqli_query($connection,$sql);

                    // decrement post like
                    $sql = "UPDATE users SET likes = likes - 1 WHERE userid = '$_GET[id]' limit 1 ";
                    $query = mysqli_query($connection,$sql);
               }
            
          }else{
                $arr["userid"] = $userid;
                $arr["date"] = date("Y-m-d H:i:s");

                $arrf["userid"] = $_GET['id'];
                $arrf["date"] = date("Y-m-d H:i:s");

                $arr2[] = $arr;
                $arr2f[] = $arrf;

                $likes = json_encode($arr2);
                $follows = json_encode($arr2f);

                $sql = "INSERT INTO likes(type,contentid,likes) VALUES('$_GET[type]','$_GET[id]','$likes')";
                $query= mysqli_query($connection,$sql);
                $sql3 = "SELECT * FROM likes WHERE type = 'user' && contentid = '$_GET[id]' limit 1 ";
                $query3 = mysqli_query($connection,$sql3);
               if(mysqli_num_rows($query3) > 0){
                   $sql = "UPDATE likes SET follows = '$follows' WHERE contentid = '$userid' limit 1 ";
                   $query = mysqli_query($connection,$sql);
               }else{
                   $sql2 = "INSERT INTO likes(type,contentid,follows) VALUES('$_GET[type]','$userid','$follows')";
                   $query= mysqli_query($connection,$sql2);
               }
                
                

                // increment post like
                $sql = "UPDATE users SET likes = likes + 1 WHERE userid = '$_GET[id]' limit 1 ";
                $query = mysqli_query($connection,$sql);
          }


 }

?>