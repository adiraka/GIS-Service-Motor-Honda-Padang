<?php  

	session_start();

	$namabengkel = $_POST['nama_bengkel'];
	$alamat = $_POST["alamat_bengkel"];
	$telepon = $_POST["telepon_bengkel"];
	$keterangan = $_POST["keterangan"];

	include "../../../incl/connection.php";

	if(isset($_FILES['foto'])){
		$ekstensi_diperbolehkan	= array('png','jpg', 'jpeg');
		$nama = $_FILES['foto']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['foto']['size'];
		$file_tmp = $_FILES['foto']['tmp_name'];	

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran < 1044070){			
				move_uploaded_file($file_tmp, '../../../assets/foto/'.$nama);
				$sql = "INSERT INTO tb_bengkel (nm_bengkel, alamat, no_telp, keterangan, foto) VALUES ('$namabengkel', '$alamat', '$telepon', '$keterangan', '$nama')";
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
			}else{
				$_SESSION["flash"] = "gagal";
				$_SESSION["message"] = "Ukuran file terlalu besar!";
				header("Location: ../route.php?page=data-bengkel");
			}
		}else{
			$_SESSION["flash"] = "gagal";
			$_SESSION["message"] = "Ekstensi file yang di upload tidak diperbolehkan!";
			header("Location: ../route.php?page=data-bengkel");
		}
	} else {
		$_SESSION["flash"] = "gagal";
		$_SESSION["message"] = "Foto tidak boleh kosong!";
		header("Location: ../route.php?page=data-bengkel");
	}

?>