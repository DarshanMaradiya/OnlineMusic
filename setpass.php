<!DOCTYPE html>
<html>
<head>
	<title>Forgot password</title>
</head>
<body>
	<?php
		if(isset($_SESSION['uid'])){
			header("Location: login.php");
		}
	?>
	<form action="" method="post">
		<input class="pass" placeholder="Password" type="password" name="password" required>
		<input class="pass"  onblur="matchPassword();" placeholder="Confirm password" type="password" name="confirmpass" required>
		<input type="submit" name="submit" value="Reset">
	</form>
	<script type="text/javascript">
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
	<?php
		if(isset($_POST['submit'])){
			session_start();
			$uid = $_SESSION['uid'];
			include('dbcon.php');
			$passwd=md5($_POST['password']);
			$qry = "UPDATE `users` SET `password`='$passwd' WHERE `id`='$uid'";
			$run = mysqli_query($con, $qry);
			session_unset();
			?>
			<script type="text/javascript">alert("Password reset successfully.");</script>
			<?php
			header("Location: login.php");
		}
	?>
</body>
</html>