<!DOCTYPE HTML>
<!DOCTYPE html>
<html>
<head>
	<title>Create New Playlist</title>
	<!-- <link rel="stylesheet" type="text/css" href="css.css"> -->
	</style>
</head>
<body>

<form action="createplaylist.php" method="post" class="textbox">
	<input class="button"  type="text" name="pname" required placeholder="Enter name of the playlist" >
	<input type="submit" name="submit" value="Create">
</form>

</body>
</html>

<?php
session_start();
if(isset($_POST['submit']))
{
	include('dbcon.php');
	$pname=$_POST['pname'];
	$uid=$_SESSION['id'];
	$qry="SELECT * FROM `playlists` WHERE `pname`='$pname' AND `uid`='$uid'";
	$run=mysqli_query($con,$qry);
	$row=mysqli_num_rows($run);
	if($row)
	{
		?>
		<script>
			alert('Playlist Name already exist!choose another name!!');
			
		</script>
		<?php
	}
	else
	{
		$qry="INSERT INTO `playlists`(`uid`, `pname`) VALUES ('$uid','$pname')";
		$run=mysqli_query($con,$qry);
		if($run)
		{
			if(isset($_GET['site']))
				$site=$_GET['site'];
			else
				$site="index.php";			
			?>
			<script>
				alert('Playlist created Successfully!Now go add some songs!');
				window.open('<?php echo $site; ?>','_self');
			</script>
			<?php

		}
		else
		{
			?>
			<script>
				alert('Failed to create playlist');
			</script>
			<?php
		}
	}

}

?>



