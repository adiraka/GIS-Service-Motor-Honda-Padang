<div class="col-md-4">
	<div class="card">
		<p class="card-header text-center"><strong>UBAH DATA KELURAHAN</strong></p>
		<div class="card-body">
			<form action="kelurahan/ubah_kelurahan_proses.php" method="POST">
				<?php 
					$id = $_GET['id'];
					$sql = "
						SELECT tb_kel.id, tb_kel.nm_kel, tb_kel.id_kec, tb_kec.nm_kec
						FROM tb_kel, tb_kec
						WHERE tb_kel.id_kec = tb_kec.id
						AND tb_kel.id = '$id'
					";
					$pro = mysqli_query($conn, $sql);
					$dat = mysqli_fetch_array($pro);
				?>
				<input type="hidden" name="id" value="<?php echo $dat['id']; ?>">
				<div class="form-group">
					<label for="kecamatan_id">Pilih Kecamatan :</label>
					<select name="kecamatan_id" id="kecamatan_id" class="form-control">
						<option value="<?php echo $dat['id_kec']; ?>"><?php echo $dat['nm_kec']; ?></option>
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
					<input type="text" name="nama_kelurahan" id="nama_kelurahan" class="form-control" value="<?php echo $dat['nm_kel']; ?>">
				</div>
				<hr>
				<div class="form-group">
					<button type="submit" class="btn btn-block btn-secondary">UBAH KELURAHAN</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-md-8"></div>