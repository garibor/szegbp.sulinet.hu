<?php
	session_start();
	
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
		<link rel="stylesheet" href="src/css/permission-style.css">
		<link rel="stylesheet" href="src/img/icon/w/css/light.css">
		<script src="src/img/icon/w/js/light.js"></script>
		
		<title>SelfCare</title>		
	</head>
	
	<body>
		
		<?php include('menu.php'); ?>
		<div class="content">
			<h2>Jogosultságok</h2>
			
		</div>
	</body>
</html>