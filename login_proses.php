<?php  
	
	session_start();
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	include 'incl/connection.php';

	$sql = "SELECT * FROM tb_user WHERE user = '$username' AND pass = '$password'";
	$exe = mysqli_query($conn, $sql);
	
	$dat = mysqli_fetch_assoc($exe);
	$res = count($exe);

	if ($res == '1') {
		$_SESSION['id'] = $dat['id'];
		$_SESSION['username'] = $dat['user'];
		header('Location: public/admin/route.php?page=home');
	} else {
		header('Location: login.php');
	}
	
?>