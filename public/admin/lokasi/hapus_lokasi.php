<?php  

	session_start();

	$id = $_GET['id'];

	include "../../../incl/connection.php";

	$sql = "DELETE FROM tb_lokasi WHERE id = '$id'";
	$proses = mysqli_query($conn, $sql);

	if ($proses) {
		$_SESSION["flash"] = "sukses";
		$_SESSION["message"] = "Data Lokasi berhasil dihapus!";
		header("Location: route.php?page=data-lokasi");
	} else {
		$_SESSION["flash"] = "gagal";
		$_SESSION["message"] = "Telah terjadi kesalahan!";
		header("Location: route.php?page=data-lokasi");
	}

?>