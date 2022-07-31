<?php
	session_start();
	require_once('mysql-connect.php');
	
	
	if(isset($_POST['login'])){
		if(empty($_POST['username']) || empty($_POST['password'])){	
			header("location:index.php?empty");
		}else{
			$loginQuery = "SELECT * FROM szeg_users WHERE user_status = '1' AND user_login = '" . $_POST['username']."' AND user_pass = '".md5($_POST['password'])."'";
			$loginResult = mysqli_query($connection, $loginQuery);
			
			if(mysqli_fetch_assoc($loginResult)){
				$_SESSION['username'] = $_POST['username'];
				header("location:index.php");
			}else{
				header("location:login.php?invalidUsernameAndPassword");
			}
		}
	}
	
	if(isset($_POST['password-change'])){
		if(empty($_POST['username']) || empty($_POST['password_1']) || empty($_POST['password_2'])){		
			header("location:forgotten-password.php?empty");
		}else{
			$fpUserControlQuery = "SELECT * FROM szeg_users WHERE user_login = '".$_POST['username']."'";
			$fpUserControlResult = mysqli_query($connection, $fpUserControlQuery);

			if(mysqli_fetch_assoc($fpUserControlResult)){
				$userPasswordUpdate = "UPDATE szeg_users SET user_pass = '".md5($_POST['password_1'])."' WHERE user_login = '".$_POST['username']."'";
				mysqli_query($connection, $userPasswordUpdate);
				header("location:login.php");
			}else{
				header("location:forgotten-password.php?NoSuchUser");

			}

			/*
			
			$loginQuery = "SELECT * FROM users WHERE username = '" . $_POST['username']."' AND password = MD5('". $_POST['password']."')";
			$loginResult = mysqli_query($connection, $loginQuery);
			
			if(mysqli_fetch_assoc($loginResult)){
				$_SESSION['username'] = $_POST['username'];
				header("location:index.php");
			}else{
				header("location:login.php?invalidUsernameAndPassword");
			}
			*/

			
		}	
	}
	
?>