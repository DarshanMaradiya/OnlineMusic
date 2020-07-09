<html>
<head>
	<title>Gazal Songs</title>
</head>
<class>
<h2 align="left" style="margin-left:50px;">Gazal Songs</h2>
</class>
<class>
<a href="../music/songinfo.php?scode=GZ01&site=Gazal.php">Chai Ghata</a>


</class>

<table>
		<?php include("../dbcon.php"); 
			$sql = "SELECT * FROM `songinfo` WHERE `scode` LIKE 'GZ%'";
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
