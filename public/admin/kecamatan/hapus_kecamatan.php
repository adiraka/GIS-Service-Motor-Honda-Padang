<?php  

	session_start();

	$id = $_GET['id'];

	include "../../../incl/connection.php";

	$sql = "DELETE FROM tb_kec WHERE id = '$id'";
	$proses = mysqli_query($conn, $sql);

	if ($proses) {
		$_SESSION["flash"] = "sukses";
		$_SESSION["message"] = "Data Kecamatan berhasil dihapus!";
		header("Location: route.php?page=data-kecamatan");
	} else {
		$_SESSION["flash"] = "gagal";
		$_SESSION["message"] = "Telah terjadi kesalahan!";
		header("Location: ../../route.php?page=data-kecamatan");
	}

?>