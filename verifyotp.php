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
session_start();
$otp = $_SESSION['otp'];
if(isset($_POST['submit'])){
	$entered = $_POST['otptext'];
	if(!strcmp($otp, $entered)){
		$uid = $_SESSION['uid'];
		session_unset();
		session_start();
		$_SESSION['uid'] = $uid;
		header("Location: setpass.php");
	}
	else{
		?>
		<script type="text/javascript">alert("wrong");</script>
		<?php
	}
}
?>
	<form action="" method="post">
		<input type="text" name="otptext" id="otptext">
		<input type="submit" name="submit" value="verify">
	</form>
</body>
</html>
