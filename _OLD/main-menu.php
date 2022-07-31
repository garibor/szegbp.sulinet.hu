<style>
	.main-menu-body{
	width: 100%;
	height: 45px;
	background-color: #D5FFB7;
}

.main-menu-items{
	position: relative;
	display: inline-block;
	float: right;
	margin-right: 20px;
}

.main-dropbtn {
  background-color: #D5FFB7;
  color: black;
  font-size: 16px;
  border: none;
  cursor: pointer;
  margin: 0;
  padding-top: 13px;
  padding-bottom: 14px;
  padding-left: 5px;
  padding-right: 5px;
  margin-right: -10px;
}

.main-dropdown {
  position: relative;
  display: inline-block;
  margin-left: 0px;
}

.main-dropdown-content {
  display: none;
  position: absolute;
  background-color: #FAFAFC;
  min-width: 160px;
  margin-top: 13px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.main-dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.main-dropdown-content a:hover {
	background-color: #D5FFB7;
	color: black;
}

.main-dropdown:hover .main-dropdown-content {
  display: block;
}

.main-dropdown:hover .main-dropbtn {
  background-color: #FDE384;
  color: white;
}

.main-dropdown::after {
	content: "|";
	font-weight: bolder;
	padding-left: 15px;
	margin-top: 0px;
	float: right;
	color: white;
}

.main-dropdown:last-child::after{
	content: "";
}

	
</style>	


<div class="main-menu-body">
	<div class="main-menu-items">
		
		<div class="main-dropdown">
			<a class="main-dropbtn" onclick="window.location.href='page.php?page=aktualitasok'">Aktualitások</a>
		</div>
		<div class="main-dropdown">
			<a class="main-dropbtn">Iskolánkról</a>
			<div class="main-dropdown-content">
				<a href="page.php?page=fenntartonk">Fenntartónk</a>
				<a href="page.php?page=dokumentumok">Dokumentumok</a>
				<a href="page.php?page=iskolatortenet">Iskolatörténet</a>
				<a href="page.php?page=okoiskola">Ökoiskola</a>
				<a href="page.php?page=iskolakert">Iskolakert</a>
			</div>
		</div>
		<div class="main-dropdown">
			<a class="main-dropbtn">Vizsgák</a>
			<div class="main-dropdown-content">
				<a href="page.php?page=osztalyozo-vizsga">Osztályozó vizsga</a>
				<a href="page.php?page=idegen-nyelv">Idegen nyelv</a>
				<a href="page.php?page=irodalom">Irodalom</a>
				<a href="page.php?page=magyar-nyelv">Magyar nyelv</a>
				<a href="page.php?page=matematika">Matematika</a>
				<a href="page.php?page=tortenelem">Történelem</a>
				<a href="page.php?page=probaerettsegi">Próbaérettségi</a>
				<a href="page.php?page=kiserettsegi">Kisérettségi</a>
			</div>
		</div>
		<div class="main-dropdown">
			<a class="main-dropbtn">Közösségeink</a>
			<div class="main-dropdown-content">
				<a href="page.php?page=igazgatosag">Igazgatóság</a>
				<a href="page.php?page=tantestulet">Tantestület</a>
				<a href="page.php?page=munkatarsaink">Munkatársaink</a>
				<a href="page.php?page=munkakozossegek">Munkaközösségek</a>
				<a href="page.php?page=szuloi-szervezet">Szülői szervezetek</a>
				<a href="https://szeg.edupage.org/forms/" target="_blank">Osztályaink</a>
				<a href="page.php?page=dse">DSE</a>
				<a href="page.php?page=diakonkormanyzat">Diákönkormányzat</a>
				<a href="page.php?page=alapitvany">Alapítvány</a>
				<a href="page.php?page=iskolapszichologus-fejlesztopedagogus">Iskolapszichológus / Fejlesztőpedagógus</a>
			</div>
		</div>
		<div class="main-dropdown">
			<a class="main-dropbtn">Iskolai élet</a>
			<div class="main-dropdown-content">
				<a href="dokumentumok/tanev_rendje_2019_2020_SzEG.pdf" target="_blank">Tanév rendje</a>
				<a href="https://szeg.edupage.org/timetable/" target="_blank">Órarend</a>
				<a href="page.php?page=csengetesi-rend">Csengetési rend</a>
				<a href="page.php?page=kozossegi-szolgalat">Közösségi szolgálat</a>
				<a href="page.php?page=ebed">Ebéd</a>
				<a href="page.php?page=rendezvenyek">Rendezvények</a>
				<a href="page.php?page=taborok">Táborok</a>
			</div>
		</div>
		<div class="main-dropdown">
			<a class="main-dropbtn">Eredmények</a>
			<div class="main-dropdown-content">
				<a href="page.php?page=versenyeredmenyek">Versenyeredmények</a>
				<a href="page.php?page=erettsegi-eredmenyeink">Érettségi eredményeink</a>
				<a href="page.php?page=orszagos-meresek">Országos mérések</a>
				<a href="page.php?page=intezmenyi-tanfelugyelet">Intézményi tanfelügyelet</a>
			</div>
		</div>
		<div class="main-dropdown">
			<button class="main-dropbtn" onclick="window.location.href='page.php?page=kapcsolat'">Kapcsolat</button>
		</div>
	</div>
</div>



