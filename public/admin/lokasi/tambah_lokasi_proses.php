<?php  

	session_start();

	$bengkel_id = $_POST["bengkel_id"];
	$kelurahan_id = $_POST["kelurahan_id"];
	$latitude = $_POST["latitude"];
	$longitude = $_POST["longitude"];

	include "../../../incl/connection.php";

	$sql = "INSERT INTO tb_lokasi (id_bengkel, id_kel, lat, lng) VALUES ('$bengkel_id', '$kelurahan_id', '$latitude', '$longitude')";
	$proses = mysqli_query($conn, $sql) or die(mysql_error());

	if ($proses) {
		$_SESSION["flash"] = "sukses";
		$_SESSION["message"] = "Data lokasi bengkel berhasil ditambahkan!";
		header("Location: ../route.php?page=data-lokasi");
	} else {
		$_SESSION["flash"] = "gagal";
		$_SESSION["message"] = "Telah terjadi kesalahan!";
		header("Location: ../route.php?page=data-lokasi");
	}

?>