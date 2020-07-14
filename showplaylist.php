<!DOCTYPE html>
<html>
<head>
<?php

include('dbcon.php');
session_start();
$uid=$_SESSION['id'];
$pid=$_GET['pid'];
$qry="SELECT * FROM `playlists` WHERE `pid`='$pid'";
$run=mysqli_query($con,$qry);
$row=mysqli_num_rows($run);
$data=mysqli_fetch_assoc($run);
$songs=explode("_", $data['list']);
?>
	<title>Playlist</title>
	<!-- 	<link rel="stylesheet" type="text/css" href="css.css">

	<style type="text/css">
		.manage{
			text-decoration: none;
			display: block;
			border-bottom: 2px white double;
		}
		ol {
		  background: black;
		  padding: 20px;
		}
		ol li {
		  background: white;
		  padding: 5px;
		  margin-left: 35px;
		  color: white;
		}
		a:link, a:visited {
		  background-color: black;
		  color: white;
		  padding: 10px 15px;
		  width: 100%;
		  text-decoration: none;
		  display: inline-block;
		  transition: 0.4s;
		}
		a:hover{
		  background-color: white;
		  color: black;
		  padding: 10px 15px;
		  width: 100%;
		  text-decoration: none;
		  display: inline-block;
		}
		h2{
			text-align: center;
			color: white;
			font-weight: bold;
		}
	</style> -->
	<style>
        #playlist{
            list-style: none;
        }
        #playlist li a{
            color:black;
            text-decoration: none;
        }
        #playlist .current-song a{
            color:blue;
        }
    </style>
</head>
<body>
<?php
if($row)
	{
		?><h2><?php echo $data['pname'];?></h2>
			<br><a class="manage" style="width: 20%;" href="editplaylist.php?pid=<?php echo $pid; ?>">Edit playlist</a>
			<br><br>
			<audio src="" controls id="audioPlayer" >
	        	Sorry, your browser doesn't support html5!
    		</audio>
    		<ul id="playlist">
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

?>
	<a href="#" onclick="playlist.prevTrack();">Prev Track</a>
    <a href="#" onclick="playlist.nextTrack();">Next Track</a>
    <a href="#" onclick="playlist.toggleShuffle();">Toggle Shuffle</a>
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
        var playlist = new AudioPlaylist();
        
    </script>
</body>
</html>