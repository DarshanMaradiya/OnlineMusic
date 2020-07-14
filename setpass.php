<?php
use Encryption\Encryption;

require('SupportClasses/Encryption.php');

include('dbcon.php');
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Forgot Password</title>
	<!-- <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="css.css"> -->
</head>
<body>
<?php

if(isset($_GET['id']))
{
	$encrypted_id = $_GET['id'];
	$decrypted_id = Encryption::decrypt_id($encrypted_id);

	$sql = "SELECT * FROM `users` WHERE `id` = '$decrypted_id'";
	$runSql = mysqli_query($con, $sql);

	if($runSql)
	{
	
	?>
	<div class="wrapper">
	<h1>CHANGE PASSWORD</h1>
		<form action="setpass.php?id=<?php echo $encrypted_id;?>" method="post">
			<input class="pass" placeholder="New password" type="password" name="newpass" required>
			<div>
			      <p class="pass-help">Please enter new password.</p>
			</div>
			<input class="pass" onblur="matchPassword();" placeholder="Re-enter new password" type="password" name="renewpass" required>
			
			<div>
			      <p class="pass-help">Please re-enter your password.</p>
			</div>
			<input class="submit" type="submit" id="submit" name="submit" value="Reset" disabled="disabled" required>
		</form>
	</div>
	<script type="text/javascript">
		function matchPassword()
		{
			console.log("runned");
			var pass = document.getElementsByClassName("pass");
			if(pass[0].value == pass[1].value)
			{
				document.getElementById('submit').disabled = false;
			}
			else
			{
				document.getElementById('submit').disabled = true;
				alert("Passwords are not matching!!");
			}
		}
	</script>
	<?php

	}
	else
	{
		echo "Something went wrong!!";
	}
}

if(isset($_POST['submit']))
{
	
	$encrypted_id = $_GET['id'];
	$id = Encryption::decrypt_id($encrypted_id);
	
	$newpass=md5($_POST['newpass']);
	$renewpass=$_POST['renewpass'];
	
	$sql="UPDATE `users` SET `password`='$newpass' WHERE `id`='$id'";
	$run=mysqli_query($con,$sql);
	if($run)
	{
		?>
		<script>
			alert('Password is reset successfully!');
			window.close();
		</script>
		<?php
	}
}
?>

</body>
</html>
