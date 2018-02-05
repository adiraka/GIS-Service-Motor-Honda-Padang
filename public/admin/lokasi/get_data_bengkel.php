<?php  
	
	$bengkel_id = $_POST["bengkel_id"];

	include "../../../incl/connection.php";	

	$sql = "SELECT * FROM tb_bengkel WHERE id = '$bengkel_id'";
	$pro = mysqli_query($conn, $sql);
	$dat = mysqli_fetch_assoc($pro);

	$return = json_encode($dat);

	echo $return;
?>