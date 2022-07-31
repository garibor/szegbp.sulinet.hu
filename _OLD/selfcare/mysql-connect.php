<?php
	$connection = new mysqli("127.0.0.1","root","12345678","szegbp");
	$connection->set_charset("utf8");

    if ($connection -> connect_errno) {
      echo "Ellenőrizze a kapcsolatot: " . $connection -> connect_error;
      exit();
    }
?>