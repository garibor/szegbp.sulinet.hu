<style>
	
	.sub-menu-body{
	height: 50px;
	width: 100%;
	margin-top: -17px;
	background-color: #FAFAFC;
}

	.language-selection > ul {
		margin-left: -9px;
		list-style-type: none;
	}
	
	.language-selection > ul > li{
		float: left;
		line-height: 50px;
		padding-left: 10px;
		padding-right: 10px;
		color: #000;
	}
	
	.language-selection > ul > li > a:hover {
		border-bottom: 2px solid #00B999;
		color: #FDE384;
	}
	
	.active-language{
		border-bottom: 2px solid #00B999;
	}

	
	.sub-menu-items{
		float: right;
		margin-right: 35px;
	}
	
.sub-dropbtn {
  background-color: #FAFAFC;
  color: black;
  margin-top: 15px;
  padding-top: 20px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  margin-right: -10px;
  padding-bottom: 17px;
  padding-left: 7px;
  padding-right: 12px;
}

.sub-dropdown {
  position: relative;
  display: inline-block;
  margin-left: 0px;
  margin-top: 16px;
}

.sub-dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.sub-dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.sub-dropdown-content a:hover {
	background-color: #f1f1f1;
	color: #FDE384;
}

.sub-dropdown:hover .sub-dropdown-content {
  display: block;
}

.sub-dropdown:hover .sub-dropbtn {
  color: white;
  background-color: #00B89C;
}

.sub-dropdown::after {
	content: "";
	font-weight: bolder;

	float: right;
	color:#00B999;
}

.sub-dropdown:last-child::after{
	content: "";
}

</style>
	

<div class="sub-menu-body">
			<div class="language-selection">
				<ul>
					<li><a class="active-language" href="#">Magyar</a></li>
					<!--<li><a href="#">English</a></li>-->
				</ul>
			</div>
			
			
			<div class="sub-menu-items">
				<div class="sub-dropdown">
				  <a href="page.php?page=felveteli" class="sub-dropbtn">Felvételi / Átvételi</a>
				  <div class="sub-dropdown-content">
				  
				  </div>
				</div>
				
				<!--div class="sub-dropdown">
				  <button class="sub-dropbtn">Diákoknak</button>
				  <div class="sub-dropdown-content">
				  
				  </div>
				</div>
				<div class="sub-dropdown">
				  <button class="sub-dropbtn">Tanároknak</button>
				  <div class="sub-dropdown-content">
				  
				  </div>
				</div-->
				<div class="sub-dropdown">
				  <a class="sub-dropbtn" href="https://klik035219001.e-kreta.hu/Adminisztracio/Login" target="_blank">E-napló</a>
				</div>
			</div>
				
			<div class="search"></div>
		</div>
		
		
		
		
		<script>
			function openEnaplo() {
				window.open("https://klik035219001.e-kreta.hu/Adminisztracio/Login", "_blank");
			};				
		</script>