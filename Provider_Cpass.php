<?php
session_start();
if(!isset($_SESSION["utype"]) || $_SESSION["utype"]!="Provider")
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
	$opass=$_POST["opass"];
	$npass=$_POST["npass"];
	$utype=$_SESSION["utype"];
	$query="update user_table set password=? where email_id=? and password=? and Register_As=?";
	$stmt=$con->prepare($query);
	$stmt->bind_param("ssss",$npass,$emailid,$opass,$utype);
	$stmt->execute();
	$stmt->store_result();
	if($stmt->affected_rows>0)
	{
	$msg="Password is Changed...";
		
	}
	else
	{
	$msg="Password is not Changed...";
	//	die(mysqli_error($con));
	
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
									<a href="view_request.php" class="logo"><strong>Local Labours Hiring System</strong></a>
									
								</header>

							<!-- Banner -->
								<section>
										<h2 id="elements">Change Password Page</h2>
										<hr class="major" />
										<div class="row gtr-200">
											<script type="text/javascript">
												function validate() {
													if(document.f1.npass.value.length<8)
													{
														alert("New Passowrd contains Atleast 8 Characters");
														document.f1.npass.focus();
														return false;
													}
													else if(document.f1.npass.value!=document.f1.rnpass.value)
													{
														alert("Retype Passowrd is not matched");
														document.f1.rnpass.focus();
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
													<form name="f1" method="post" action="Provider_Cpass.php" onsubmit="return validate();">
														<div class="row gtr-uniform">
															<div class="col-12">
																<label><h3 style="color:green"><?php isset($msg)?print $msg:print "";?><h3></label>
															</div>
															
															<div class="col-12">
																<label>Old Password</label>
																<input type="password" name="opass" id="opass" value="" required="" placeholder="Old Password" /><br>
																<input type="checkbox" id="ch1" name="ch1" onclick="showpass(document.f1.opass)">
																	<label for="ch1">Show Password</label>
															</div>
															<!-- Break -->

															<div class="col-12">
																<label>New Password</label>
																<input type="password" name="npass" id="npass" value="" required="" placeholder="New Password (Atleast 8 Characters)" /><br>
																<input type="checkbox" id="ch2" name="ch2" onclick="showpass(document.f1.npass)">
																	<label for="ch2">Show Password</label>
															
															</div>
															<!-- Break -->
															
															<div class="col-12">
																<label>Retype New Password</label>
																<input type="password" name="rnpass" id="rnpass" value="" required="" placeholder="Retype New Password" /><br>
																<input type="checkbox" id="ch3" name="ch3" onclick="showpass(document.f1.rnpass)">
																	<label for="ch3">Show Password</label>
															</div>
															<!-- Break -->

														
															
															<div class="col-12">
																<ul class="actions">
																	<li><input type="submit" name="sbbtn" value="Change Password" class="primary" /></li>
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