<!DOCTYPE html>
<html>
<head>
	<title>Playlist</title>
	<!-- <meta http-equiv="refresh" content="5"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css.css">
	<style type="text/css">

		.manage{
			text-decoration: none;
			display: block;
			border-bottom: 2px white double;
		}
		ol {
		  background: black;
		  padding: 20px;
		}
		ol li {
		  background: white;
		  padding: 5px;
		  margin-left: 35px;
		  color: white;
		}
		a:link, a:visited {
		  background-color: black;
		  color: white;
		  padding: 10px 15px;
		  width: 10%;
		  text-decoration: none;
		  display: inline-block;
		  transition: width 0.4s;
		}
		a:hover{
		  background-color: black;
		  color: white;
		  padding: 10px 15px;
		  width: 100%;
		  text-decoration: none;
		  display: inline-block;
		}
		h2{
			text-align: center;
			color: white;
			font-weight: bold;
		}
	</style> -->
</head>
<body>

<?php

include('dbcon.php');
session_start();
$uid=$_SESSION['id'];

$qry="SELECT * FROM `playlists` WHERE `uid`='$uid'";
$run=mysqli_query($con,$qry);
$row=mysqli_num_rows($run);
if($row)
{
	?>
		<h2>Your Playlists</h2><br><br>
		<a class="manage" style="width: 10%" href="manageplaylist.php" target="_blank">Manage Playlists</a><br>
	<ol>
	<?php
	while($data=mysqli_fetch_assoc($run))
	{
		?>
		<li><a class="mag" style="text-decoration: none;" href="showplaylist.php?pid=<?php echo $data['pid'];?>">
		<?php
		echo $data['pname'];
		?></a></li><?php
		
	}?>
	</ol>
	<?php
}	

else
{
	?>
	No Playlist Found!!
	<?php
}




?>


</body>
</html>