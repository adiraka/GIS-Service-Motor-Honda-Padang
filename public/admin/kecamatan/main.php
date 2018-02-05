<div class="col-md-4">
	<div class="card">
		<p class="card-header text-center"><strong>TAMBAH DATA KECAMATAN</strong></p>
		<div class="card-body">
			<form action="kecamatan/tambah_kecamatan_proses.php" method="POST">
				<div class="form-group">
					<label for="nama_kecamatan">Nama Kecamatan :</label>
					<input type="text" name="nama_kecamatan" id="nama_kecamatan" class="form-control">
				</div>
				<hr>
				<div class="form-group">
					<button type="submit" class="btn btn-block btn-secondary">TAMBAH KECAMATAN</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-md-8">
	<div class="card">
		<p class="card-header text-center"><strong>TABEL DATA KECAMATAN</strong></p>
		<div class="card-body">
			<table class="table table-bordered display responsive nowrap" id="tb-kecamatan">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama Kecamatan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php  

						$sql = "SELECT * FROM tb_kec";
						$pro = mysqli_query($conn, $sql);

						while ($dat = mysqli_fetch_array($pro)) {
							
							echo "
								<tr>
									<td>".$dat['id']."</td>
									<td>".$dat['nm_kec']."</td>
									<td>
										<a href='?page=ubah-kecamatan&id=".$dat['id']."' class='btn btn-success btn-sm'>UBAH</a>
										<a href='?page=hapus-kecamatan&id=".$dat['id']."' class='btn btn-danger btn-sm'>HAPUS</a>
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