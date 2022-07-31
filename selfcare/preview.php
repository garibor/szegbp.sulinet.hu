<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
	require_once('mysql-connect.php');	
	$query = "SELECT id, title, text FROM szeg_pages WHERE id = ".$_GET['id'];
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($result);				
?>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link type="text/css" rel="stylesheet" href="../css/main-style.css">
		<link type="text/css" rel="stylesheet" href="../css/<?php echo $row['style']; ?>" >
		<link type="text/css" rel="stylesheet" href="../css/slide-style.css">
		<title>Szilágyi Erzsébet Gimnázium</title>
	
	</head>
	
	<body>
		<?php include("../page-header.php") ?>
		
				
		<div class="content-container">
			
			<div class="content-title"><?php echo $row['title']; ?></div>
			<?php
				if(strlen($row['text']) == 0){
					echo("Tartalom feltöltés alatt!");
				}else{
					echo $row['text'];
				}
				
			?>
		</div>
		<?php include('../footer.php'); ?>
	</body>
</html>