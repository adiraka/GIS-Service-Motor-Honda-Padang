<?php  
	
	$kecamatan_id = $_POST["kecamatan_id"];

	include "../../../incl/connection.php";	

	$sql = "SELECT * FROM tb_kel WHERE id_kec = '$kecamatan_id'";
	$pro = mysqli_query($conn, $sql);

	echo "<option value=''>Pilih Kelurahan</option>";
	while($dat = mysqli_fetch_array($pro)) {
		echo "
			<option value='".$dat['id']."'>".$dat['nm_kel']."</option>
		";
	}

?>