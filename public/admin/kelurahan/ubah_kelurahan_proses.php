<?php  

	session_start();

	$id = $_POST['id'];
	$kecamatan_id = $_POST['kecamatan_id'];
	$nama_kelurahan = $_POST['nama_kelurahan'];

	include "../../../incl/connection.php";

	$sql = "UPDATE tb_kel SET id_kec = '$kecamatan_id', nm_kel = '$nama_kelurahan' WHERE id = '$id'";
	$proses = mysqli_query($conn, $sql) or die(mysqli_error($conn));

	if ($proses) {
		$_SESSION["flash"] = "sukses";
		$_SESSION["message"] = "Data Kelurahan berhasil diubahkan!";
		header("Location: ../route.php?page=data-kelurahan");
	} else {
		$_SESSION["flash"] = "gagal";
		$_SESSION["message"] = "Telah terjadi kesalahan!";
		header("Location: ../route.php?page=data-kelurahan");
	}

?>