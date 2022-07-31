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
		<link rel="stylesheet" href="src/css/user-style.css">
		<link rel="stylesheet" href="src/img/icon/w/css/light.css">
		<script src="src/img/icon/w/js/light.js"></script>
		
		<title>SelfCare</title>		
	</head>
	
	<body>
		
		<?php include('menu.php'); ?>
		<div class="content">
			<h2 class="page-title">Új felhasználó</h2>

			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">		
				<div class="login-data">
					<h4 style="margin-top: 20px;">Bejelentkezési adatok</h4>				
					<label class="col-form-label" for="inputDefault">Felhasználónév</label>
					<input type="text" class="form-control" id="projectName" name="username">
					
					<label class="col-form-label" for="inputDefault">Jelszó</label>
					<input type="text" class="form-control" id="projectName" name="password">
		
					<label class="col-form-label" for="inputDefault">Jelszó megerősítés</label>
					<input type="text" class="form-control" id="projectName" name="passwordConfirm">
					
									
					<label class="col-form-label" for="inputDefault">Statusz</label>
					<div class="form-group">
						<select class="custom-select" name="status">
					    	<option selected="" value="0">Inaktív</option>
							<option value="1">Aktív</option>
					    </select>
					</div>
				</div>
				
				<div class="personal-data">
					<h4>Személyes adatok</h4>
					<label class="col-form-label" for="inputDefault">Vezetéknév</label>
					<input type="text" class="form-control" id="projectName" name="lastName">
					
					<label class="col-form-label" for="inputDefault">Keresztnév</label>
					<input type="text" class="form-control" id="projectName" name="firstName">
					
					<label class="col-form-label" for="inputDefault">E-mail cím</label>
					<input type="text" class="form-control" id="projectName" name="email">
				</div>
				
				<button type="button" class="btn btn-outline-danger cancel-user" onclick="location.href='users.php'">Mégse</button>			
				<button type="submit" class="btn btn-outline-success save-user">Mentés</button>
			</form>
		</div>
		
		<?php			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$user_login = $_POST['username'];
				$user_pass = $_POST['password'];
				$user_email = $_POST['email'];
				$user_status = $_POST['status'];
				$first_name = $_POST['firstName'];
				$last_name = $_POST['lastName'];
				$display_name = $last_name. " " . $first_name;
				
				if($_POST['password'] != $_POST['passwordConfirm']){
					?>
					<div id="alert" class="alert alert-dismissible alert-danger">
							<button id="alertCloseButton" type="button" class="close" data-dismiss="alert" onclick="alertClose()">&times;</button>
							<strong>Hiba:</strong> A jelszavak nem egyeznek meg!
						</div>
					<?php
				}else{
				$insertUser = "INSERT INTO szeg_users (user_login, user_pass, user_email, user_registration_time, user_status, display_name, first_name, last_name) 
				VALUES ('".$user_login."' ,'".$user_pass."' ,'".$user_email."' , CURRENT_TIMESTAMP ,'".$user_status."' ,'".$display_name."', '".$first_name."' ,'".$last_name."');";
	
				if ($connection->query($insertUser) === TRUE) {
				?>
					<script>	
						location.href='users.php';
					</script>
					
				<?php
				} else {
					?>
						<div id="alert" class="alert alert-dismissible alert-danger">
							<button id="alertCloseButton" type="button" class="close" data-dismiss="alert" onclick="alertClose()">&times;</button>
							<strong>Hiba:</strong> <?php echo "Error: " . $insertUser . "<br>" . $connection->error; ?>
						</div>
					<?php
				}
				}
			}
		?>
	</body>
</html>