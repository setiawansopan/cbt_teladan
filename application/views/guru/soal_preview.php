<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="card-title">&nbsp;&nbsp;<?php echo $ujian->ujian_nama?> | Kelas <?php echo $ujian->ujian_tingkat?> | <?php echo $ujian->mapel_nama?> | <?php echo kelompok($ujian->mapel_kelompok) ?>
				</div>
			</div>
			<div class="card-body">
				<div class="form-group">
					<div class="card-title">Soal nomor : <?php echo $nomor; ?></div>
				</div>
				
				<div class="form-group">
					<label>Kompetensi Dasar</label>
					<?php if(!empty($kompetensi->kd_nomor)) { ?>
					<p><?php echo $kompetensi->kd_nomor.' - '.$kompetensi->kd_teks; ?></p>
					<?php } else echo "<p>Kompetensi belum terpilih.</p>" ?>
				</div>
				<div class="form-group">
					<label>Teks Soal</label>
					<?php
					echo $soal->soal_teks;
					?>
				</div>
				<br><br><br>
				<div class="row">
					<div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;</div>
					<div class="form-group col-md-1">
						<label for="nama_sekolah">Kunci Jawaban</label>
						<div class="select2-input">
						<select id="basic" class="form-control" name="soal_kunci" disabled="flag">
							<option value="">Pilih...</option>
							<option value="A" <?php if($soal->soal_kunci == 'A') echo 'selected';?>>A</option>
							<option value="B" <?php if($soal->soal_kunci == 'B') echo 'selected';?>>B</option>
							<option value="C" <?php if($soal->soal_kunci == 'C') echo 'selected';?>>C</option>
							<option value="D" <?php if($soal->soal_kunci == 'D') echo 'selected';?>>D</option>
							<option value="E" <?php if($soal->soal_kunci == 'E') echo 'selected';?>>E</option>
						</select>
						</div>
					</div>
					<div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;</div>
					<div class="form-group col-md-1">
						<label for="nama_sekolah">Skor per Soal</label>
						<input type="text" class="form-control" name="soal_skor" required="flag" disabled="flags" value="<?php echo $soal->soal_skor ?>" >
					</div>

					<div class="col-md-0">&nbsp;&nbsp;&nbsp;&nbsp;</div>
					<div class="form-group col-md-1">
						<label for="nama_sekolah">Total Skor</label>
						<input type="text" class="form-control" name="total_skor" value="<?php echo $total->total_skor; ?> " readonly="flags">
					</div>
					</div>

				</div>
				
				<div class="form-group">
					<div class="row">
						<div class="col-md-4">
						<?php if(!empty($prev->soal_id)) { ?>
						<a href="<?php echo base_url('index.php/admin/ujian_con/soal_preview')?>?ujian_id=<?php echo $ujian->ujian_id;?>&soal_id=<?php echo $mm->first; ?>&n=1" class="btn btn-warning"><i class="fas fa-angle-double-left"></i> First </a>
						<a href="<?php echo base_url('index.php/admin/ujian_con/soal_preview')?>?ujian_id=<?php echo $ujian->ujian_id;?>&soal_id=<?php echo $prev->soal_id; ?>&n=<?php echo $nomor-1; ?>" class="btn btn-warning" > <i class="fas fa-angle-left"></i> Prev </a>
						<?php } ?>
						<?php if(!empty($next->soal_id)) { ?>
						<a href="<?php echo base_url('index.php/admin/ujian_con/soal_preview')?>?ujian_id=<?php echo $ujian->ujian_id;?>&soal_id=<?php echo $next->soal_id; ?>&n=<?php echo $nomor+1; ?>" class="btn btn-primary"> Next <i class="fas fa-angle-right"></i> </a>
						<a href="<?php echo base_url('index.php/admin/ujian_con/soal_preview')?>?ujian_id=<?php echo $ujian->ujian_id;?>&soal_id=<?php echo $mm->last; ?>&n=<?php echo $mm->max; ?>" class="btn btn-primary"> Last <i class="fas fa-angle-double-right"></i> </a>
						<?php } ?>
						</div>
						<div class="col-md-4">
						<a href="<?php echo base_url('index.php/admin/ujian_con/soal_edit')?>?ujian_id=<?php echo $ujian->ujian_id;?>&soal_id=<?php echo $soal->soal_id; ?>&n=<?php echo $nomor; ?>" class="btn btn-secondary"><i class="fas fa-user-edit"></i> Edit</a>
						<a href="<?php echo base_url('index.php/admin/ujian_con/soal_hapus')?>?ujian_id=<?php echo $ujian->ujian_id;?>&soal_id=<?php if(!empty($prev->soal_id)) echo $prev->soal_id; ?>&n=<?php echo $nomor-1; ?>&hapus_id=<?php echo $soal->soal_id; ?>" class="btn btn-danger" onclick="return confirm('KONFIRMASI : Hapus data..?');"><i class="fas fa-trash-alt"></i> Hapus</a>
						<a href="<?php echo base_url('index.php/admin/ujian_con/ujian')?>" class="btn btn-success"><i class="fas fa-door-open"></i> Selesai</a>
						</div>
					</div>
			</form>
			</div>
		</div>
	</div>
</div>
