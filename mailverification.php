<?php
use Encryption\Encryption;

require('SupportClasses/Encryption.php');

$encrypted_id = $_GET['id'];
// $id = 587;
// $encrypted_id = Encryption::encrypt_id($id);

// $encrypted_id = $_GET['id'];
$decrypted_id = Encryption::decrypt_id($encrypted_id);


// echo "encrypted_id : ".$encrypted_id;
// echo "decrypted_id : ".$decrypted_id;

include('dbcon.php');
$sql = "UPDATE `users` SET `verified` = b'1' WHERE `id` = '$decrypted_id'";
$runSql = mysqli_query($con, $sql);

if($runSql)
{
	echo "Great!Your e-mail is verified,now.";
	echo "\nGo to <a href=\"index.php\">HomePage</a>";
}
else
{
	echo "Something went wrong!!";
}

?>