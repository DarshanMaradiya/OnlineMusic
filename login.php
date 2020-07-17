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
			<input class="submit" type="submit" name="submit" value="Login" required><br>
			<a style="color: black; text-decoration: none;" class="submit" href="forgotpassword.php"> Forgot password?</a><br>
			<a style="color: black; text-decoration: none;" class="submit" href="signup.php"> SignUp</a><br>
		</form>
	</div>

<?php
	session_start();
	if(isset($_POST['submit']))
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
?>
</body>
</html>