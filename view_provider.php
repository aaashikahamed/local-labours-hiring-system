<?php
session_start();
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
									<a href="welcome.php" class="logo"><strong>Local Labours Hiring System</strong> </a>
									
								</header>

							<!-- Banner -->
									<section>
									<header class="major">
										<?php
										if(isset($_REQUEST["type"]))
										{
											if($_REQUEST["type"]=="elect")
											{
												$type="Electrician";
												echo "<h2>Electrician </h2>";
											}
											else if($_REQUEST["type"]=="plumb")
											{
												$type="Plumber";
												echo "<h2>Plumber </h2>";
											}
											else if($_REQUEST["type"]=="carpen")
											{
												$type="Carpenter";
												echo "<h2>Carpenter </h2>";
											}
											else if($_REQUEST["type"]=="water")
											{
												$type="Water Purifier";
												echo "<h2>Water Purifier </h2>";
											}
											else if($_REQUEST["type"]=="painter")
											{
												$type="Painter";
												echo "<h2>Painter </h2>";
											}
											else if($_REQUEST["type"]=="repaire")
											{
												$type="Appliance Repair";
												echo "<h2>Appliance Repair </h2>";
											}
											else if($_REQUEST["type"]=="cleaner")
											{
												$type="House Cleaning";
												echo "<h2>House Cleaning </h2>";
											}
											else if($_REQUEST["type"]=="interior")
											{
												$type="Interior Design";
												echo "<h2>Interior Design </h2>";
											}
											else if($_REQUEST["type"]=="architecture")
											{
												$type="Architecturer";
												echo "<h2>Architecturer </h2>";
											}
											else if($_REQUEST["type"]=="pop")
											{
												$type="POP Design";
												echo "<h2>POP Design </h2>";
											}
										}
										?>
										
									</header>
									<div class="features">
										<?php
														if(isset($type))
														{
															$_SESSION["type"]=$type;
														$con=mysqli_connect("localhost","root","","ServiceDb");
														if(mysqli_connect_errno()>0)
														{
															echo mysqli_connect_error();
															exit();
														}
	
														$query1="select provider_emailid,first_name,last_name,middle_name,mobile_no,photo,service_id,service_name,provider_name,Specification,Built_date,service_table.country,service_table.state,service_table.city,service_table.address,service_table.Pincode,pic1,pic2,pic3 from service_table,user_table where user_table.email_id=service_table.provider_emailid and Register_as='Provider' and service_name=? order by service_id";
														$stmt1=$con->prepare($query1);
														$stmt1->bind_param("s",$type);
														$stmt1->execute();
														$stmt1->store_result();
														if($stmt1->num_rows>0)
														{
															$stmt1->bind_result($eid,$fname,$lname,$mname,$mno,$photo,$sid,$sname,$pname,$spec,$bdate,$country,$state,$city,$address,$pcode,$pic1,$pic2,$pic3);
															 while($stmt1->fetch())
															 {
															 	echo '<article>';
																	echo '<div class="content" style="padding: 10px">';
																		echo '<h3 align="center">'.strtoupper($lname.' '.$fname.' '.$mname).'</h3>';
																		echo '<center>';
																		echo '<img src="uploads/'.$photo.'" width="100px" height="100px" align="center" style="border-radius: 50px;border:1px solid white;" />
																		</center>
																		<p align="center">
																			'.$pname.'<br><span style="color:green">Specialization: '.
																			$spec.'</span><br>'.
																			$address.', '.
																			$city.'-'.$pcode.', '.
																			$state.', '.$country.'<br>
																			Mob No : '.$mno.'
																		</p>
																		<p align="center">
																		<a href="uploads/'.$pic1.'" target="_blank">
																		<img src="uploads/'.$pic1.'" width="75px" height="75px">
																		</a>
																		<a href="uploads/'.$pic2.'" target="_blank">
																		<img src="uploads/'.$pic2.'" width="75px" height="75px">
																		</a>
																		<a href="uploads/'.$pic3.'" target="_blank">
																		<img src="uploads/'.$pic3.'" width="75px" height="75px">
																		</a>
																		<br><br>
																		<a href="service_booking.php?eid='.$eid.'&sid='.$sid.'&pname='.$pname.'" class="button">Send Request</a>
																		</p>
																		<hr>
																	</div>

																</article>';
															 }
														}
														else
														{
															echo "<h3 style='color:red'>No Provider Found For $type</h3>";
														}
													}
										?>
									</div>
								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<?php
							if(!isset($_SESSION["utype"]) || $_SESSION["utype"]!="Consumer")
							{
								include "menu.php";
							}
							else
							{
								include "cmenu.php";
							}
							?>

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