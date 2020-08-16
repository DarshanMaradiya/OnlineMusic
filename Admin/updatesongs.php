<!DOCTYPE html>
<html>
<head>
	<title>Update Songs</title>
</head>
<body>

<?php

include('../functions.php');

delete_garbage_songs_from_db();
add_new_songs_to_db();

?>


</body>
</html>