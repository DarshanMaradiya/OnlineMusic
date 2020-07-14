<!DOCTYPE html>
<html>
<head>
	<title>Playlist</title>
	<!-- <link rel="stylesheet" type="text/css" href="css.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
	h2{
		text-align: center;
		color: white;
		font-weight: bold;
	}
	p{
		color: white;
		font-size: 24px;
	}
	a:link, a:visited {
		  background-color: black;
		  color: white;
		  padding: 5px 5px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  border-radius: 10px;
		}
	
	.manage{
		background-color: black;
		  color: white;
		  padding: 10px 15px;
		  width: 10%;
		  text-decoration: none;
		  display: inline-block;
		  transition: width 0.4s;
		  margin-bottom: 7px;
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

if(isset($_GET['delete']))
{
	$pid=$_GET['pid'];
	$qry="DELETE FROM `playlists` WHERE `pid`='$pid'";
	$run=mysqli_query($con,$qry);
	if($run)
	{
		?>
		<script>
			alert('Playlist deleted successfully!');
			window.history.go(-2);
		</script>
		<?php
	}
	else
	{
		?>
		<script>
			alert('Failed to delete playlist!!');
			window.history.go(-2);
		</script>
		<?php
	}

}
else if(isset($_GET['rename']))
{
	$pid=$_GET['pid'];
	if($_GET['rename']==1)
	{
		?>
		<form action="manageplaylist.php?rename=2&pid=<?php echo $pid;?>" method="post">
			Enter new name for playlist: <input type="text" name="newname" required>
			<input type="submit" name="submit" value="Rename">	
		</form>
		<?php
	}
	else
	{
		$newname=$_POST['newname'];
		$qry="UPDATE `playlists` SET `pname`='$newname' WHERE `pid`='$pid'";
		$run=mysqli_query($con,$qry);
		if($run)
		{
			?>
			<script>
				alert('Playist renamed Successfully!!');
				window.history.go(-2);
			</script>
			<?php
		}
		else
		{
			?>
			<script>
				alert('Failed to rename playlist!!');
				window.history.go(-2);
			</script>
			<?php
		}
	}
}
else
{
	$qry="SELECT * FROM `playlists` WHERE `uid`='$uid'";
	$run=mysqli_query($con,$qry);
	$row=mysqli_num_rows($run);
	if($row)
	{
		?>
			<h2>Your Playlists</h2><br><br>
		<?php
		while($data=mysqli_fetch_assoc($run))
		{
			?>
			<br>
			
			<a class="manage" href="showplaylist.php?pid=<?php echo $data['pid'];?>"><?php
			echo " ".$data['pname'];
			?></a>
			<a href="manageplaylist.php?rename=1&pid=<?php echo $data['pid'];?>"><i class="fa fa-pencil" aria-hidden="true" style="font-size: 20px;" title="Rename"></i>Rename</a>
			<a href="manageplaylist.php?delete=1&pid=<?php echo $data['pid'];?>"><i class="fa fa-minus-square" aria-hidden="true" style="font-size: 20px;" title="Delete"></i>Delete</a>
			<?php echo " ";?>
			
			<?php
			
		}
	}


}
?>


</body>
</html>