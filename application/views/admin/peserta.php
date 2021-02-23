
<!-- awal kotak info atas -->
<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table id="add-row" class="display table table-sm table-striped table-hover table-head-bg-*states" >
				<thead style="background-color: #162447;">
					<tr>
						<th style="width: 3%" align="center"><font color="#ffffff">No</th>
						<th style="width: 10%"><font color="#ffffff">Kelas</th>
						<th style="width: 8%"><font color="#ffffff">NIS</th>
						<th style="width: 25%"><font color="#ffffff">Nama</th>
						<th style="width: 8%"><font color="#ffffff">Jns. Kelamin</th>
						<th style="width: 12%"><font color="#ffffff">Tgl. Lahir</th>
						<th style="width: 5%"><font color="#ffffff">Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php 
					$no = 1;
					foreach ($peserta as $value) { ?>

					<tr>
						<td align="center"><?php echo $no ?></td>
						<td><?php echo $value['peserta_kelas'] ?></td>
						<td><?php echo $value['peserta_nis'] ?></td>
						<td><?php echo ucwords(strtolower($value['peserta_nama'])) ?></td>
						<td align="center"><?php echo $value['peserta_kelamin'] ?></td>
						<td><?php echo $value['peserta_tgl_lahir']; ?></td>
						<td align="center"><button class="btn btn-danger btn-border dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi &nbsp;</button>
							<div class="dropdown-menu">
									<?php $title = $value['peserta_nama'] ?>
									<a class="dropdown-item" href="<?php echo base_url('index.php/admin/peserta_con/peserta_reset')?>?peserta_id=<?php echo $value['peserta_id'];?>" title="<?php echo $title; ?>" onclick="return confirm('KONFIRMASI : Reset Password?');" >Reset Password</a>
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
	swal("Selamat!", "Data peserta berhasil disimpan!", {
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