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
		<link rel="stylesheet" href="src/css/document-style.css">
		<link rel="stylesheet" href="src/css/index-style.css">
		<link rel="stylesheet" href="src/img/icon/w/css/light.css">
		<script src="src/img/icon/w/js/light.js"></script>
		
		<title>SelfCare</title>		
	</head>
	
	<body>

		<?php include('menu.php'); ?>
		<div class="content">
			<h2>Dokumentumok</h2>
			
			<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			    <p>Válasszon egy feltöltendő fájlt:
				    <br/>(.doc, .DOC, .docx, .DOCX, .pdf, .PDF)
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
				$targetDir = "../uploads/doc/";
				$fileName = basename($_FILES["file"]["name"]);
				$fileSize=$_FILES["file"]["size"];
				$targetFilePath = $targetDir . $fileName;
				$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
				
				if(isset($_POST["uploadFile"]) && !empty($_FILES["file"]["name"])){
				    // Allow certain file formats
				    $allowTypes = array('doc','DOC','docx','DOCX','pdf', 'PDF', 'pdf');
				    if(in_array($fileType, $allowTypes)){

				        // Upload file to server
				        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
				            // Insert image file name into database
				            $insertDocument = "INSERT INTO szeg_documents (file_name, type, size, uploaded_on) VALUES ('".$fileName."', '".$fileType."', '".$fileSize."', NOW())";
				            
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

			
			<table id="documents" class="table table-hover documents-table">
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
					$documentQuery = "SELECT id, file_name, type, size, uploaded_on FROM szeg_documents ORDER BY uploaded_on DESC";
					$documentResult = mysqli_query($connection, $documentQuery);
					 
					while($documentRow = mysqli_fetch_array($documentResult)){
						?>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<tr>
					    	<th scope="row"><?php echo($documentRow['id']); ?></th>
							<td><?php echo($documentRow['file_name']); ?></td>
							<td><?php echo($documentRow['type']); ?></td>
							<td>
								<?php 
									$size = $documentRow['size'];
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
							<td><?php echo($documentRow['uploaded_on']); ?></td>				
					    	<td>
						    	<input type="hidden" name=id value="<?php echo($documentRow['id']); ?>" >
						    	<input type="hidden" name=filePath value="" >
						    	
						    	<button type="button" id="button" name="linkDocument" class="btn btn-link open" onclick="linkCopyCliboard('<?php echo($documentRow['file_name']); ?>')">
									<i class="fal fa-link"></i>
						    	</button>
						    	<script>
							function linkCopyCliboard(fileName) {
								var input = document.body.appendChild(document.createElement("input"));
								input.value = "../uploads/doc/" + fileName;
								input.focus();
								input.select();
								document.execCommand('copy');	
								alert("Fájl elérési útja a vágólapra lett másolva!");
							}
						</script>
						    	<button type="submit" id="button" name="openDocument" class="btn btn-link open">
									<i class="fal fa-folder-open"></i>
						    	</button>
						    	<button type="submit" name="deleteDocument" id="button" class="btn btn-link trash" onClick="return confirm('Biztos törölni szeretné ezt a dokumentumot?')">
						    		<i class="fal fa-trash-alt"></i>
						    	</button>
							</td>
					    </tr>
	
					   	</form>

					<?php			
					}
					if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteDocument'])) {
						$deletDocument = "DELETE FROM szeg_documents WHERE id = ".$_POST['id'] ;
		            
	    				if ($connection->query($deletDocument) === TRUE) {
	                		?>
							<div class="alert alert-dismissible alert-success">
								<strong>Sikeresen</strong> törölve lett <?php echo ($deletDocument); ?>
							</div>
							<script>
								window.location.reload();
							</script>
							<?php
			            }else{
	    					?>
							<div class="alert alert-dismissible alert-danger">
							  <strong>Hiba!</strong> Fájl törlése során hiba lépett fel. <?php echo ($deletDocument."  ".$connection->error); ?>
							</div>
							<?php
								
								
			            } 
					
					}

					if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['openDocument'])) {				
						$openDocumentQuery = "SELECT id, file_name FROM szeg_documents WHERE id = '".$_POST['id']."'";
						$openDocumentResult = mysqli_query($connection, $openDocumentQuery);
						 
						while($openDocumentRow = mysqli_fetch_array($openDocumentResult)){						
							?>
							<script>	
								window.open('../uploads/doc/<?php echo $openDocumentRow['file_name'] ?>');
							</script>
							<?php
						}
						
					}
					?>
			  </tbody>
			</table>
		</div>
	
	</body>
</html>