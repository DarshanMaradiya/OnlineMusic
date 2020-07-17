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
<input onblur="validateEmail()" id="mail" class="email" placeholder="Email" type="email" name="email" required>

<div>
      <p class="email-help">Please enter your current email address.</p>
</div>
<input class="pass" placeholder="Password" type="password" name="password" required>
<div>
      <p class="pass-help">Please enter your password.</p>
</div>
<input class="pass"  onblur="matchPassword();" placeholder="Confirm password" type="password" name="confirmpass" required>

<div>
      <p class="pass-help">Please confirm your password.</p>
</div>
<input class="submit" type="submit" name="submit" value="Sign Up" required><br>

</form>
</div>
<script type="text/javascript">
	function validateEmail(){
		var emailField = document.getElementById("mail");
		emailField.value = emailField.value.trim();

        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert("Enter valid email");
        }
	}
	
	function matchPassword()
	{
		console.log("runned");
  		var pass = document.getElementsByClassName('pass');

        // If Not same return False.     
        if (pass[0].value != pass[1].value) {
            alert ("Passwords did not match!!\nConfirm again.");
            pass[1].value = "";
        } 
	}
</script>
</body>
</html>

<?php

if(isset($_POST['submit']))
{
	include('dbcon.php');
	$qry = "SELECT `id` FROM `users`";
	$run = mysqli_query($con, $qry);
	$arr = array();
	while($row = mysqli_fetch_array($run)){
		array_push($arr, $row[0]);
	}
	sort($arr);
	$i=1;
	for($i=1; $i<=count($arr); $i++){
		if($arr[$i-1]!=$i){
			break;
		}
	}
	$uname=strtolower($_POST['name']);
	$email=$_POST['email'];
	$passwd=md5($_POST['password']);

	$allCorrect = true;

	$qry = "SELECT * FROM `users` WHERE `name` = '$uname'";
	$run = mysqli_query($con, $qry);
	$row = mysqli_num_rows($run);

	if($row > 0)
	{
		$allCorrect = false;
		?>
			<script type="text/javascript">
				alert('Username already Exists!! try different one!');
				window.history.go(-1);
			</script>
		<?php
	} 

	$qry = "SELECT * FROM `users` WHERE `email` = '$email'";
	$run = mysqli_query($con, $qry);
	$row = mysqli_num_rows($run);

	if($row > 0)
	{
		$allCorrect = false;
		?>
			<script type="text/javascript">
				alert('Entered email-id is already registered!!');
				window.history.go(-1);
			</script>
		<?php
	}

	if($allCorrect)
	{
		$qry = "INSERT INTO `users`(`id`, `name`, `password`, `email`) VALUES ('$i', '$uname', '$passwd', '$email')";
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
			</script>
			<?php
			}
			else{
				?>
				<script>
				alert('Error sending mail');
				</script>
				<?php
			}
			?>
				<script type="text/javascript">
					window.history.go(-2);
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
}
?>
