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
		<title>SelfCare</title>		
	</head>
	
<!-https://colorlib.com/polygon/adminator/index.html ->
	
	<body>

		<?php include('menu.php'); ?>
		<div class="content">
			<h2>Dashboard</h2>
			<?php
				$userDataQuery = "SELECT display_name FROM szeg_users WHERE user_login = '".$_SESSION['username']."'";
				$userDataResult = mysqli_query($connection, $userDataQuery);
				$userData = mysqli_fetch_assoc($userDataResult);
				
			?>
				<h3> Üdvözlöm kedves <?php echo $userData['display_name'] ?> !</h3>
			<?php	
				$newsCountQuery = "SELECT count(*) AS total FROM szeg_news";
				$newsCountResult = mysqli_query($connection, $newsCountQuery);
				$newsCount = mysqli_fetch_assoc($newsCountResult);
				
				$mediaCountQuery = "SELECT count(*) AS total FROM szeg_media";
				$mediaCountResult = mysqli_query($connection, $mediaCountQuery);
				$mediaCount = mysqli_fetch_assoc($mediaCountResult);
				
				$dokumentCountQuery = "SELECT count(*) AS total FROM szeg_documents";
				$dokumentCountResult = mysqli_query($connection, $dokumentCountQuery);
				$dokumentCount = mysqli_fetch_assoc($dokumentCountResult);
					
				$year = date("Y");
				$month = date("m");
				$day = date("d");
				
				$eventCountQuery = "SELECT  count(*) AS total  FROM szeg_events_calendar where year >= '".$year."' and month >= '".$month."' and day >= '".$day."'";
				$eventCountResult = mysqli_query($connection, $eventCountQuery);
				$eventCount = mysqli_fetch_assoc($eventCountResult);
				
				$userCountQuery = "SELECT count(*) AS total FROM szeg_users where user_login != 'garibor'";
				$userCountResult = mysqli_query($connection, $userCountQuery);
				$userCount = mysqli_fetch_assoc($userCountResult);
					
			?>
			<div class="box" style="background-color: #03a9f4;">
				<div class="title">Hírek</div>
				<div class="text"><?php echo($newsCount['total']) ?> db</div>
			</div>
			
			<div class="box" style="background-color: #ff9800;">
				<div class="title">Média</div>
				<div class="text"><?php echo($mediaCount['total']) ?> db</div>
			</div>
			
			<div class="box" style="background-color: #9c27b0;">
				<div class="title">Dokumentum</div>
				<div class="text"><?php echo($dokumentCount['total']) ?> db</div>
			</div>
			
			<div class="box" style="background-color: #e91e63;">
				<div class="title">Esemény</div>
				<div class="text"><?php echo($eventCount['total']) ?> db</div>
			</div>
			
			<div class="box" style="background-color: #f44336;">
				<div class="title">Felhasználó</div>
				<div class="text"><?php echo($userCount['total']) ?> db</div>
			</div>
			
		</div>
	</body>
</html>