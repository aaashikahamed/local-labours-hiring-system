<?php
session_start();
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
										<h2>Welcome Consumer </h2>
									</header>
									<div class="features">
										<article>
											
											<div class="content">
												<h3 align="center">Electrician<br><br>
												<img src="images/elect.png" width="200px" height="200px"/>
												</h3>
												<p align="center">
												<a href="view_provider.php?type=elect" class="button">View All</a>
												</p>
												<hr>
											</div>
										</article>
										<article>
											<div class="content">
												<h3 align="center">Plumber<br><br>
												<img src="images/plumb.png" width="200px" height="200px"/>
												</h3>
												<p align="center">
												<a href="view_provider.php?type=plumb" class="button">View All</a>
												</p>
												<hr>
											</div>
										</article>
										<article>
											<div class="content">
												<h3 align="center">Carpenter<br><br>
												<img src="images/carpen.png" width="200px" height="200px"/>
												</h3>
												<p align="center">
												<a href="view_provider.php?type=carpen" class="button">View All</a>
												</p>
												<hr>
											</div>
										</article>
										<article>
											<div class="content">
												<h3 align="center">Water Purifier<br><br>
												<img src="images/water.png" width="200px" height="200px"/>
												</h3>
												<p align="center">
												<a href="view_provider.php?type=water" class="button">View All</a>
												</p>
												<hr>
											</div>
										</article>
										<article>
											<div class="content">
												<h3 align="center">Painter<br><br>
												<img src="images/painter.png" width="200px" height="200px"/>
												</h3>
												<p align="center">
												<a href="view_provider.php?type=painter" class="button">View All</a>
												</p>
												<hr>
											</div>
										</article>
										<article>
											<div class="content">
												<h3 align="center">Appliance Repair<br><br>
												<img src="images/repaire.png" width="200px" height="200px"/>
												</h3>
												<p align="center">
												<a href="view_provider.php?type=repaire" class="button">View All</a>
												</p>
												<hr>
											</div>
										</article>
										<article>
											<div class="content">
												<h3 align="center">House Cleaning<br><br>
												<img src="images/cleaner.png" width="200px" height="200px"/>
												</h3>
												<p align="center">
												<a href="view_provider.php?type=cleaner" class="button">View All</a>
												</p>
												<hr>
											</div>
										</article>
										<article>
											<div class="content">
												<h3 align="center">Interior Design<br><br>
												<img src="images/interior.png" width="200px" height="200px"/>
												</h3>
												<p align="center">
												<a href="view_provider.php?type=interior" class="button">View All</a>
												</p>
												<hr>
											</div>
										</article>
										<article>
											<div class="content">
												<h3 align="center">Architecturer<br><br>
												<img src="images/architecture.png" width="200px" height="200px"/>
												</h3>
												<p align="center">
												<a href="view_provider.php?type=architecture" class="button">View All</a>
												</p>
												<hr>
											</div>
										</article>
										<article>
											<div class="content">
												<h3 align="center">POP Design<br><br>
												<img src="images/pop.png" width="200px" height="200px"/>
												</h3>
												<p align="center">
												<a href="view_provider.php?type=pop" class="button">View All</a>
												</p>
												<hr>
											</div>
										</article>
									</div>
								</section>

						</div>
					</div>

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<?php include "cmenu.php"; ?>

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