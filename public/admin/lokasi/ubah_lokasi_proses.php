<?php  

	session_start();

	$lokasi_id = $_POST["id"];
	$bengkel_id = $_POST["bengkel_id"];
	$kelurahan_id = $_POST["kelurahan_id"];
	$latitude = $_POST["latitude"];
	$longitude = $_POST["longitude"];

	include "../../../incl/connection.php";

	$sql = "UPDATE tb_lokasi SET id_bengkel = '$bengkel_id', id_kel = '$kelurahan_id', lat = '$latitude', lng = '$longitude' WHERE id = '$lokasi_id'";
	$proses = mysqli_query($conn, $sql) or die(mysql_error());

	if ($proses) {
		$_SESSION["flash"] = "sukses";
		$_SESSION["message"] = "Data lokasi bengkel berhasil diubah!";
		header("Location: ../route.php?page=data-lokasi");
	} else {
		$_SESSION["flash"] = "gagal";
		$_SESSION["message"] = "Telah terjadi kesalahan!";
		header("Location: ../route.php?page=data-lokasi");
	}

?>