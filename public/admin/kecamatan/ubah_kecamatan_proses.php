<?php  

	session_start();

	$id = $_POST["id"];
	$nama_kecamatan = $_POST['nama_kecamatan'];

	include "../../../incl/connection.php";

	$sql = "UPDATE tb_kec SET nm_kec = '$nama_kecamatan' WHERE id = '$id'";
	$proses = mysqli_query($conn, $sql);

	if ($proses) {
		$_SESSION["flash"] = "sukses";
		$_SESSION["message"] = "Data Kecamatan berhasil diubah!";
		header("Location: ../route.php?page=data-kecamatan");
	} else {
		$_SESSION["flash"] = "gagal";
		$_SESSION["message"] = "Telah terjadi kesalahan!";
		header("Location: ../route.php?page=data-kecamatan");
	}

?>