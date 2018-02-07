<div class="col-md-4">
	<div class="card">
		<p class="card-header text-center"><strong>UBAH DATA LOKASI BENGKEL</strong></p>
		<div class="card-body">
			<form action="lokasi/ubah_lokasi_proses.php" method="POST">
				<?php  
					$id = $_GET['id'];

					$sql3 = "
						SELECT tb_lokasi.id, tb_bengkel.id AS bengkel_id, tb_bengkel.nm_bengkel, tb_bengkel.alamat, tb_kec.id AS kecamatan_id, tb_kec.nm_kec, tb_kel.id AS kelurahan_id, tb_kel.nm_kel, tb_bengkel.no_telp, tb_lokasi.lat, tb_lokasi.lng
						FROM tb_lokasi, tb_bengkel, tb_kel, tb_kec
						WHERE tb_lokasi.id_bengkel = tb_bengkel.id AND tb_lokasi.id_kel = tb_kel.id
						AND tb_kel.id_kec = tb_kec.id AND tb_lokasi.id = '$id'
					";

					$pro3 = mysqli_query($conn, $sql3);
					$dat3 = mysqli_fetch_assoc($pro3);
				?>
				<input type="hidden" name="id" value="<?php echo $dat3['id'] ?>">
				<div class="form-group">
					<label for="bengkel_id">Pilih Bengkel :</label>
					<select name="bengkel_id" id="bengkel_id" class="form-control">
						<option value="<?php echo $dat3['bengkel_id']; ?>"><?php echo $dat3['nm_bengkel']; ?></option>
						<?php  
							$sql = "SELECT * FROM tb_bengkel";
							$pro = mysqli_query($conn, $sql);
							while ($dat = mysqli_fetch_array($pro)) {
						?>
							<option value="<?php echo $dat['id'] ?>"><?php echo $dat['nm_bengkel'] ?></option>
						<?php
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="alamat_bengkel">Alamat Bengkel :</label>
					<input type="text" name="alamat_bengkel" id="alamat_bengkel" class="form-control" readonly value="<?php echo $dat3['alamat'] ?>">
				</div>
				<div class="form-group">
					<label for="telepon_bengkel">Telepon Bengkel :</label>
					<input type="text" name="telepon_bengkel" id="telepon_bengkel" class="form-control" readonly value="<?php echo $dat3['no_telp'] ?>">
				</div>
				<div class="form-group">
					<label for="kecamatan_id">Pilih Kecamatan :</label>
					<select name="kecamatan_id" id="kecamatan_id" class="form-control">
						<option value="<?php echo $dat3['kecamatan_id']; ?>"><?php echo $dat3['nm_kec']; ?></option>
						<?php  
							$sql2 = "SELECT * FROM tb_kec";
							$pro2 = mysqli_query($conn, $sql2);
							while ($dat2 = mysqli_fetch_array($pro2)) {
						?>
							<option value="<?php echo $dat2['id'] ?>"><?php echo $dat2['nm_kec'] ?></option>
						<?php
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="kelurahan_id">Pilih Kelurahan :</label>
					<select name="kelurahan_id" id="kelurahan_id" class="form-control">
						<option value="<?php echo $dat3['kelurahan_id']; ?>"><?php echo $dat3['nm_kel']; ?></option>
					</select>
				</div>
				<div class="form-group">
					<label for="latitude">Latitude :</label>
					<input type="text" name="latitude" id="latitude" class="form-control" value="<?php echo $dat3['lat'] ?>">
				</div>
				<div class="form-group">
					<label for="longitude">Longitude :</label>
					<input type="text" name="longitude" id="longitude" class="form-control" value="<?php echo $dat3['lng'] ?>">
				</div>
				<hr>
				<div class="form-group">
					<button type="submit" class="btn btn-secondary">UBAH LOKASI BENGKEL</button>
					<button type="reset" class="btn btn-secondary">RESET</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-md-8"></div>