<?php
	$connection = mysqli_connect('127.0.0.1', 'root', '12345678', 'szegbp');
	
	if(!$connection){
		die('Ellenőrizze a kapcsolatot'.mysqli_connect_error());
	}
?>