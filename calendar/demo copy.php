<?php 	
	require_once('mysql-connect.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Hello</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="css/demo.css"/>
    <link rel="stylesheet" href="css/theme2.css"/>
  </head>
  <body>
    <div id="caleandar">

    </div>

    <script type="text/javascript" src="js/caleandar.js"></script>
	<script type="text/javascript">
		<?php
		
			
			$eventQuery = "SELECT title, year, month, day FROM events_calendar order by year ,month, day";
			$eventResult = mysqli_query($connection, $eventQuery);
			?>
			var events = [	
			<?php
				while($row = mysqli_fetch_assoc($eventResult)) {
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
    
       
  </body>
</html>
