<?php
// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Encryption\Encryption;



function verifyMail($id, $mailAddress, $name = "")
{
	require('PHPMailer/Exception.php');
	require('PHPMailer/PHPMailer.php');
	require('PHPMailer/SMTP.php');
	require('SupportClasses/Encryption.php');

	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
	    //Server settings
	    $mail->SMTPDebug = 0;                      // Enable verbose debug output
	    $mail->isSMTP();                                            // Send using SMTP
	    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    $mail->Username   = 'foreverlearners1234@gmail.com';                     // SMTP username
	    $mail->Password   = 'dontaskdonttell';                               // SMTP password
	    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

	    //Recipients
	    $mail->setFrom('foreverlearners1234@gmail.com', 'OnlineMusic');
	    $mail->addAddress($mailAddress, "simple");	// Add a recipient
	    // $mail->addCC();
	    // $mail->addBCC();     

	    // $mail->addReplyTo('info@example.com', 'Information');
	    // $mail->addCC('cc@example.com');
	    // $mail->addBCC('bcc@example.com');

	    // Attachments
	    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    $encrypted_id = Encryption::encrypt_id($id);
	    $msg = "Click <a href=\"localhost/onlinemusic/mailverification.php?id=".$encrypted_id."\" style=\"color:red;\">here</a> for verification!";
	    // Content
	    $mail->isHTML(true);      // Set email format to HTML
	    $mail->Subject = 'Verify Your OnlineMusic Account';
	    $mail->Body    = $msg;
	    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	    $mail->send();
	    // echo 'Message has been sent';
	    return true;
	} catch (Exception $e) {
	    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	    return false;
	}
}

function resetPasswordMail($id, $mailAddress, $name = "", $otp)
{
	require('PHPMailer/Exception.php');
	require('PHPMailer/PHPMailer.php');
	require('PHPMailer/SMTP.php');
	require('SupportClasses/Encryption.php');

	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
	    //Server settings
	    $mail->SMTPDebug = 0;                      // Enable verbose debug output
	    $mail->isSMTP();                                            // Send using SMTP
	    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    $mail->Username   = 'foreverlearners1234@gmail.com';                     // SMTP username
	    $mail->Password   = 'dontaskdonttell';                               // SMTP password

	    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

	    //Recipients
	    $mail->setFrom('foreverlearners1234@gmail.com', 'OnlineMusic');
	    $mail->addAddress($mailAddress, "simple");	// Add a recipient
	    // $mail->addCC();
	    // $mail->addBCC();     

	    // $mail->addReplyTo('info@example.com', 'Information');
	    // $mail->addCC('cc@example.com');
	    // $mail->addBCC('bcc@example.com');

	    // Attachments
	    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    $encrypted_id = Encryption::encrypt_id($id);
	    $msg = $otp."<br>Enter this number";
	    // Content
	    $mail->isHTML(true);      // Set email format to HTML
	    $mail->Subject = 'Reset Password of Your OnlineMusic Account';
	    $mail->Body    = $msg;
	    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	    $mail->send();
	    // echo 'Message has been sent';
	    return true;
	} catch (Exception $e) {
	    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	    return false;
	}
}

function changePass($id, $email)
{
	require('PHPMailer/Exception.php');
	require('PHPMailer/PHPMailer.php');
	require('PHPMailer/SMTP.php');
	require('SupportClasses/Encryption.php');

	// Instantiation and passing `true` enables exceptions
	$mail = new PHPMailer(true);

	try {
	    //Server settings
	    $mail->SMTPDebug = 0;                      // Enable verbose debug output
	    $mail->isSMTP();                                            // Send using SMTP
	    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    $mail->Username   = 'foreverlearners1234@gmail.com';                     // SMTP username
	    $mail->Password   = 'dontaskdonttell';                               // SMTP password

	    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

	    //Recipients
	    $mail->setFrom('foreverlearners1234@gmail.com', 'OnlineMusic');
	    $mail->addAddress($email, "simple");	// Add a recipient
	    // $mail->addCC();
	    // $mail->addBCC();     

	    // $mail->addReplyTo('info@example.com', 'Information');
	    // $mail->addCC('cc@example.com');
	    // $mail->addBCC('bcc@example.com');

	    // Attachments
	    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    $encrypted_id = Encryption::encrypt_id($id);
	    date_default_timezone_set("Asia/Kolkata");
		$date = substr(date("d.m.Y"), 0, 2).substr(date("d.m.Y"), 3, 2).substr(date("d.m.Y"), 6, 4);
		$time = $date.substr(date("H:i:sa"), 0, 2).substr(date("H:i:sa"), 3, 2).substr(date("H:i:sa"), 6, 2);
	    $encrypted_id = $time.$encrypted_id;
	    $msg = "Click <a href=\"localhost/OnlineMusic/resetpass.php?id=".$encrypted_id."\" style=\"color:red;\">here</a> to change password!<br>*Link valid for 10 minutes";
	    // Content
	    $mail->isHTML(true);      // Set email format to HTML
	    $mail->Subject = 'Change Password of Your OnlineMusic Account';
	    $mail->Body    = $msg;
	    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	    $mail->send();
	    // echo 'Message has been sent';
	    return true;
	} catch (Exception $e) {
	    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	    return false;
	}
}

function get_song_file_names($scode)
{
	$files = scandir("../music/$scode");
	array_splice($files, 0, 2);
	sort($files);
	for($i=0; $i<count($files); $i++) $files[$i] = substr($files[$i],0,-4);
	return $files;
}

function get_db_song_names($scode)
{
	include('../dbcon.php');

	$scode = $scode.'__';
	$dbsongs = array();
	$qry = "SELECT sname FROM songinfo WHERE scode LIKE '$scode'";
	$run = mysqli_query($con, $qry);
	if($run)
	{
		while($data = mysqli_fetch_assoc($run)) 
			{array_push($dbsongs,$data['sname']);}
	}
	else
	echo "Something went wrong";
	sort($dbsongs);
	return $dbsongs;
}

function next_index($table, $id)
{
	include('../dbcon.php');

	$qry = "SELECT $id FROM $table";
	$run = mysqli_query($con,$qry);
	$indices = array();

	if($run)
	{
		while($data = mysqli_fetch_assoc($run)) 
			{array_push($indices,$data[$id]);}
	}
	else
	echo "Something went wrong";
	
	sort($indices);
	$ind = -1;
	for($i=0; $i<count($indices); $i++) if($i != $indices[$i]) {$ind = $i;break;}

	if($ind == -1) $ind = count($indices);

	return $ind;
}

function next_scode($scode)
{
	include('../dbcon.php');
	$sc = $scode;
	$scode = $scode.'__';
	$qry = "SELECT scode FROM songinfo where scode LIKE '$scode'";
	$run = mysqli_query($con,$qry);
	$scodes = array();

	if($run)
	{
		while($data = mysqli_fetch_assoc($run)) 
			{array_push($scodes,intval(substr($data['scode'], 2)));}
	}
	else
	echo "Something went wrong";

	sort($scodes);
	$ind = -1;
	for($i=0; $i<count($scodes); $i++) if($i+1 != $scodes[$i]) {$ind = $i+1;break;}

	if($ind == -1) $ind = count($scodes)+1;
	
	if($ind < 10) $ind = "0".$ind;

	return $sc.$ind;
}

function add_new_songs_to_db()
{
	include('dbcon.php');
	include('getID3/getid3/getid3.php');
	$getID3 = new getID3;

	$categories = array("BH", "DA", "ED", "EN", "PT", "RM");

	for($j=0; $j<count($categories); $j++)
	{
		$category = $categories[$j];

		$files = get_song_file_names($category);
		$dbsongs = get_db_song_names($category);

		$garbage_songs = array_values(array_diff($dbsongs, $files));
		$new_songs = array_values(array_diff($files, $dbsongs));

		for($i=0; $i<count($new_songs); $i++)
		{
			$sname = $new_songs[$i];
			$id = next_index('songinfo', 'sid');
			$scode = next_scode($category);
			$song = $getID3->analyze("../music/$category/$sname.mp3");

			$artist = "NA";
			if(isset($song['tags']['id3v2']['artist'][0]))
				$artist = $song['tags']['id3v2']['artist'][0];

			$duration = gmdate("H:i:s", $song['playtime_seconds']);
			
			$year = 0;
			if(isset($song['tags']['id3v2']['year'][0]))
				$year = $song['tags']['id3v2']['year'][0];

			$qry = "INSERT INTO songinfo (`sid`, `scode`, `sname`, `artist`, `duration`, `year`) VALUES ('$id', '$scode', '$sname', '$artist', '$duration', '$year')";

			$run = mysqli_query($con, $qry);

			// if($run) echo "Updated";
			// else echo "Something went wrong";
		}
	}	
	echo "<br>New songs are added";
}

function delete_garbage_songs_from_db()
{
	include('dbcon.php');

	$categories = array("BH", "DA", "ED", "EN", "PT", "RM");
	$garbage_list = [];



	for($j=0; $j<count($categories); $j++)
	{
		$category = $categories[$j];

		$files = get_song_file_names($category);
		$dbsongs = get_db_song_names($category);

		$garbage_songs = array_values(array_diff($dbsongs, $files));
		$new_songs = array_values(array_diff($files, $dbsongs));

		for($i=0; $i<count($garbage_songs); $i++)
		{
			$sname = $garbage_songs[$i];
			$qry = "SELECT scode FROM `songinfo` WHERE `sname` = '$sname'";
			$run = mysqli_query($con, $qry);
			$data = mysqli_fetch_assoc($run);

			$scode = $data['scode'];
			array_push($garbage_list, $scode."_");
			$qry = "DELETE FROM songinfo WHERE `scode` = '$scode'";
			$run = mysqli_query($con, $qry);

			// if($run) echo "Garbage Removed";
			// else echo "Something went wrong";
		}
	}

	update_playlists_favourites($garbage_list);

	echo "garbage songs are deleted";
}

function update_playlists_favourites($garbage_list)
{
	include('dbcon.php');

	// Update playlists

	$qry = "SELECT pid, list FROM playlists";
	$run = mysqli_query($con, $qry);

	if($run)
	{
		while($row = mysqli_fetch_assoc($run))
		{
			$list = $row['list'];
			$pid = $row['pid'];
			
			$list = str_replace($garbage_list, "", $list);
			
			$sql="UPDATE `playlists` SET `list`='$list' WHERE `pid`='$pid'";
			$run2=mysqli_query($con,$sql);
			// if($run2) echo "pass1<br>";
			// else echo "fail1<br>";
		}
	}

	// Update favourites

	$qry = "SELECT uid, favlist FROM favourites";
	$run = mysqli_query($con, $qry);

	if($run)
	{
		while($row = mysqli_fetch_assoc($run))
		{
			$favlist = $row['favlist'];
			$uid = $row['uid'];
			
			$favlist = str_replace($garbage_list, "", $favlist);
			
			$sql="UPDATE `favourites` SET `favlist`='$favlist' WHERE `uid`='$uid'";
			$run2=mysqli_query($con,$sql);
			// if($run2) echo "pass2<br>";
			// else echo "fail2<br>";
		}
	}

}





?>
