<?php

	if(isset($_SESSION['id']) == false)
	{
		?>
		<script>
			alert('You need to login to your acoount first!');
			window.open('../login.php','_self');
		</script>
		<?php
	}
	else
	{
		?>
		<script>windows.history.go(-1);</script>
		<?php
	}

?>
