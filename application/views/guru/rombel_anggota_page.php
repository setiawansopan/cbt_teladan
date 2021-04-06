<!-- awal kotak info atas -->
<div class="card">
	
	<div class="card-body">
		
		<div class="table-responsive">
			<table id="add-row" class="display table table-sm table-striped table-hover table-head-bg-*states" >
				<thead style="background-color: #162447;">
					<tr>
						<th style="width: 3%"><font color="#ffffff">No</th>
						<th style="width: 12%"><font color="#ffffff">Kelas</th>
						<th style="width: 10%"><font color="#ffffff">NIS</th>
						<th style="width: 25%"><font color="#ffffff">Nama</th>
						<th style="width: 8%"><font color="#ffffff">Jns. Kelamin</th>
						<th style="width: 12%"><font color="#ffffff">Tgl. Lahir</th>
					</tr>
				</thead>

				<tbody>
					<?php 
					$no = 1;
					foreach ($anggota as $value) { ?>

					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $value['peserta_kelas'] ?></td>
						<td><?php echo $value['peserta_nis'] ?></td>
						<td><?php echo ucwords(strtolower($value['peserta_nama'])) ?></td>
						<td><?php echo $value['peserta_kelamin'] ?></td>
						<td><?php echo $value['peserta_tgl_lahir']; ?></td>
					</tr>
					<?php $no++; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
						
