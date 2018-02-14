<div class="col-md-4">
	<div class="card">
		<p class="card-header text-center"><strong>UBAH DATA BENGKEL</strong></p>
		<div class="card-body">
			<form action="bengkel/ubah_bengkel_proses.php" method="POST">
				<?php  
					$id = $_GET["id"];
					$sql = "SELECT * FROM tb_bengkel WHERE id = '$id'";
					$pro = mysqli_query($conn, $sql);
					$dat = mysqli_fetch_assoc($pro);
				?>
				<input type="hidden" name="id" value="<?php echo $dat['id'] ?>">
				<div class="form-group">
					<label for="nama_bengkel">Nama Bengkel :</label>
					<input type="text" name="nama_bengkel" id="nama_bengkel" class="form-control" value="<?php echo $dat['nm_bengkel'] ?>">
				</div>
				<div class="form-group">
					<label for="alamat_bengkel">Alamat Bengkel :</label>
					<input type="text" name="alamat_bengkel" id="alamat_bengkel" class="form-control" value="<?php echo $dat['alamat'] ?>">
				</div>
				<div class="form-group">
					<label for="telepon_bengkel">Telepon Bengkel :</label>
					<input type="text" name="telepon_bengkel" id="telepon_bengkel" class="form-control" value="<?php echo $dat['no_telp'] ?>">
				</div>
				<div class="form-group">
					<label for="keterangan">Keterangan :</label>
					<input type="text" name="keterangan" id="keterangan" class="form-control" value="<?php echo $dat['keterangan'] ?>">
				</div>
				<!-- <div class="form-group">
					<label for="foto">Upload Foto :</label>
					<input type="file" name="foto" id="foto" class="form-control">
				</div> -->
				<hr>
				<div class="form-group">
					<button type="submit" class="btn btn-block btn-secondary">UBAH BENGKEL</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-md-8"></div>