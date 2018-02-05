<div class="col-md-4">
	<div class="card">
		<p class="card-header text-center"><strong>UBAH DATA KECAMATAN</strong></p>
		<div class="card-body">
			<form action="kecamatan/ubah_kecamatan_proses.php" method="POST">
				<?php  
					$id = $_GET["id"];
					$sql = "SELECT * FROM tb_kec WHERE id = '$id'";
					$pro = mysqli_query($conn, $sql);
					$dat = mysqli_fetch_assoc($pro);
				?>
				<input type="hidden" name="id" value="<?php echo $dat["id"] ?>">
				<div class="form-group">
					<label for="nama_kecamatan">Nama Kecamatan :</label>
					<input type="text" name="nama_kecamatan" id="nama_kecamatan" class="form-control" value="<?php echo $dat["nm_kec"] ?>">
				</div>
				<hr>
				<div class="form-group">
					<button type="submit" class="btn btn-block btn-secondary">UBAH KECAMATAN</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-md-8"></div>