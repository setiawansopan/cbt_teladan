<!-- awal kotak info atas -->
<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<form action="<?php echo base_url('index.php/admin/status_con/status')?>" method="POST" enctype="multipart/form-data">
				<div class="form-group col-md-6">
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
						<th style="width: 10%"><font color="#ffffff">Mulai</th>
						<th style="width: 10%"><font color="#ffffff">Sisa Waktu</th>
						<th style="width: 10%"><font color="#ffffff">Status</th>
						<th style="width: 7%"><font color="#ffffff">Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php 
					if(!empty($peserta)) {
					$no = 1;
					foreach ($peserta as $value) { ?>

					<tr>
						<td align="center"><?php echo $no ?></td>
						<td><?php echo strtoupper($value['peserta_nama']); ?></td>
						<td align="center"><?php echo $value['peserta_kelas']; ?></td>
						<td><?php echo $value['mapel_nama'];?></td>		
						<td align="center"><?php $mulai = explode(' ', $value['pu_mulai']); echo $mulai[1]; ?></td>	
						<td align="center"><?php echo $value['pu_durasi'] ?></td>
						<td align="center"><?php if($value['pu_status'] == 'on') echo 'Mengerjakan'; else echo 'Selesai'; ?></td>
						<td align="center">
							<button class="btn btn-danger btn-border dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi &nbsp;</button>
								<div class="dropdown-menu">
									<?php $title = $value['peserta_nama'];?>
									<a class="dropdown-item" href="<?php echo base_url('index.php/admin/status_con/reset_peserta')?>?peserta_id=<?php echo $value['peserta_id']?>&ujian_id=<?php echo $value['pu_ujian_id']?>" onclick="return confirm('KONFIRMASI : Anda akan mereset penilaian. Semua data jawaban dan sesi milik peserta yang bersangkutan pada penilaian ini akan terhapus. Lanjutkan RESET?');" title="<?php echo $title; ?>">Reset Penilaian</a>

									<!-- <a class="dropdown-item" href="<?php //echo base_url('index.php/admin/status_con/reopen_peserta')?>?peserta_id=<?php //echo $value['peserta_id']?>&ujian_id=<?php //echo $value['pu_ujian_id']?>" onclick="return confirm('KONFIRMASI : Anda akan membuka kembali penilaian.?');" title="<?php //echo $title; ?>">Reopen</a> -->

									<a class="dropdown-item" href="<?php echo base_url('index.php/admin/status_con/reset_perangkat')?>?peserta_id=<?php echo $value['peserta_id']?>&ujian_id=<?php echo $value['pu_ujian_id']?>" onclick="return confirm('KONFIRMASI : Anda akan mereset perangkat peserta. Lanjutkan RESET?');" title="<?php echo $title; ?>">Reset Perangkat</a>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#reopen<?php echo $value['peserta_id'];?>" title="<?php echo $title; ?>">Reopen</a>
									
							</div>
						</td> 
					</tr>

			<!-- Modal reopen -->
					<div class="modal fade" id="reopen<?php echo $value['peserta_id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header border-0">
									<h5 class="modal-title">
										<span class="fw-mediumbold">
										Reopen Penilaian</span> 
									</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form action="<?php echo base_url('index.php/admin/status_con/reopen_peserta')?>?peserta_id=<?php echo $value['peserta_id']?>&ujian_id=<?php echo $value['ujian_id']?>" method="POST" class="form" >
								<div class="modal-body">
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group form-group-default">
													<label>Nama Peserta</label>
													<input id="pesertaNama" type="text" class="form-control" name="peserta_nama" value="<?php echo $value['peserta_nama']?>" >
												</div>
											</div>
											<div class="col-sm-12">
												<div class="form-group form-group-default">
													<label>Nama Mapel</label>
													<input id="mapelNama" type="text" class="form-control" name="mapel_nama" value="<?php echo $value['mapel_nama']?>" >
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group form-group-default">
													<label>Sisa Waktu</label>
													<input id="puDurasi" type="text" class="form-control" name="pu_durasi" value="<?php echo $value['pu_durasi']?>">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group form-group-default">
													<label>Tambahan Waktu (Menit)</label>
													<input id="addDurasi" type="text" class="form-control" name="add_durasi" value="0">
												</div>
											</div>

										</div>
									
								</div>
								<div class="modal-footer border-0">
									<input type="hidden" name="mapel_id" value="<?php echo $value['mapel_id'] ?>">
									<button type="submit" class="btn btn-primary">Reopen</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
								</div>
								</form>
							</div>
						</div>
					</div>
					<!-- selesai modal -->



					<?php $no++; } } ?>
				</tbody>
			</table>

		</div>
	</div>
</div>

<?php 
if ($this->session->flashdata('simpan') == 'true') { ?>
<script type='text/javascript'>
  setTimeout(function () {  
	swal("Selamat!", "Re-open status peserta berhasil!", {
			icon : "success",
			buttons: {        			
			confirm: {
			className : 'btn btn-black'
					}
				},
			});  
	},10); 
 </script>
<?php } ?>	

<?php 
if ($this->session->flashdata('res_penilaian') == 'true') { ?>
<script type='text/javascript'>
  setTimeout(function () {  
	swal("Selamat!", "Reset penilaian peserta berhasil!", {
			icon : "success",
			buttons: {        			
			confirm: {
			className : 'btn btn-black'
					}
				},
			});  
	},10); 
 </script>
<?php } ?>		

<?php 
if ($this->session->flashdata('res_perangkat') == 'true') { ?>
<script type='text/javascript'>
  setTimeout(function () {  
	swal("Selamat!", "Reset perangkat peserta berhasil!", {
			icon : "success",
			buttons: {        			
			confirm: {
			className : 'btn btn-black'
					}
				},
			});  
	},10); 
 </script>
<?php } ?>		
