<?php
session_start();
if(!isset($_SESSION["utype"]) || $_SESSION["utype"]!="Provider")
{
header("location:Signin.php");
}
	$emailid=$_SESSION["emailid"];
	$mno=$_SESSION["mno"];

	if(isset($_POST["sbbtn"]))
	{
	$con=mysqli_connect("localhost","root","","ServiceDb");
	if(mysqli_connect_errno()>0)
	{
		echo mysqli_connect_error();
		exit();
	}
	
	$service=$_POST["service"];
	$spname=$_POST["spname"];
	$sspec=$_POST["sspec"];
	$bdate=$_POST["bdate"];
	$country=$_POST["country"];
	$state=$_POST["state"];
	$city=$_POST["city"];
	$address=$_POST["address"];
	$pcode=$_POST["pcode"];
	$img1=$_FILES["photo1"]["tmp_name"]; 
	$size1=$_FILES["photo1"]["size"];
	$imgname1=$_FILES["photo1"]["name"];
	$imgtype1=strtolower(pathinfo($imgname1,PATHINFO_EXTENSION));
	
	$img2=$_FILES["photo2"]["tmp_name"]; 
	$size2=$_FILES["photo2"]["size"];
	$imgname2=$_FILES["photo2"]["name"];
	$imgtype2=strtolower(pathinfo($imgname2,PATHINFO_EXTENSION));
	
	$img3=$_FILES["photo3"]["tmp_name"]; 
	$size3=$_FILES["photo3"]["size"];
	$imgname3=$_FILES["photo3"]["name"];
	$imgtype3=strtolower(pathinfo($imgname3,PATHINFO_EXTENSION));
	

 	$query1="select service_id from service_table where provider_emailid=? order by service_id desc";
    $stmt1=$con->prepare($query1);
	$stmt1->bind_param("s",$emailid);
	$stmt1->execute();
	$stmt1->store_result();
	if($stmt1->num_rows>0)
	{
		$stmt1->bind_result($sid);
		$stmt1->fetch();
		$sid++;
	}
	else
	{
		$sid=1;
	}
	if($size1>10000000)
	{
	echo "Photo1 is too large..";
	exit();
	}
	else if($imgtype1!="jpg" && $imgtype1!="jpeg" && $imgtype1!="png" && $imgtype1!="gif")
	{
	 echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed for Photo1.";
		exit();
	}
	else
	{
	$nimgname1=$mno."_".$sid."_1.".$imgtype1;
	if(!move_uploaded_file($img1, "uploads/".$nimgname1))
	{
 	echo "Sorry, Error for Uploading Photo1.";
		exit();
	}
	}

	if($size2>10000000)
	{
	echo "Photo2 is too large..";
	exit();
	}
	else if($imgtype2!="jpg" && $imgtype2!="jpeg" && $imgtype2!="png" && $imgtype2!="gif")
	{
	 echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed for Photo2.";
	 exit();
	}
	else
	{
	$nimgname2=$mno."_".$sid."_2.".$imgtype2;
	if(!move_uploaded_file($img2, "uploads/".$nimgname2))
	{
 	echo "Sorry, Error for Uploading Photo2.";
		exit();
	}
	}

	if($size3>10000000)
	{
	echo "Photo3 is too large..";
	exit();
	}
	else if($imgtype3!="jpg" && $imgtype3!="jpeg" && $imgtype3!="png" && $imgtype3!="gif")
	{
	 echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed for Photo3.";
	 exit();
	}
	else
	{
	$nimgname3=$mno."_".$sid."_3.".$imgtype3;
	if(!move_uploaded_file($img3, "uploads/".$nimgname3))
	{
 	echo "Sorry, Error for Uploading Photo3.";
		exit();
	}
	}

   
	

	$query="insert into service_table values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$stmt=$con->prepare($query);
	$stmt->bind_param("sissssssssssss",$emailid,$sid,$service,$spname,$sspec,$bdate,$country,$state,$city,$address,$pcode,$nimgname1,$nimgname2,$nimgname3);
	$stmt->execute();
	$stmt->store_result();
	if($stmt->affected_rows>0)
	{
		$msg="Service is Saved...";
	//	echo "<script type='text/javascript'>alert('Service is Saved...');</script>";
	}
	else
	{
		echo "Service is Not Saved...";
		exit();
	//	echo "<script type='text/javascript'>alert('Service is Not Saved...');</script>";
		//die(mysqli_error($con));
	}
	$con->close();
   } 

if(isset($_REQUEST["btn"]) && $_REQUEST["btn"]=="del")
	{
		$con=mysqli_connect("localhost","root","","ServiceDb");
		if(mysqli_connect_errno()>0)
		{
			echo mysqli_connect_error();
			exit();
		}
		$sid=$_REQUEST["sid"];
		$query1="delete from service_table where provider_emailid=? and service_id=?";
	    $stmt1=$con->prepare($query1);
		$stmt1->bind_param("si",$emailid,$sid);
		$stmt1->execute();
		$stmt1->store_result();
		if($stmt1->affected_rows>0)
		{
			//unlink($mno."_".$sid."_*");
			$msg="Service is Deleted...";
			//echo "<script type='text/javascript'>alert('Service is Deleted...');</script>";
		}
		else

		{
			echo "Service is not Deleted...";
			exit();
			//echo "<script type='text/javascript'>alert('Service is not Deleted...');</script>";
			
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
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="view_request.php" class="logo"><strong>Local Labours Hiring System</strong></a>
								</header>

							<!-- Banner -->
								<section>
										<h2 id="elements">Manage Service Page</h2>
										<hr class="major" />
										<div class="row gtr-200">
											

											<div class="col-6 col-12-medium">
													<form method="post" action="Mservices.php" enctype="multipart/form-data">
														<div class="row gtr-uniform">
															<div class="col-12">
																<label><h3 style="color:green"><?php isset($msg)?print $msg:print "";?><h3></label>
															</div>
															<div class="col-12">
																<label>Service :</label>
																<select name="service" id="service" required="">
																	<option value="">- Select Service -</option>
																	<option value="Electrician">Electrician</option>
																	<option value="Plumber">Plumber</option>
																	<option value="Carpenter">Carpenter</option>
																	<option value="Water Purifier">Water Purifier</option>
																	<option value="Painter">Painter</option>
																	<option value="Appliance Repair">Appliance Repair</option>
																	<option value="House Cleaning">House Cleaning</option>
																	<option value="Interior Design">Interior Design</option>
																	<option value="Architecturer">Architecturer</option>
																	<option value="POP Design">POP Design</option>
																	
																</select>
															</div>
															<!-- Break -->
															<div class="col-12 col-12-xsmall">
																<label>Service Provider Name :</label>
																<input type="text" name="spname" id="spname" value="" placeholder="Service Provider Name"  required="" />
															</div>
															
															<!-- Break -->

															<div class="col-12">
																<label for="birth_date"> Date of Birth :</label>
																<input type="date" name="bdate" id="bdate" value="" required="" placeholder="Built Date" />
															</div>
															
															<!-- Break -->
															
															<div class="col-12 col-12-xsmall">
																<label>Service Specification :</label>
																<input type="text" name="sspec" id="sspec" value="" placeholder="Service Specification" required="" />
															</div>
															
															<!-- Break -->
																										
															<div class="col-12">
																<label>Country :</label>
																<select name="country" id="country" required="">
																	<option value="">- Select Country -</option>
																	<option value="Sri Lanka">Sri Lanka</option>
																	
																</select>
															</div>
															<!-- Break -->

															<div class="col-12">
																<label>State :</label>
																<select name="state" id="state" required="">
																	<option value="">- Select District -</option>
																	<option value="Trincomalee">Trincomalee</option>
																	
																</select>
															</div>
															<!-- Break -->

															<div class="col-12">
																<label>City :</label>
																<select name="city" id="city" required="">
																	<option value="">- Select City -</option>
																	<option value="Kinniya">Kinniya</option>
																	
																</select>
															</div>
															<!-- Break -->

															<div class="col-12">
																<label>Address :</label>
																<textarea name="address" id="address" placeholder="Enter Your Address" rows="3" required=""></textarea>
															</div>
															<!-- Break -->	
															
															<div class="col-12">
																<label>Pincode :</label>
																<input type="text" name="pcode" id="pcode" value="" required="" placeholder="Pincode" />
															</div>
															<!-- Break -->
															<div class="col-12">
																<label>Photo1 :</label>
																<input type="file" name="photo1" id="photo1" value="" required="" placeholder="Select Photo1" />
															</div>
															<!-- Break -->
															<div class="col-12">
																<label>Photo2 :</label>
																<input type="file" name="photo2" id="photo2" value="" required="" placeholder="Select Photo2" />
															</div>
															<!-- Break -->
															<div class="col-12">
																<label>Photo3 :</label>
																<input type="file" name="photo3" id="photo3" value="" required="" placeholder="Select Photo3" />
															</div>
															<!-- Break -->
															
															<div class="col-12">
																<ul class="actions">
																	<li><input type="submit" name="sbbtn" value="Submit" class="primary" /></li>
																	<li><input type="reset" value="Reset" /></li>
																</ul>
															</div>	
														</div>
													</form>
											</div>

												<div class="col-12 col-12-medium">
												<hr class="major" />
												</div>
													<div class="col-12 col-12-medium">
														<div class="table-wrapper">
														<?php
														$con=mysqli_connect("localhost","root","","ServiceDb");
														if(mysqli_connect_errno()>0)
														{
															echo mysqli_connect_error();
															exit();
														}
	
														$query1="select service_id,service_name,provider_name,Specification,Built_date,country,state,city,address,Pincode from service_table where provider_emailid=? order by service_id";
														$stmt1=$con->prepare($query1);
														$stmt1->bind_param("s",$emailid);
														$stmt1->execute();
														$stmt1->store_result();
														if($stmt1->num_rows>0)
														{
														?>
													
														<table class="alt">
															<thead>
																<tr>
																	<th>
																	</th>
																	
																		<th>Service Id</th>
																		<th>Service Name</th>
																		<th>Provider Name</th>
																		<th>Specification</th>
																		<th>Built Date</th>
																		
																		<th>Address</th>
																	
																</tr>
															</thead>
															<tbody>
														
														<?php
															$stmt1->bind_result($sid,$sname,$pname,$spec,$bdate,$country,$state,$city,$address,$pcode);
															 while($stmt1->fetch())
															 {
														?>

															 		<tr>
																	<td>
																		<a href="Mservices.php?btn=del&sid=<?php print $sid;?>" >Delete</a>
																	</td>
																	<td><?php print $sid; ?></td>
																	<td><?php print $sname; ?></td>
																	<td><?php print $pname; ?></td>
																	<td><?php print $spec; ?></td>
																	<td><?php print $bdate; ?></td>
																	<td><?php print $address.",<br>".$city."-".$pcode.",<br>".$state.",".$country; ?></td>
																	
																   </tr>
																<?php
														
															 	}	
															 	?>

																 </tbody>
														</table>
														
														<?php	
														}
														
														?>
														
													</div>

														</div>
										</div>

								</section>

							
						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<?php include "pmenu.php" ?>

						</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

