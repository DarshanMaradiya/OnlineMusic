<!DOCTYPE HTML>
<html>
<head>
	<title>Forgot Password</title>
	<!-- <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="css.css"> -->
</head>
<body>

	<div class="wrapper">
	  <h1>FORGOT PASSWORD</h1>
<form action="forgotpassword.php" method="post">

<input class="email" placeholder="Email" type="email" name="email" pattern=".+@gmail.com" required>
<div>
      <p class="email-help">Please enter your current email address.</p>
</div>

<!-- <input class="pass" placeholder="Password you remember" type="password" name="lastpass" required>
<div>
      <p class="pass-help">Please enter the password you remember.</p>
</div> -->
<input class="submit" type="submit" name="submit" value="reset" required>

</form>
</div>
</body>
</html>

<?php
require('functions.php');

	if(isset($_POST['submit']))
	{
		include('dbcon.php');
		$email=$_POST['email'];
		// $lastpass=md5($_POST['lastpass']);
		$sql="SELECT * FROM `users` WHERE `email`='$email'";
		$run=mysqli_query($con,$sql);
		$row=mysqli_num_rows($run);
		
		if($row==1)
		{
			$data = mysqli_fetch_assoc($run);
			$otp = rand(100001, 999999);
			$success  = resetPasswordMail($data['id'], $data['email'], $data['name'], $otp);
			if($success)
			{
				?>
				<script>
					alert('We have send a link to reset your password on your Email.\nLink is not yet temporarily active!!!!');
					// window.open('index.php','_self');
				</script>
				<?php
				session_start();
				$uid = $data['id'];
				$_SESSION['uid']=$uid;
				$_SESSION['otp']=$otp;
				header("Location: verifyotp.php");
			}
			else
			{
				?>
				<script>
				alert('Error Sending');
				</script>
				<?php
			}
		}
		else
		{
			?>
			<script>
				alert('Email ID is incorrect !!\nEnter Again');
			</script>
			<?php
		}

	}
?>