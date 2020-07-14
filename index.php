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
	<!-- <link rel="stylesheet" type="text/css" href="css.css">
	<script type="text/javascript" src="js.js"></script>
	<style type="text/css">
		.sign{
			text-decoration: none;
			background-color: black;
		  	color: white;
		  	padding: 10px 15px;
		  	width: 10%;
		  	height: 15%;
		  	text-decoration: none;
		  	display: inline-block;
		  	margin-bottom: 10px;
		  	border-radius: 75px;
		  	text-align: center;
		  	transition: 0.4s ease-in-out;
		}
		.sign:hover{
			text-decoration: none;
			background-color: white;
		  	color: black;
		  	padding: 10px 15px;
		  	width: 10%;
		  	height: 15%;
		  	text-decoration: none;
		  	display: inline-block;
		  	margin-bottom: 10px;
		  	border-radius: 75px;
		  	text-align: center;
		}
		.log{
			text-decoration: none;
			background-color: black;
		  	color: white;
		  	padding: 10px 15px;
		  	width: 10%;
		  	height: 15%;
		  	text-decoration: none;
		  	display: inline-block;
		  	margin-bottom: 10px;
		  	border-radius: 75px;
		  	text-align: center;
		  	transition: 0.4s ease-in-out;
		}
		.log:hover{
			text-decoration: none;
			background-color: white;
		  	color: black;
		  	padding: 10px 15px;
		  	width: 10%;
		  	height: 15%;
		  	text-decoration: none;
		  	display: inline-block;
		  	margin-bottom: 10px;
		  	border-radius: 75px;
		  	text-align: center;
		}
	</style> -->
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
			<h3 style="color: black; text-align: center;">Welcome, <?php echo $data['name']; ?>!</h4>
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
			<div>
				<a class="sign" href="signup.php">Sign Up</a>
				<a class="log" href="login.php">Login</a>
			</div>
			<?php
		}
	?>

	<center>
		<form action="search.php" method="post" class="textbox">
			<input onchange="validateKeyword()" id="searchBox" class="button" type="text" name="stext" placeholder="Search" required>
			
		</form>		 		 			 
	</center>
	<script type="text/javascript">
		function validateKeyword(){
			console.log("is running");
			var btn = document.getElementById('searchBox');
			btn.value = btn.value.trim();
			if(btn.value.length == 1)
			{
				alert('Enter some valid keyword!!');
				btn.value = "";
			}
		}
	</script>

	<h1 align="center" style="color: black;">Have a great day with Music</h1>
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