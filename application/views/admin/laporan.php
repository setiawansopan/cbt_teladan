
<!-- awal kotak info atas -->
<div class="card">

	<div class="card-body">
		<div class="table-responsive">
			<form action="<?php echo base_url('index.php/admin/laporan_con/laporan')?>" method="POST" enctype="multipart/form-data">
				<div class="form-group  col-md-6">
					<label for="tingkat">Pilih Ujian</label>
					<div class="select2-input">
					<select id="basic" class="form-control" name="ujian_id" onchange="this.form.submit()" >
						<option value="">Pilih...</option>
						<?php 
						foreach ($ujian as $key) { ?>
						<option value="<?php echo $key['ujian_id']; ?>"><?php echo $key['ujian_nama'].' | Kls. '.$key['ujian_tingkat'].' | '.$key['mapel_nama'].' | '.tanggal($key['ujian_tanggal']); ?></option>
						<?php } ?>
					</select>
					</div>
				</div>
			</form>

			<br>
			<table id="add-row" class="display table table-sm table-striped table-hover table-head-bg-*states" >
				<thead style="background-color: #162447;">
					<tr>
						<th style="width: 3%;"><font color="#ffffff">No</th>
						<th style="width: 20%"><font color="#ffffff">Nama</th>
						<th style="width: 10%"><font color="#ffffff">Kelas</th>
						<th style="width: 15%"><font color="#ffffff">Mapel</th>
						<th style="width: 5%"><font color="#ffffff">Skor</th>
						<th style="width: 5%"><font color="#ffffff">Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php 
					if(!empty($laporan)) {
					$no = 1;
					foreach ($laporan as $value) { ?>

					<tr>
						<td align="center"><?php echo $no ?></td>
						<td><?php echo strtoupper($value['peserta_nama']); ?></td>
						<td align="center"><?php echo $value['peserta_kelas']; ?></td>
						<td><?php echo $value['mapel_nama'];?></td>			
						<td align="center"><?php echo $value['nilai'] ?>/<?php echo $value['max_skor'] ?></td>
						<td align="center">
							<button class="btn btn-danger btn-border dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi &nbsp;</button>
								<div class="dropdown-menu">
									<?php $title = $value['peserta_nama']; ?>
									<a class="dropdown-item" 
									href="<?php echo base_url('index.php/admin/laporan_con/laporan_individu')?>?peserta_id=<?php echo $value['peserta_id']?>&ujian_id=<?php echo $value['pj_ujian_id']; ?>&mapel_id=<?php echo $value['mapel_id']?>" 
									title="<?php echo $title; ?>" target="_blank">Lihat Hasil</a>
							</div>
						</td>
					</tr>
					<?php $no++; } } ?>
				</tbody>
			</table>
		</div>
		<?php 
		if(!empty($laporan)) { ?>
		<br><hr><br>

		<div class="row float-right">
		<div class="col-md-6 float-right">
		<button class="btn btn-danger btn-border dropdown-toggle " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cetak Laporan &nbsp;</button> &nbsp; &nbsp; &nbsp; 
			<div class="dropdown-menu">
				<a class="dropdown-item" 
				href="<?php echo base_url('index.php/admin/laporan_con/daftar_hadir')?>?ujian_id=<?php echo $value['pj_ujian_id']; ?>&mapel_id=<?php echo $value['mapel_id']?>&tingkat=<?php echo $value['peserta_kelas_tingkat']?>" 
				target="_blank">Daftar hadir</a>			
			</div>
		</div>

		<div class="col-md-2 float-right">
		<button class="btn btn-danger btn-border dropdown-toggle " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Download &nbsp;</button> 
			<div class="dropdown-menu">			
				<a class="dropdown-item" 
				href="<?php echo base_url('index.php/admin/laporan_con/laporan_cetak')?>?ujian_id=<?php echo $value['pj_ujian_id'] ?>&mapel_id=<?php echo $value['mapel_id']?>" 
				 target="_blank">Daftar Nilai</a>
				 <a class="dropdown-item" 
				href="<?php echo base_url('index.php/admin/laporan_con/laporan_cetak_kd')?>?ujian_id=<?php echo $value['pj_ujian_id'] ?>&mapel_id=<?php echo $value['mapel_id']?>" 
				 target="_blank" data-toggle="modal" data-target="#laporanKD">Daftar Nilai KD</a>
				 <a class="dropdown-item" 
				href="<?php echo base_url('index.php/admin/laporan_con/laporan_import')?>?ujian_id=<?php echo $value['pj_ujian_id'] ?>&mapel_id=<?php echo $value['mapel_id']?>" 
				 target="_blank">Format Import</a>
			</div>
		</div>
		</div>
		<?php } ?>
		</div>
</div>	

	<!-- Modal tambah mapel -->
	<div class="modal fade" id="laporanKD" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header border-0">
						<h5 class="modal-title">
							<span class="fw-mediumbold">
							Download</span> 
							<span class="fw-light">
							Laporan nilai KD
							</span>
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url('index.php/admin/laporan_con/laporan_cetak_kd')?>" method="POST" class="form" target="_blank" >
					<div class="modal-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Nama Penilaian</label>
										<input id="addNama" type="text" class="form-control" name="ujian_nama" value="<?php echo $ujian_kd->ujian_nama;?>" >
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Nama Mapel</label>
										<input id="addKode" type="text" class="form-control" name="mapel_nama"  value="<?php echo $ujian_kd->mapel_nama;?>">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Kompetensi Dasar</label>
										<select name="kd_id" class="form-control" id="addKel">
											<?php 
											foreach ($kd as $kd) { ?>
											<option value="<?php echo $kd['kd_id']; ?>"><?php echo $kd['kd_nomor'].' | '.$kd['kd_teks']?></option>
											<?php } ?>
										</select>
									</div>
								</div>

							</div>
						
					</div>
					<div class="modal-footer border-0">
						<input type="hidden" name="ujian_id" value="<?php echo $ujian_kd->ujian_id; ?>">
						<button type="submit" class="btn btn-primary">Download</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- selesai modal -->

