<!-- awal kotak info atas -->
<div class="card">
	<div class="card-header">
		<div class="d-flex align-items-center">
<!-- 										<h4 class="card-title">Add Row</h4> -->
			<button class="btn btn-danger btn-round ml-auto" data-toggle="modal" data-target="#addMapel">
				<i class="fa fa-plus"></i>
				Tambah
			</button>
		</div>
	</div>
	<div class="card-body">
	<!-- Modal tambah mapel -->
		<div class="modal fade" id="addMapel" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header border-0">
						<h5 class="modal-title">
							<span class="fw-mediumbold">
							Tambah</span> 
							<span class="fw-light">
							Mata Pelajaran
							</span>
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url('index.php/admin/mapel_con/mapel_add')?>" method="POST" class="form" >
					<div class="modal-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Nama Mapel</label>
										<input id="addNama" type="text" class="form-control" name="mapel_nama" >
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Kode Mapel</label>
										<input id="addKode" type="text" class="form-control" name="mapel_kode">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Urut</label>
										<input id="addUrut" type="text" class="form-control" name="mapel_urut">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Kelompok</label>
										<select name="mapel_kelompok" class="form-control" id="addKel">
											<option value="">Pilih..</option>
											<option value="A">Kelompok A</option>
											<option value="B">Kelompok B</option>
											<option value="C">Kelompok C</option>
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
						<th style="width: 5%"><font color="#ffffff">No</th>
						<th style="width: 40%"><font color="#ffffff">Nama </th>
						<th style="width: 10%"><font color="#ffffff">Kode</th>
						<th style="width: 10%"><font color="#ffffff">Urut</th>
						<th style="width: 10%"><font color="#ffffff">Kelompok</th>
						<th style="width: 10%"><font color="#ffffff">Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php 
					$no = 1;
					foreach ($mapel as $value) { ?>

					<tr>
						<td align="center"><?php echo $no ?></td>
						<td><?php echo $value['mapel_nama'] ?></td>
						<td align="center"><?php echo $value['mapel_kode'] ?></td>
						<td align="center"><?php echo $value['mapel_urut'] ?></td>
						<td align="center"><?php echo $value['mapel_kelompok'] ?></td>
						<td align="center">
							<button class="btn btn-danger btn-border dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi &nbsp;</button>
								<div class="dropdown-menu">
									<?php $title = $value['mapel_nama'] ?>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#editMapel<?php echo $value['mapel_id'];?>" title="<?php echo $title; ?>">Edit</a>

									<a class="dropdown-item" href="<?php echo base_url('index.php/admin/mapel_con/kompetensi?mapel_id='.$value['mapel_id'].'')?>" title="<?php echo $title; ?>">Lihat KD</a>

									<?php if(empty($value['ujian_id'])) { ?>
									<a class="dropdown-item" href="<?php echo base_url('index.php/admin/mapel_con/mapel_del') ?>?mapel_id=<?php echo $value['mapel_id'] ?>" title="<?php echo $title; ?>" onclick="return confirm('KONFIRMASI : Hapus data..?');">Hapus</a>
								<?php } ?>
								</div>
						</td>
					</tr>

<!-- Modal edit mapel -->
		<div class="modal fade" id="editMapel<?php echo $value['mapel_id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header border-0">
						<h5 class="modal-title">
							<span class="fw-mediumbold">
							Edit Data Mata Pelajaran</span> 
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url('index.php/admin/mapel_con/mapel_update')?>" method="POST" class="form" >
					<div class="modal-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Nama Mapel</label>
										<input id="addNama" type="text" class="form-control" name="mapel_nama" value="<?php echo $value['mapel_nama']?>" >
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Kode Mapel</label>
										<input id="addKode" type="text" class="form-control" name="mapel_kode" value="<?php echo $value['mapel_kode']?>">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Urut</label>
										<input id="addUrut" type="text" class="form-control" name="mapel_urut" value="<?php echo $value['mapel_urut']?>">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Kelompok</label>
										<select name="mapel_kelompok" class="form-control" id="addKel">
											<option value="">Pilih..</option>
											<option value="A" <?php if($value['mapel_kelompok'] == 'A') echo 'selected'; ?>>Kelompok A</option>
											<option value="B" <?php if($value['mapel_kelompok'] == 'B') echo 'selected'; ?>>Kelompok B</option>
											<option value="C" <?php if($value['mapel_kelompok'] == 'C') echo 'selected'; ?>>Kelompok C</option>
										</select>
									</div>
								</div>

							</div>
						
					</div>
					<div class="modal-footer border-0">
						<input type="hidden" name="mapel_id" value="<?php echo $value['mapel_id'] ?>">
						<button type="submit" class="btn btn-primary">Perbarui</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- selesai modal -->

					<?php $no++; 

				} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
						
