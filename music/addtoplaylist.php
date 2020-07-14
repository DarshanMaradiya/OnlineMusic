
<!DOCTYPE HTML>
<html>
<head>
	<title>Add to playlist</title>
	<!-- <link rel="stylesheet" type="text/css" href="../css.css">
	<style type="text/css">
		p{
		color: white;
		font-size: 24px;
		text-align: center;
		}
		a:link, a:visited {
		  background-color: black;
		  color: white;
		  padding: 10px 15px;
		  width: 100%;
		  text-decoration: none;
		  display: inline-block;
		  transition: 0.4s;
		}
		a:hover{
		  background-color: white;
		  color: black;
		  padding: 10px 15px;
		  width: 100%;
		  text-decoration: none;
		  display: inline-block;
		}
	</style> -->

</head>
<body>
<?php

include('../dbcon.php');
session_start();
$uid=$_SESSION['id'];

if(isset($_GET['pid']))
{
	$pid=$_GET['pid'];
	$scode=$_GET['scode'];


	
	$qry="SELECT * FROM `playlists` WHERE `pid`='$pid'";
	$run=mysqli_query($con,$qry);
	$row=mysqli_num_rows($run);
	$data=mysqli_fetch_assoc($run);
	$list=$data['list'];

	if(strpos($list, $scode) !== false)
	{
		?>
		<script>
			window.alert('Song is already in the playlist!');
			window.history.go(-2);
		</script>
		<?php
	}
	else
	{
		$list=$list.$scode."_";
		$qry="UPDATE `playlists` SET `list`='$list' WHERE `pid`='$pid'";
		$run=mysqli_query($con,$qry);

		if($run)
		{
			?>
			<script>
				alert('Song is added');
				window.history.go(-2);
			</script>
			<?php
			}
		else
		{
			?>
			<script>
				alert('Failed to add');
				window.history.go(-2);
			</script>
			<?php
		}
	}	
}
else if(isset($_POST['submit']))
{
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
			window.history.go(-1);
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
				
				window.history.go(-1);
			</script>
			<?php

		}
		else
		{
			?>
			<script>
				alert('Failed to create playlist');
				window.history.go(-1);
			</script>
			<?php
		}
	}
}
else
{
	$scode=$_GET['scode'];
	$qry="SELECT * FROM `playlists` WHERE `uid`='$uid'";
	$run=mysqli_query($con,$qry);
	$row=mysqli_num_rows($run);
	if($row)
	{
			?>
			<p>	Your Playlists</p><br><br>
			<?php
			while($data=mysqli_fetch_assoc($run))
			{
				?>
				<br><a href="addtoplaylist.php?pid=<?php echo $data['pid'];?>&scode=<?php echo $scode;?>">
				Add to
				<?php
				echo $data['pname'];
				?></a><?php
			}
			?>
			<!-- create playlist -->
			<form action="addtoplaylist.php" method="post" class="textbox">
			<input class="button"  type="text" name="pname" required placeholder="Enter name of the playlist" >
			<input type="submit" name="submit" value="Create">
			</form>
			<?php
	}
	else
	{
		?>
		<script>
			window.alert('You need to create a playlist first!!');
			window.open('../createplaylist.php','_self');
		</script>
		<?php
	}
	

}

?>

</body>
</html>