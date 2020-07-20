<!DOCTYPE html>
<html>
<head>
	<title>Dance Songs</title>
	<link rel="stylesheet" href="../assets/css/sidebar.css" />
	<link rel="stylesheet" href="../assets/css/styles.css" />
	<!-- <style type="text/css">
		body{
  			background:url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/dark_wall.png);
		}
		a{
			text-decoration: none;
			color: white;

		}
		a:hover{
			text-decoration: none;
			color: black;
			font-weight: bold;
		}
		div{
			font-family: Arial;
			border: 5px;
			border-color: white;
		}
		table, td{
			border: 1 px;
			border-style: solid;
			border-collapse: collapse;
			padding: 20px;
			width: 100%;
		}
		td{
			border: 1 px;
			border-style: solid;
			border-collapse: collapse;
			padding: 20px;
			width: 100%;
		}
		tr{
			background-color: black; 
		}
		tr:hover{
			letter-spacing: 1px;
			transition: 0.5s;
			background-color: white;
		}
		h2{
			text-align: center;
			color: white;
			font-family: Roboto;
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
	<?php require('../sidebar.php');
	session_start();
	if(isset($_SESSION['id']))
		category_loggedin($_SESSION['id']);
	else
		category_loggedout();
	?>
	<main class="main">
		<h2>Dance Songs</h2>
		<audio src="" controls id="audioPlayer" >
	        	Sorry, your browser doesn't support html5!
    		</audio>
		<ul id="playlist">
			<?php include("../dbcon.php"); 
				$foldername = "DA";
				$sql = "SELECT * FROM `songinfo` WHERE `scode` LIKE '$foldername%'";
				$run = mysqli_query($con, $sql);
				while($row = mysqli_fetch_array($run)){
					?>
					<li>
						<?php
						$songname = $row['sname'];
	                    $songname = str_replace(" ", "%20", $songname);
	                    $songname = "../music/".$foldername."/".$songname.".mp3";
	                    ?>
						<a href="<?php echo $songname ?>"><div><?php echo $row['sname'];?></div></a>
					</li>
					<a href="../music/songinfo.php?scode=<?php echo $row['scode'];?>&site=dance.php">More info</a>
					<?php
				}
			?>
		</ul>
		<a href="#" onclick="playlist.prevTrack();">Prev Track</a>
    	<a href="#" onclick="playlist.nextTrack();">Next Track</a>
    	<a href="#" onclick="playlist.toggleShuffle();">Toggle Shuffle</a>
    </main>
	<script src="https://code.jquery.com/jquery-2.2.0.js"></script>
	<script src="../audioPlayer.js"></script>
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

