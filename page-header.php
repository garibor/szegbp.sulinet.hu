<style>
	@font-face {
  font-family: "BebasNeue";
  src: url('css/font/BebasNeue.otf');
}
.high-school-name{
	height: 140px;
	width: 460px;
	background-image: url('css/img/logo.svg');
	background-repeat: no-repeat;
	background-size: 450px;
	background-position: right top;
}

high-school-name > h1{
	margin-left: 50px;
	padding-left: 10px;
	text-transform: uppercase;
	border-left: 5px solid #00B999;
	height: 100px;
	font-family: "BebasNeue";
	font-size: 50px;
	font-weight: 100;
}
.info{
	width: 380px;
	float: right;
	margin-top: -110px;
	margin-right: 50px;
	font-size: 14px;
	color:#BBBBBB;
}

.info > a > img{
	margin-top: 10px;
	height: 20px;
	width: 20px;
}

.info a img{
	margin-right: 7px;
}

.info > img:last-child{
	margin-left: 5px;
}

.logo img{
	width: 120px;
	float: right;
	margin-top: -95px;
	margin-left: 70px;
}
</style>

		<?php include('sub-menu.php'); ?>
				<a href="index.php">
					<div class="high-school-name">
			<!--h1>Budapest I.Kerületi</br>Szilágyi Erzsébet Gimnázium</h1-->
					</div>
				</a>
				<div class="info">
					1016 Budapest, Mészáros utca 5-7.</br>
					(+36-1) 225-7055, (+36-1) 20 /268-0878</br>
					<a href="mailto:szeg@szegbp.hu" style="color:#1BA086;">szeg@szegbp.hu</a></br>
					<a href="https://www.facebook.com/search/top?q=szil%C3%A1gyi%20erzs%C3%A9bet%20gimn%C3%A1zium" target="_blank"><img src="css/img/icon-facebook.png"></a>
					<div class="logo">
						<img src="css/img/00_logo.jpg">
					</div>
				</div>
		
		<?php
			include('main-menu.php');
			//include('slideshow.php');
		 ?>
		 
		 <div class="slideshow-body"></div>