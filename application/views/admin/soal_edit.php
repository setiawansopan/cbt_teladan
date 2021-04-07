<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="card-title">&nbsp;&nbsp;<?php echo $ujian->ujian_nama?> | Kelas <?php echo $ujian->ujian_tingkat?> | <?php echo $ujian->mapel_nama?> | <?php echo kelompok($ujian->mapel_kelompok) ?> | <font color="red"> Soal nomor : <?php echo $nomor; ?></font>
				</div>
			</div>
			<div class="card-body">
				<form action="<?php echo base_url('index.php/admin/ujian_con/soal_update') ?>?ujian_id=<?php echo $ujian->ujian_id;?>&soal_id=<?php echo $soal->soal_id; ?>&n=<?php echo $nomor; ?>" method="POST">

							
					<div class="form-group">
							<!-- <label>Kompetensi Dasar</label> -->
							<select name="soal_kd_id" class="form-control col-md-11" id="addKD" required="flags">
								<option value="">Pilih KD ...</option>
								<?php 
									foreach ($kompetensi as $value) {
								?>
								<option value="<?php echo $value['kd_id'];?>" <?php if($value['kd_id'] == $soal->soal_kd_id) echo 'selected';?>><?php echo $value['kd_nomor'].' - '.$value['kd_teks'] ?></option>
								<?php 
									}
								?>
							</select>
					</div>

					<div class="form-group">
						<div>
							<textarea name="soal_teks" id="summernote" name="soal_teks"><?php echo $soal->soal_teks; ?></textarea>
						</div>
					</div>
					<div class="row form-group">
					
					<div class="form-group col-md-1">
						<label for="nama_sekolah">Kunci</label>
						<div class="select2-input">
						<select id="basic" class="form-control" name="soal_kunci" required="flag">
							<option value="">Pilih...</option>
							<option value="A" <?php if($soal->soal_kunci == 'A') echo 'selected';?>>A</option>
							<option value="B" <?php if($soal->soal_kunci == 'B') echo 'selected';?>>B</option>
							<option value="C" <?php if($soal->soal_kunci == 'C') echo 'selected';?>>C</option>
							<option value="D" <?php if($soal->soal_kunci == 'D') echo 'selected';?>>D</option>
							<option value="E" <?php if($soal->soal_kunci == 'E') echo 'selected';?>>E</option>
						</select>
						</div>
					</div>
					<div class="form-group col-md-0">&nbsp;
					</div>
					<div class="form-group col-md-1">
						<label for="nama_sekolah">Skor</label>
						<input type="text" class="form-control" name="soal_skor" required="flag" value="<?php echo $soal->soal_skor ?>">
					</div>
					<div class="form-group col-md-0">&nbsp;
					</div>				
					
					<div class="form-group col-md-1">
						<label for="nama_sekolah">Total</label>
						<input type="text" class="form-control" name="total_skor" value="<?php echo $total->total_skor; ?> " readonly="flags">
					</div>
					
					</div>

				</div>
				<div class="form-group">
					<input type="hidden" name="soal_ujian_id" value="<?php echo $ujian->ujian_id; ?>">
					<input type="hidden" name="soal_mapel_id" value="<?php echo $ujian->mapel_id; ?>">
					<input type="submit" name="submit" value="Update" class="btn btn-primary" >
					 &nbsp;&nbsp;&nbsp;
					<a href="<?php echo base_url('index.php/admin/ujian_con/soal_preview')?>?ujian_id=<?php echo $ujian->ujian_id;?>&soal_id=<?php echo $soal->soal_id; ?>&n=<?php echo $nomor; ?>" class="btn btn-danger"><i class="fas fa-reply-all"></i>&nbsp;Batal</a>
				</div>
			</form>
			</div>
		</div>
	</div>


