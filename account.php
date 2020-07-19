<?php
	session_start();
	if(isset($_SESSION['id']))
	{
		$logged_in=true;
		include('dbcon.php');
		$id=$_SESSION['id'];
		$sql="SELECT * FROM `users` WHERE `id`='$id'";
		$run=mysqli_query($con,$sql);
		$data=mysqli_fetch_assoc($run);
	}
	else
	{
		$logged_in=false;
	}
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php echo $data['name']; ?></title>

		<link
			rel="stylesheet"
			href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css"
		/>
		<link
			rel="stylesheet"
			href="https://fonts.googleapis.com/css?family=Roboto&display=swap"
		/>
		<link rel="stylesheet" href="assets/css/styles.css" />
		<link rel="stylesheet" href="assets/css/sidebar.css" />

		<?php
			if(isset($_POST['changename'])){
				?>
				<link rel="stylesheet" href="assets/css/snackbar.css" />
				<div id="snackbar">Username changed <?php echo $newname; ?></div>
				<?php
				$newname = strtolower($_POST['username']);
				$qry = "UPDATE `users` SET `name`='$newname' WHERE `id`='$id'";
				$run = mysqli_query($con, $qry);
				header("Location: index.php");
			}
		?>
</head>
<body>
	<?php
		if($logged_in)	{
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
			<main class="main">
				Change username: 
				<form action=""	method="post" name="uname">
					<input type="text" name="username" id="username" placeholder="Enter new username">
					<input type="submit" name="changename" value="Change">
				</form>
				To change password 
				<form action="account.php" method="POST">
					<input type="submit" name="changepass" value="Change Password">
				</form>
				*You will get a link to reset password. The link is unique for you.
				<?php
				if(isset($_POST['changepass'])){
					require('functions.php');
					// sending mail
					$success = changePass($data['id'], $data['email']);
					if($success){
						?>
						<script type="text/javascript">alert("Change passwd link sent");</script>
						<?php
						header("Location: logout.php");
					}
					else{
						?>
						<script type="text/javascript">alert("fail");</script>
						<?php
					}
				}
				?>
			</main>
			<?php
		}
		else{
			header("Location: login.php");
		}
		?>
</body>
</html>