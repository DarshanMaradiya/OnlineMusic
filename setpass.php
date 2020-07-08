<?php
	include('dbcon.php');
	$id=$_GET['id'];
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

	<div class="wrapper">
	  <h1>CHANGE PASSWORD</h1>
<form action="setpass.php?id=<?php echo $id;?>" method="post">


<input class="pass" placeholder="New password" type="password" name="newpass" required>
<div>
      <p class="pass-help">Please enter new password.</p>
</div>
<input class="pass" placeholder="Re-enter new password" type="password" name="renewpass" required>
<div>
      <p class="pass-help">Please re-enter your password.</p>
</div>
<input class="submit" type="submit" name="submit" value="Reset" required><

</form>
</div>
</body>


</html>

<?php
if(isset($_POST['submit']))
{
	$newpass=$_POST['newpass'];
	$renewpass=$_POST['renewpass'];
	if(!strcmp($newpass,$renewpass))
	{
		$sql="UPDATE `users` SET `password`='$newpass' WHERE `id`='$id'";
		$run=mysqli_query($con,$sql);
		if($run)
		{
			?>
			<script>
				alert('Password is reset successfully!');
				window.open('index.php','_self');
			</script>
			<?php
		}
	}
	else
	{
		?>
			<script>
				window.alert('Password doesn\'t match!!');
			</script>

		<?php
	}
	

}



?>