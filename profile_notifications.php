<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <style>
        .notifications{
            height:30px;
            background-color:#eee;
            color:#666;
            border :1px solid #aaa;
        }
    </style>
<body>
    <div class = "notifications">

    </div>
        <?php
        
            $sql = "SELECT * FROM notifications limit 30";
            $query = mysqli_query($connection,$sql);
        
        
        ?>
    
</body>
</html>