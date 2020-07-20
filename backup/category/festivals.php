<html>
<head>
	<title>Festivals Songs</title>
</head>
<class>
<h2 align="left" style="margin-left:50px;">Festivals Songs</h2>
</class>
<class>
<a href="../music/songinfo.php?scode=FV01&site=Festivals.php">Chai Ghata</a>


</class>

<table>
		<?php include("../dbcon.php"); 
			$sql = "SELECT * FROM `songinfo` WHERE `scode` LIKE 'FS%'";
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
