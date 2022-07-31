<?php
	session_start();
	require_once('mysql-connect.php');
	
	if(isset($_SESSION['username'])){

	}else{
		header("location:login.php");	
	}	

	$pid = $_GET['id'];	
	$pageQuery = "SELECT ID, title, text, type, style FROM szeg_page WHERE id = ".$pid;
	$pageResult = mysqli_query($connection, $pageQuery);
	$pageRow = mysqli_fetch_array($pageResult);

?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="icon" type="image/png" href="https://c.cksource.com/a/1/logos/ckeditor5.png">
		<script src="src/ckfinder/config.js"></script>
		<script src="src/ckfinder/ckfinder.js"></script>
		<link rel="stylesheet" href="src/css/bootstrap.min.css">
		<link rel="stylesheet" href="src/css/main-style.css">
		<link rel="stylesheet" href="src/css/pages-style.css">
		<link rel="stylesheet" href="src/img/icon/w/css/light.css">
	
		<script src="src/img/icon/w/js/light.js"></script>
		<title>SelfCare</title>		
	</head>
	
<!-https://colorlib.com/polygon/adminator/index.html ->
	
	<body data-editor="ClassicEditor" data-collaboration="false">

		<?php include('menu.php'); ?>
		<div class="content">
			<h2><?php echo($pageRow['title']); ?> oldal szerkesztése</h2>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">		
				<button type="button" class="btn btn-outline-danger cancel-page" onclick="location.href='pages.php'">Mégse</button>			
				<button type="submit" name="save-page" class="btn btn-outline-success save-page">Mentés</button>
				<input type="hidden" id="pageId" name="pageId" value="<?php echo($pid); ?>">
				
				
				<?php
					if($pageRow['type'] == 0){
				?>
					<div class="centered">
						<div class="row row-editor">		
							<textarea class="editor"name="text"><?php echo($pageRow['text']); ?></textarea>
						</div>
					</div>
				<?php								
					}else{
				?>
						<div class="form-group">
							<label class="col-form-label" for="inputDefault">Elérési út</label>
							<input type="text" class="form-control" name="text" id="inputDefault" value="<?php echo($pageRow['text']); ?>">
						</div>
				<?php
					}	
				?>
				
			</form>
		</div>

		<?php			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {

				$pageId = $_POST['pageId'];
				$pageText = $_POST['text'];
				
				$updatePage = "UPDATE szeg_page SET text = '".$pageText."' WHERE id =".$pageId;
	
				if ($connection->query($updatePage) === TRUE) {
				?>
					<script>	
						location.href='pages.php';
					</script>
					
				<?php
				} else {
					?>
						<div id="alert" class="alert alert-dismissible alert-danger">
							<button id="alertCloseButton" type="button" class="close" data-dismiss="alert" onclick="alertClose()">&times;</button>
							<strong>Hiba:</strong> <?php echo "Error: " . $updatePage . "<br>" . $connection->error; ?>
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