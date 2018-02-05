<?php  

	session_start();

	$kecamatan_id = $_POST['kecamatan_id'];
	$nama_kelurahan = $_POST['nama_kelurahan'];

	include "../../../incl/connection.php";

	$sql = "INSERT INTO tb_kel (id_kec, nm_kel) VALUES ('$kecamatan_id', '$nama_kelurahan')";
	$proses = mysqli_query($conn, $sql) or die(mysqli_error($conn));

	if ($proses) {
		$_SESSION["flash"] = "sukses";
		$_SESSION["message"] = "Data Kelurahan berhasil ditambahkan!";
		header("Location: ../route.php?page=data-kelurahan");
	} else {
		$_SESSION["flash"] = "gagal";
		$_SESSION["message"] = "Telah terjadi kesalahan!";
		header("Location: ../route.php?page=data-kelurahan");
	}

?>