
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
				window.open('../index.php','_self');
			</script>
			<?php
			}
		else
		{
			?>
			<script>
				alert('Failed to add');
				window.open('../index.php','_self');
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