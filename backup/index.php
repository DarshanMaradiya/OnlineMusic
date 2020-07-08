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
				<h3 align="right" style="margin-right:20px;"><?php echo $data['name']; ?> | <a href="logout.php">Log out</a><br>
				<right><a href="createplaylist.php" style="text-decoration: none;">Create a playlist</a></right><br>
				<right><a href="userplaylists.php" style="text-decoration: none;">Your playlists</a></right><br></h3>
				
			<?php
		}
		else
		{
			?>
				<h3 align="right" style="margin-right:20px;"><a href="signup.php">Sign Up</a> | <a href="login.php">Login</a></h3>
			<?php
		}
	?>

	<center>
		<form action="search.php" method="post">
			<input style="width: 200px;" type="text" name="stext" placeholder="Search artist and song name" required>
			<input type="submit" name="submit" value="Search">
		</form>		 		 			 
	</center>

	<h1 align="center">Have a great day with Music</h1>
	<table align = 'center' width = '80%' style = 'margin-top:10px;'>
		<tr>
			<td><a href="category/romance.php">
				<img src="photos/caticon/romance.jpg" style="width:400px;height:200px;border:0;" align = 'center'>
			</a></td>
			<td><a href="category/party.php">
				<img src="photos/caticon/party.jpg" style="width:400px;height:200px;border:0;" align = 'center'>
			</a></td>
			<td><a href="category/dance.php">
				<img src="photos/caticon/dance.jpg" style="width:400px;height:200px;border:0;" align = 'center'>
			</a></td>
		</tr>
		<tr>
			<td><a href="category/bhakti.php">
				<img src="photos/caticon/bhakti.jpg" style="width:400px;height:200px;border:0;" align = 'center'>
			</a></td>
			<td><a href="category/edm.php">
				<img src="photos/caticon/edm.jpg" style="width:400px;height:200px;border:0;" align = 'center'>
			</a></td>
			<td><a href="category/english.php">
				<img src="photos/caticon/english.jpg" style="width:400px;height:200px;border:0;" align = 'center'>
			</a></td>
		</tr>
	<table>
</body>