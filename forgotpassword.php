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

<input class="pass" placeholder="Password you remember" type="password" name="lastpass" required>
<div>
      <p class="pass-help">Please enter the password you remember.</p>
</div>
<input class="submit" type="submit" name="submit" value="reset" required>

</form>
</div>
</body>


</html>

<?php

	if(isset($_POST['submit']))
	{
		include('dbcon.php');
		$email=$_POST['email'];
		$lastpass=$_POST['lastpass'];
		$sql="SELECT * FROM `users` WHERE `email`='$email'";
		$run=mysqli_query($con,$sql);
		$row=mysqli_num_rows($run);
		if($row==1)
		{
			for($i=0;$i<strlen($lastpass)-3;$i++)
			{
				$part=substr($lastpass,$i,4);
				$sql="SELECT * FROM `users` WHERE `email`='$email' AND `password` LIKE '%$part%'";
				$run=mysqli_query($con,$sql);
				$row=mysqli_num_rows($run);
				if($row==1) break;
			}

			if($row==1)
			{
				$data=mysqli_fetch_assoc($run);
				?>
				<script>
					window.open('setpass.php?id=<?php echo $data['id'];?>','_self');
				</script>
				<?php
			}
			else
			{
				?>
				<script>
					alert("We can't recognize you!\nTry Again!");

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