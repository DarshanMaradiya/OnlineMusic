<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css"
		/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/?family=Roboto&display=swap"/>
	<link rel="stylesheet" href="assets/css/styles.css" />
	<link rel="stylesheet" href="assets/css/sidebar.css" />
</head>
<body>
	<?php
	function indexphp_loggedin($uname, $isVerified){
		?>
		<div id="profile" class="sidebar">
			<aside class="sidebar">
				<nav>
					<ul class="sidebar__nav">
						<li>
							<a href="account.php" class="sidebar__nav__link">
							<?php if($isVerified == 0) { ?>
							<i class="mdi mdi-account-alert"></i>
							<?php }
							else {?>
							<i class="mdi mdi-account-check"></i>
							<?php } ?>
							<span class="sidebar__nav__text"><?php echo $uname; ?></span>
							</a>
						</li>
						<li>
							<a href="favourites.php" class="sidebar__nav__link">
								<i class="mdi mdi-heart"></i>
								<span class="sidebar__nav__text">Favourites</span>
							</a>
						</li>
						<li>
							<a href="userplaylists.php" class="sidebar__nav__link">
								<i class="mdi mdi-playlist-play"></i>
								<span class="sidebar__nav__text">Playlists</span>
							</a>
						</li>
						<li>
							<a href="createplaylist.php" class="sidebar__nav__link">
								<i class="mdi mdi-playlist-plus"></i>
								<span class="sidebar__nav__text">Create playlist</span>
							</a>
						</li>
						<li>
							<a href="logout.php" class="sidebar__nav__link">
								<i class="mdi mdi-logout-variant"></i>
								<span class="sidebar__nav__text">Log out</span>
							</a>
						</li>
					</ul>
				</nav>
			</aside>
		</div>
		<?php
	}
	function indexphp_notloggedin(){
		?>
		<div id="profile" class="sidebar">
			<aside class="sidebar">
				<nav>
					<ul class="sidebar__nav">
						<li>
							<a href="login.php" class="sidebar__nav__link">
							<i class="mdi mdi-login-variant"></i>
							<span class="sidebar__nav__text">Log-in</span>
							</a>
						</li>
						<li>
							<a href="signup.php" class="sidebar__nav__link">
							<i class="mdi mdi-new-box"></i>
							<span class="sidebar__nav__text">Sign-up</span>
							</a>
						</li>
						<li>
							<a class="sidebar__nav__link">
							</a>
						</li>
					</ul>
				</nav>
			</aside>
		</div>
		<?php
	}
	function favourites($id)
	{
		include('dbcon.php');
		$sql="SELECT * FROM `users` WHERE `id`='$id'";
		$run=mysqli_query($con,$sql);
		$data=mysqli_fetch_assoc($run);
		?>
		<div id="profile" class="sidebar">
			<aside class="sidebar">
				<nav>
					<ul class="sidebar__nav">
						<li>
							<a href="index.php" class="sidebar__nav__link">
								<i class="mdi mdi-home"></i>
								<span class="sidebar__nav__text">Home</span>
							</a>
						</li>
						<li>
							<a href="account.php" class="sidebar__nav__link">
							<?php if($data['verified'] == 0) { ?>
							<i class="mdi mdi-account-alert"></i>
							<?php }
							 else {?>
							<i class="mdi mdi-account-check"></i>
							<?php } ?>
							<span class="sidebar__nav__text"><?php echo $data['name']; ?></span>
							</a>
						</li>
						<li>
							<a href="userplaylists.php" class="sidebar__nav__link">
								<i class="mdi mdi-playlist-play"></i>
								<span class="sidebar__nav__text">Playlists</span>
							</a>
						</li>
						<li>
							<a href="createplaylist.php" class="sidebar__nav__link">
								<i class="mdi mdi-playlist-plus"></i>
								<span class="sidebar__nav__text">Create playlist</span>
							</a>
						</li>
						<li>
							<a href="logout.php" class="sidebar__nav__link">
								<i class="mdi mdi-logout-variant"></i>
								<span class="sidebar__nav__text">Log out</span>
							</a>
						</li>
					</ul>
				</nav>
			</aside>
		</div>
		<?php
	}
	function userplaylists($id)
	{
		include('dbcon.php');
		$sql="SELECT * FROM `users` WHERE `id`='$id'";
		$run=mysqli_query($con,$sql);
		$data=mysqli_fetch_assoc($run);
		?>
		<div id="profile" class="sidebar">
			<aside class="sidebar">
				<nav>
					<ul class="sidebar__nav">
						<li>
							<a href="index.php" class="sidebar__nav__link">
								<i class="mdi mdi-home"></i>
								<span class="sidebar__nav__text">Home</span>
							</a>
						</li>
						<li>
							<a href="account.php" class="sidebar__nav__link">
							<?php if($data['verified'] == 0) { ?>
							<i class="mdi mdi-account-alert"></i>
						<?php }
							 else {?>
							<i class="mdi mdi-account-check"></i>
							<?php } ?>
							<span class="sidebar__nav__text"><?php echo $data['name']; ?></span>
							</a>
						</li>
						<li>
							<a href="favourites.php" class="sidebar__nav__link">
								<i class="mdi mdi-heart"></i>
								<span class="sidebar__nav__text">Favourites</span>
							</a>
						</li>
						<li>
							<a href="createplaylist.php" class="sidebar__nav__link">
								<i class="mdi mdi-playlist-plus"></i>
								<span class="sidebar__nav__text">Create playlist</span>
							</a>
						</li>
						<li>
							<a href="logout.php" class="sidebar__nav__link">
								<i class="mdi mdi-logout-variant"></i>
								<span class="sidebar__nav__text">Log out</span>
							</a>
						</li>
					</ul>
				</nav>
			</aside>
		</div>
		<?php
	}
	function createplaylist($id)
	{
		include('dbcon.php');
		$sql="SELECT * FROM `users` WHERE `id`='$id'";
		$run=mysqli_query($con,$sql);
		$data=mysqli_fetch_assoc($run);
		?>
		<div id="profile" class="sidebar">
			<aside class="sidebar">
				<nav>
					<ul class="sidebar__nav">
						<li>
							<a href="index.php" class="sidebar__nav__link">
								<i class="mdi mdi-home"></i>
								<span class="sidebar__nav__text">Home</span>
							</a>
						</li>
						<li>
							<a href="account.php" class="sidebar__nav__link">
							<?php if($data['verified'] == 0) { ?>
							<i class="mdi mdi-account-alert"></i>
							<?php }
							 else {?>
							<i class="mdi mdi-account-check"></i>
							<?php } ?>
							<span class="sidebar__nav__text"><?php echo $data['name']; ?></span>
							</a>
						</li>
						<li>
							<a href="favourites.php" class="sidebar__nav__link">
								<i class="mdi mdi-heart"></i>
								<span class="sidebar__nav__text">Favourites</span>
							</a>
						</li>
						<li>
							<a href="userplaylists.php" class="sidebar__nav__link">
								<i class="mdi mdi-playlist-play"></i>
								<span class="sidebar__nav__text">Playlists</span>
							</a>
						</li>
						<li>
							<a href="logout.php" class="sidebar__nav__link">
								<i class="mdi mdi-logout-variant"></i>
								<span class="sidebar__nav__text">Log out</span>
							</a>
						</li>
					</ul>
				</nav>
			</aside>
		</div>
		<?php
	}
	function category_loggedin($id)
	{
		include('dbcon.php');
		$sql="SELECT * FROM `users` WHERE `id`='$id'";
		$run=mysqli_query($con,$sql);
		$data=mysqli_fetch_assoc($run);
		?>
		<div id="profile" class="sidebar">
			<aside class="sidebar">
				<nav>
					<ul class="sidebar__nav">
						<li>
							<a href="../index.php" class="sidebar__nav__link">
							<i class="mdi mdi-home"></i>
							<span class="sidebar__nav__text">Home</span>
							</a>
						</li>
						<li>
							<a href="../account.php" class="sidebar__nav__link">
							<?php if($data['verified'] == 0) { ?>
							<i class="mdi mdi-account-alert"></i>
							<?php }
							 else {?>
							<i class="mdi mdi-account-check"></i>
							<?php } ?>
							<span class="sidebar__nav__text"><?php echo $data['name']; ?></span>
							</a>
						</li>
						<li>
							<a href="../favourites.php" class="sidebar__nav__link">
								<i class="mdi mdi-heart"></i>
								<span class="sidebar__nav__text">Favourites</span>
							</a>
						</li>
						<li>
							<a href="../userplaylists.php" class="sidebar__nav__link">
								<i class="mdi mdi-playlist-play"></i>
								<span class="sidebar__nav__text">Playlists</span>
							</a>
						</li>
						<li>
							<a href="../createplaylist.php" class="sidebar__nav__link">
								<i class="mdi mdi-playlist-plus"></i>
								<span class="sidebar__nav__text">Create playlist</span>
							</a>
						</li>
						<li>
							<a href="../logout.php" class="sidebar__nav__link">
								<i class="mdi mdi-logout-variant"></i>
								<span class="sidebar__nav__text">Log out</span>
							</a>
						</li>
					</ul>
				</nav>
			</aside>
		</div>
		<?php
	}
	function category_loggedout()
	{
		?>
		<div id="profile" class="sidebar">
			<aside class="sidebar">
				<nav>
					<ul class="sidebar__nav">
						<li>
							<a href="../index.php" class="sidebar__nav__link">
							<i class="mdi mdi-home"></i>
							<span class="sidebar__nav__text">Home</span>
							</a>
						</li>
						<li>
							<a href="../login.php" class="sidebar__nav__link">
							<i class="mdi mdi-login-variant"></i>
							<span class="sidebar__nav__text">Log-in</span>
							</a>
						</li>
						<li>
							<a href="../signup.php" class="sidebar__nav__link">
							<i class="mdi mdi-new-box"></i>
							<span class="sidebar__nav__text">Sign-up</span>
							</a>
						</li>
						<li>
							<a class="sidebar__nav__link">
							</a>
						</li>
					</ul>
				</nav>
			</aside>
		</div>
		<?php
	}
	function account($isVerified)
	{
		?>
		<div id="profile" class="sidebar">
			<aside class="sidebar">
				<nav>
					<ul class="sidebar__nav">
						<li>
							<a href="index.php" class="sidebar__nav__link">
								<i class="mdi mdi-home"></i>
								<span class="sidebar__nav__text">Home</span>
							</a>
						</li>
						<li>
							<a href="account.php" class="sidebar__nav__link">
							<?php if($isVerified == 0) { 
								?>
								<i class="mdi mdi-exclamation"></i>
								<span class="sidebar__nav__text">Verification require</span>
								<?php 
							}
							else 
							{
								?>
								<i class="mdi mdi-check"></i>
								<span class="sidebar__nav__text">Verified</span>
								<?php
							} ?>
							</a>
						</li>
						<li>
							<a href="favourites.php" class="sidebar__nav__link">
								<i class="mdi mdi-heart"></i>
								<span class="sidebar__nav__text">Favourites</span>
							</a>
						</li>
						<li>
							<a href="userplaylists.php" class="sidebar__nav__link">
								<i class="mdi mdi-playlist-play"></i>
								<span class="sidebar__nav__text">Playlists</span>
							</a>
						</li>
						<li>
							<a href="createplaylist.php" class="sidebar__nav__link">
								<i class="mdi mdi-playlist-plus"></i>
								<span class="sidebar__nav__text">Create playlist</span>
							</a>
						</li>
						<li>
							<a href="logout.php" class="sidebar__nav__link">
								<i class="mdi mdi-logout-variant"></i>
								<span class="sidebar__nav__text">Log out</span>
							</a>
						</li>
					</ul>
				</nav>
			</aside>
		</div>
		<?php
	}
	?>
</body>
</html>