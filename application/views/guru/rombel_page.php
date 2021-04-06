<!-- awal kotak info atas -->
<div class="card">
	
	<div class="card-body">
		
		<div class="table-responsive">
			<table id="add-row" class="display table table-sm table-striped table-hover table-head-bg-*states" >
				<thead style="background-color: #162447;">
					<tr>
						<th style="width: 5%"><font color="#ffffff">No</th>
						<th style="width: 40%"><font color="#ffffff">Nama Rombel</th>
						<th style="width: 10%"><font color="#ffffff">Jml. Anggota</th>
						<th style="width: 10%"><font color="#ffffff">Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php 
					$no = 1;
					foreach ($rombel as $value) { ?>

					<tr>
						<td align="center"><?php echo $no ?></td>
						<td><?php echo $value['peserta_kelas'] ?></td>
						<td align="center"><?php echo $value['anggota'] ?></td>
						<td align="center"><a href="<?php echo base_url('index.php/guru/rombel/rombel_anggota')?>?rombel=<?php echo $value['peserta_kelas'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-user-friends"></i> Lihat Anggota</a></td>
					</tr>
					<?php $no++; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
						
