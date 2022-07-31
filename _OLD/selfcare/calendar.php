<?php
	session_start();
		require_once('mysql-connect.php'); 
	
	if(isset($_SESSION['username'])){

	}else{
		header("location:login.php");	
	}	
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<link rel="stylesheet" href="src/css/bootstrap.min.css">
		<link rel="stylesheet" href="src/css/main-style.css">
		<link rel="stylesheet" href="src/css/index-style.css">
		<link rel="stylesheet" href="src/img/icon/w/css/light.css">
		<script src="src/img/icon/w/js/light.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
	    
		<link rel="stylesheet" href="bootstrap-datepicker/css/bootstrap-datepicker.min.css">
		<script src="bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
		
		<link rel="stylesheet" href="calendar/css/demo.css"/>
		<link rel="stylesheet" href="calendar/css/theme3.css"/>		
		
		<title>SelfCare</title>		
	</head>
	
	<body>
		<?php include('menu.php'); ?>
		<div class="content">
			<h2>Naptár</h2>

			<?php include 'calendar/calendar.php'; ?>
			
			<div class="right-box" style="margin-left: 630px;">
				<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<label class="col-form-label" for="inputDefault">Esemény neve</label>
					<input type="text" name="event-title" class="form-control" style="width: 300px;">
		
					<label class="col-form-label" for="inputDefault">Dátum választás</label>
					<input type="text" name="event-date" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" style="width: 300px;">			
					
					<p style="margin-top: 30px;">
						<button type="submit" name="new-event" class="btn btn-outline-success save-user">Mentés</button>
					</p>
				</form>
			</div>
			
			<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new-event'])) {
					$title = $_POST['event-title'];
					$date = $_POST['event-date'];
					$year = substr($date, -10, 4);
					$month = substr($date, -5, 2);
					$day = substr($date, -2);
					
					$insertEvent = "INSERT INTO szeg_events_calendar (title, year, month, day) VALUES ('".$title."', '".$year."', '".$month."', '".$day."');";
				            
    				if ($connection->query($insertEvent) === TRUE) {
                		?>
						<div class="alert alert-dismissible alert-success">
							<strong>Sikeresen</strong> létre lett hoza az esemény.
						</div>
						<script>
							window.location.href='calendar.php';
						</script>
						<?php
		            }else{
    					?>
						<div class="alert alert-dismissible alert-danger">
						  <strong>Hiba!</strong> Esemény létrehozása során hiba lépett fel. <?php echo ($insertEvent."  ".$connection->error); ?>
						</div>
						<?php
							
							
		            } 
					
				}
			?>
			
		</div>
	</body>
</html>