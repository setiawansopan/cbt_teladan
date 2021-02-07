<!-- awal kotak info atas -->
<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<form action="<?php echo base_url('index.php/admin/status_con/selesai')?>" method="POST" enctype="multipart/form-data">
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
						<th style="width: 10%"><font color="#ffffff">Selesai</th>
						<th style="width: 10%"><font color="#ffffff">Sisa Waktu</th>
						<th style="width: 10%"><font color="#ffffff">Status</th>
						<!-- <th style="width: 7%"><font color="#ffffff">Aksi</th> -->
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
						<td align="center"><?php $selesai = explode(' ', $value['pu_selesai']); echo $selesai[1]; ?></td>
						<td align="center"><?php echo $value['pu_durasi'] ?></td>
						<td align="center"><?php if($value['pu_status'] == 'on') echo 'Mengerjakan'; else echo 'Selesai'; ?></td>
					</tr>
					<?php $no++; } } ?>
				</tbody>
			</table>
		</div>
		<?php 
		if(!empty($peserta)) { ?>
		<br><hr>
		<div align="right">
		<a href="<?php echo base_url('index.php/admin/status_con/set_selesai')?>?pu_ujian_id=<?php echo $value['pu_ujian_id'] ?>" class="btn btn-danger" onclick="return confirm('KONFIRMASI : Selesaikan penilaian untuk semua peserta..?');" title="Atur selesai penilaian untuk semua peserta." ><i class="fas fa-check-double" ></i>&nbsp;&nbsp;&nbsp;Selesai Penilaian</a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
	<?php } ?>
	</div>
</div>
						
