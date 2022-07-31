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
			
			<h2 class="page-title">Adatlapom</h2>

			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<?php					
					$userDataQuery = "SELECT id, display_name, user_email FROM szeg_users WHERE user_login = '".$_SESSION['username']."'";
					$userDataResult = mysqli_query($connection, $userDataQuery);
					$userData = mysqli_fetch_assoc($userDataResult);
				?>
	
					<div class="login-data">
						<h4 style="margin-top: 20px;">Bejelentkezési adatok</h4>	
						<input type="hidden" name="id" value="<?php echo($userData['id']); ?>" >
									
						<label class="col-form-label" for="inputDefault">Jelszó</label>
						<input type="password" class="form-control" id="userPass1" name="password">
			
						<label class="col-form-label" for="inputDefault">Jelszó megerősítés</label>
						<input type="password" class="form-control" id="userPass2" name="passwordConfirm">
						
					</div>
					
					<div class="personal-data">
						<h4>Személyes adatok</h4>
						<label class="col-form-label" for="inputDefault">E-mail cím</label>
						
						<input type="text" class="form-control" id="projectName" name="email" value="<?php echo $userData['user_email'] ?>">
					</div>
	
				<button type="submit" class="btn btn-outline-success save-user">Mentés</button>
			</form>
		</div>
		
		<?php			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$id = $_POST['id'];
				$user_pass = $_POST['password'];
				$user_email = $_POST['email'];	
				
				if(strlen($_POST['password']) != 0 && strlen($_POST['passwordConfirm']) != 0){
					if($_POST['password'] == $_POST['passwordConfirm']){
						$insertUser = "UPDATE szeg_users SET user_pass = '".md5($user_pass)."', user_email = '".$user_email."' WHERE ID = '".$id."'";	
					}else{
						?>
						<div id="alert" class="alert alert-dismissible alert-danger">
							<button id="alertCloseButton" type="button" class="close" data-dismiss="alert" onclick="alertClose()">&times;</button>
							<strong>Hiba:</strong> A két jelszó nem egyezik meg!
						</div>
					<?php
					}
				}else{
					$insertUser = "UPDATE users SET user_email = '".$user_email."' WHERE ID = '".$id."'";
	
				}
				

				if ($connection->query($insertUser) === TRUE) {
				?>				
					<script>	
						location.href='my-profil.php';
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
		?>
	</body>
</html>