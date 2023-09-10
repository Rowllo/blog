<div style="display:flex;margin-top:20px;">
			<div style="min-height:400px;flex:1;background-color:grey;color:white;border-radius:10px;">
				<div style="margin-bottom:10px;heigh:50px;">
					<h3 class="span" style="text-align:center;">User Details</h3><br>
					<span class="span">Phone Nunber :</span><span class="span"><?php echo $value['phone']; ?></span><br><br>
					<span class="span">Email :</span><span class="span"><?php echo $value['email'] ;?></span><br><br>
					<span class="span">Gender :</span><span class="span"><?php echo $value['gender'] ;?></span><br><br>
					<span class="span">Age :</span><span class="span"><?php echo $value['dob'] ;?></span>
				</div>
				<div style="margin-top:15px;height:201px;border-radius:10px;">
					<h3 style="color:blue;margin-left:17px;">following</h3><br>
						<?php
							if($friends){
								foreach ($friends as $FRIEND) {
									# code...
									
									include("users.php");
								}
							}
								
						
						?>
				</div>
				
			</div>
			<div style="min-height:400px;flex:2;background-color:grey;margin-right:-3px;margin-left:100px;border-radius:10px;">
				<div>
					<form action="" method="post" enctype="multipart/form-data">
						<textarea name="post" id="text" placeholder="what's on your mind" style="width:830px;height:120px;" cols="30" rows="10"></textarea><br>
						<input style="background-color:white;width:757px;margin-top:-6px;" type="file" name="file">
						<input type="submit" name="save" value="post" style="float:right;margin-right:0px;height:30px;width:80px;color:white;background-color:blue;margin-top:-8px;">
					</form>
				</div><br><br>
				<div>
					<?php 
						
					
					foreach ($DATA as $key => $info) {
						# code...
					}
						if($ad_posts){
							foreach ($ad_posts as  $ROW) {
								# code...
								include("postad.php");
							}
						}
						if($posts){
							foreach($posts as $ROW){
							
								
								include("post.php");
								

							}

						}
						
					
					?>
				</div>
			</div>