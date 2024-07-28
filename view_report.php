<?php


session_start();
if(!isset($_SESSION["utype"]) || $_SESSION["utype"]!="Provider")
{
header("location:Signin.php");
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
									<a href="view_request.php" class="logo"><strong>Local Labours Hiring System</strong> </a>
									
								</header>

							<!-- Banner -->
								<section>
										<h2 id="elements">View Report Page</h2>
										<hr class="major" />
										<div class="row gtr-200">
											
												<div class="col-6 col-12-medium">
												 <form method="post" action="view_report.php">
														<div class="row gtr-uniform">
															<div class="col-12">
																<label>From Date :</label>
																<input type="Date" name="fdate" id="fdate" value="" required="" placeholder="From Date" />
															</div>
															<!-- Break -->
															<div class="col-12">
																<label>To Date :</label>
																<input type="Date" name="tdate" id="tdate" value="" required="" placeholder="To Date" />
															</div>
															<!-- Break -->
															<div class="col-12">
																<label for="rp1">Service Status :</label>
															</div>
															<!-- Break -->
															
															<div class="col-3 col-12-small">
																<input type="radio" id="rp1" name="rp1" value="Accept">
																<label for="rp1">Accept</label>
															</div>
															<div class="col-3 col-12-small">
																<input type="radio" id="rp2" name="rp1" value="Reject">
																<label for="rp2">Reject</label>
															</div>
															<div class="col-3 col-12-small">
																<input type="radio" id="rp3" name="rp1" value="Pending">
																<label for="rp3">Pending</label>
															</div>
															<!-- Break -->
															
															<div class="col-12">
																<ul class="actions">
																	<li><input type="submit" name="sbbtn" value="View" class="primary" /></li>
																	
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
														if(isset($_POST["sbbtn"]))
														{
														$con=mysqli_connect("localhost","root","","ServiceDb");
														if(mysqli_connect_errno()>0)
														{
															echo mysqli_connect_error();
															exit();
														}
															$emailid=$_SESSION["emailid"];
															$fdate=$_POST["fdate"];
															$tdate=$_POST["tdate"];
															$status=$_POST["rp1"];
															
															$query1="select request_no,user_table.first_name,user_table.middle_name,user_table.last_name,user_table.address,user_table.city,user_table.state,user_table.country,user_table.pincode,fdate,tdate,service_name,request_date,request_time,status from service_table,service_request,user_table where user_table.email_id=consumer_emailid and service_table.provider_emailid=service_request.provider_emailid and service_table.service_id=service_request.service_id and service_table.provider_emailid=? and status=? and request_date>=? and request_date<=? order by request_date desc";
														$stmt1=$con->prepare($query1);
														$stmt1->bind_param("ssss",$emailid,$status,$fdate,$tdate);
														$stmt1->execute();
														$stmt1->store_result();
														if($stmt1->num_rows>0)
														{
															$stmt1->bind_result($rno,$fname,$mname,$lname,$address,$city,$state,$country,$pcode,$fdate,$tdate,$sname,$rdate,$rtime,$status);
															echo '<table class="alt">
															<thead>
																<tr>
																	
																	<th>Consumer Name</th>
																	<th>Consumer Contact Details</th>
																	<th>From Date</th>
																	<th>To Date</th>
																	<th>Request For</th>
																	<th>Request Date & Time</th>
																	<th>Status</th>
																</tr>
															</thead>
															<tbody>';
															 while($stmt1->fetch())
															 {
															 	echo '<tr>';
															 		echo '<td>'.strtoupper($lname.' '.$mname.' '.$fname).'</td>
																	<td>'.$address.',<br>'.$city.'-'.$pcode.',<br>'.$state.','.$country.'</td>
																	<td>'.$fdate.'</td>
																	<td>'.$tdate.'</td>
																	<td>'.$sname.'</td>
																	<td>'.$rdate.' '.$rtime.'</td>
																	<td>'.$status.'</td>
																	</tr>';
															 }
															echo '</tbody>
															<tfoot>
																<tr>
																	<td colspan="6" align="right"><b>No of Request :<b></td>
																	<td><b>'.$stmt1->num_rows.'</b></td>
																</tr>
															</tfoot>
															</table>';
														}
														else
														{
															echo "<h3 style='color:red'>No Report Found</h3>";
														}
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