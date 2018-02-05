<?php  

	session_start();

	$nama = $_POST['nama_bengkel'];
	$alamat = $_POST["alamat_bengkel"];
	$telepon = $_POST["telepon_bengkel"];

	include "../../../incl/connection.php";

	$sql = "INSERT INTO tb_bengkel (nm_bengkel, alamat, no_telp) VALUES ('$nama', '$alamat', '$telepon')";
	$proses = mysqli_query($conn, $sql) or die(mysqli_error($conn));

	if ($proses) {
		$_SESSION["flash"] = "sukses";
		$_SESSION["message"] = "Data Bengkel berhasil ditambahkan!";
		header("Location: ../route.php?page=data-bengkel");
	} else {
		$_SESSION["flash"] = "gagal";
		$_SESSION["message"] = "Telah terjadi kesalahan!";
		header("Location: ../route.php?page=data-bengkel");
	}

?>