<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="card-title">&nbsp;&nbsp;<?php echo $ujian->ujian_nama?> | Kelas <?php echo $ujian->ujian_tingkat?> | <?php echo $ujian->mapel_nama?> | <?php echo kelompok($ujian->mapel_kelompok) ?> | <font color="red"> Soal nomor : <?php echo $jum_soal + 1; ?> </font>
				</div>
			</div>
			<div class="card-body">
				<form action="<?php echo base_url('index.php/admin/ujian_con/soal_add') ?>" method="POST">
					<div class="form-group">
						<!-- <label>Kompetensi Dasar</label> -->
						<select name="soal_kd_id" class="form-control" id="addKD" required="flags">
							<option value="">Pilih KD ...</option>
							<?php 
								foreach ($kompetensi as $value) {
							?>
							<option value="<?php echo $value['kd_id'] ?>"><?php echo $value['kd_nomor'].' - '.$value['kd_teks'] ?></option>
							<?php 
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<div>
							<!-- <label>Teks Soal</label> -->
							<textarea name="soal_teks" id="summernote" name="soal_teks"></textarea>
						</div>
					</div>
					<div class="row form-group">
					
					<div class="form-group col-md-1">
						<label for="nama_sekolah">Kunci</label>
						<div class="select2-input">
						<select id="basic" class="form-control" name="soal_kunci" required="flag">
							<option value="">Pilih...</option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="D">D</option>
							<option value="E">E</option>
						</select>
						</div>
					</div>
					<div class="form-group col-md-0">&nbsp;
					</div>
					
					<div class="form-group col-md-1">
						<label for="nama_sekolah">Skor</label>
						<input type="text" class="form-control" name="soal_skor" required="flag" value="2"  required="flags">
					</div>

					<div class="form-group col-md-0">&nbsp;
					</div>
					<div class="form-group col-md-1">
						<label for="nama_sekolah">Total</label>
						<input type="text" class="form-control" name="total_skor" value="<?php echo $total->total_skor; ?> " readonly="flags">
					</div>
					</div>

				<div class="form-group">
					<input type="hidden" name="soal_ujian_id" value="<?php echo $ujian->ujian_id; ?>">
					<input type="hidden" name="soal_mapel_id" value="<?php echo $ujian->mapel_id; ?>">
					<input type="submit" name="submit" value="Simpan" class="btn btn-primary" >
					 &nbsp;&nbsp;&nbsp;
					<a href="<?php echo base_url('index.php/admin/ujian_con/ujian')?>" class="btn btn-danger"><i class="fas fa-door-open"></i> Selesai</a>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
