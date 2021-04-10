<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<form action="<?php echo base_url('index.php/guru/ujian/ujian_add')?>" method="POST" class="form">
				<div class="form-group col-md-8">
					<label for="nama_ujian">Nama Ujian</label>
					<input type="text" class="form-control" id="nama_ujian" name="ujian_nama" required="flag" >
				</div>
				<div class="form-group col-md-8">
					<label for="nama_mapel">Mata Pelajaran</label>
					<div class="select2-input">
					<select id="ujian_mapel_id" class="form-control" name="ujian_mapel_id" required="flag">
						<option value="">Pilih...</option>
						<?php
						foreach ($mapel as $value) {
						?>
						<option value="<?php echo $value['mapel_id']?>">Kelompok <?php echo $value['mapel_kelompok'].' - '.$value['mapel_nama']?></option>
						<?php } ?>
					</select>
					</div>
				</div>
				<div class="form-group col-md-4">
					<label for="tingkat">Tingkat Kelas</label>
					<select id="ujian_tingkat" class="form-control" name="ujian_tingkat" required="flag">
						<option value="">Pilih...</option>
						<option value="X">Kelas X</option>
						<option value="XI">Kelas XI</option>
						<option value="XII">Kelas XII</option>
					</select>
				</div>
				<div class="form-group col-md-4">
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
				<div class="form-group col-md-4">
					<label>Mulai Pukul</label>
						<div class="input-group">
							<input type="text" class="form-control" id="timepicker" name="ujian_mulai" required="flag">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="fa fa-clock"></i>
								</span>
							</div>
						</div>
				</div>
				<div class="form-group col-md-4">
					<label for="nama_sekolah">Durasi</label>
					<div class="select2-input">
					<select id="ujian_durasi" class="form-control" name="ujian_durasi" required="flag">
						<option value="">Pilih...</option>
						<option value="30">30 Menit</option>
						<option value="45">45 Menit</option>
						<option value="60">60 Menit</option>
						<option value="90">90 Menit</option>
						<option value="120">120 Menit</option>
					</select>
					</div>
				</div>
				<div class="form-group col-md-4">
					<label for="jenis_penilaian">Jenis Penilaian</label>
					<div class="select2-input">
					<select id="ujian_jenis" class="form-control" name="ujian_jenis" required="flag">
						<option value="">Pilih...</option>
						<option value="U">Utama</option>
						<option value="S">Susulan</option>
						<option value="R">Remidi</option>
					</select>
					</div>
				</div>
				<br>
				<div class="form-group col-md-3">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="ujian_hasil" name="ujian_hasil" value="1" >
						<label class="custom-control-label" for="ujian_hasil">
							Tampilkan hasil sesaat setelah penilaian berakhir.
						</label>
					</div>
				</div>
				<div class="form-group col-md-3">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="ujian_pinalti" name="ujian_pinalti" value="1" >
						<label class="custom-control-label" for="ujian_pinalti">
							Terapkan pengurangan durasi ujian untuk peserta terlambat.
						</label>
					</div>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" value="Simpan" class="btn btn-danger" >
				</div>
				</form>
			</div>
		</div>
	</div>

</div>