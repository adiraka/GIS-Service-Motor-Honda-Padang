<?php  

	session_start();

	$nama_kecamatan = $_POST['nama_kecamatan'];

	include "../../../incl/connection.php";

	$sql = "INSERT INTO tb_kec (nm_kec) VALUES ('$nama_kecamatan')";
	$proses = mysqli_query($conn, $sql);

	if ($proses) {
		$_SESSION["flash"] = "sukses";
		$_SESSION["message"] = "Data Kecamatan berhasil ditambahkan!";
		header("Location: ../route.php?page=data-kecamatan");
	} else {
		$_SESSION["flash"] = "gagal";
		$_SESSION["message"] = "Telah terjadi kesalahan!";
		header("Location: ../route.php?page=data-kecamatan");
	}

?>