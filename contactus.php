<!--  -->
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
									<a href="index.php" class="logo"><strong>Local SerLaboursvices Hiring System</strong> </a>
									
								</header>

							<!-- Banner -->
								<section>
									<header class="major">
										<h2>Contact Us</h2>
									</header>
										<div class="row gtr-200">
											<div class="col-6 col-12-medium">
												<section>
												<ul class="contact">
													<li class="icon solid fa-envelope"><a href="mailto:ati@gmail.com">ati@gmail.com</a></li>
													<li class="icon solid fa-phone">+94 751234567</li>
													<li class="icon solid fa-home">Kanniya Road,<br />Trincomalee,<br />Sri Lanka</li>
												</ul>
												</section>
											</div>
											<div class="col-6 col-12-medium">
													<form method="post" action="">
														<div class="row gtr-uniform">
															<div class="col-12">
																<label><h3 style="color:green"><?php isset($msg)?print $msg:print "";?><h3></label>
															</div>
															<div class="col-12">
																<label>Email Id :</label>
																<input type="email" name="emailid" id="emailid" value="" required="" placeholder="Email id" />
															</div>
															<!-- Break -->
														
															<div class="col-12">
																<label>Name :</label>
																<input type="text" name="nm" id="nm" value="" required="" placeholder="Name" />
															</div>
															<!-- Break -->
															<!-- Break -->

															<div class="col-12">
																<label>Message :</label>
																<textarea name="msg" id="msg" placeholder="Enter Your Message" rows="5"></textarea>
															</div>
															<!-- Break -->	
															
															<!-- Break -->
															
															<div class="col-12">
																<ul class="actions">
																	<li><input type="submit" name="sbbtn" value="Send" class="primary" /></li>
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

							
							<!-- Menu -->
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