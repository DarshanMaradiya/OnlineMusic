<!DOCTYPE html>
<html>
<head>
	<title>Reset password</title>
	<?php
	use Encryption\Encryption;

	require('SupportClasses/Encryption.php');
	
	date_default_timezone_set("Asia/Kolkata");
	$encrypted_id = $_GET['id'];
	$senttime = substr($encrypted_id, 0, 14);
	$sentdate = substr($senttime, 0, 8);
   	$senthour = substr($senttime, 8, 2);
   	$sentminute = substr($senttime, 10, 2);
   	$sentsecond = substr($senttime, 12, 2);
   	$isExpire = false;
	
	$currdate = substr(date("d.m.Y"), 0, 2).substr(date("d.m.Y"), 3, 2).substr(date("d.m.Y"), 6, 4);
	$currtime = substr(date("H:i:sa"), 0, 2).substr(date("H:i:sa"), 3, 2).substr(date("H:i:sa"), 6, 2);
    $currhour = substr($currtime, 0, 2);
    $currminute = substr($currtime, 2, 2);
    $currsecond = substr($currtime, 4, 2);
    
	if($sentdate == $currdate){
      	if($sentminute<="50" && $senthour==$currhour){
	      	if($currminute-$sentminute<10);
	        else 
	        	$isExpire = true;
      	}
      	elseif($sentminute>50){
      		if($currminute>=$sentminute && $currminute<=59 && $senthour==$currhour);
      		elseif($currminute<$sentminute%10 && $currhour==$senthour+1);
      		else
      			$isExpire = true;
		}
	    else
	    	$isExpire = true;
	}
    else 
    	$isExpire = true;
	?>
</head>
<body>
	<?php
	if($isExpire){
		?>
		<script type="text/javascript">
			alert("Link is expired");
			window.close();
		</script>
		<?php
	}
	else {
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
			$encrypted_id = substr($encrypted_id, 14, strlen($encrypted_id));
			$decrypted_id = Encryption::decrypt_id($encrypted_id);
			include('dbcon.php');
			$passwd=md5($_POST['password']);
			$qry = "UPDATE `users` SET `password`='$passwd' WHERE `id`='$decrypted_id'";
			$run = mysqli_query($con, $qry);
			?>
			<script type="text/javascript">alert("Password reset successfully.");</script>
			<?php
			header("location: index.php");
		}
	}
	?>
</body>
</html>