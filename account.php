<?php
	session_start();
	if(isset($_SESSION['id']))
	{
		$logged_in=true;
		include('dbcon.php');
		$id=$_SESSION['id'];
		$sql="SELECT * FROM `users` WHERE `id`='$id'";
		$run=mysqli_query($con,$sql);
		$data=mysqli_fetch_assoc($run);
	}
	else
	{
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php echo $data['name']; ?></title>

		<link
			rel="stylesheet"
			href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css"
		/>
		<link
			rel="stylesheet"
			href="https://fonts.googleapis.com/css?family=Roboto&display=swap"
		/>
		<link rel="stylesheet" href="assets/css/styles.css" />
		<link rel="stylesheet" href="assets/css/sidebar.css" />

		<?php
			if(isset($_POST['changename'])){
				$usernameExist = false;
				$newname = strtolower($_POST['username']);
				$qry = "SELECT * FROM `users` WHERE `name` = '$newname'";
				$run = mysqli_query($con, $qry);
				$row = mysqli_num_rows($run);

				if($row > 0)
				{
					$usernameExist = true;
					?>
						<script type="text/javascript">
							alert('Username already Exists!! try different one!');
						</script>
					<?php
				}
				else
				{
					?>
					<link rel="stylesheet" href="assets/css/snackbar.css" />
					<div id="snackbar">Username changed <?php echo $newname; ?></div>
					<?php
					$qry = "UPDATE `users` SET `name`='$newname' WHERE `id`='$id'";
					$run = mysqli_query($con, $qry);
					header("Location: index.php");
				}
			}
		?>
</head>
<body>
	<?php
		if($logged_in)	{
			include('sidebar.php');
			account($data['verified']);
			?>
			<main class="main">
				<?php
				if($data['verified']==0)
				{
					?>
					Your email address is not verified yet.<br>
					<form action="account.php" method="post">
						<input type="submit" name="verificationmail" value="Send mail">
					</form>
					<?php
						if(isset($_POST['verificationmail'])){
						require('functions.php');
						// sending mail
						$success = verifyMail($data['id'], $data['email'], $data['name']);
						if($success){
							?>
							<script type="text/javascript">alert("Mail sent");</script>
							<?php
						}
						else{
							?>
							<script type="text/javascript">alert("Try again");</script>
							<?php
						}
					}
				}
				?>
				<br>
				Change username: 
				<form action=""	method="post" name="uname">
					<input type="text" name="username" id="username" placeholder="Enter new username">
					<input type="submit" name="changename" value="Change">
				</form>
				To change password 
				<form action="account.php" method="POST">
					<input type="submit" name="changepass" value="Change Password">
				</form>
				*You will get a link to reset password. The link is unique for you.
				<?php
				if(isset($_POST['changepass'])){
					require('functions.php');
					// sending mail
					$success = changePass($data['id'], $data['email']);
					if($success){
						?>
						<script type="text/javascript">alert("Change passwd link sent");</script>
						<?php
						header("Location: logout.php");
					}
					else{
						?>
						<script type="text/javascript">alert("fail");</script>
						<?php
					}
				}
				?>
			</main>
			<?php
		}
		else{
			header("Location: login.php");
		}
		?>
</body>
</html>