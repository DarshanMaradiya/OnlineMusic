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




?>
