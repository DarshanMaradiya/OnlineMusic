<!DOCTYPE HTML>

<html>

<head>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<?php
	include("../dbcon.php");
	$scode=$_GET['scode'];


	$sql="SELECT * FROM `songinfo` WHERE `scode`='$scode'";
	$run=mysqli_query($con,$sql);
	$data=mysqli_fetch_assoc($run);
	?>
	<title><?php echo $data['sname']; ?></title>
	<!-- <style type="text/css">
		body{
  			background:url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/dark_wall.png);
		}
		div{
			font-family: Verdana;
		}
		.main1{
			display: block;
			width: 100%;
			height: 10%;
			padding: 10px;
			font-size-adjust: 0.8;
			border-bottom: 5px white solid;
			position: static;
			text-align: center;
			background-color: white;
			color: black;
		}
		.main2{
			display: block;
			width: 100%;
			height: 10%;
			padding: 10px;
			font-size-adjust: 0.8;
			border-bottom: 5px;
			border-style: solid;
			border-color: white;
			background-color: black;
			color: white;
			position: static;
			text-align: center;
		}
		p{
			font-size: 24px;
			display: block;
			height: 10%;
			width: 20%;
			background-color: white;
			border-top-right-radius: 50px;
			border-bottom-right-radius: 50px
			
		}
		a:link, a:visited {
		  background-color: black;
		  color: white;
		  padding: 10px 15px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		}
	</style> -->
</head>
<body>
<?php

if($run)
{
	?><div class="main1"><?php echo "".$data['sname'];?></div><?php
	?><div class="main2"><?php echo "<br>By ".$data['artist'];?></div><?php
	?><p><?php echo "<br>Duration : ".$data['duration'];?></p><?php
	?><p><?php echo "<br>Released Date : ".$data['rdate'];?></p><?php
	?><p><?php echo "<br>Language : ".$data['lang'];?></p><?php
}
else
{
	$site=$_GET['site'];
	?>
	<script>
		alert('Song might be removed temporarily');
		window.open('../category/<?php echo $site; ?>');
	</script>
	<?php
}

$folder=substr($scode,0,2);

$dlink=$folder."/".$data['sname'].".mp3";
$fname=$data['sname'].".mp3";
?>



<br>

<?php $link = "songinfo.php?scode=".$scode; ?>

<a href="play.php?dlink=<?php echo $dlink;?>" target="_blank" ><!-- <i class="fa fa-play-circle-o" aria-hidden="true" style="font-size: 50px;" title="Play"></i> -->play</a>
<?php
session_start();
if(isset($_SESSION['id']))
{
	?>
		<a href="addtoplaylist.php?scode=<?php echo $scode; ?>"><!-- <i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 50px;" title="Add to Playlist"></i> -->Add to playlist</a>
		<a href="<?php echo $dlink;?>" download><i class="fa fa-arrow-circle-o-down" aria-hidden="true" style="font-size: 50px;" title="Download"></i>download</a>
	<?php
}
else
{
	$link = "songinfo.php?scode=".$scode;
	?>
		<a href="../login.php?scode=<?php echo $scode; ?>"><!-- <i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 50px;" title="Add to Playlist"></i> -->Add to playlist</a><br>
		<a href="../login.php" onclick="alert('You need to login to your acoount first!');"><!-- <i class="fa fa-arrow-circle-o-down" aria-hidden="true" style="font-size: 50px;" title="Download"></i> -->download</a>
	<?php
}
?>
<!-- <a href="download.php?link=<?php echo $dlink;?>& fname=<?php echo $fname; ?>" target="_blank">download file</a> -->
</body>
</html>