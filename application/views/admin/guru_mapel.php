<!-- awal kotak info atas -->
<div class="card">
	<div class="card-header">
		<div class="d-flex align-items-center">
<!-- 										<h4 class="card-title">Add Row</h4> -->
			<button class="btn btn-danger btn-round ml-auto" data-toggle="modal" data-target="#addGMapel">
				<i class="fa fa-plus"></i>
				Tambah
			</button>
		</div>
	</div>
	<div class="card-body">

		<!-- Modal tambah guru mapel -->
		<div class="modal fade" id="addGMapel" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header border-0">
						<h5 class="modal-title">
							<span class="fw-mediumbold">
							Tambah</span> 
							<span class="fw-light">
							Mata Pelajaran Guru
							</span>
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url('index.php/admin/guru_con/guru_mapel_add')?>" method="POST" class="form" >
					<div class="modal-body">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Nama Guru</label>
										<select name="guru_id" class="form-control" id="addKel">
											<option value="">Pilih..</option>
											<?php 
											foreach ($guru as $value) {
											?>
											<option value="<?php echo $value['guru_id'] ?>"><?php echo $value['guru_nama'] ?></option>
											<?php }
											?>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Mata Pelajaran</label>
										<select name="mapel_id" class="form-control" id="addKel">
											<option value="">Pilih..</option>
											<?php 
											foreach ($mapel as $value) {
											?>
											<option value="<?php echo $value['mapel_id'] ?>"><?php echo $value['mapel_nama'] ?></option>
											<?php }
											?>
										</select>
									</div>
								</div>
							</div>
						
					</div>
					<div class="modal-footer border-0">
						<button type="submit" class="btn btn-primary">Simpan</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- selesai modal -->

		<div class="table-responsive">
			<table id="add-row" class="display table table-sm table-striped table-hover table-head-bg-*states" >
				<thead style="background-color: #162447;">
					<tr>
						<th style="width: 3%" align="center"><font color="#ffffff">No</th>
						<th style="width: 10%"><font color="#ffffff">NIK</th>
						<th style="width: 20%"><font color="#ffffff">Nama</th>
						<th style="width: 20%"><font color="#ffffff">Mapel</th>
						<th style="width: 5%"><font color="#ffffff">Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php 
					$no = 1;
					foreach ($guru_mapel as $value) { ?>

					<tr>
						<td align="center"><?php echo $no ?></td>
						<td align="center"><?php echo $value['guru_nik'] ?></td>
						<td><?php echo ucwords(strtolower($value['guru_nama'])) ?></td>
						<td><?php echo $value['mapel_nama'] ?></td>
						<td align="center"><button class="btn btn-danger btn-border dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi &nbsp;</button>
							<div class="dropdown-menu">
									<?php $title = $value['guru_nama'] ?>
									<a class="dropdown-item" href="<?php echo base_url('index.php/admin/guru_con/guru_mapel_del')?>?gm_id=<?php echo $value['gm_id'];?>" title="<?php echo $title; ?>" onclick="return confirm('KONFIRMASI : Hapus data?');" >Hapus</a>
							</div>
						</td>
					</tr>
					<?php $no++; } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
					
