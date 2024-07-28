	<!-- Search -->
								<section id="search" class="alt">
									<center>
										<img src='uploads/<?php echo $_SESSION["img"]; ?>' width="150px" height="150px" style="border-radius: 75px;border:1px solid white;">
										
										<br>
										<h4>Welcome <?php echo $_SESSION["name"]; ?></h4>
									<a href="" onclick="window.open('picupload.php', 'Uploader', 'width=500,height=400,left=100,top=100,scrollbars=no,fullscreen=no,resizable=no');">Edit Profile Picture</a><br><br>
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
										<li><a href="view_request.php">View Request</a></li>
										<li><a href="Mservices.php">Manage Services</a></li>
										<li><a href="Provider_Cpass.php">My Account</a></li>
										<li><a href="View_report.php">View Report</a></li>
										<li><a href="Signout.php">Signout</a></li>
									</ul>
								</nav>

						
							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Local Services Hiring System. All rights reserved. Design By</a>.</p>
								</footer>
