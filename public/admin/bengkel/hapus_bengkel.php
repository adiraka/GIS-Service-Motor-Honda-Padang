<?php  

	session_start();

	$id = $_GET['id'];

	include "../../../incl/connection.php";

	$sql = "DELETE FROM tb_bengkel WHERE id = '$id'";
	$proses = mysqli_query($conn, $sql);

	if ($proses) {
		$_SESSION["flash"] = "sukses";
		$_SESSION["message"] = "Data Bengkel berhasil dihapus!";
		header("Location: route.php?page=data-bengkel");
	} else {
		$_SESSION["flash"] = "gagal";
		$_SESSION["message"] = "Telah terjadi kesalahan!";
		header("Location: route.php?page=data-bengkel");
	}

?>