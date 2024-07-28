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
										<li><a href="welcome.php">Homepage</a></li>
										
										<li>
											<span class="opener"> Services</span>
											<ul>
												<li><a href="view_provider.php?type=elect">Electrician</a></li>
												<li><a href="view_provider.php?type=plumb">Plumber</a></li>
												<li><a href="view_provider.php?type=carpen">Carpenter</a></li>
												<li><a href="view_provider.php?type=water">Water Purifier</a></li>
												<li><a href="view_provider.php?type=painter">Painter</a></li>
												
												<li><a href="view_provider.php?type=repaire">Appliance Repair</a></li>
												<li><a href="view_provider.php?type=cleaner">House Cleaning</a></li>
												<li><a href="view_provider.php?type=interior">Interior Design</a></li>
												<li><a href="view_provider.php?type=architecture">Architecturer</a></li>
												<li><a href="view_provider.php?type=pop">POP Design</a></li>
												
											</ul>
										</li>
										<li><a href="Consumer_Cpass.php">My Account</a></li>
										<li><a href="myservices.php">My Services</a></li>
										<li><a href="Signout.php">Signout</a></li>
									</ul>
								</nav>

				
							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Local Labours Hiring System. All rights reserved.</a>.</p>
								</footer>