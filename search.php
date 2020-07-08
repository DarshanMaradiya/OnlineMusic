<!DOCTYPE HTML>
<html>
<head>
	<!-- <link rel="stylesheet" type="text/css" href="../css.css">
	<style type="text/css">
		body{
  			background:url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/dark_wall.png);
		}
		a:link, a:visited {
		  background-color: black;
		  color: white;
		  padding: 10px 1px;
		  width: 100%;
		  text-decoration: none;
		  display: inline-block;
		  transition: 0.4s;
		}
		a:hover{
		  background-color: white;
		  color: black;
		  padding: 10px 1px;
		  width: 100%;
		  text-decoration: none;
		  display: inline-block;
		}
	</style> -->
</head>
<?php

	include('dbcon.php');


	$stext = $_POST['stext'];

	$sql = "SELECT * FROM `songinfo` WHERE `sname` LIKE '%$stext%'";
	$run = mysqli_query($con,$sql);
	$row = mysqli_num_rows($run);
	if($row)
	{
		while($data=mysqli_fetch_assoc($run))
			{

				?>
				<a href="music/songinfo.php?scode=<?php echo $data['scode'];?>"><?php echo $data['sname'];?></a><?php echo " by ".$data['artist'];?>
					<br>
					<br>
				<?php
			}
	}
	else
	{
		$sql = "SELECT * FROM `songinfo` WHERE `artist` LIKE '%$stext%'";
		$run = mysqli_query($con,$sql);
		$row = mysqli_num_rows($run);
		if($row)
		{
			while($data=mysqli_fetch_assoc($run))
			{

				?>
				<a href="music/songinfo.php?scode=<?php echo $data['scode'];?>"><?php echo $data['sname'];?></a><?php echo " by ".$data['artist'];?>
					<br>
					<br>
				<?php
			}
		}
		else
		{
			?>
			<a href="index.php">Back to Home</a>
			<h3><center>No Result Found!</center></h3>
			<?php
		}

	}

?>

</html>