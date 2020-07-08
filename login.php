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

if(isset($_GET['site'])) $site = $_GET['site'];
else $site = "index.php";

?>

<div class="wrapper">
	  <h1>LOGIN</h1>

<form method="post" action="login.php?site=<?php echo $site;?>">

<input class="name" placeholder="Name" type="text" name="name" required>
<div>
	<p class="name-help">Please enter your first and last name.</p>
</div>
<input class="pass" placeholder="Password" type="password" name="password" required>
<div>
      <p class="pass-help">Please enter your password.</p>
</div>
<input class="submit" type="submit" name="submit" value="Login" required><br>
<a style="color: white; text-decoration: none;" class="submit" href="forgotpassword.php"> Forgot password?</a><br>
</form>
</div>



</body>
</html>

<?php
	session_start();
if(isset($_POST['submit']))
{

	include('dbcon.php');
	$uname=$_POST['name'];
	$passwd=md5($_POST['password']);

	$qry="SELECT * FROM `users` WHERE `name` LIKE '$uname' AND `password` LIKE '$passwd'";
	$run=mysqli_query($con,$qry);
	$row=mysqli_num_rows($run);
	$data=mysqli_fetch_assoc($run);
	if($row>0)
	{
		$_SESSION['id']=$data['id'];
		?>
		<script>
			window.open('<?php echo $site;?>','_self');
		</script>
		<?php
			
	}
	else
	{
		?>
		<script>
			alert('Failed to Login');
		</script>
		<?php
	}

}




?>
