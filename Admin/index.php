<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>

<h1 style="text-align: center;">
	Admin Login
</h1>

<form action="" method="post" style="left:40%;top:40%;position: absolute;">
Password : <input type="text" name="password" placeholder="Enter password">
<input type="submit" name="submit" value="submit">
</form>

</body>
</html>


<?php

if(isset($_POST['submit']))
{
	include('../dbcon.php');

	$qry = "SELECT password From admin WHERE aid = 1";
	$run = mysqli_query($con, $qry);

	if($run)
	{
		$data = mysqli_fetch_assoc($run);

		if($data['password'] == md5($_POST['password'])) header('location: dashboard.php');
		else 
		{
			?>
			<script type="text/javascript">
				alert('wrong password');
			</script>
			<?php
		}
	}

}

?>