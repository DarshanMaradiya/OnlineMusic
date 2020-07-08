<!DOCTYPE html>
<html>
<head>
<!-- <link rel="stylesheet" type="text/css" href="css.css"> -->
<!-- <style type="text/css">
	h2{
		text-align: center;
		color: white;
		font-weight: bold;
	}
	p{
		color: white;
		font-size: 24px;
	}
	a:link, a:visited{
		text-decoration: none;
		color: white;
	}
	.container {
	  display: block;
	  position: relative;
	  padding-left: 35px;
	  margin-bottom: 12px;
	  cursor: pointer;
	  font-size: 22px;
	  -webkit-user-select: none;
	  -moz-user-select: none;
	  -ms-user-select: none;
	  user-select: none;
	}

	/* Hide the browser's default checkbox */
	.container input {
	  position: absolute;
	  opacity: 0;
	  cursor: pointer;
	  height: 0;
	  width: 0;
	}

	/* Create a custom checkbox */
	.checkmark {
	  position: absolute;
	  top: 0;
	  left: 0;
	  height: 25px;
	  width: 25px;
	  background-color: #eee;
	}

	 On mouse-over, add a grey background color 
	.container:hover input ~ .checkmark {
	  background-color: #ccc;
	}

	/* When the checkbox is checked, add a blue background */
	.container input:checked ~ .checkmark {
	  background-color: #2196F3;
	}

	/* Create the checkmark/indicator (hidden when not checked) */
	.checkmark:after {
	  content: "";
	  position: absolute;
	  display: none;
	}

	/* Show the checkmark when checked */
	.container input:checked ~ .checkmark:after {
	  display: block;
	}

	/* Style the checkmark/indicator */
	.container .checkmark:after {
	  left: 9px;
	  top: 5px;
	  width: 5px;
	  height: 10px;
	  border: solid white;
	  border-width: 0 3px 3px 0;
	  -webkit-transform: rotate(45deg);
	  -ms-transform: rotate(45deg);
	  transform: rotate(45deg);
	}
</style> -->
<?php

include('dbcon.php');
session_start();
$uid=$_SESSION['id'];
$pid=$_GET['pid'];

if(isset($_GET['edit']))
{
if(isset($_POST['submit'])){//to run PHP script on submit
if(!empty($_POST['check_list'])){

$qry="SELECT * FROM `playlists` WHERE `pid`='$pid'";
$run=mysqli_query($con,$qry);
$row=mysqli_num_rows($run);
$data=mysqli_fetch_assoc($run);
$list=$data['list'];
$list=str_replace($_POST['check_list'],"",$list);
$qry="UPDATE `playlists` SET `list`='$list' WHERE `pid`='$pid'";
$run=mysqli_query($con,$qry);

if($run)
	{
		
		?>
		<script>
			alert('Playlist updated');
			window.open('showplaylist.php?pid=<?php echo $pid;?>','_self');
		</script>
		<?php

	}
	else
	{
		?>
		<script>
			alert('Failed to update playlist');
		</script>
		<?php
	}


}
}

}
else
{
$qry="SELECT * FROM `playlists` WHERE `pid`='$pid'";
$run=mysqli_query($con,$qry);
$row=mysqli_num_rows($run);
$data=mysqli_fetch_assoc($run);
$songs=explode("_", $data['list']);
?>
	<title>Playlist</title>
</head>
<body>
<?php
if($row)
	{
		?><h2>
			<?php echo $data['pname'];?>
			</h2><br><br>
			<form action="editplaylist.php?pid=<?php echo $pid;?>&edit=1" method="post">
			<?php
			for ($i=0; $i < count($songs)-1; $i++) {

				$qry="SELECT * FROM `songinfo` WHERE `scode`='$songs[$i]'";
				$run=mysqli_query($con,$qry);
				$data=mysqli_fetch_assoc($run);

				?><br>
				<label class="container"><input type="checkbox" name="check_list[]" value="<?php echo $data['scode'].'_';?>">

				<a href="music/songinfo.php?scode=<?php echo $data['scode'];?>&site=../showplaylist.php">
					<span class="checkmark"></span> <?php
			?> <?php	echo "".$data['sname']; ?><?php
				?></a></label><?php
			}
			?>
			<br><br>
			<input type="submit" name="submit" value="Remove Checked"/>
			</form><?php
			
	}



}





?>
</body>
</html>