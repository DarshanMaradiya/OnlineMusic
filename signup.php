<!DOCTYPE HTML>
<html>
<head>
	<title>Signup</title>
	<!-- <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="css.css"> -->

</head>
<body>

<div class="wrapper">
	  <h1>SIGN UP</h1>
<form method="post" action="signup.php">

<input class="name" placeholder="Name" type="text" name="name" required>
<div>
	<p class="name-help">Please enter your first and last name.</p>
</div>
<input class="email" placeholder="Email" type="email" name="email" pattern=".+@gmail.com" required>
<div>
      <p class="email-help">Please enter your current email address.</p>
</div>
<input class="pass" placeholder="Password" type="password" name="password" required>
<div>
      <p class="pass-help">Please enter your password.</p>
</div>
<input class="submit" type="submit" name="submit" value="Sign Up" required><br>

</form>
</div>
</body>
</html>

<?php

if(isset($_POST['submit']))
{

	include('dbcon.php');
	$uname=$_POST['name'];
	$email=$_POST['email'];
	$passwd=md5($_POST['password']);

	$qry="INSERT INTO `users`(`name`,`email`,`password`) VALUES ('$uname','$email','$passwd')";
	$run=mysqli_query($con,$qry);

	if($run)
	{
		
		$msg = ""
		?>
		<script>
			alert('Record is Saved Successfully');
			window.open('index.php','_self');
		</script>
		<?php

	}
	else
	{
		?>
		<script>
			alert('Failed to save record');
		</script>
		<?php
	}

}
?>
