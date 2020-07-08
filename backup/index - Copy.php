<?php
	session_start();
	if(isset($_SESSION['id']))
	{
		$logged_in=true;
	}
	else
	{
		$logged_in=false;
	}
?>
<!DOCTYPE HTML>
<html lang="en_US">
<head>
	<meta charset="UTF-8">
	<title>Music Player</title>
	<link rel="stylesheet" type="text/css" href="css.css">
	<script type="text/javascript" src="js.js"></script>
</head>
<body>

	<?php
		if($logged_in)
		{
			include('dbcon.php');
			$id=$_SESSION['id'];
			$sql="SELECT * FROM `users` WHERE `id`='$id'";
			$run=mysqli_query($con,$sql);
			$data=mysqli_fetch_assoc($run);
			?>
			<h3 style="color: white; text-align: center;">Welcome, <?php echo $data['name']; ?>!</h4>
				<div class="dropdown">
  					<button onclick="myFunction()" class="dropbtn">Menu</button>
  					<div id="myDropdown" class="dropdown-content">
						
						<a href="createplaylist.php">Create a playlist</a>
						<a href="userplaylists.php">Your playlists</a>
						<a href="logout.php">Log out</a>
					</div>
				</div>
				
			<?php
		}
		else
		{
			?>
				<div class="dropdown">
  					<button onclick="myFunction()" class="dropbtn" style="position: static;">Menu</button>
  					<div id="myDropdown" class="dropdown-content">
						<a href="signup.php">Sign Up</a>
						<a href="login.php">Login</a>
					</div>
				</div>
			<?php
		}
	?>

	<center>
		<form action="search.php" method="post" class="textbox">
			<input class="button" type="text" name="stext" placeholder="Search" required>
			
		</form>		 		 			 
	</center>

	<h1 align="center" style="color: white;">Have a great day with Music</h1>
	<table align = 'center' style = 'margin-top:10px; padding-right: 150px' cellpadding="60">
		<tr>
			
			<td><div class="zoom"><a href="category/romance.php">
				<img src="photos/caticon/romance.jpg" style="width:400px;height:200px;border:0;" align = 'center'>
			</a></div></td>
			
			<td><div class="zoom"><a href="category/party.php">
				<img src="photos/caticon/party.jpg" style="width:400px;height:200px;border:0;" align = 'center'>
			</a></div></td>

			<td><div class="zoom"><a href="category/dance.php">
				<img src="photos/caticon/dance.jpg" style="width:400px;height:200px;border:0;" align = 'center'>
			</a></div></td>
		</tr>

		<tr>
			<td><div class="zoom"><a href="category/bhakti.php">
				<img src="photos/caticon/bhakti.jpg" style="width:400px;height:200px;border:0;" align = 'center'>
			</a></div></td>

			<td><div class="zoom"><a href="category/edm.php">
				<img src="photos/caticon/edm.jpg" style="width:400px;height:200px;border:0;" align = 'center'>
			</a></div></td>

			<td><div class="zoom"><a href="category/english.php">
				<img src="photos/caticon/english.jpg" style="width:400px;height:200px;border:0;" align = 'center'>
			</a></div></td>
		</tr>
	<table>
</body>