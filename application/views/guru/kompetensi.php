<!-- awal kotak info atas -->
<div class="card">
	<?php if(!empty($n_mapel)) { ?>
	<div class="card-header">
		<div class="d-flex align-items-center">			
			<h4 class="card-title">KD : <?php echo $n_mapel->mapel_nama; ?></h4> 
			<button class="btn btn-danger btn-round ml-auto" data-toggle="modal" data-target="#addKompetensi">
				<i class="fa fa-plus"></i>
				Tambah
			</button>			
		</div>
	</div>
	<?php } ?>

	<div class="card-body">
		<?php if(!empty($n_mapel)) { ?>
		<!-- Modal tambah mapel -->
		<div class="modal fade" id="addKompetensi" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header border-0">
						<h5 class="modal-title">
							<span class="fw-mediumbold">
							Tambah</span> 
							<span class="fw-light">
							Kompetensi Dasar
							</span>
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url('index.php/admin/mapel_con/kompetensi_add')?>" method="POST" class="form" >
					<div class="modal-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Nama Mapel</label>
										<input id="addNama" type="text" class="form-control" name="mapel_nama" value="<?php echo $n_mapel->mapel_nama; ?>" >
										<input type="hidden" name="kd_mapel_id" value="<?php echo $n_mapel->mapel_id?>">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>No. KD</label>
										<input id="addKode" type="text" class="form-control" name="kd_nomor" value="" autofocus>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Tingkat</label>
										<select name="kd_tingkat" class="form-control" id="addKel">
											<option value="">Pilih..</option>
											<option value="X">X</option>
											<option value="XI">XI</option>
											<option value="XII">XII</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Semester</label>
										<select name="kd_semester" class="form-control" id="addKel">
											<option value="">Pilih..</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Kompetensi</label>
										<textarea name="kd_teks" class="form-control" rows="4"></textarea>
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
		<?php } ?>

		<div class="table-responsive">
			<form action="<?php echo base_url('index.php/admin/mapel_con/kompetensi')?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="tingkat">Pilih Mapel</label>
					<div class="select2-input col-md-8">
					<select id="basic" class="form-control" name="mapel_id" onchange="this.form.submit()" >
						<option value="">Pilih...</option>
						<?php 
						foreach ($mapel as $key) { ?>
						<option value="<?php echo $key['mapel_id']?>"><?php echo $key['mapel_nama']?></option>
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
						<th style="width: 10%"><font color="#ffffff">Tingkat</th>
						<th style="width: 10%"><font color="#ffffff">Nomor KD</th>
						<th style="width: 30%"><font color="#ffffff">Kompetensi</th>
						<th style="width: 5%"><font color="#ffffff">Aksi</th>
					</tr>
				</thead>

				<tbody>
					<?php 
					if(!empty($kd)) {
					$no = 1;
					foreach ($kd as $value) { ?>

					<tr>
						<td align="center"><?php echo $no ?></td>
						<td><?php echo $value['kd_tingkat']." / Sem. ".$value['kd_semester']; ?></td>
						<td align="center"><?php echo $value['kd_nomor']; ?></td>
						<td><?php echo $value['kd_teks'];?></td>			
						<td align="center">
							<button class="btn btn-danger btn-border dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi &nbsp;</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="" data-toggle="modal" data-target="#edit<?php echo $value['kd_id'];?>">Edit</a>
									<a class="dropdown-item" href="<?php echo base_url('index.php/admin/mapel_con/kompetensi_del?kd_id='.$value['kd_id'].'&kd_mapel_id='.$value['kd_mapel_id']).''?>" onclick="return confirm('KONFIRMASI : Hapus data..?');">Hapus</a>
							    </div>
						</td>
					</tr>

					<!-- Modal edit -->
					<div class="modal fade" id="edit<?php echo $value['kd_id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header border-0">
									<h5 class="modal-title">
										<span class="fw-mediumbold">
										Edit </span> 
										<span class="fw-light">
										Kompetensi Dasar
										</span>
									</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form action="<?php echo base_url('index.php/admin/mapel_con/kompetensi_update')?>" method="POST" class="form" >
								<div class="modal-body">
										
									<div class="row">
								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Nama Mapel</label>
										<input id="addNama" type="text" class="form-control" name="mapel_nama" value="<?php echo $n_mapel->mapel_nama; ?>" >
										<input type="hidden" name="kd_mapel_id" value="<?php echo $n_mapel->mapel_id?>">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>No. KD</label>
										<input id="addKode" type="text" class="form-control" name="kd_nomor" value="<?php echo $value['kd_nomor']?>" autofocus>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Tingkat</label>
										<select name="kd_tingkat" class="form-control" id="addKel">
											<option value="">Pilih..</option>
											<option value="X" <?php if($value['kd_tingkat'] == 'X') echo 'selected'; ?>>X</option>
											<option value="XI" <?php if($value['kd_tingkat'] == 'XI') echo 'selected';?>>XI</option>
											<option value="XII" <?php if($value['kd_tingkat'] == 'XII') echo 'selected';?>>XII</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Semester</label>
										<select name="kd_semester" class="form-control" id="addKel">
											<option value="">Pilih..</option>
											<option value="1" <?php if($value['kd_semester'] == '1') echo 'selected'; ?>>1</option>
											<option value="2" <?php if($value['kd_semester'] == '2') echo 'selected'; ?>>2</option>
											<option value="3" <?php if($value['kd_semester'] == '3') echo 'selected'; ?>>3</option>
											<option value="4" <?php if($value['kd_semester'] == '4') echo 'selected'; ?>>4</option>
											<option value="5" <?php if($value['kd_semester'] == '5') echo 'selected'; ?>>5</option>
											<option value="6" <?php if($value['kd_semester'] == '6') echo 'selected'; ?>>6</option>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Kompetensi</label>
										<textarea name="kd_teks" class="form-control" rows="4"><?php echo $value['kd_teks'] ?></textarea>
									</div>
								</div>
							</div>
									
								</div>
								<div class="modal-footer border-0">
									<input type="hidden" name="kd_id" value="<?php echo $value['kd_id'] ?>">
									<button type="submit" class="btn btn-primary">Update</button>
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
<br>