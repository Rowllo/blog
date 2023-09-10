
    <?php

    $sql = "SELECT * FROM posts WHERE has_image = 1 && userid = '$value[userid]' order by id desc limit 30";
    $query = mysqli_query($connection,$sql);

    $images = mysqli_fetch_assoc($query);
   
  
    if(is_array($images)){
        foreach ($query as  $image_row) {
            # code...
          include("photo.php");
        }
        
       
       
        
    }else{
        echo " no images were found";
    }
    print_r($images['image']);
    ?>


