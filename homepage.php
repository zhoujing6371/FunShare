<?php

	include dirname(__DIR__).'/funshare/global/connectdb.php';
	
	session_start();
	
	$msg = "";

	$user_id = "";
		
	$username = "";
		
	$profile_photo = "";
	
	$posts = "";
	
	if(array_key_exists("user_id", $_COOKIE)) {
		
		$_SESSION['user_id'] = $_COOKIE['user_id'];
		
	}
	
	if(!array_key_exists("user_id", $_SESSION)) {
		
		header("Location: login.php");
		
		exit();
		
	} else {
			
		$user_id = $_SESSION['user_id'];
			
		$currentTime = date("Y-m-d h:i:sa");	
		
		// if upload button is pressed
		if(isset($_POST['submit'])) { 
	
			// truncate to get the file name
			$name = basename($_FILES['photoPost']['name']);
			
			// get the extension of the file
			$extention = strtolower(pathinfo($name, PATHINFO_EXTENSION));
			
			// define the allowed format of files
			$allowedFormat = array('jpg', 'jpeg', 'png', 'gif', 'mp4', 'avi', 'mov', 'mpg', 'flv');
			
			// allowed image formate
			$imgFormat=array('jpg', 'jpeg', 'png', 'gif');
			
			// allowed video format
			$videoFormat=array('mp4', 'avi', 'mov', 'mpg', 'flv');
			
			// the path to store the uploaded image
			$image_path = "image/".$name;
			
			// Get all the submitted data from the form
			$text = $_POST['makePost'];
				
			if(!in_array($extention, $allowedFormat)) {
				
				echo 'The file format is not allowed. Try another one again.';
				
			} else {
			
				// prepare sql and bind parameters
				$sql = "INSERT INTO `photo`(`user_id`, `caption`, `image_path`, `date_created`, `date_updated`) VALUES ($user_id, '$name', '$image_path', '$currentTime', '$currentTime')";
				
				// stores the submitted data into the database table: photo
				if(mysqli_query($con, $sql)) {
					
					// Now let's move the uploaded image into the folder: image{
					if(move_uploaded_file($_FILES['photoPost']['tmp_name'], $image_path)) {
						
						$msg .= "Image uploaded successfully";
					
						// Insert post for the uploaded image to database
						$last_id = mysqli_insert_id($con);
						
						$sql = "INSERT INTO `posts`(`user_id`, `photo_id`, `post_content`, `date_created`) VALUES ($last_id, $user_id, '$text', '$currentTime')";
				
						// stores the submitted data into the database table: photo
						if(mysqli_query($con, $sql)) {
							
							$msg .= " Post uploaded successfully";
							
						} else {
							
							$msg .= "There was a problem uploading post";
							
						}
					
					} else {
						
						$msg .= "There was a problem uploading image";
						
					}					
					
				} else {
					
					$msg .= "There's an error to upload your file. ";

				}		

				echo $msg;			
				
			}
			
		}	

		$query = "SELECT * FROM user WHERE user_id = '$user_id'";
		
		$result = mysqli_query($con, $query);
		
		if(mysqli_num_rows($result) > 0) {
			
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				
				$profile_photo = $row['profile_photo'];
				
				$username = $row['username'];
				
			}
			
		}
		
		// pull followers posts out of database
		$query = "SELECT * FROM photo WHERE user_id IN (SELECT followee FROM following WHERE follower = '$user_id')";
		
		$posts = mysqli_query($con, $query);
		
	}	
							
	// add comment to database				
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["commentVar"])) {
		
		$comment_content = "";
		
		$error = "";
		
		if(empty($_POST["comment_content"])) {
			
			$error = '<p class="text-danger">Comment is required</p>';
			
		} else {
			
			$comment_content = $_POST["comment_content"];
			
		}
		
		if($error == '') {
		 
			$photo_id=$_POST["commentVar"];
		  
			$query="INSERT INTO comment (`comment`, `user_id`, `photo_id`, `date_created`) VALUES ('$comment_content','$user_id','$photo_id','$currentTime')";
			
			if (!mysqli_query($con,$query)) {
				
				die('Error: ' . mysqli_error($con));
				
			}
			
		}									
	}
	
	// add likes to database				
	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["likeVar"])) {
		
		$photo_id=$_POST["likeVar"];
	  
		$query="UPDATE `photo` SET `likes`=`likes`+1 WHERE photo_id = $photo_id";
		
		if (!mysqli_query($con,$query)) {
			
			die('Error: ' . mysqli_error($con));
			
		}	
		
	}	
							
?>

<!DOCTYPE html>
<html lang="en">

	<?php include dirname(__DIR__).'/funshare/global/header.php'; ?>
  
        <div class="container text-center" style="margin-top:65px;">
		
            <div class="row">
			
                <div class="col-sm-3" id="leftWidth">
				
                    <div class="affix" id="leftSideBar">
					
                        <div class="well">
						
                            <div class="well">
							
                                <p><a href="profile.php">My Profile</a></p>
								
                                <img src="<?php echo $profile_photo; ?>" class="img-circle" height="65" width="65" alt="Avatar">
								
                            </div>
							
                            <div class="well">
							
                                <p><a href="#">Interests</a></p>
								
                                <p>
                                    <span class="label label-default">News</span>
                                    <span class="label label-primary">W3Schools</span>
                                    <span class="label label-success">Labels</span>
                                    <span class="label label-info">Football</span>
                                    <span class="label label-warning">Gaming</span>
                                    <span class="label label-danger">Friends</span>
                                </p>
								
                            </div>
                            <div class="alert alert-success fade in">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p><strong>Ey!</strong></p>
                                    People are looking at your profile. Find out who.
                            </div>
                            <p><a href="#">Link</a></p>
                            <p><a href="#">Link</a></p>
                            <p><a href="#">Link</a></p>
                        </div>
                    </div>
                </div>
        
                <div class="col-sm-7">
				
                    <div class="row">
					
                        <div class="col-sm-12">


							<form action="homepage.php" method="POST" enctype="multipart/form-data" class="panel panel-default text-left">

                                <div class="panel-body">
								
                                    <div class="form-group">
									
                                        <textarea name="makePost" placeholder="What's on your mind?" class="form-control"></textarea>
										
                                    </div>
									
									<div class="form-group">
									
										<input type="file" name="photoPost" />        
										
									</div>
									
									<div class="pull-right">
									
										<input type="submit" id="submit" name="submit" value="Post" class="btn btn-primary btn-sm">
										
									</div>
									
								</div>
								
							</form>													
							
                        </div>
						
                    </div>
            
                    <?php 
					while($row = mysqli_fetch_array($posts, MYSQLI_ASSOC)) { 
					
						$id = $row['user_id'];
						
						$query = "SELECT * FROM user WHERE user_id = '$id'";
						
						$user_info = mysqli_query($con, $query);
						
						$user_info = mysqli_fetch_array($user_info, MYSQLI_ASSOC);
						
						$query = "SELECT * FROM posts WHERE user_id = $id AND photo_id = ".$row['photo_id'];
						
						$post = mysqli_query($con, $query);
						
						$post = mysqli_fetch_array($post, MYSQLI_ASSOC);
						
						$query = "SELECT * FROM comment WHERE photo_id = ".$row["photo_id"];
						
						$comments = mysqli_query($con, $query);
						
					?>
					
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-2">
                                <img src="<?php echo $user_info["profile_photo"] ?>" class="img-circle" height="55" width="55" alt="Avatar">
                                <p><?php echo $user_info["username"] ?></p>
                            </div>

                            <div class="col-sm-10 well well-sm">
                                <p class="text-left"><?php echo $post["post_content"] ?></p>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <img src="<?php echo $row["image_path"] ?>" class="img-responsive center-block" alt="Avatar">
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <br>
                                        <p class="text-left">
                                            <span><i class="glyphicon glyphicon-heart-empty"></i></span>
                                            <span class="text-primary"><?php echo $row["likes"] ?></span>
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
									<?php 
										while($comment = mysqli_fetch_array($comments, MYSQLI_ASSOC)) {
											
											$sql = "SELECT * FROM user WHERE user_id = ".$comment['user_id'];
											
											$sql = mysqli_query($con, $sql);
											
											$sql = mysqli_fetch_array($sql, MYSQLI_ASSOC);
											
											echo '<p class="text-left"><span class="text-primary">'.$sql['username'].': </span>'.$comment['comment'].'</p>';
											
										}
									?>
                                    </div>
                                </div>

                                <div class="input-group"> 
                                    <div class="input-group-btn">
										<form name="likes" action="homepage.php" method="POST">
											<input type="hidden" name="likeVar" value="" />
											<button class="btn btn-default btn-sm likes" type="submit" name="likes" id="<?php echo $row["photo_id"] ?>"><i class="glyphicon glyphicon-thumbs-up"></i></button>
										</form>
                                    </div>
									<form name="comment" action="homepage.php" method="POST">
										<input type="text" class="form-control input-sm" placeholder="Comment..." name="comment_content" />
										<div class="input-group-btn">											
											<input type="hidden" name="commentVar" value="" />
											<button class="btn btn-default btn-sm comment" type="submit" name="comment" id="<?php echo $row["photo_id"] ?>"><i class="glyphicon glyphicon-edit"></i></button>											
										</div>
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<?php 
							
						} 
					
					?>
                    
                </div>
                
                <div class="col-sm-2" id="rightWidth">
                    <div class="affix" id="rightSideBar">
                        <div class="well">
                            <div class="thumbnail">
                                <p>Upcoming Events:</p>
                                <img src="img/mig29.jpg" alt="Paris" width="400" height="300">
                                <p><strong>Paris</strong></p>
                                <p>Fri. 27 November 2015</p>
                                <button class="btn btn-primary">Info</button>
                            </div>

                            <div class="well">
                                <p>ADS</p>
                            </div>
                            <div class="well">
                                <p>ADS</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
	
	<?php include dirname(__DIR__).'/funshare/global/footer.php'; ?>
	
</html>