<!-- awal kotak info atas -->
<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table id="add-row" class="display table table-sm table-striped table-hover table-head-bg-*states" >
				<thead style="background-color: #162447;">
					<tr>
						<th style="width: 3%"><font color="#ffffff">No</th>
						<th style="width: 15%"><font color="#ffffff">Nama</th>
                                                <th style="width: 5%"><font color="#ffffff">Tingkat</th>
						<th style="width: 20%"><font color="#ffffff">Mapel</th>
						<th style="width: 7%"><font color="#ffffff">Jm. Soal</th>
						<th style="width: 10%"><font color="#ffffff">Tanggal</th>
						<th style="width: 7%"><font color="#ffffff">Pukul</th>
						<th style="width: 7%"><font color="#ffffff">Waktu</th>
						<th style="width: 7%"><font color="#ffffff">Token</th>
						<th style="width: 7%"><font color="#ffffff">Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php 
					$no = 1;
					foreach ($ujian as $value) { ?>

					<tr>
						<td align="center"><?php echo $no ?></td>
						<td><?php echo $value['ujian_nama'] ?></td>
                                                <td align="center"><?php echo $value['ujian_tingkat'] ?></td>
						<td><?php echo $value['mapel_nama'] ?></td>
						<td align="center"><?php echo $value['jum_soal'] ?> Soal</td>
						<td align="center"><?php echo tanggal($value['ujian_tanggal']) ?></td>
						<td align="center"><?php echo $value['ujian_mulai'] ?></td>
						<td align="center"><?php echo $value['ujian_durasi'] ?> Mnt</td>
						<td align="center"><?php echo $value['ujian_token'] ?></td>
						<td align="center">
							<button class="btn btn-danger btn-border dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi &nbsp;</button>
								<div class="dropdown-menu">
									<?php $title = $value['mapel_nama'].' - Tingkat '.$value['ujian_tingkat'] ?>
									<a class="dropdown-item" href="<?php echo base_url('index.php/admin/ujian_con/soal')?>?ujian_id=<?php echo $value['ujian_id']?>" title="<?php echo $title; ?>">Tambah Soal</a>
									<?php if(!empty($value['soal_id'])) { ?>
									<a class="dropdown-item" href="<?php echo base_url('index.php/admin/ujian_con/soal_preview')?>?ujian_id=<?php echo $value['ujian_id']?>&soal_id=<?php echo $value['soal_id'] ?>&n=1" title="<?php echo $title; ?>">Preview</a>
									<?php } ?>
									<a class="dropdown-item" href="<?php echo base_url('index.php/admin/ujian_con/ujian_reset')?>?ujian_id=<?php echo $value['ujian_id']?>" title="<?php echo $title; ?>">Reset Token</a>
									<div role="separator" class="dropdown-divider"></div>
									<a class="dropdown-item" href="<?php echo base_url('index.php/admin/ujian_con/ujian_edit')?>?ujian_id=<?php echo $value['ujian_id']?>" title="<?php echo $title; ?>">Edit</a>
									<?php if(empty($value['soal_id'])) { ?>
									<a class="dropdown-item" href="<?php echo base_url('index.php/admin/ujian_con/ujian_delete')?>?ujian_id=<?php echo $value['ujian_id']?>" title="<?php echo $title; ?>" onclick="return confirm('KONFIRMASI : Hapus data..?');">Hapus</a>
									<?php } ?>
							</div>
						</td>
					</tr>
					<?php $no++; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php 
if ($this->session->flashdata('simpan') == 'true') { ?>
<script type='text/javascript'>
  setTimeout(function () {  
	swal("Selamat!", "Data ujian berhasil disimpan!", {
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
if ($this->session->flashdata('reset') == 'true') { ?>
<script type='text/javascript'>
  setTimeout(function () {  
	swal("Selamat!", "Data token ujian berhasil direset!", {
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
if ($this->session->flashdata('update') == 'true') { ?>
<script type='text/javascript'>
  setTimeout(function () {  
	swal("Selamat!", "Data ujian berhasil diperbaharui!", {
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
if ($this->session->flashdata('hapus') == 'true') { ?>
<script type='text/javascript'>
  setTimeout(function () {  
	swal("Selamat!", "Data ujian berhasil dihapus!", {
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
						
