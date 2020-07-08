<html>

<?php
include("../dbcon.php");
$dlink=$_GET['dlink'];
?>

<head>
	<meta name="viewport" content="width=device-width" />
	<title><?php echo explode("/", $dlink)[1]; ?></title>
</head>

<body style="background-color: rgba(255,255,0,0.7); margin: 8px; display: block;">

<center><?php echo explode("/", $dlink)[1];?></center>

<audio style="margin: auto; position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; min-width: 465px; width: 50%;
height: 74px; max-height: 100%; " src="<?php echo $dlink ?>" autoplay="" controls=""></audio>	


</body>

</html>