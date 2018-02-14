<?php 
	
	session_start();
	
	include "../../../incl/connection.php";	

	$sql = "
		SELECT tb_lokasi.id, tb_bengkel.nm_bengkel, tb_bengkel.alamat, tb_bengkel.keterangan, tb_bengkel.foto, tb_kec.nm_kec, tb_kel.nm_kel, tb_bengkel.no_telp, tb_lokasi.lat, tb_lokasi.lng
		FROM tb_lokasi, tb_bengkel, tb_kel, tb_kec
		WHERE tb_lokasi.id_bengkel = tb_bengkel.id AND tb_lokasi.id_kel = tb_kel.id
		AND tb_kel.id_kec = tb_kec.id
	";

	$pro = mysqli_query($conn, $sql);

	$myData = [];
	$index = 0;
	while ($data = mysqli_fetch_array($pro)) {
		$myData[$index]['nama_bengkel'] = $data['nm_bengkel'];
		$myData[$index]['alamat'] = $data['alamat'];
		$myData[$index]['telepon'] = $data['no_telp'];
		$myData[$index]['keterangan'] = $data['keterangan'];
		$myData[$index]['foto'] = $data['foto'];
		$myData[$index]['latitude'] = $data['lat'];
		$myData[$index]['longitude'] = $data['lng'];
		$index++;
	}

	$return = json_encode($myData);

	echo $return;
?>

