<?php
	session_start();
	require_once('mysql-connect.php');
		
	if(isset($_SESSION['username'])){

	}else{
		header("location:login.php");	
	}	
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<link rel="stylesheet" href="src/css/bootstrap.min.css">
		<link rel="stylesheet" href="src/css/main-style.css">
		<link rel="stylesheet" href="src/css/news-style.css">
		<link rel="stylesheet" href="src/img/icon/w/css/light.css">
		<script src="src/img/icon/w/js/light.js"></script>
		
		<title>SelfCare</title>		
	</head>
	
	<body>

		<?php include('menu.php'); ?>
		<div class="content">
			<h2>Hírek</h2>
			<button type="button" class="btn btn-outline-warning new-news" onclick="location.href='new-news.php'">+ Új hír</button>
			
			<table id="news" class="table table-hover news-table">
			  <thead>
			    <tr>				    
				    <th scope="col">ID</th>
				    <th scope="col">Cím</th>
				    <th scope="col">Szerző</th>
				    <th scope="col">Dátum</th>
				    <th scope="col">Státusz</th>
				    <th scope="col">Típus</th>
   				    <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
				  <?php 
					$newsQuery = "SELECT id, title, text, date, time, author_id, status, type FROM szeg_news ORDER BY date, time DESC";
					$newsResult = mysqli_query($connection, $newsQuery);
					 
					while($newsRow = mysqli_fetch_array($newsResult)){
						?>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<tr>
					    	<th scope="row"><?php echo($newsRow['id']); ?></th>
							<td><?php echo($newsRow['title']); ?></td>
							<td><?php echo($newsRow['author_id']); ?></td>
							<td><?php echo($newsRow['date']." ".$newsRow['time']); ?></td>
							<td>
								<?php 
									if($newsRow['status'] == 0){
										echo("Szerkesztés alatt"); 
									}else{
										echo("Publikált hír");
									}	
								?>
							</td>
							<td>
								<?php 
									if($newsRow['type'] == 0){
										echo("Egyszerű hír"); 
									}else if($newsRow['type']== 1){
										echo("Aktuális hír");
									}else{
										echo("Kiemelt hír");
									}
								?>	
							</td>
					    	<td>
						    	<input type=hidden name=id value="<?php echo($newsRow['id']); ?>" >
						    	<button type="button" id="button" name="openNews" class="btn btn-link open" onclick="location.href='new-news.php?id=<?php echo($newsRow['id']); ?>'">
									<i class="fal fa-folder-open"></i>
						    	</button>
						    	<button type="submit" name="deleteNews" id="button" class="btn btn-link trash" onClick="return confirm('Biztos törölni szeretné ezt a hírt?')">
						    		<i class="fal fa-trash-alt"></i>
						    	</button>
							</td>
					    </tr>
					   	</form>
					<?php			
					}
					if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteNews'])) {
							$deletNews = "DELETE FROM szeg_news WHERE id = ".$_POST['id'] ;
				            
	            				if ($connection->query($deletNews) === TRUE) {
			                		?>
									<div class="alert alert-dismissible alert-success">
										<strong>Sikeresen</strong> törölve lett <?php echo ($deletNews); ?>
									</div>
									<script>
										window.location.reload();
									</script>
									<?php
					            }else{
                					?>
									<div class="alert alert-dismissible alert-danger">
									  <strong>Hiba!</strong> Hír törlése során hiba lépett fel. <?php echo ($deletNews."  ".$connection->error); ?>
									</div>
									<?php	
					            } 
					}
					?>
			  </tbody>
			</table>
		</div>
	
	</body>
</html>