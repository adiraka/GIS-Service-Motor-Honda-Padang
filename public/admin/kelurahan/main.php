<div class="col-md-4">
	<div class="card">
		<p class="card-header text-center"><strong>TAMBAH DATA KELURAHAN</strong></p>
		<div class="card-body">
			<form action="kelurahan/tambah_kelurahan_proses.php" method="POST">
				<div class="form-group">
					<label for="kecamatan_id">Pilih Kecamatan :</label>
					<select name="kecamatan_id" id="kecamatan_id" class="form-control">
						<option value=""></option>
						<?php 
							$sql2 = "SELECT * FROM tb_kec";
							$pros = mysqli_query($conn, $sql2);
							while ($data = mysqli_fetch_array($pros)) {
								echo "
									<option value='".$data['id']."'>".$data['nm_kec']."</option>
								";
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="nama_kelurahan">Nama Kelurahan :</label>
					<input type="text" name="nama_kelurahan" id="nama_kelurahan" class="form-control">
				</div>
				<hr>
				<div class="form-group">
					<button type="submit" class="btn btn-block btn-secondary">TAMBAH KELURAHAN</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-md-8">
	<div class="card">
		<p class="card-header text-center"><strong>TABEL DATA KELURAHAN</strong></p>
		<div class="card-body">
			<table class="table table-bordered display responsive nowrap" id="tb-kelurahan">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama Kecamatan</th>
						<th>Nama Kelurahan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php  

						$sql2 = "
							SELECT tb_kel.id, tb_kel.nm_kel, tb_kel.id_kec, tb_kec.nm_kec
							FROM tb_kel, tb_kec
							WHERE tb_kel.id_kec = tb_kec.id
						";
						$pro = mysqli_query($conn, $sql2);

						while ($dat = mysqli_fetch_array($pro)) {
							
							echo "
								<tr>
									<td>".$dat['id']."</td>
									<td>".$dat['nm_kec']."</td>
									<td>".$dat['nm_kel']."</td>
									<td>
										<a href='?page=ubah-kelurahan&id=".$dat['id']."' class='btn btn-success btn-sm'>UBAH</a>
										<a href='?page=hapus-kelurahan&id=".$dat['id']."' class='btn btn-danger btn-sm'>HAPUS</a>
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