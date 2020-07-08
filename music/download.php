<?php

	$site = $_GET['site'];
	{
		?>
		<script>
			alert('You need to login to your acoount first!');
			window.open('../login.php?site=music/<?php echo $site; ?>','_self');
		</script>
		<?php
	}

?>
