<!DOCTYPE html>
<html>
<head>
	<title>Update Songs</title>
</head>
<body>

<?php
include('../functions.php');

include('..\getID3\getid3\getid3.php');

$getID3 = new getID3;

$categories = array("BH", "DA", "ED", "EN", "PT", "RM");

for($j=0; $j<count($categories); $j++)
{
	$category = $categories[$j];
	echo "<br>--------------------------------------------".$category."--------------------------------------------";
	$files = get_song_file_names($category);

	for($i=0 ; $i<count($files); $i++)
	{
		$sname = $files[$i];
		$song = $getID3->analyze("../music/$category/$sname.mp3");

		try{
			if(!isset($song['tags']['id3v2']['artist'][0])) throw new Exception();
			$artist = $song['tags']['id3v2']['artist'][0];
		}
		catch(Exception $e)
		{			
			
			$artist = "NA";
		}

		try{
			if(!isset($song['tags']['id3v2']['year'][0])) throw new Exception();
			$year = $song['tags']['id3v2']['year'][0];
		}
		catch(Exception $e)
		{

			$year = 0000;
		}

		$duration = gmdate("H:i:s", $song['playtime_seconds']);

		echo "<br><br> Sname : ".$sname;
		echo "<br> artist : ".$artist;
		echo "<br> duration : ".$duration;
		echo "<br> year : ".$year;
		echo "<br>------------------------------------------------";
	}
}
?>


</body>
</html>