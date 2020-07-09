<html>
<head>
	<title>English Songs</title>
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
</head>
<class>
<h2>English Songs</h2>
</class>
<table>
		<?php include("../dbcon.php"); 
			$sql = "SELECT * FROM `songinfo` WHERE `scode` LIKE 'EN%'";
			$run = mysqli_query($con, $sql);
			while($row = mysqli_fetch_array($run)){
				?>
				<tr>
					<td>
						<a href="../music/songinfo.php?scode=<?php echo $row['scode'];?>&site=Romance.php"><div><?php echo $row['sname'];?></div></a>
					</td>
				</tr>
				<?php
			}
		?>
	</table>
</html>
