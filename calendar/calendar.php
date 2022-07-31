 <?php 	
	require_once('mysql-connect.php'); 
?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <div id="caleandar">

    </div>

    <script type="text/javascript" src="calendar/js/caleandar.js"></script>
	<script type="text/javascript">
		<?php
		
			$eventQuery = "SELECT title, year, month, day FROM szeg_events_calendar order by year ,month, day";
			$eventResult = mysqli_query($connection, $eventQuery);
			?>
			var events = [	
			<?php
			while($row = mysqli_fetch_assoc($eventResult)) {
				$eventDateQuery = "SELECT title, year, month, day FROM events_calendar where year = " .$row["year"]. " AND month = " .$row["month"]. " AND day = " .$row["day"];
				$eventDateResult = mysqli_query($connection, $eventDateQuery);
				
		?>
			
			{'Date': new Date(<?php echo $row["year"]; ?>, <?php echo $row["month"]-1; ?>,<?php echo $row["day"]; ?>), 'Title':'<?php echo $row["title"]; ?>'},
		<?php
			}
			
		?>	
		];
		var settings = {};
		var element = document.getElementById('caleandar');
		caleandar(element, events, settings);

	</script>