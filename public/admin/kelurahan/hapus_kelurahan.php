<?php  

	session_start();

	$id = $_GET['id'];

	include "../../../incl/connection.php";

	$sql = "DELETE FROM tb_kel WHERE id = '$id'";
	$proses = mysqli_query($conn, $sql);

	if ($proses) {
		$_SESSION["flash"] = "sukses";
		$_SESSION["message"] = "Data Kelurahan berhasil dihapus!";
		header("Location: route.php?page=data-kelurahan");
	} else {
		$_SESSION["flash"] = "gagal";
		$_SESSION["message"] = "Telah terjadi kesalahan!";
		header("Location: route.php?page=data-kelurahan");
	}

?>