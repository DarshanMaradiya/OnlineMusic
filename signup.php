<!DOCTYPE HTML>
<?php
$emailError = "";
?>
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
<input onchange="validateEmail()" id="mail" class="email" placeholder="Email" type="email" name="email" required>
<?php echo $emailError;?>
<script type="text/javascript">
	function validateEmail(){
		var emailField = document.getElementById("mail");
		emailField.value = emailField.value.trim();

        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            <?php $emailError="Enter valid email";?>
        }
	}
</script>
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
		require('functions.php');
		$sql = "SELECT * FROM `users` WHERE `email` = '$email'";
		$runSql = mysqli_query($con, $sql);
		$data = mysqli_fetch_assoc($runSql);
		$success  = verifyMail($data['id'], $data['email'], $data['name']);
		if($success)
		{
		?>
		<script>
			alert('Record is Saved Successfully!\nWe have send a verification link to your Email.\nPlease verify your email address to avail more features!');
			window.open('index.php','_self');
		</script>
		<?php
		}
		else{
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
			alert('Failed to save record');
		</script>
		<?php
	}

}
?>
