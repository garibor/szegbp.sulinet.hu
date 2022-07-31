<?php
	echo("Valami");
	require_once('mysql-connect.php');
	
	$eventQuery = "SELECT title, year, month, day FROM events_calendar order by year, month, day";
	$eventResult = mysqli_query($connection, $eventQuery);
	
	while($row = mysqli_fetch_assoc($eventResult)) {
    echo $row["year"]. "," .$row["month"].",".$row["day"];
  }
?>