<!DOCTYPE HTML>
<html>
<head>
	<!-- <link rel="stylesheet" type="text/css" href="../css.css">
	<style type="text/css">
		body{
  			background:url(http://subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/dark_wall.png);
		}
		a:link, a:visited {
		  background-color: black;
		  color: white;
		  padding: 10px 1px;
		  width: 100%;
		  text-decoration: none;
		  display: inline-block;
		  transition: 0.4s;
		}
		a:hover{
		  background-color: white;
		  color: black;
		  padding: 10px 1px;
		  width: 100%;
		  text-decoration: none;
		  display: inline-block;
		}
	</style> -->
</head>
<?php

	include('dbcon.php');
	$stext = $_POST['stext'];

?>
<body>
<h1>Search Results for "<?php echo $stext;?>"</h1>
<button class="allBtn" onclick="searchAll();">Search "<?php echo $stext;?>" in All</button>
<button class="artistBtn" onclick="searchArtists();">Search "<?php echo $stext;?>" in artist</button>
<button class="songBtn" onclick="searchSongs();">Search "<?php echo $stext;?>" in songs</button>
<br>
<br>
<div class="searchResults">
<?php

	$sql = "SELECT * FROM `songinfo` WHERE `sname` LIKE '%$stext%' or `artist` LIKE '%$stext%'";
	$run = mysqli_query($con,$sql);
	$row = mysqli_num_rows($run);
	if($row)
	{
		while($data=mysqli_fetch_assoc($run))
			{

				?>
				<div class="result" style = "margin-bottom: 15px; ">
				<a href="music/songinfo.php?scode=<?php echo $data['scode'];?>"><?php echo $data['sname'];?></a><?php echo "  by ".$data['artist'];?>
				</div>
				<?php
			}
	}

	if($row == 0)
	{
		?>
		<a href="index.php">Back to Home</a>
		<h3><center>No Result Found!</center></h3>
		<?php
	}
?>
</div>
<script type="text/javascript">
	var results = document.getElementsByClassName("result");
	function searchArtists()
	{
		var key = "<?php echo $stext;?>";
		for(var result of results){
			if(result.textContent.toLowerCase().split("by")[1].includes(key))
			{
				result.style.display = "block";
			}
			else
			{
				result.style.display = "none";
			}
		}
		document.getElementsByTagName("h1")[0].textContent = "Search Results for \"<?php echo $stext;?>\" in artists";
		document.getElementsByClassName("artistBtn")[0].style.display = "none";
		document.getElementsByClassName("songBtn")[0].style.display = "inline-block";

	}
	function searchSongs()
	{
		var key = "<?php echo $stext;?>";
		for(var result of results){
			if(result.textContent.toLowerCase().split("by")[0].includes(key))
			{
				result.style.display = "block";
			}
			else
			{
				result.style.display = "none";
			}
		}
		document.getElementsByTagName("h1")[0].textContent = "Search Results for \"<?php echo $stext;?>\" in songs";
		document.getElementsByClassName("songBtn")[0].style.display = "none";
		document.getElementsByClassName("artistBtn")[0].style.display = "inline-block";
	}
	function searchAll()
	{
		var key = "<?php echo $stext;?>";
		for(var result of results){
			result.style.display = "block";
		}
		document.getElementsByTagName("h1")[0].textContent = "Search Results for \"<?php echo $stext;?>\"";
		document.getElementsByClassName("songBtn")[0].style.display = "inline-block";
		document.getElementsByClassName("artistBtn")[0].style.display = "inline-block";
	}
</script>
</body>
</html>