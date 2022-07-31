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
  padding-left: 5px;
  padding-right: 5px;
  display: inline-flex;
  height: 45px;
  margin-top: -2px;
  line-height: 45px;
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
  margin-top: 0px;
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
	margin-top: 0px;
	display: inline-flex;
	color: white;
}

.main-dropdown:last-child::after{
	content: "";
}

	
</style>	


<!--<div class="main-menu-body">
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
				<a href="page.php?page=tanev-rendje">Tanév rendje</a>
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
		<div class="main-dropdown" style="margin-top: 2px;">
			<a class="main-dropbtn" onclick="window.location.href='page.php?page=kapcsolat'">Kapcsolat</a>
		</div>
	</div>
</div>
-->

<style>
nav menuitem{
   position:relative;
   display:block;
   opacity:0;
   cursor:pointer;
}

nav menuitem > menu {
   position: absolute;
   pointer-events:none;
}
nav > menu { 
	display:flex; 
	justify-content: flex-end;
}

nav > menu > menuitem { pointer-events: all; opacity:1; }
menu menuitem a { white-space:nowrap; display:block; }
   
menuitem:hover > menu {
   pointer-events:initial;
   opacity: 1;
}
menuitem:hover > menu > menuitem,
menu:hover > menuitem{
   opacity:1;
}
nav > menu > menuitem menuitem menu {
   transform:translateX(100%);
   top:0; right:0;
}

nav { 
   background-color: #D5FFB7;	
   font-size: 16px;
   margin-bottom: -16px;
}

nav a {
   color:#000;
   font-size: 16px;
   min-width:120px;
   transition: background 0.5s, color 0.5s, transform 0.5s;
   padding:15px 10px 15px 10px;
   box-sizing:border-box;
   position:relative;
}

nav a:hover {
   background: #FDE384;
   color: #fff;
   width:100%;
   height:100%;
}

nav > menu > menuitem > menu{
	margin-top: 0px;
}

nav > menu > menuitem > menu > menuitem{
	background: white;
	margin-left: -40px;
   transition: transform 0.6s, opacity 0.6s;
   transform:translateY(150%);
   opacity:0;
}
nav > menu > menuitem:hover > menu > menuitem,
nav > menu > menuitem.hover > menu > menuitem{
	transform:translateY(0%);
	opacity: 1;
}

menuitem > menu > menuitem > menu{
	margin-top:	0px;
}

menuitem > menu > menuitem > menu > menuitem{
	background-color: white;
	text-align: left;
	margin-left: -40px;
   transition: transform 0.6s, opacity 0.6s;
   transform:translateX(195px) translateY(0%);
   opacity: 0;
} 
menuitem > menu > menuitem:hover > menu > menuitem,  
menuitem > menu > menuitem.hover > menu > menuitem{  
   transform:translateX(0) translateY(0%);
   opacity: 1;
}

nav > menu > menuitem > a{
	text-align: center;
}
</style>


<nav>
	<menu>
	<menuitem><a onclick="window.location.href='page.php?page=aktualitasok'">Aktualitások</a></menuitem>
	<menuitem><a>Iskolánkról</a>
		<menu>
			<menuitem><a href="page.php?page=fenntartonk">Fenntartónk</a></menuitem>
			<menuitem><a>Dokumentumok</a>
				<menu>
					<menuitem><a href="page.php?page=hazirend" target="_blank">Házirend</a></menuitem>
					<menuitem><a href="page.php?page=szmsz" target="_blank">SZMSZ</a></menuitem>
					<menuitem><a href="page.php?page=alapdokumentum" target="_blank">Alapdokumentum</a></menuitem>
					<menuitem><a href="page.php?page=panaszkezeles" target="_blank">Panaszkezelés</a></menuitem>
					<menuitem><a href="page.php?page=padagogiai-program" target="_blank">Pedagógiai Program 2020</a></menuitem>
					<menuitem><a href="page.php?page=tanfelugyeleti-ertekeles" target="_blank">Tanfelügyeleti értékelés</a></menuitem>
					<menuitem><a href="page.php?page=kozzeteteli-lista" target="_blank">Közzétételi lista</a></menuitem>
				</menu>
			</menuitem>
			<menuitem><a href="page.php?page=iskolatortenet">Iskolatörténet</a></menuitem>
			<menuitem><a href="page.php?page=okoiskola">Ökoiskola</a></menuitem>
			<menuitem><a href="page.php?page=iskolakert">Iskolakert</a></menuitem>
		</menu>
	</menuitem>
	<menuitem><a>Vizsgák</a>
		<menu>
			<menuitem><a href="page.php?page=osztalyozo-vizsga">Osztályozó vizsga</a></menuitem>
			<menuitem><a href="page.php?page=idegen-nyelv">Idegen nyelv</a></menuitem>
			<menuitem><a href="page.php?page=irodalom">Irodalom</a></menuitem>
			<menuitem><a href="page.php?page=magyar-nyelv">Magyar nyelv</a></menuitem>
			<menuitem><a href="page.php?page=matematika">Matematika</a></menuitem>
			<menuitem><a href="page.php?page=tortenelem">Történelem</a></menuitem>
			<menuitem><a href="page.php?page=probaerettsegi">Próbaérettségi</a></menuitem>
			<menuitem><a href="page.php?page=kiserettsegi">Kisérettségi</a></menuitem>
		</menu>
	</menuitem>	
	<menuitem><a>Közösségeink</a>
		<menu>
			<menuitem><a href="page.php?page=igazgatosag">Igazgatóság</a></menuitem>
			<menuitem><a href="page.php?page=tantestulet">Tantestület</a></menuitem>
			<menuitem><a href="page.php?page=munkatarsaink">Munkatársaink</a></menuitem>
			<menuitem><a href="page.php?page=munkakozossegek">Munkaközösségek</a></menuitem>
			<menuitem><a href="page.php?page=szuloi-szervezet">Szülői szervezetek</a></menuitem>
			<menuitem><a href="https://szeg.edupage.org/forms/" target="_blank">Osztályaink</a></menuitem>
			<menuitem><a href="page.php?page=dse">DSE</a></menuitem>
			<menuitem><a href="page.php?page=diakonkormanyzat">Diákönkormányzat</a></menuitem>
			<menuitem><a href="page.php?page=alapitvany">Alapítvány</a></menuitem>
			<menuitem><a href="page.php?page=iskolapszichologus-fejlesztopedagogus">Iskolapszichológus / Fejlesztőpedagógus</a></menuitem>
		</menu>
	</menuitem>
	<menuitem><a>Iskolai élet</a>
		<menu>
			<menuitem><a href="page.php?page=tanev-rendje">Tanév rendje</a></menuitem>
			<menuitem><a href="https://szeg.edupage.org/timetable/" target="_blank">Órarend</a></menuitem>
			<menuitem><a href="page.php?page=csengetesi-rend">Csengetési rend</a></menuitem>
			<menuitem><a href="page.php?page=kozossegi-szolgalat">Közösségi szolgálat</a></menuitem>
			<menuitem><a href="page.php?page=ebed">Ebéd</a></menuitem>
			<menuitem><a href="page.php?page=rendezvenyek">Rendezvények</a></menuitem>
			<menuitem><a href="page.php?page=taborok">Táborok</a></menuitem>
		</menu>
	</menuitem>
	<menuitem><a>Eredmények</a>
		<menu>
			<menuitem><a href="page.php?page=versenyeredmenyek">Versenyeredmények</a></menuitem>
			<menuitem><a href="page.php?page=erettsegi-eredmenyeink">Érettségi eredményeink</a></menuitem>
			<menuitem><a href="page.php?page=orszagos-meresek">Országos mérések</a></menuitem>
			<menuitem><a href="page.php?page=intezmenyi-tanfelugyelet">Intézményi tanfelügyelet</a></menuitem>
		</menu>
	</menuitem>
	<menuitem><a onclick="window.location.href='page.php?page=kapcsolat'">Kapcsolat</a></menuitem>
</nav>



