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
		<link rel="stylesheet" href="src/css/media-style.css">
		<link rel="stylesheet" href="src/img/icon/w/css/light.css">
		<script src="src/img/icon/w/js/light.js"></script>
		
		<title>SelfCare</title>		
	</head>
	
	<body>

		<?php include('menu.php'); ?>
		<div class="content">
			<h2>Médiatár</h2>
			
			<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			    <p>Válasszon egy feltöltendő fájlt:
				    <br/>(.jpg, .JPG, .jpeg, .JPEG, .png, .PNG)
				    <p class="text-danger">
					    A helyes megjelenés érdekében a fájlok nevében ne legyen ékezet és szóköz se.
					</p>
			    </p>
			    <input type="file" name="file" >
			    <input type="submit" name="uploadFile" class="btn btn-outline-primary" value="Feltöltés" style="margin-top: -4px;">
			</form>

			<button type="button" class="btn btn-outline-primary refhresh-page"><i class="fas fa-sync-alt" onclick="window.location.reload();"></i></button>
			
			<?php			
			if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["uploadFile"])) {
				// Include the database configuration file

				$statusMsg = "";
				$statusErrorMsg = "";
				$statusInfoMsg = "";
				
				// File upload path
				$targetDir = "../uploads/img/";
				$fileName = basename($_FILES["file"]["name"]);
				$fileSize=$_FILES["file"]["size"];
				$targetFilePath = $targetDir . $fileName;
				$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
				
				if(isset($_POST["uploadFile"]) && !empty($_FILES["file"]["name"])){
				    // Allow certain file formats
				    $allowTypes = array('jpg','JPG','jpeg','JPEG','png', 'PNG');
				    if(in_array($fileType, $allowTypes)){

				        // Upload file to server
				        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
				            // Insert image file name into database
				            $insertDocument = "INSERT INTO szeg_media (file_name, type, size, uploaded_on) VALUES ('".$fileName."', '".$fileType."', '".$fileSize."', NOW())";
				            
            				if ($connection->query($insertDocument) === TRUE) {
				                $statusMsg = $fileName. " nevű fájl sikeresen feltöltve.";
				            }else{
				                $statusErrorMsg = "A fájl feltöltése nem sikerült, próbálkozzon újra.";
				            } 
				        }else{
				            $statusErrorMsg = "Sajnos hiba történt a fájl feltöltésekor.";
				        }

				    }else{
					    
				        $statusErrorMsg = "Sajnos csak ".$allowTypes." fájlok tölthetők fel.";
				    }
				}else{
				    $statusInfoMsg = "Válasszon egy feltöltendő fájlt.";
				}
				
				// Display status message
				if(strlen($statusMsg)!= 0){
					//susscces
					?>
					<div class="alert alert-dismissible alert-success">
					  <strong>Kész</strong> <?php echo $statusMsg; ?>
					</div>
					<?php
				}else if(strlen($statusErrorMsg) != 0){
					//error
										?>
					<div class="alert alert-dismissible alert-danger">
					  <strong>Hiba!</strong> <?php echo $statusErrorMsg; ?>
					</div>
					<?php
				}else{
					//info
										?>
					<div class="alert alert-dismissible alert-info">
					  <strong>Info</strong> <?php echo $statusInfoMsg; ?>
					</div>
					<?php
				}
				
			}
		?>

			
			<table id="medias" class="table table-hover medias-table">
			  <thead>
			    <tr>				    
				    <th scope="col">ID</th>
				    <th scope="col">Név</th>
				    <th scope="col">Típus</th>
				    <th scope="col">Méret</th>
				    <th scope="col">Feltöltés ideje</th>
   				    <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
				  <?php 
					$mediaQuery = "SELECT id, file_name, type, size, uploaded_on FROM szeg_media ORDER BY uploaded_on DESC";
					$mediaResult = mysqli_query($connection, $mediaQuery);
					 
					while($mediaRow = mysqli_fetch_array($mediaResult)){
						?>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<tr style="width: 20px; text-align: left; vertical-align: middle;">
					    	<th scope="row" style="vertical-align: middle;"><?php echo($mediaRow['id']); ?></th>
							<td style="vertical-align: middle;"><?php echo($mediaRow['file_name']); ?></td>
							<td style="vertical-align: middle;"><?php echo($mediaRow['type']); ?></td>
							<td style="vertical-align: middle;">
								<?php 
									$size = $mediaRow['size'];
									$sizeKB = round($size/1024);
									$sizeMB = round($sizeKB/1024, 1);
									$sizeGB = round($sizeMB/1024, 1);

									if($sizeGB < 1){
										if($sizeMB < 1){
											echo($sizeKB." KB");
										}else{
											echo($sizeMB." MB");	
										}
									}else{
										echo($sizeGB." GB");
									}
								?>
							</td>
							<td style="vertical-align: middle;"><?php echo($mediaRow['uploaded_on']); ?></td>				
					    	<td style="vertical-align: middle;">
						    	<input type=hidden name=id value="<?php echo($mediaRow['id']); ?>" >
					
						    	<button type="submit" name="openMedia" id="button" class="btn btn-link open" >
									<i class="fal fa-folder-open"></i>
						    	</button>
						    	<button type="submit" name="deleteMedia" id="button" class="btn btn-link trash" onClick="return confirm('Biztos törölni szeretné ezt a média fájlt?')">
						    		<i class="fal fa-trash-alt"></i>
						    	</button>
							</td>
					    </tr>
					   	</form>
					 
					<?php			
					}
					if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteMedia'])) {				
						$deletMedia = "DELETE FROM szeg_medias WHERE id = ".$_POST['id'] ;
				            
	            		if ($connection->query($deletMedia) === TRUE) {
		            		?>
							<div class="alert alert-dismissible alert-success">
								<strong>Sikeresen</strong> törölve lett <?php echo ($deletMedia); ?>
							</div>
								<script>
									window.location.reload();
								</script>
							<?php
					    }else{
                			?>
							<div class="alert alert-dismissible alert-danger">
								<strong>Hiba!</strong> Fájl törlése során hiba lépett fel. <?php echo ($deletMedia."  ".$connection->error); ?>
							</div>
							<?php
					    } 
					}

					if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['openMedia'])) {				
						$openMediaQuery = "SELECT id, file_name, type, size, uploaded_on FROM szeg_medias WHERE id = '".$_POST['id']."'";
						$openMediaResult = mysqli_query($connection, $openMediaQuery);
						 
						while($openMediaRow = mysqli_fetch_array($openMediaResult)){						
							?>
							<style>
								.imgBody{
									background-size: cover;
									width: auto;
								}
								
								.imgBody img{
									height: 650px;
									object-fit: cover;
								}
								
								.closeImgBody{
									margin-top: 2px;
									margin-right: 10px;
									font-size: 30px;
									color: #008cba;
								}
							</style>
							<script>
								function alertClose(){
									var alertMsg = document.getElementById("imgModal");			
									
									alertMsg.style.opacity = "0";
									setTimeout(function(){ alertMsg.style.display = "none"; }, 900);
								}
							</script>
							<div id="imgModal" class="imgModal">
								<button type="button" class="close closeImgBody" data-dismiss="alert" onclick="alertClose()">&times;</button>
								<div class="imgBody">
									<img src="../uploads/img/<?php echo($openMediaRow['file_name']) ?>">
								</div>
							</div>
						
							<?php
						}
						
					}
					?>
			  </tbody>
			    
			</table>
		</div>
		<script>
			function refreshPage(){
				window.location.reload();
			}
			
		</script>
	
	</body>
</html>