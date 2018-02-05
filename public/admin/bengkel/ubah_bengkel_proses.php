<?php  

	session_start();

	$id = $_POST["id"];
	$nama = $_POST['nama_bengkel'];
	$alamat = $_POST["alamat_bengkel"];
	$telepon = $_POST["telepon_bengkel"];

	include "../../../incl/connection.php";

	$sql = "UPDATE tb_bengkel SET nm_bengkel = '$nama', alamat = '$alamat', no_telp = '$telepon' WHERE id = '$id'";
	$proses = mysqli_query($conn, $sql) or die(mysqli_error($conn));

	if ($proses) {
		$_SESSION["flash"] = "sukses";
		$_SESSION["message"] = "Data Bengkel berhasil diubah!";
		header("Location: ../route.php?page=data-bengkel");
	} else {
		$_SESSION["flash"] = "gagal";
		$_SESSION["message"] = "Telah terjadi kesalahan!";
		header("Location: ../route.php?page=data-bengkel");
	}

?>