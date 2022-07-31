<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
	require_once('selfcare/mysql-connect.php');	
?>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta charset="ISO-8859-1">
		<link type="text/css" rel="stylesheet" href="css/main-style.css">
		<link type="text/css" rel="stylesheet" href="css/slide-style.css">

		<link rel="stylesheet" href="calendar/css/theme2.css"/>
	    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
		<title>Szilágyi Erzsébet Gimnázium</title>
	
	</head>
	
	<body>
		<?php include 'page-header.php'; ?>		 
		<div class="news-box">
			<div class="actual-news">
				<div class="actual-news-title">Aktuális hírek</div>
				<?php
				$actualNewsQuery = "SELECT id, title, text, date, time, author_id, status, type FROM szeg_news WHERE status != 0 and type = 1 ORDER BY date, time DESC LIMIT 3";
					$actualNewsResult = mysqli_query($connection, $actualNewsQuery);
					 
					while($actualNewsRow = mysqli_fetch_array($actualNewsResult)){
						?>
							<div class="actual-new-box">
								<div class="actual-new-title"><a href="page.php?news=<?php echo($actualNewsRow['id']); ?>"><?php echo($actualNewsRow['title']); ?></a></div>
								<div class="actual-new-text"><?php echo(substr($actualNewsRow['text'], 0, 250).'...'); ?></div>
								<div class="actual-new-date"><?php echo($actualNewsRow['date']); ?></div>								
							</div>
						<?php			
					}
				?>
			</div>
			
			<div class="featured-news-box">
				<div class="featured-news-box-title">Kiemelt hírek</div>
				<?php
					$featuredNewsQuery = "SELECT id, title, text, date, time, author_id, status, type FROM szeg_news WHERE status != 0 and type = 2 ORDER BY date, time DESC LIMIT 5";
					$featuredNewsResult = mysqli_query($connection, $featuredNewsQuery);
					 
					while($featuredNewsRow = mysqli_fetch_array($featuredNewsResult)){
						?>
							<div class="featured-news">
								<div class="featured-news-title"><a href="page.php?news=<?php echo($featuredNewsRow['id']); ?>"><?php echo($featuredNewsRow['title']); ?></a></div>
								<div class="featured-news-text"><?php echo(substr($featuredNewsRow['text'], 0, 250).'...'); ?></div>
							</div>
							<hr/>
						<?php			
					}
				?>
				
			</div>
		</div>
		<div class="next-actual-news">
			<a href="page.php?page=aktualitasok">TOVÁBBI AKTUALITÁSOK</a> >
		</div>
		
		<div class="events-box-body">
			<div class="events-box-title">Események, Táborok</div>
			<div class="events-box-text">
				<div class="event-box">
					<iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&ctz=Europe%2FBudapest&showTz=0&amp;src=c3ppbGFneWllcnpzZWJldGdpbW5heml1bUBnbWFpbC5jb20&amp;src=YWY1b2JpMDZscW5jNXJjOTUxNnZsY2NzMzhAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%23F6BF26&amp;color=%23009688&showPrint=0&showTitle=0" style="border:none" width="540" height="415" frameborder="0" scrolling="no"></iframe>
					<!--<?php include 'calendar/calendar.php'; ?>-->
				</div>
				<div class="event-row-1">
					<div class="event-img"><img src="css/img/szilagyi_evnyito.jpg"></div>
					<div class="event-title">Új  kisgimnazistáink évnyitója és szilágyissá avatása</div>
					<div class="event-date">2020. Szeptember 01.</div>
				</div>
				<div class="event-row-2">				
					<div class="event-img"><img src="css/img/vizitura2.jpg"></div>
					<div class="event-title">szilágyisok újra vízen - Szíjártó Péter és Kozári Gábor tanár urak vezetésével</div>
					<div class="event-date">2020. Szeptember 01.</div>
				</div>
			</div>
		</div>
	
		<!--<div class="talented-students-boxs">
			<div class="talented-student-header-title">Tehetséges Szilágyisok</div>
			<div class="talented-student-boxs">
				<div class="talented-student-box">
					<div class="talented-student-img"><img src="css/img/1.jpg"></div>
					<div class="talented-student-title"><a href="#">PA SINUSAPE EAT.</a></div>
					<div class="talented-student-text">
						Aximus vid quam dolut modis estrunt. Et odi volupta spicturio conse vernat eost, et odias apienis et qui dolupta- tenda nos alitem a ipsamet.
					</div>
				</div>
				<div class="talented-student-box">
					<div class="talented-student-img"><img src="css/img/2.jpg"></div>
					<div class="talented-student-title"><a href="#">PA SINUSAPE EAT.</a></div>
					<div class="talented-student-text">
						Aximus vid quam dolut modis estrunt. Et odi volupta spicturio conse vernat eost, et odias apienis et qui dolupta- tenda nos alitem a ipsamet.
					</div>
				</div>
				<div class="talented-student-box">
					<div class="talented-student-img"><img src="css/img/3.jpg"></div>
					<div class="talented-student-title"><a href="#">PA SINUSAPE EAT.</a></div>
					<div class="talented-student-text">
						Aximus vid quam dolut modis estrunt. Et odi volupta spicturio conse vernat eost, et odias apienis et qui dolupta- tenda nos alitem a ipsamet.
					</div>
				</div>
				<div class="talented-student-box">
					<div class="talented-student-img"><img src="css/img/4.jpg"></div>
					<div class="talented-student-title"><a href="#">PA SINUSAPE EAT.</a></div>
					<div class="talented-student-text">
						Aximus vid quam dolut modis estrunt. Et odi volupta spicturio conse vernat eost, et odias apienis et qui dolupta- tenda nos alitem a ipsamet.
					</div>
				</div>
				<div class="talented-student-box">
					<div class="talented-student-img"><img src="css/img/5.jpg"></div>
					<div class="talented-student-title"><a href="#">PA SINUSAPE EAT.</a></div>
					<div class="talented-student-text">
						Aximus vid quam dolut modis estrunt. Et odi volupta spicturio conse vernat eost, et odias apienis et qui dolupta- tenda nos alitem a ipsamet.
					</div>
				</div>
				<div class="talented-student-box">
					<div class="talented-student-img"><img src="css/img/6.jpg"></div>
					<div class="talented-student-title"><a href="#">PA SINUSAPE EAT.</a></div>
					<div class="talented-student-text">
						Aximus vid quam dolut modis estrunt. Et odi volupta spicturio conse vernat eost, et odias apienis et qui dolupta- tenda nos alitem a ipsamet.
					</div>
				</div>
			</div>
		</div>
		<div class="next-talented-students">
			<a href="#">TOVÁBBI Tehetségeink</a> >
		</div>
		-->
		<!--<div class="teachers-result-boxs">
			<div class="teachers-result-box-title">Tanáraink eredményei</div>
			<div class="teacher-result-box">
				<div class="teacher-result-img"><img src="css/img/t_1.jpg"></div>
				<div class="teacher-result-title"><a href="#">PA SINUSAPE EAT. AXIMUS VID QUAM DOLUT MODIS ESTRUNT</a></div>
				<div class="teacher-result-text">Et odi volupta spicturio conse vernat eost, et odias apienis et qui doluptatenda nos alitem a ipsamet as mo volorrum.Nostis tam feciem pul vit, conica in vehebeme hae elin ses huit, C. Catum octum auc vit, quam hic ine firtus consum sesillare et is ini caela possuli.
.
Ahalego pribem intella tasdacrem sum terem enticae ma, nocritius eties vissessoltum perraetere aut publicaelus, supec rem, nons hostrorume tensice remendactus omnem con Itante ad.
Et odi volupta spicturio conse vernat eost, et odias apienis et qui doluptatenda nos alitem a ipsamet as mo volorrum.Nostis tam feciem pul vit, conica in vehebeme hae elin ses huit, C. Catum octum</div>
			</div>
			
			<div class="teacher-result-box">
				<div class="teacher-result-img"><img src="css/img/t_1.jpg"></div>
				<div class="teacher-result-title"><a href="#">PA SINUSAPE EAT. AXIMUS VID QUAM DOLUT MODIS ESTRUNT</a></div>
				<div class="teacher-result-text">Et odi volupta spicturio conse vernat eost, et odias apienis et qui doluptatenda nos alitem a ipsamet as mo volorrum.Nostis tam feciem pul vit, conica in vehebeme hae elin ses huit, C. Catum octum auc vit, quam hic ine firtus consum sesillare et is ini caela possuli.
.
Ahalego pribem intella tasdacrem sum terem enticae ma, nocritius eties vissessoltum perraetere aut publicaelus, supec rem, nons hostrorume tensice remendactus omnem con Itante ad.
Et odi volupta spicturio conse vernat eost, et odias apienis et qui doluptatenda nos alitem a ipsamet as mo volorrum.Nostis tam feciem pul vit, conica in vehebeme hae elin ses huit, C. Catum octum</div>
			</div>
			
			<div class="teacher-result-box">
				<div class="teacher-result-img"><img src="css/img/t_1.jpg"></div>
				<div class="teacher-result-title"><a href="#">PA SINUSAPE EAT. AXIMUS VID QUAM DOLUT MODIS ESTRUNT</a></div>
				<div class="teacher-result-text">Et odi volupta spicturio conse vernat eost, et odias apienis et qui doluptatenda nos alitem a ipsamet as mo volorrum.Nostis tam feciem pul vit, conica in vehebeme hae elin ses huit, C. Catum octum auc vit, quam hic ine firtus consum sesillare et is ini caela possuli.
.
Ahalego pribem intella tasdacrem sum terem enticae ma, nocritius eties vissessoltum perraetere aut publicaelus, supec rem, nons hostrorume tensice remendactus omnem con Itante ad.
Et odi volupta spicturio conse vernat eost, et odias apienis et qui doluptatenda nos alitem a ipsamet as mo volorrum.Nostis tam feciem pul vit, conica in vehebeme hae elin ses huit, C. Catum octum</div>
			</div>
			
			<div class="next-teacher-results">
				<a href="#">TOVÁBBI EREDMÉNYEINK</a> >
			</div>
			
		</div>
-->
		<div class="foundation-boxs">
			<div class="foundation-boxs-title">Alapítványunk és Diáksport Egyesületünk</div>
			<div class="foundation-box">
				<div class="foundation-title">Szilágyi Erzsébet Gimnázium Alapítványa</div>
				<div class="foundation-text">Tisztelt Szülők!</br>
Kérjük támogassa adója 1%-ával iskolánk Alapítványát! A Szilágyi Erzsébet Gimnázium Alapítványa: Budapest. Adószám: 19671437-1-41 Köszönjük a felajánlásokat!</div>
			</div>
			<hr/>
			<div class="foundation-box">
				<div class="foundation-title">Szilágyi Erzsébet Gimnázium Diáksport Egyesülete</div>
				<div class="foundation-text">A színvonalas testnevelés oktatást és hagyományőrző sporttáboraink töretlen folytatását biztosítani tudjuk, kérjük a kedves szülők anyagi támogatását. A támogatás jogszerű módja a diák sportegyesület támogatási szerződéssel történő támogatása és a személyi jövedelemadó 1%-ának felajánlása lehet. Adószám 18506439-1-41 Bankszámlaszám 10300002-10600464-49020019</br>
Nagyvonalú segítségüket előre is köszönjük!</div>
			</div>
		</div>
		
		<div class="link-boxs">
			<div class="link-box-title">Kapcsolat</div>
			<div class="link-box lb-location">
				<div class="link-icon"><img src="css/img/icon-location.png"></div>
				<div class="link-text" style="height: 36px;">
					Budapest I. Kerületi Szilágyi Erzsébet Gimnázium </br>
					1016 Budapest, Mészáros utca 5-7.</br>
					<a href="kapcsolat.php">Térkép</a>
				</div>
			</div>
			<div class="link-box lb-phone">
				<div class="link-icon"><img src="css/img/icon-phone.png"></div>
				<div class="link-text">
					(+36-1) 225-7055</br>
					(+36-1) 20 / 268-0878
				</div>
			</div>
			<div class="link-box lb-mail">
				<div class="link-icon"><img src="css/img/icon-mail.png"></div>
				<div class="link-text">
					szeg@szegbp.hu </br>
				</div>
			</div>
			
			<div class="link-box lb-social" style="border: none;">
				<div class="link-icon" style="margin-left: 20px;"><a href="https://www.facebook.com/search/top?q=szil%C3%A1gyi%20erzs%C3%A9bet%20gimn%C3%A1zium" target="_blank"><img src="css/img/icon-facebook.png"></a></div>
			</div>
			
		</div>
		<?php include('footer.php'); ?>
	</body>
</html>