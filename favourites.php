<?php
session_start();
include('dbcon.php');
if(!isset($_SESSION['id']))
	header("location: index.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Favourites</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/		css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css\cssForFavourite.css">
</head>
<body>
	<?php require('sidebar.php');
	favourites($_SESSION['id']);?>
	<main class="main">
		<h2>Favourites</h2>
		<br><a class="manage" href="managefav.php">Edit playlist</a>
		<br>
		<?php
		$uid=$_SESSION['id'];
		$qry = "SELECT `favlist` FROM `favourites` WHERE `uid` = '$uid'";
		$run = mysqli_query($con, $qry);
		$row = mysqli_num_rows($run);
		$data = mysqli_fetch_assoc($run);
		$songs=explode("_", $data['favlist']);
		if($row)
		{
			?>
			<br>
				<audio src="" controls id="audioPlayer" >
			        	Sorry, your browser doesn't support html5!
		    	</audio>
		   		<ul id="favourites">
				<?php
					for ($i=0; $i < count($songs)-1; $i++) {
						$qry="SELECT * FROM `songinfo` WHERE `scode`='$songs[$i]'";
						$run=mysqli_query($con,$qry);
						$row=mysqli_fetch_assoc($run); ?>
			            <li>
			                <?php
			                $songname = $row['sname'];
			                $songname = str_replace(" ", "%20", $songname);
			                $foldername = substr($row['scode'], 0, 2);
			                $songname = "music/".$foldername."/".$songname.".mp3";
			                ?>
			                <a href="<?php echo $songname; ?>"><?php echo $row['sname'];?></a>
			            </li>
			            <?php
					}
					?>
				</ul>
					<a href="#" onclick="favourites.prevTrack();">Prev Track</a>
	    			<a href="#" onclick="favourites.nextTrack();">Next Track</a>
	    			<a href="#" onclick="favourites.toggleShuffle();">Toggle Shuffle</a>
				<?php
		}
		else echo "No favourites";
		?>
	</main>
    <script src="https://code.jquery.com/jquery-2.2.0.js"></script>
    <script src="audioPlayer.js"></script>
    <script>
    /*
    	Default constructor configuration:
        autoplay: false,
        shuffle: false,
        loop: false,
        playerId: "audioPlayer",
        playlistId: "playlist",
        currentClass: "current-song"
	*/
        // loads the audio player
        var config = {
            autoplay: true, 
            loop: true,
            shuffle: true
        };
        var favourites = new AudioPlaylist({playlistId : "favourites"});   
    </script>
</body>