<!DOCTYPE html>
<html>
	<head>
		<?php
			include('dbcon.php');
			session_start();
			$uid=$_SESSION['id'];
			if(isset($_POST['submit'])){
				if(!empty($_POST['check_list'])) {
					$qry="SELECT * FROM `favourites` WHERE `uid`='$uid'";
					$run=mysqli_query($con,$qry);
					$data=mysqli_fetch_assoc($run);
					$list=$data['favlist'];
					$list=str_replace($_POST['check_list'],"",$list);
					$qry="UPDATE `favourites` SET `favlist`='$list' WHERE `uid`='$uid'";
					$run=mysqli_query($con,$qry);
					if($run)
						{
							?>
							<script type="text/javascript">alert("Favourite updates");</script>
							<?php
							$qry = "SELECT `favlist` FROM `favourites` WHERE `uid`='$uid'";
							$run = mysqli_query($con, $qry);
							$data = mysqli_fetch_assoc($run);
							$list = $data['favlist'];
							if($list==""){
								$qry = "DELETE FROM `favourites` WHERE `uid`='$uid'";
								$run = mysqli_query($con, $qry);
								?>
								<script type="text/javascript">window.history.go(-3);</script>
								<?php
							}
							else{
								?>
								<script>
									window.history.go(-2);
								</script>
								<?php
							}
						}
						else
						{
							?>
							<script>
								alert('Failed to update playlist');
								window.history.go(-2);
							</script>
							<?php
						}
					}
			}
			else{
				$qry="SELECT * FROM `favourites` WHERE `uid`='$uid'";
				$run=mysqli_query($con,$qry);
				$data=mysqli_fetch_assoc($run);
				$songs=explode("_", $data['favlist']);
			?>
		<title>Playlist</title>
	</head>
	<body>
	<?php
		if($run)
		{
			?><h2>Manage favourite</h2><br><br>
			<form action="managefav.php" method="post">
			<?php
				for ($i=0; $i < count($songs)-1; $i++) {
						$qry="SELECT * FROM `songinfo` WHERE `scode`='$songs[$i]'";
						$run=mysqli_query($con,$qry);
						$data=mysqli_fetch_assoc($run);
						?><br>
						<label class="container"><input type="checkbox" name="check_list[]" value="<?php echo $data['scode'].'_';?>">

						<a href="music/songinfo.php?scode=<?php echo $data['scode'];?>">
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
</html>