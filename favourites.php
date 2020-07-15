<?php
session_start();
include('dbcon.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>favourites</title>
	<style>
        #favourites{
            list-style: none;
        }
        #favourites li a{
            color:black;
            text-decoration: none;
        }
        #favourites .current-song a{
            color:blue;
        }
    </style>
</head>

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
	<h2>favourites</h2>
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
		<?php
}
else echo "Error";
?>
	<a href="#" onclick="favourites.prevTrack();">Prev Track</a>
    <a href="#" onclick="favourites.nextTrack();">Next Track</a>
    <a href="#" onclick="favourites.toggleShuffle();">Toggle Shuffle</a>
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