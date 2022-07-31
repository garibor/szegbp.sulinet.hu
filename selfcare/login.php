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
			<div class="login-title"><h1>Self<strong>Care</strong></h1> <h4>Bejelentkezés</h4></div>
						
			
			<div class="login-form">
				
				<form name="login" method="POST" action="process.php" onsubmit="return validateForm()">
					<label>Felhasználónév:</label>
					<input type="text" class="form-control" placeholder="" id="input-username" name="username" />
					<div class="invalid-feedback" id="usernameFeedback">Adja meg a felhasználónevét!</div>
	
					<label>Jelszó:</label>
					<input type="password" class="form-control" id="input-password" name="password" />
					<div class="invalid-feedback" id="passwordFeedback">Adja meg a jelszavát!</div>
					
					<button type="submit" class="btn btn-primary" name="login">Bejelentkezés</button>
				</form>
				
					<button type="button" class="btn btn-link" onclick="location.href='forgotten-password.php';">Elfelejtette jelszavát?</button>
			</div>
			
			<?php
				if(isset($_GET['invalidUsernameAndPassword'])){
			?>		
					<div class="alert alert-dismissible alert-warning">
						<h4 class="alert-heading">Hiba!</h4>
						<p class="mb-0">Felhasználónév vagy jelszó nem megfelelő!</p>
					</div>
			<?php } ?>
			
			<div class="text">
				<p>Amennyiben nem rendelkezik hozzáféréssel az oldalhoz, kérem keresse fel rendszergazdáját. Csak a rendszergazda tud felhasználót létrehozni, regisztráció nem lehetséges. </p>
			</div>
			<div class="footer">© 2020 Minden jog fenntartva</div>
		</div>
		
		<script>
			function validateForm() {
				var username = document.forms["login"]["username"];
				if (username.value == "") {
					username.classList.add("is-invalid");
					return false;
		  		}
		  		
				var password = document.forms["login"]["password"];
				if (password.value == "") {
					password.classList.add("is-invalid");
					return false;
		  		}
			}
			
			function validateUsernameInput(){
				var username = document.forms["login"]["username"];
				if (username.value == "") {
					username.classList.add("is-invalid");
		  		}else{
			  		username.classList.remove("is-invalid")
			  		username.classList.add("is-valid");
		  		}		  	


			}
			
			function validatePasswordInput(){
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