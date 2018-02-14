<div class="col-md-4">
	<div class="card">
		<p class="card-header text-center"><strong>TAMBAH DATA BENGKEL</strong></p>
		<div class="card-body">
			<form action="bengkel/tambah_bengkel_proses.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nama_bengkel">Nama Bengkel :</label>
					<input type="text" name="nama_bengkel" id="nama_bengkel" class="form-control">
				</div>
				<div class="form-group">
					<label for="alamat_bengkel">Alamat Bengkel :</label>
					<input type="text" name="alamat_bengkel" id="alamat_bengkel" class="form-control">
				</div>
				<div class="form-group">
					<label for="telepon_bengkel">Telepon Bengkel :</label>
					<input type="text" name="telepon_bengkel" id="telepon_bengkel" class="form-control">
				</div>
				<div class="form-group">
					<label for="keterangan">Keterangan :</label>
					<input type="text" name="keterangan" id="keterangan" class="form-control">
				</div>
				<div class="form-group">
					<label for="foto">Upload Foto :</label>
					<input type="file" name="foto" id="foto" class="form-control">
				</div>
				<hr>
				<div class="form-group">
					<button type="submit" class="btn btn-block btn-secondary">TAMBAH BENGKEL</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-md-8">
	<div class="card">
		<p class="card-header text-center"><strong>TABEL DATA BENGKEL</strong></p>
		<div class="card-body">
			<table class="table table-bordered display responsive nowrap" id="tb-kelurahan">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama Bengkel</th>
						<th>Alamat</th>
						<th>Telepon</th>
						<th>Keterangan</th>
						<th>Foto</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php  

						$sql2 = "SELECT * FROM tb_bengkel";
						$pro = mysqli_query($conn, $sql2);

						while ($dat = mysqli_fetch_array($pro)) {
							
							echo "
								<tr>
									<td>".$dat['id']."</td>
									<td>".$dat['nm_bengkel']."</td>
									<td>".$dat['alamat']."</td>
									<td>".$dat['no_telp']."</td>
									<td>".$dat['keterangan']."</td>
									<td><img src='../../assets/foto/".$dat['foto']."' height='70px' width='70px'></td>
									<td>
										<a href='?page=ubah-bengkel&id=".$dat['id']."' class='btn btn-success btn-sm'>UBAH</a>
										<a href='?page=hapus-bengkel&id=".$dat['id']."' class='btn btn-danger btn-sm'>HAPUS</a>
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