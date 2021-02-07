<!-- awal kotak info atas -->
<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<form action="<?php echo base_url('index.php/admin/laporan_con/laporan_lembarjawab')?>" method="POST" enctype="multipart/form-data" target="_blank">
				<div class="form-group">
					<label for="tingkat">Pilih Ujian</label>
					<div class="select2-input col-md-7">
					<select id="ujian_id" class="form-control" name="ujian_id" required="flags">
						<option value="">Pilih...</option>
						<?php 
						foreach ($ujian as $key) { ?>
						<option value="<?php echo $key['ujian_id']; ?>"><?php echo $key['ujian_nama'].' | Kls. '.$key['ujian_tingkat'].' | '.$key['mapel_nama'].' | '.tanggal($key['ujian_tanggal']); ?></option>
						<?php } ?>
					</select>
					</div>
				</div>

				<div class="form-group">
					<label for="tingkat">Pilih Kelas</label>
					<div class="select2-input col-md-2">
					<select id="kelas" class="form-control" name="peserta_kelas" required="flags">
						<option value="">Pilih...</option>
					</select>
					</div>
				</div>

				<div class="form-group">
					<input type="submit" name="tampil" value="Tampil" class="btn btn-danger">
				</div>
			</form>
		</div>
	</div>
</div>						
