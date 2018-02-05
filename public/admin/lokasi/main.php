<div class="col-md-4">
	<div class="card">
		<p class="card-header text-center"><strong>TAMBAH DATA LOKASI BENGKEL</strong></p>
		<div class="card-body">
			<form action="lokasi/tambah_lokasi_proses.php" method="POST">
				<div class="form-group">
					<label for="bengkel_id">Pilih Bengkel :</label>
					<select name="bengkel_id" id="bengkel_id" class="form-control">
						<option value=""></option>
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
					<input type="text" name="alamat_bengkel" id="alamat_bengkel" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="telepon_bengkel">Telepon Bengkel :</label>
					<input type="text" name="telepon_bengkel" id="telepon_bengkel" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label for="kecamatan_id">Pilih Kecamatan :</label>
					<select name="kecamatan_id" id="kecamatan_id" class="form-control">
						<option value=""></option>
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
						
					</select>
				</div>
				<div class="form-group">
					<label for="latitude">Latitude :</label>
					<input type="text" name="latitude" id="latitude" class="form-control">
				</div>
				<div class="form-group">
					<label for="longitude">Longitude :</label>
					<input type="text" name="longitude" id="longitude" class="form-control">
				</div>
				<hr>
				<div class="form-group">
					<button type="submit" class="btn btn-block btn-secondary">TAMBAH LOKASI BENGKEL</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-md-8">
	<div class="card">
		<p class="card-header text-center"><strong>TABEL DATA LOKASI BENGKEL</strong></p>
		<div class="card-body">
			<table class="table table-bordered display responsive nowrap" id="tb-kelurahan">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama Bengkel</th>
						<th>Alamat</th>
						<th>Kecamatan</th>
						<th>Kelurahan</th>
						<th>Telepon</th>
						<th>Latitude</th>
						<th>Longitude</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php  

						$sql3 = "
							SELECT tb_lokasi.id, tb_bengkel.nm_bengkel, tb_bengkel.alamat, tb_kec.nm_kec, tb_kel.nm_kel, tb_bengkel.no_telp, tb_lokasi.lat, tb_lokasi.lng
							FROM tb_lokasi, tb_bengkel, tb_kel, tb_kec
							WHERE tb_lokasi.id_bengkel = tb_bengkel.id AND tb_lokasi.id_kel = tb_kel.id
							AND tb_kel.id_kec = tb_kec.id
						";
						$pro3 = mysqli_query($conn, $sql3);

						while ($dat3 = mysqli_fetch_array($pro3)) {
							echo "
								<tr>
									<td>".$dat3['id']."</td>
									<td>".$dat3['nm_bengkel']."</td>
									<td>".$dat3['alamat']."</td>
									<td>".$dat3['nm_kec']."</td>
									<td>".$dat3['nm_kel']."</td>
									<td>".$dat3['no_telp']."</td>
									<td>".$dat3['lat']."</td>
									<td>".$dat3['lng']."</td>
									<td>
										<a href='?page=hapus-lokasi&id=".$dat3['id']."' class='btn btn-danger btn-sm'>HAPUS</a>
									</td>
								</tr>
							";
						}

					?>
				</tbody>
			</table>
		</div>
	</div>
</div>