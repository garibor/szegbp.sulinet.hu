		<script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js"></script>

<div class="navigation-block">
	<div class="navigation-block-logo">Self<span>Care</span> 1.0</div>
	<ul>
		<!--
			https://colorlib.com/polygon/adminator/index.html
			<li><a href="index.php"><i class="far fa-chart-bar" style="color: #2196f3!important;"></i>Dashboard</a></li>
		<li><a href="appointments.php"><i class="far fa-clock" style="color: #ff9800!important"></i>Időpontok</a></li>
		<li><a href="trainings.php"><i class="fab fa-buffer" style="color: #ff5722!important;"></i>Képzések</a></li>
		<li><a href="#"><i class="fas fa-tasks" style="color: #673ab7!important;"></i>Feladatok</a></li>
			<li><a href="#"><i class="fas fa-cog" style="color: #009688!important;"></i>Beállítások</a></li-->
		
		<li><a href="index.php"><i class="fal fa-project-diagram" style="color: #ff9800!important; margin-right: 10px; font-size: 15px;"></i>Dashboard</a></li>
		<li><a href="pages.php"><i class="fal fa-users" style="color: #009688!important; margin-right: 10px; font-size: 15px;"></i>Oldalak</a></li>
		<li><a href="news.php"><i class="fal fa-tasks" style="color: #03a9f4!important; margin-right: 10px; font-size: 15px;"></i>Hírek</a></li>
		<li><a href="calendar.php"><i class="fal fa-calendar-alt" style="color: #e91e63!important; margin-right: 10px; font-size: 15px;"></i>Naptár</a></li>
		<li><a href="media.php"><i class="fal fa-images" style="color: #ff9800!important; margin-right: 10px; font-size: 15px;"></i>Média</a></li>	
		<li><a href="documents.php"><i class="fal fa-file-alt" style="color: #9c27b0!important; margin-right: 10px; font-size: 15px;"></i>Dokumentumok</a></li>
		<li><a href="users.php"><i class="fal fa-users" style="color: #f44336!important; margin-right: 10px; font-size: 15px;"></i>Felhasználók</a></li>
		<!--<li><a href="permission.php"><i class="fal fa-user-tag" style="color: #009688!important;"></i>Jogosultságok</a></li>-->
	</ul>
</div>
<div class="horizontal-nav">
	<div class="icon-bar">
		<i class="fas fa-bars" id="user-menu-icon" onclick="visibleUserMenu()" style="margin-top: 2px; font-size: 15px;"></i>
		<div class="user-menu" id="user-menu">
			<ul class="user-menu-items">
				<li class="user-menu-item"><a href="my-profil.php">Adatlapom</a></li>
				<li class="user-menu-item"><a href="logout.php">Kijelentkezés</a></li>
			</ul>
		</div>
	</div>
</div>

<script>
	function visibleUserMenu(){
		var userMenu = document.getElementById('user-menu');

		if(userMenu.className == "user-menu"){
			userMenu.classList.add("user-menu-visible");			
			console.log("látszik");
		}else{
			userMenu.classList.remove("user-menu-visible");			
			console.log("nem");
		}
	}
	
</script>