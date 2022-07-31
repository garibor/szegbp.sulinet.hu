<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
	require_once('selfcare/mysql-connect.php');	
	$pageName = $_GET['page'];
	$news = $_GET['news'];
	$query = "SELECT id, title, text FROM szeg_page WHERE name='".$pageName."'";		

	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($result);		
		
?>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link type="text/css" rel="stylesheet" href="css/main-style.css">
		<link type="text/css" rel="stylesheet" href="css/connection-style.css" >
		<link type="text/css" rel="stylesheet" href="css/slide-style.css">
		<title>Szilágyi Erzsébet Gimnázium</title>
	
	</head>
	
	<body>
		<?php include("page-header.php") ?>
		
		<div class="content-container">
			
			<?php
				if($news != null){
					$newsQuery = "SELECT id, title, text, date FROM szeg_news WHERE id='".$news."'";		
					$newsResult = mysqli_query($connection, $newsQuery);
					$newsRow = mysqli_fetch_assoc($newsResult);		
			?>
			
					<div class="content-title"><?php echo($newsRow['title']);?></div>
					<div class="actual-new-box">
						<div class="actual-new-text"><?php echo($newsRow['text']); ?></div>
						<div class="actual-new-date"><?php echo($newsRow['date']); ?></div>								
					</div>
			<?php 
				} 
			?>
			
			<div class="content-title"><?php echo $row['title'];?></div>
			<?php
				
				if($pageName == 'aktualitasok'){
					$newsQuery = "SELECT id, title, text, date, time, author_id, status, type FROM szeg_news WHERE status != 0 ORDER BY date, time DESC";
					$newsResult = mysqli_query($connection, $newsQuery);
					 
					while($newsRow = mysqli_fetch_array($newsResult)){
						?>
							<div class="actual-new-box">
								<div class="actual-new-title"><a href="page.php?news=<?php echo($newsRow['id']); ?>"><?php echo($newsRow['title']); ?></a></div>
								<div class="actual-new-text"><?php echo($newsRow['text']); ?></div>
								<div class="actual-new-date"><?php echo($newsRow['date']); ?></div>								
							</div>
					<?php
					}
				}else{
					if(strlen($row['text']) == 0 && $news == null){
						echo("Tartalom feltöltés alatt!");
					}else{
						echo $row['text'];
					}
				}
			?>
			
			
		</div>
		
		<?php include('footer.php'); ?>
	</body>
</html>