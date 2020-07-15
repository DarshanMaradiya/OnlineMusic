<?php

session_start();
include('../dbcon.php');

$uid = $_SESSION['id'];
$scode = $_GET['scode'];

$qry = "SELECT `favlist` FROM `favourites` WHERE `uid` = '$uid'";
$run = mysqli_query($con, $qry);

if($run)
{
	$data = mysqli_fetch_assoc($run);
	$newList = str_replace($scode."_", "", $data['favlist']);

	$qry = "UPDATE `favourites` SET `favlist` = '$newList' WHERE `uid` = '$uid'";
	$run = mysqli_query($con, $qry);

	if($run == false)
	{
		?>
		<script type="text/javascript">
			alert('Something went wrong!!');
			window.history.go(-1);
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
			//alert('Song is removed from your favourites!');
			window.history.go(-1);
		</script>
		<?php
	}
}



?>