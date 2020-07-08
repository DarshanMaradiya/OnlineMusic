<!DOCTYPE html>
<html>
<head>
<?php

include('dbcon.php');
session_start();
$uid=$_SESSION['id'];
$pid=$_GET['pid'];
$qry="SELECT * FROM `playlists` WHERE `pid`='$pid'";
$run=mysqli_query($con,$qry);
$row=mysqli_num_rows($run);
$data=mysqli_fetch_assoc($run);
$songs=explode("_", $data['list']);
?>
	<title>Playlist</title>
	<!-- 	<link rel="stylesheet" type="text/css" href="css.css">

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
		h2{
			text-align: center;
			color: white;
			font-weight: bold;
		}
	</style> -->
</head>
<body>
<?php
if($row)
	{
		?><h2>
			<?php echo $data['pname'];?>
			</h2>
			<br><a class="manage" style="width: 20%;" href="editplaylist.php?pid=<?php echo $pid; ?>">Edit playlist</a>
			<br><br>
			<ol>
			<?php
			for ($i=0; $i < count($songs)-1; $i++) {

				$qry="SELECT * FROM `songinfo` WHERE `scode`='$songs[$i]'";
				$run=mysqli_query($con,$qry);
				$data=mysqli_fetch_assoc($run);

				?><li><a href="music/songinfo.php?scode=<?php echo $data['scode'];?>&site=../showplaylist.php"><?php
				echo "".$data['sname'];
				?></a></li><?php
			}
			?>
			</ol>
			<?php
	}

?>
</body>
</html>