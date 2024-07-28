<?php
session_start();
$con=mysqli_connect("localhost","root","","ServiceDb");
	if(mysqli_connect_errno()>0)
	{
		echo mysqli_connect_error();
		exit();
	}

if(isset($_POST["sbbtn"]))
{
	$emailid=$_SESSION["emailid"];
	$utype=$_SESSION["utype"];
	$mno=$_SESSION["mno"];
	$img=$_FILES["photo"]["tmp_name"]; 
	$size=$_FILES["photo"]["size"];
	$imgname=$_FILES["photo"]["name"];
	$imgtype=strtolower(pathinfo($imgname,PATHINFO_EXTENSION));
	if($size>1000000)
	{
	echo "image is too large..";
	exit();
	}
	else if($imgtype!="jpg" && $imgtype!="jpeg" && $imgtype!="png" && $imgtype!="gif")
	{
	 echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	 exit();
	}
	else
	{
	$nimgname=$mno.".".$imgtype;
	if (move_uploaded_file($img, "uploads/".$nimgname)) 
	{
    $query="update user_table set photo=? where email_id=? and Register_as=?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("sss",$nimgname,$emailid,$utype);
	$stmt->execute();
	$stmt->store_result();
	if($stmt->affected_rows>0)
	{
		$msg="Photo is Updated...";
	}
	else
	{
		$msg="Photo is Updated...";
		
	}
	$con->close();
    }
    else 
    {
		echo "Sorry, there was an error uploading your file....";
		exit();
        
    }
}

}
?>


<!DOCTYPE HTML>

<html>
	<head>
		<title>Local Labours Hiring System</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script>
    		window.onunload = refreshParent;
    		function refreshParent() {
       				 window.opener.location.reload();
    				}
		</script>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							
							<!-- Banner -->
								<section>
										<h2 id="elements">Profile Photo Uploader</h2>
										<hr class="major" />
										<div class="row gtr-200">
											

											<div class="col-6 col-12-medium">
													<form method="post" action="picupload.php" enctype="multipart/form-data">
														<div class="row gtr-uniform">
															<div class="col-12">
																<label><h3 style="color:green"><?php isset($msg)?print $msg:print "";?><h3></label>
															</div>
															<div class="col-12">
																<label>Your Photo :</label>
																<input type="file" name="photo" id="photo" value="" required="" placeholder="Select Your Photo" />
															</div>
															<!-- Break -->
															
															<div class="col-12">
																<ul class="actions">
																	<li><input type="submit" name="sbbtn" value="Upload" class="primary" /></li>
																	<li><input type="reset" value="Reset" /></li>
																</ul>
															</div>

														</div>
													</form>
											</div>
										</div>

								</section>

							
						</div>
					</div>
			</div>
	</body>
</html>