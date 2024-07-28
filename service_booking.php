<?php
session_start();
date_default_timezone_set("Asia/Colombo");
if(!isset($_SESSION["utype"]) || $_SESSION["utype"]!="Consumer")
{
header("location:Signin.php");
}
$con=mysqli_connect("localhost","root","","ServiceDb");
if(mysqli_connect_errno()>0)
{
	echo mysqli_connect_error();
	exit();
}
if(isset($_POST["sbbtn"]))
{
	$emailid=$_SESSION["emailid"];
	$pemailid=$_POST["pemailid"];
	$pname=$_POST["pname"];
	$sid=$_POST["sid"];
	$fdate=$_POST["fdate"];
	$tdate=$_POST["tdate"];
	$rdate=date("Y-m-d");
	$rtime=date("h:i:s a");
	$status="Pending";
	
	$query="insert into service_request(consumer_emailid,provider_emailid,service_id,fdate,tdate,request_date,request_time,status) values(?,?,?,?,?,?,?,?)";
	$stmt=$con->prepare($query);
	$stmt->bind_param("ssisssss",$emailid,$pemailid,$sid,$fdate,$tdate,$rdate,$rtime,$status);
	$stmt->execute();
	$stmt->store_result();
	if($stmt->affected_rows>0)
	{
		$msg="Request is Sent...";
		unset($emailid);
		unset($pemailid);
		unset($pname);
		unset($sid);
		unset($_SESSION["type"]);
		header("location:Welcome.php");
	}
	else
	{
		$msg="Request is not Sent...";
		
	}
	$con->close();
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
										<h2 id="elements">Service Booking Page</h2>
										<hr class="major" />
										<div class="row gtr-200">
											

											<div class="col-6 col-12-medium">
													<form method="post" action="service_booking.php">
														<div class="row gtr-uniform">
															<div class="col-12">
																<label><h3 style="color:green"><?php isset($msg)?print $msg:print "";?><h3></label>
															</div>
															<div class="col-12">
																<label>Provider Email id</label>
																<input type="text" name="pemailid" id="pemailid" value='<?php isset($_REQUEST["eid"])?print $_REQUEST["eid"]:print ""; ?>' readonly="" required="" placeholder="Provider Email id" />
															</div>
															<!-- Break -->
															<div class="col-12">
																<label>Provider Name</label>
																<input type="text" name="pname" id="pname" value='<?php isset($_REQUEST["pname"])?print $_REQUEST["pname"]:print ""; ?>' readonly="" required="" placeholder="Provider Name" />
															</div>
																<!-- Break -->
															<div class="col-12">
																<label>Service Id</label>
																<input type="text" name="sid" id="sid" value='<?php isset($_REQUEST["sid"])?print $_REQUEST["sid"]:print ""; ?>' readonly="" required="" placeholder="Service Id" />
															</div>
														
															<!-- Break -->
															<div class="col-12">
																<label>Service Type</label>
																<input type="text" name="stype" id="stype" value='<?php isset($_SESSION["type"])?print $_SESSION["type"]:print ""; ?>' readonly="" required="" placeholder="Service Type" />
															</div>
															<!-- Break -->


															<div class="col-12">
																<label>Work From Date</label>
																<input type="date" name="fdate" id="fdate" value="" required="" placeholder="Work From Date" />
															</div>
															<!-- Break -->
															
															<div class="col-12">
																<label>Work To Date</label>
																<input type="date" name="tdate" id="tdate" value="" required="" placeholder="Work To Date" />
															</div>
															<!-- Break -->

														
															
															<div class="col-12">
																<ul class="actions">
																	<li><input type="submit" name="sbbtn" value="Book Service" class="primary" /></li>
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

							<!-- Search -->
								<section id="search" class="alt">
									<center>
									<img src="images/noimg.png" width="150px" height="150px" style="border-radius: 75px;border:1px solid white;"><br>
									<a href="" onclick="window.open('picupload.php', 'Uploader', 'width=500,height=300,left=100,top=100,scrollbars=no,fullscreen=no,resizable=no');">Edit Profile Picture</a><br><br>
									</center>
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Search" />
									</form>
								</section>

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="welcome.php">Homepage</a></li>
										<li>
											<span class="opener">Services</span>
											<ul>
												<li><a href="view_provider.php?type=elect">Electrician</a></li>
												<li><a href="view_provider.php?type=plumb">Plumber</a></li>
												<li><a href="view_provider.php?type=carpen">Carpenter</a></li>
												<li><a href="view_provider.php?type=water">Water Purifier</a></li>
												<li><a href="view_provider.php?type=painter">Painter</a></li>
												
												<li><a href="view_provider.php?type=repair">Appliance Repair</a></li>
												<li><a href="view_provider.php?type=cleaner">House Cleaning</a></li>
												<li><a href="view_provider.php?type=interior">Interior Design</a></li>
												<li><a href="view_provider.php?type=architecture">Architecturer</a></li>
												<li><a href="view_provider.php?type=pop">POP Design</a></li>
												
											</ul>
										</li>
										<li><a href="Consumer_Cpass.php">My Account</a></li>
										<li><a href="">My Services</a></li>
										<li><a href="">Signout</a></li>
									</ul>
								</nav>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Local Services Hiring System. All rights reserved.</a>.</p>
								</footer>

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