<!DOCTYPE HTML>
<html>
<head>
	<title>Add to Favourites</title>
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
$scode = $_GET['scode'];

$qry = "SELECT * FROM `favourites` WHERE `uid` = '$uid'";
$run = mysqli_query($con, $qry);
$row = mysqli_num_rows($run);

if($row == 0)
{
	$qry = "INSERT INTO `favourites` (`uid`, `favlist`) VALUES ('$uid', '\0')";
	$run = mysqli_query($con, $qry);
	if($run == false)
	{
		?>
			<script type="text/javascript">
				alert('something went wrong!!');
				// window.history.go(-1);
			</script>
		<?php
	}
}


$data = mysqli_fetch_assoc($run);
$newFavList = $data['favlist'];

if(strpos($newFavList, $scode) !== false)
{
	?>
	<script>
		alert('Song is already in your favourites!');
		window.history.go(-1);
	</script>
	<?php
}
else
{
	$newFavList = $newFavList.$scode."_";
	$qry = "UPDATE `favourites` SET `favlist` = '$newFavList' WHERE `uid` = '$uid'";
	$run = mysqli_query($con, $qry);
	if($run)
	{
		?>
		<script type="text/javascript">
			window.history.go(-1);
		</script>
		<?php
	}
	else
	{
		?>
		<script>
			alert('Failed to add');
			window.history.go(-1);
		</script>
		<?php
	}
}

?>
</body>
</html>