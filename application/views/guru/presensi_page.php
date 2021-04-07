<!-- awal kotak info atas -->
<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<form action="<?php echo base_url('index.php/admin/laporan_con/laporan_presensi')?>" method="POST" enctype="multipart/form-data"  target="_blank">
				<div class="form-group col-md-3">
					<label>Tanggal</label>
					<div class="input-group">
						<input type="text" class="form-control" id="datepicker" name="ujian_tanggal" required="flag">
						<div class="input-group-append">
							<span class="input-group-text">
								<i class="fa fa-calendar-check"></i>
							</span>
						</div>
					</div>
				</div>

				<div class="form-group col-md-3">
					<label>Tingkat Kelas</label>
						<div class="input-group">
							<select id="ujian_tingkat" class="form-control" name="peserta_kelas_tingkat" required="flags">
						<option value="">Pilih...</option>
						<?php 
						foreach ($tingkat as $key) { ?>
						<option value="<?php echo $key['peserta_kelas_tingkat']; ?>"><?php echo $key['peserta_kelas_tingkat']; ?></option>
						<?php } ?>
					</select>
						</div>
				</div>

				<div class="form-group col-md-3">
					<label>Mulai Pukul</label>
						<div class="input-group">
							<select id="ujian_id" class="form-control" name="ujian_mulai" required="flags">
						<option value="">Pilih...</option>
						<?php 
						foreach ($mulai as $key) { ?>
						<option value="<?php echo $key['ujian_mulai']; ?>"><?php echo $key['ujian_mulai']; ?></option>
						<?php } ?>
					</select>
						</div>
				</div>

				<div class="form-group col-md-3">
					<label>Status</label>
						<div class="input-group">
							<select id="basic" class="form-control" name="status" required="flags">
						<option value="">Pilih...</option>
						<option value="MENGIKUTI">MENGIKUTI</option>
						<option value="TIDAK MENGIKUTI">TIDAK MENGIKUTI</option>
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

				
