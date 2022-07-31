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
		<link rel="stylesheet" href="src/css/user-style.css">
		<link rel="stylesheet" href="src/img/icon/w/css/light.css">
		<script src="src/img/icon/w/js/light.js"></script>
		
		<title>SelfCare</title>		
	</head>
	
	<body>
		
		<?php include('menu.php'); ?>
		<div class="content">
			<h2 class="page-title">Felhasználók</h2>
			<button type="button" class="btn btn-outline-warning new-user" onclick="location.href='new-user.php'">+ Új felhasználó</button>

			<table id="users" class="table table-hover user-table">
			  <thead>
			    <tr>
				    <th scope="col">ID</th>
				    <th scope="col">Név</th>
				    <th scope="col">Felhasználónév</th>
				    <th scope="col">E-mail</th>
				    <th scope="col">Regisztráció</th>
				    <th scope="col">Státusz</th>
				    <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
				  <?php 
					$userQuery = "SELECT ID, user_login, user_email, user_registration_time, user_status, display_name FROM szeg_users";
					$userResult = mysqli_query($connection, $userQuery);
					 
					while($userRow = mysqli_fetch_array($userResult)){
						?>
						<tr>
					      <th style="vertical-align: middle;" scope="row"><?php echo($userRow['ID']); ?></th>
					      <td style="vertical-align: middle;"><?php echo($userRow['display_name']); ?></td>
					      <td style="vertical-align: middle;"><?php echo($userRow['user_login']); ?></td>
					      <td style="vertical-align: middle;"><?php echo($userRow['user_email']); ?></td>
					      <td style="vertical-align: middle;"><?php echo($userRow['user_registration_time']); ?></td>
					      <td style="vertical-align: middle;"><?php if($userRow['user_status'] == 0 ){
						      echo('Inaktív');
						      }else{
							  	echo('Aktív');    
							  } ?></td>
							<td><button type="submit" id="button" class="btn btn-link open" onclick="location.href='edit-user.php?id=<?php echo($userRow['ID']); ?>'">
									<i class="fal fa-folder-open"></i>
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