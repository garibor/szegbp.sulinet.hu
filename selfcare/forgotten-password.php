<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<link rel="stylesheet" href="src/css/bootstrap.min.css">
		<link rel="stylesheet" href="src/css/main-style.css">
		<link rel="stylesheet" href="src/css/login-style.css">
		
		<title>SelfCare - Bejelentkezés</title>		
	</head>
	
	<body>
		<div class="login-content">
			<div class="login-title"><h1>Self<strong>Care</strong></h1> <h4>Jelszó megváltoztatása</h4></div>
						
			
			<div class="login-form">
				
				<form name="login" method="POST" action="process.php" onsubmit="return validateForm()">
					<label>Felhasználónév:</label>
					<input type="text" class="form-control" placeholder="" id="input-username" name="username" />
					<div class="invalid-feedback" id="usernameFeedback">Adja meg a felhasználónevét!</div>
	
					<label>Új jelszó:</label>
					<input type="password" class="form-control" id="input-password" name="password_1" />
					
					<label style="margin-top: 10px;">Jelszó megerősítése:</label>
					<input type="password" class="form-control" id="input-password" name="password_2" />
					<div class="invalid-feedback" id="passwordFeedback">A két jelszó nem egyezik meg!</div>
					
					<button type="submit" class="btn btn-primary" name="password-change">Jelszó csere</button>
				</form>
				
				<button type="button" class="btn btn-link" onclick="location.href='login.php';">Mégse</button>
			</div>
			
			<?php
				if(isset($_GET['empty'])){
			?>		
					<div class="alert alert-dismissible alert-warning">
						<h4 class="alert-heading">Hiba!</h4>
						<p class="mb-0">Kérem adja meg az adatokat!</p>
					</div>
			<?php } 
			
				if(isset($_GET['NoSuchUser'])){
			?>		
					<div class="alert alert-dismissible alert-danger">
						<h4 class="alert-heading">Hiba!</h4>
						<p class="mb-0">A megadott felhasználó nem létezik!</p>
					</div>
			<?php } ?>

			
			<div class="text">
				<p>Amennyiben nem rendelkezik hozzáféréssel az oldalhoz, kérem keresse fel rendszergazdáját. Csak a rendszergazda tud felhasználót létrehozni, regisztráció nem lehetséges. </p>
			</div>
			<div class="footer">© 2020 Minden jog fenntartva</div>
		</div>
		
		<script>
			function validatePassword(){
				var password = document.forms["login"]["password"];
				if (password.value == "") {
					password.classList.add("is-invalid");
		  		}else{
			  		password.classList.remove("is-invalid")
			  		password.classList.add("is-valid");
		  		}
		  		

			}
			
			function alertClose(){
			var alertMsg = document.getElementById("alert");			
			
			alertMsg.style.opacity = "0";
			setTimeout(function(){ alertMsg.style.display = "none"; }, 900);
			}
			
		</script>
	</body>
</html>