<!DOCTYPE HTML>
<html>
<head>
	<title>Login</title>
	<!-- <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="css.css"> -->
</head>
<body>

<?php
if(isset($_SESSION['id']))
{
	?>
	You are already Logged in!
	<button onclick="window.history.go(-1);">Go back</button>
	<script type="text/javascript">console.log("It's true");</script>
	<?php

}
else
{

?>

	<div class="wrapper">
		  <h1>LOGIN</h1>

		<form method="post" action="login.php">

			<input class="name" placeholder="Name" type="text" name="name" required>
			<div>
				<p class="name-help">Please enter your first and last name.</p>
			</div>
			<input class="pass" placeholder="Password" type="password" name="password" required>
			<div>
			      <p class="pass-help">Please enter your password.</p>
			</div>

			<!-- Captcha element along with captcha.php from https://code.tutsplus.com/tutorials/build-your-own-captcha-and-contact-form-in-php--net-5362 -->
			<div class="elem-group">
			    <label for="captcha">Please Enter the Captcha Text</label><br>
			    <img src="captcha.php" alt="CAPTCHA" class="captcha-image"><i class="fas fa-redo refresh-captcha"></i>
			    <br>
			    <input type="text" id="captcha" name="captcha_challenge" pattern="[A-Z]{6}">
			    <button class="refresh-captcha">New Captcha</button>
			</div>

			<script type="text/javascript">
				var refreshButton = document.querySelector(".refresh-captcha");
				refreshButton.onclick = function() {
				  document.querySelector(".captcha-image").src = 'captcha.php?' + Date.now();
				}
			</script>
			<!-- -----captcha element ends---------- -->

			<input class="submit" type="submit" name="submit" value="Login" required><br>
			<a style="color: black; text-decoration: none;" class="submit" href="forgotpassword.php"> Forgot password?</a><br>
			<a style="color: black; text-decoration: none;" class="submit" href="signup.php"> SignUp</a><br>
		</form>
	</div>

<?php
	session_start();
	// Captch checking
	$correctCaptchaConditions = isset($_POST['captcha_challenge']) && $_POST['captcha_challenge'] == $_SESSION['captcha_text'];

	if(isset($_POST['submit']))
	{
		if($correctCaptchaConditions)
		{
			include('dbcon.php');
			$uname=strtolower($_POST['name']);
			$passwd=md5($_POST['password']);

			$qry="SELECT * FROM `users` WHERE `name` LIKE '$uname' AND `password` LIKE '$passwd'";
			$run=mysqli_query($con,$qry);
			$row=mysqli_num_rows($run);
			$data=mysqli_fetch_assoc($run);
			// right credential
			if($row>0)
			{
				$_SESSION['id']=$data['id'];
				?>
				<script>
					console.log("runned");
				</script>
				<?php
				header("Location: index.php");
			}
			// invalid credential
			else
			{
				?>
				<script>
					alert('Failed to Login');
					window.history.go(-1);
				</script>
				<?php
			}
		}
	}
		
}
?>
</body>
</html>