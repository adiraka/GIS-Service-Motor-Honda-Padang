<?php
    session_start();

    if (isset($_SESSION["username"])) {
        
    } else {
        session_unset();
        session_destroy();
        header("Location:../../login.php");
    }

    include "../../incl/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Selamat Datang</title>

	<link rel="stylesheet" type="text/css" href="../../assets/vendors/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/vendors/datatables/datatables.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
</head>
<body>
	
	<div class="container">
		<?php include 'partials/header.php'; ?>
		<div class="row" style="padding-top: 10px;"">
			<div class="col-md-12">
				<?php 

					if (isset($_SESSION["flash"]) && isset($_SESSION["message"])) {
						
						$flash = $_SESSION["flash"];
						$message = $_SESSION["message"];

						if ($flash == 'sukses') {
							
							echo '
							<div class="alert alert-success">
							<strong>SUKSES!</strong> '. $message .'
							</div>
							';

							$_SESSION["flash"] = NULL;
							$_SESSION["message"] = NULL;

						} elseif ($flash == 'gagal') {
							
							echo '
							<div class="alert alert-danger">
							<strong>GAGAL!</strong> '. $message .'
							</div>
							';

							$_SESSION["flash"] = NULL;
							$_SESSION["message"] = NULL;

						}
						
					}

				?>
			</div>
		</div>
		<div class="row justify-content-center" style="padding-top: 10px;">
			<?php 
				if (isset($_GET['page'])) {
					
					$page = $_GET["page"];
                    
                    if ($page == 'home') {
                        include "home.php";
                    } elseif ($page == 'data-kecamatan') {
                    	include "kecamatan/main.php";
                    } elseif ($page == 'ubah-kecamatan') {
                    	include "kecamatan/ubah_kecamatan.php";
                    } elseif ($page == 'hapus-kecamatan') {
                    	include "kecamatan/hapus_kecamatan.php";
                    } elseif ($page == 'data-kelurahan') {
                    	include "kelurahan/main.php";
                    } elseif ($page == 'ubah-kelurahan') {
                    	include "kelurahan/ubah_kelurahan.php";
                    } elseif ($page == 'hapus-kelurahan') {
                    	include "kelurahan/hapus_kelurahan.php";
                    } elseif ($page == 'data-bengkel') {
                    	include "bengkel/main.php";
                    } elseif ($page == 'ubah-bengkel') {
                    	include "bengkel/ubah_bengkel.php";
                    } elseif ($page == 'hapus-bengkel') {
                    	include "bengkel/hapus_bengkel.php";
                    } elseif ($page == 'data-lokasi') {
                    	include "lokasi/main.php";
                    } elseif ($page == 'ubah-lokasi') {
                    	include "lokasi/ubah_lokasi.php";
                    } elseif ($page == 'hapus-lokasi') {
                    	include "lokasi/hapus_bengkel.php";
                    }

				}
			?>
		</div>
	</div>

	<?php include 'partials/footer.php'; ?>

	<script src="../../assets/vendors/jquery/jquery.min.js"></script>
    <script src="../../assets/vendors/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/vendors/datatables/datatables.min.js"></script>
    <script src="../../assets/js/app.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvbr9LgPDtHcrZ0tffOHDRPxcSx2B_PSI&callback=initMap"></script>
</body>
</html>