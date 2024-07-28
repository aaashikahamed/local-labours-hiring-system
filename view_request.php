<?php


session_start();
if(!isset($_SESSION["utype"]) || $_SESSION["utype"]!="Provider")
{
header("location:Signin.php");
}

	if(isset($_POST["btn"]))
	{
		$con=mysqli_connect("localhost","root","","ServiceDb");
	if(mysqli_connect_errno()>0)
	{
		echo mysqli_connect_error();
		exit();
	}
		$status=$_POST["btn"];
		foreach($_POST as $key=>$value)
		{
			if(substr($key,0,3)=="chk")
			{
				
				$query="update service_request set status=? where request_no=?";
				$stmt=$con->prepare($query);
				$stmt->bind_param("si",$status,$value);
				$stmt->execute();
				$stmt->store_result();
				if($stmt->affected_rows>0)
				{
				$msg="Request is ".$status."ed...";
				}
				else
				{
				$msg="Request is not ".$status."ed...";
				break;
					//	die(mysqli_error($con));
				}
				
			}
		}
		$con->close();
	}

?>
<!DOCTYPE HTML>


<html>
	<head>
		<title>Local Services Hiring System</title>
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
									<a href="view_request.php" class="logo"><strong>Local Services Hiring System</strong></a>
									
								</header>

							<!-- Banner -->
								<section>
										<h2 id="elements">View Request Page</h2>
										<hr class="major" />
										<div class="row gtr-200">
											<div class="col-12">
																<label><h3 style="color:green"><?php isset($msg)?print $msg:print "";?><h3></label>
											</div>

											<div class="col-12 col-12-medium">
													<div class="table-wrapper">
														<form name="f1" method="post" action="view_request.php">
														<?php
														$con=mysqli_connect("localhost","root","","ServiceDb");
														if(mysqli_connect_errno()>0)
														{
															echo mysqli_connect_error();
															exit();
														}
															$emailid=$_SESSION["emailid"];
															$query1="select request_no,user_table.first_name,user_table.middle_name,user_table.last_name,user_table.address,user_table.city,user_table.state,user_table.country,user_table.pincode,fdate,tdate,service_name,request_date,request_time,status from service_table,service_request,user_table where user_table.email_id=consumer_emailid and service_table.provider_emailid=service_request.provider_emailid and service_table.service_id=service_request.service_id and service_table.provider_emailid=? order by request_date desc";
														$stmt1=$con->prepare($query1);
														$stmt1->bind_param("s",$emailid);
														$stmt1->execute();
														$stmt1->store_result();
														if($stmt1->num_rows>0)
														{
															$stmt1->bind_result($rno,$fname,$mname,$lname,$address,$city,$state,$country,$pcode,$fdate,$tdate,$sname,$rdate,$rtime,$status);
															echo '<table class="alt">
															<thead>
																<tr>
																	<th>
																	</th>
																	
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
															$i=1;
															 while($stmt1->fetch())
															 {
															 	echo '<tr>';
															 	if($status=="Pending")
															 	{
															 	echo '<td>
																	<div class="col-3 col-12-small">
																		<input type="checkbox" id="chk'.$i.'" name="chk'.$i.'" value="'.$rno.'">
																	<label for="chk'.$i.'"></label>
																	</div>
																    </td>';
																    $i++;
																}
																else
																{
																	echo '<td></td>';
																}
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
																<tr>
																	<td colspan="8" align="left">
																		<input type="submit" value="Accept" name="btn" class="primary" />
																		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																		<input type="submit" value="Reject" name="btn" class="primary" />
																	</td>
																</tr>
															</tfoot>
															</table>';
														}
														else
														{
															echo "<h3 style='color:red'>No Request Found</h3>";
														}
														
														?>

															</form>
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