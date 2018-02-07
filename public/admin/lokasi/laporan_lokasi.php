<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Laporan Lokasi Bengkel</title>
	<link rel="stylesheet" href="../../../assets/vendors/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
	<style>
		.laporan-title {
			margin-top: 20px;
			font-weight: bold;
			text-align: center;
			font-size: 15pt;
		}
		p {
			font-size: 12pt;
		}
		hr {
			border-top: 1px solid #000;
		}
		th {
			text-align: center;
			vertical-align: middle;
		}
	</style>
</head>
<body>
	
	<div class="container">
		<p class="laporan-title">Laporan Lokasi Bengkel Resmi Honda</p>
		<p class="text-right">Tanggal : <?php echo date("d M Y"); ?></p>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Kecamatan</th>
					<th>Kelurahan</th>
					<th>Telepon</th>
					<th>Latitude</th>
					<th>Longitude</th>
				</tr>
			</thead>
			<tbody>
				<?php  

				include '../../../incl/connection.php';

				$sql3 = "
					SELECT tb_lokasi.id, tb_bengkel.nm_bengkel, tb_bengkel.alamat, tb_kec.nm_kec, tb_kel.nm_kel, tb_bengkel.no_telp, tb_lokasi.lat, tb_lokasi.lng
					FROM tb_lokasi, tb_bengkel, tb_kel, tb_kec
					WHERE tb_lokasi.id_bengkel = tb_bengkel.id AND tb_lokasi.id_kel = tb_kel.id
					AND tb_kel.id_kec = tb_kec.id
				";
				$pro3 = mysqli_query($conn, $sql3);

				$no = 1;
				while ($dat3 = mysqli_fetch_array($pro3)) {
					echo "
						<tr>
							<td class='text-center'>".$no."</td>
							<td>".$dat3['nm_bengkel']."</td>
							<td>".$dat3['alamat']."</td>
							<td class='text-center'>".$dat3['nm_kec']."</td>
							<td class='text-center'>".$dat3['nm_kel']."</td>
							<td class='text-center'>".$dat3['no_telp']."</td>
							<td class='text-center'>".$dat3['lat']."</td>
							<td class='text-center'>".$dat3['lng']."</td>
						</tr>
					";
					$no++;
				}

				?>
			</tbody>
		</table>
	</div>
	
	<script src="../../../assets/vendors/jquery/jquery.min.js"></script>
    <script src="../../../assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script>
    	$(function() {
    		window.print();
    	});
    </script>
</body>
</html>