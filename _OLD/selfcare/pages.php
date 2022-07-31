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
		<link rel="stylesheet" href="src/css/pages-style.css">
		<link rel="stylesheet" href="src/img/icon/w/css/light.css">

		<script src="src/img/icon/w/js/light.js"></script>
		<title>SelfCare</title>		
	</head>
	
<!-https://colorlib.com/polygon/adminator/index.html ->
	
	<body>

		<?php include('menu.php'); ?>
		<div class="content">
			<h2>Oldalak</h2>
			<button type="button" class="btn btn-outline-primary refhresh-page"><i class="fas fa-sync-alt" onclick="window.location.reload();"></i></button>
			<table id="users" class="table table-hover user-table">
			  <thead>
			    <tr>
				    <th scope="col">ID</th>
				    <th scope="col">Oldal neve</th>
   				    <th scope="col">Típus</th>
				    <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
				  <?php 
					$pageQuery = "SELECT ID, title, text, type, style FROM szeg_page WHERE status = 1";
					$pageResult = mysqli_query($connection, $pageQuery);
					 
					while($pageRow = mysqli_fetch_array($pageResult)){
						?>
						<tr>
					      	<th style="vertical-align: middle;" scope="row"><?php echo($pageRow['ID']); ?></th>
						  	<td style="vertical-align: middle; width: 700px; "><?php echo($pageRow['title']); ?></td>
						  	<td style="vertical-align: middle;">
						    	<?php 
							    	if($pageRow['type'] == 0){
								    	echo("Szöveges");
							    	}else if($pageRow['type'] == 1){
								    	echo("Link");								    	
							    	}else{
  								    	echo("Dokumentum");
							    	}
							    ?>
							</td>
							<td>
								<!--<button type="submit" id="button" class="btn btn-link open" onclick="location.href='preview.php?id=<?php echo($pageRow['ID']); ?>'">
									<i class="fal fa-folder-open"></i>
						    	</button>
						    	-->
						    	<button type="submit" id="button" class="btn btn-link edit" onclick="location.href='page-editor.php?id=<?php echo($pageRow['ID']); ?>'">
									<i class="fal fa-edit"></i>
						    	</button>
						    </td>
					    </tr>
					<?php
					}
					?>
			  </tbody>
			</table>
			
		</div>
	</body>
</html>