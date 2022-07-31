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
		<link rel="icon" type="image/png" href="https://c.cksource.com/a/1/logos/ckeditor5.png">
		<link rel="stylesheet" href="src/css/bootstrap.min.css">
		<link rel="stylesheet" href="src/css/main-style.css">
		<link rel="stylesheet" href="src/css/news-style.css">
		<link rel="stylesheet" href="src/img/icon/w/css/light.css">
		<script src="src/img/icon/w/js/light.js"></script>
			
		<title>SelfCare</title>		
	</head>
	
	<body data-editor="ClassicEditor" data-collaboration="false">

		<?php include('menu.php'); ?>
		<div class="content">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">		
				<?php
					if(isset($_GET['id'])){
						$editedNewsId = $_GET['id'];
						
						$editedNewsQuery = "SELECT id, title, text, status, type FROM szeg_news WHERE id = ".$editedNewsId;
						$editedNewsResult = mysqli_query($connection, $editedNewsQuery);
						while($editedNewsData = mysqli_fetch_assoc($editedNewsResult)){
						
						?>					
							<h2>Hír szerkesztés</h2>
							<button type="button" class="btn btn-outline-danger cancel-news" onclick="location.href='news.php'">Mégse</button>			
							<button type="submit" name="save-news" class="btn btn-outline-success save-news">Mentés</button>
							
							<input type="hidden" id="newsId" name="newsId" value="<?php echo ($editedNewsData['id']); ?>">
							
							<label class="col-form-label" for="inputDefault">Cím</label>
							<input type="text" class="form-control" id="inputDefault" name="update-title" value="<?php echo ($editedNewsData['title']); ?>">
							
							<label class="col-form-label" for="inputDefault">Szöveg</label>
							<div class="centered">
								<div class="row row-editor">		
									<textarea class="editor"name="update-text" ><?php echo ($editedNewsData['text']); ?></textarea>
								</div>
							</div>
								
							<label class="col-form-label" for="inputDefault">Státusz</label>
							<select class="form-control" id="exampleSelect1" name="update-status">
								<?php
									if($editedNewsData['status'] == 0){
										?>
											<option selected="" value="0">Szerkesztés alatt</option>
											<option value="1">Publikált hír</option>
										<?php
									}else{
										?>
											<option value="0">Szerkesztés alatt</option>
											<option selected="" value="1">Publikált hír</option>
										<?php
									}		
								?>									
							</select>
																	
							<label class="col-form-label" for="inputDefault">Típus</label>
							<select class="form-control" id="exampleSelect1" name="update-type">
								<?php 
								if($editedNewsData['type'] == 0){
									?>	
										<option selected="" value="0">Egyszerű hír</option>
										<option value="1">Aktuális hír</option>
										<option value="2">Kiemelt hír</option>
									<?php
								}else if($editedNewsData['type']== 1){
									?>	
										<option value="0">Egyszerű hír</option>
										<option selected="" value="1">Aktuális hír</option>
										<option value="2">Kiemelt hír</option>
									<?php
								}else{
									?>	
										<option value="0">Egyszerű hír</option>
										<option value="1">Aktuális hír</option>
										<option selected="" value="2">Kiemelt hír</option>
									<?php
								}
								?>
							</select>
						<?php
						}
					}else{
						?>
							<h2>Új hír felvétel</h2>					
							<button type="button" class="btn btn-outline-danger cancel-news" onclick="location.href='news.php'">Mégse</button>			
							<button type="submit" name="save-new-news" class="btn btn-outline-success save-news">Mentés</button>
				
							<label class="col-form-label" for="inputDefault">Cím</label>
							<input type="text" class="form-control" id="inputDefault" name="title">
							
							<label class="col-form-label" for="inputDefault">Szöveg</label>
							<div class="centered">
								<div class="row row-editor">		
									<textarea class="editor"name="text" ><?php echo ($editedNewsData['text']); ?></textarea>
								</div>
							</div>
							
							<label class="col-form-label" for="inputDefault">Státusz</label>
							<select class="form-control" id="exampleSelect1" name="status">
								<option value="0">Szerkesztés alatt</option>
								<option value="1">Publikált hír</option>
							</select>
																
							<label class="col-form-label" for="inputDefault">Típus</label>
							<select class="form-control" id="exampleSelect1" name="type">
								<option value="0">Egyszerű hír</option>
								<option value="1">Aktuális hír</option>
								<option value="2">Kiemelt hír</option>
							</select>
						<?php
					}
				?>			
			</form>
			<p class="text-muted">
				<strong>Egyszerű hír</strong> = Csak az Aktuális menüpont alatt jelennek meg.
				<br/>
				<strong>Aktuális hír</strong> = A főöldal AKTUÁLIS HÍREK hasábban és az Aktuális menüpontalatt jelennek meg.
				<br/>
				<strong>Kiemelt hír</strong> = A főöldal KIEMELT HÍREK hasábban és az Aktuális menüpontalatt jelennek meg.
 
				
			</p>
		</div>
	
		<?php			
			if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save-new-news'])) {
				
				$title = $_POST['title'];
				$text = $_POST['text'];
				$status = $_POST['status'];
				$type = $_POST['type'];
				
				$insertNews = "INSERT INTO szeg_news (title, text, date, time, author_id, status, type) 
				VALUES ('".$title."' ,'".$text."' , CURRENT_DATE , CURRENT_TIME , '1' ,'".$status."', '".$type."');";
	
				if ($connection->query($insertNews) === TRUE) {
				?>
					<script>	
						location.href='news.php';
					</script>
					
				<?php
				} else {
					?>
						<div id="alert" class="alert alert-dismissible alert-danger">
							<button id="alertCloseButton" type="button" class="close" data-dismiss="alert" onclick="alertClose()">&times;</button>
							<strong>Hiba:</strong> <?php echo "Error: " . $insertNews . "<br>" . $connection->error; ?>
						</div>
					<?php
				}
			}
			
			if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save-news'])) {
				
				$id = $_POST['newsId'];
				$title = $_POST['update-title'];
				$text = $_POST['update-text'];
				$status = $_POST['update-status'];
				$type = $_POST['update-type'];
				
				$updateNews = "UPDATE szeg_news SET title = '".$title."', text = '".$text."', status = '".$status."', type = '".$type."' WHERE id = '".$id."'";
	
				if ($connection->query($updateNews) === TRUE) {
				?>
					<script>	
						location.href='news.php';
					</script>
					
				<?php
				} else {
					?>
						<div id="alert" class="alert alert-dismissible alert-danger">
							<button id="alertCloseButton" type="button" class="close" data-dismiss="alert" onclick="alertClose()">&times;</button>
							<strong>Hiba:</strong> <?php echo "Error: " . $updateNews . "<br>" . $connection->error; ?>
						</div>
					<?php
				}
			}
		?>
		
		<script src="src/ckeditor/build/ckeditor.js"></script>

	<script>
		
		ClassicEditor
			.create( document.querySelector( '.editor' ), {
				ckfinder: {
					uploadUrl: 'src/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
				},
				toolbar: {
					items: [
						'heading',
						'|',
						'bold',
						'italic',
						'link',
						'bulletedList',
						'numberedList',
						'|',
						'indent',
						'outdent',
						'|',
						//'CKFinder',
						'blockQuote',
						'insertTable',
						'mediaEmbed',
						'undo',
						'redo'
					]
				},
				
				image: {
					toolbar: [
						'imageTextAlternative',
						'imageStyle:full',
						'imageStyle:side'
					]
				},
				table: {
					contentToolbar: [
						'tableColumn',
						'tableRow',
						'mergeTableCells'
					]
				},
				licenseKey: '',
				
			} )
			.then( editor => {
				window.editor = editor;
		
				
			} )
			.catch( error => {
				console.error( 'Váratlan hiba történt!' );
				console.error( error );
			} );
	</script>
	
	</body>
</html>