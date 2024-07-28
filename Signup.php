<?php
$con=mysqli_connect("localhost","root","","ServiceDb");
	if(mysqli_connect_errno()>0)
	{
		echo mysqli_connect_error();
		exit();
	}

if(isset($_POST["sbbtn"]))
{
	$fname=$_POST["fname"];
	$mname=$_POST["mname"];
	$lname=$_POST["lname"];
	$gender=$_POST["gender"];
	$bdate=$_POST["bdate"];
	$mno=$_POST["mno"];
	$lno=$_POST["lno"];
	$country=$_POST["country"];
	$state=$_POST["state"];
	$city=$_POST["city"];
	$address=$_POST["address"];
	$pcode=$_POST["pcode"];
	$ques=$_POST["ques"];
	$ans=$_POST["ans"];
	$emailid=$_POST["emailid"];
	$pass=$_POST["pass"];
	$utype=$_POST["utype"];
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
    $query="insert into user_table values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$stmt=$con->prepare($query);
	$stmt->bind_param("ssssssssssssssssss",$fname,$mname,$lname,$gender,$bdate,$mno,$lno,$country,$state,$city,$address,$pcode,$ques,$ans,$nimgname,$emailid,$pass,$utype);
	$stmt->execute();
	$stmt->store_result();
	if($stmt->affected_rows>0)
	{
		$msg="Registration is Completed...";
	}
	else
	{
		$msg="Registration is Not Completed...";
		
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
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="index.php" class="logo"><strong>Local Labours Hiring System</strong></a>
									
								</header>

							<!-- Banner -->
								<section>
										<h2 id="elements">Sign Up Page</h2>
										<hr class="major" />
										<div class="row gtr-200">
											<script type="text/javascript">
												function validate() {
													if(document.f1.pass.value.length<8)
													{
														alert("Passowrd contains Atleast 8 Characters");
														document.f1.pass.focus();
														return false;
													}
													else if(document.f1.pass.value!=document.f1.cpass.value)
													{
														alert("Confirm Passowrd is not matched");
														document.f1.cpass.focus();
														return false;
														
													}
													else
													{
														return true;
													}

												}
												function showpass(x)
												{
													if(x.type=="password")
													{
														x.type="text";
													}
													else
													{
														x.type="password";
													}
												}
											</script>

											<div class="col-6 col-12-medium">
													<form name="f1" method="post" action="Signup.php" enctype="multipart/form-data" onsubmit="return validate();">
														<div class="row gtr-uniform">
															<div class="col-12">
																<label><h3 style="color:green"><?php isset($msg)?print $msg:print "";?><h3></label>
															</div>
															
															<div class="col-4 col-12-xsmall">
																<label>First Name :</label>
																<input type="text" name="fname" id="fname" value="" placeholder="First Name" required="" />
															</div>
															<div class="col-4 col-12-xsmall">
																<label>Middle Name :</label>
																<input type="text" name="mname" id="mname" value="" placeholder="Middle Name" required="" />
															</div>
															<div class="col-4 col-12-xsmall">
																<label>Last Name :</label>
																<input type="text" name="lname" id="lname" value="" placeholder="Last Name" required="" />
															</div>
															<!-- Break -->
															
															<div class="col-3 col-12-small">
																<label>Gender :</label>
															</div>
															<div class="col-3 col-12-small">
																<input type="radio" id="gender-male" name="gender" value="Male" checked="">
																<label for="gender-male">Male</label>
															</div>
															<div class="col-3 col-12-small">
																<input type="radio" id="gender-female" name="gender" value="Female">
																<label for="gender-female">Female</label>
															</div>
															<div class="col-3 col-12-small">
															</div>
															<!-- Break -->
															<div class="col-12">
																<label for="birth_date">Birth Date :</label>
																<input type="date" name="bdate" id="bdate" value="" required="" placeholder="Birth Date" required="" />
															</div>
															<!-- Break -->
															<div class="col-12">
																<label>Mobile No :</label>
																<input type="text" name="mno" id="mno" value="" required="" placeholder="Mobile No" />
															</div>
															<!-- Break -->
															<div class="col-12">
																<label>LandLine No :</label>
																<input type="text" name="lno" id="lno" value="" placeholder="LandLine No" />
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
																<label>Security Question :</label>
																<select name="ques" id="ques" required="">
																	<option value="">- Security Question -</option>
																	<option value="Whats Ur Nick Name?">Whats Ur Nick Name?</option>
																	<option value="Whats Ur First Mobile No?">Whats Ur First Mobile No?</option>
																	<option value="Who is Ur First Cruse?">Who is Ur First Cruse?</option>
																	<option value="Who is Ur Favourite Actor?">Who is Ur Favourite Actor?</option>
																	<option value="Who is Ur Favourite Actress?">Who is Ur Favourite Actress?</option>
																</select>
															</div>
															<!-- Break -->
															<div class="col-12">
																<label>Answer :</label>
																<input type="text" name="ans" id="ans" value="" required="" placeholder="Answer" />
															</div>
															<!-- Break -->
															<div class="col-12">
																<label>Your Photo :</label>
																<input type="file" name="photo" id="photo" value="" required="" placeholder="Select Your Photo" />
															</div>
															<!-- Break -->
															<div class="col-12">
																<label>Email Id :</label>
																<input type="email" name="emailid" id="emailid" value="" required="" placeholder="Email id" />
															</div>
															<!-- Break -->

															<div class="col-12">
																<label>Password</label>
																<input type="password" name="pass" id="pass" value="" required="" placeholder="Password (Atleast 8 Characters)" /><br>
																<input type="checkbox" id="ch1" name="ch1" onclick="showpass(document.f1.pass)">
																	<label for="ch1">Show Password</label>
															</div>
															<!-- Break -->
															
															<div class="col-12">
																<label>Confirm Password</label>
																<input type="password" name="cpass" id="cpass" value="" required="" placeholder="Confirm Password" /><br>
																<input type="checkbox" id="ch2" name="ch2" onclick="showpass(document.f1.cpass)">
																	<label for="ch2">Show Password</label>
															</div>
															<!-- Break -->
														
														    <div class="col-12">
																<label>Registered As :</label>
																<select name="utype" id="utype" required="">
																	<option value="">- Registered As -</option>
																	<option value="Provider">Provider</option>
																	<option value="Consumer">Consumer</option>
																	
																</select>
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
										</div>

								</section>

							
						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<?php include "menu.php"; ?>


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