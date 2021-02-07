<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Data Sekolah</div>
			</div>
			<div class="card-body">
				<form action="<?php echo base_url('index.php/admin/pengaturan_con/pengaturan_update')?>" method="POST" class="form">
				<div class="form-group">
					<label for="nama_sekolah">Nama Sekolah</label>
					<input type="text" class="form-control" id="nama_sekolah" name="set_sekolah" value="<?php echo $set->set_sekolah; ?>" >
				</div>
				<div class="form-group">
					<label for="nama_sekolah">Alamat</label>
					<input type="text" class="form-control" id="nama_sekolah" name="set_alamat" value="<?php echo $set->set_alamat; ?>">
				</div>
				<div class="form-group">
					<label for="nama_sekolah">No. Telepon</label>
					<input type="text" class="form-control" id="nama_sekolah" name="set_telpon" value="<?php echo $set->set_telpon; ?>">
				</div>
				<div class="form-group">
					<label for="nama_sekolah">No. Fax</label>
					<input type="text" class="form-control" id="nama_sekolah" name="set_fax" value="<?php echo $set->set_fax; ?>">
				</div>
				<div class="form-group">
					<label for="nama_sekolah">Website</label>
					<input type="text" class="form-control" id="nama_sekolah" name="set_web" value="<?php echo $set->set_web; ?>">
				</div>
				<div class="form-group">
					<label for="nama_sekolah">Email</label>
					<input type="text" class="form-control" id="nama_sekolah" name="set_email" value="<?php echo $set->set_email; ?>">
				</div>
				<div class="form-group">
					<label for="nama_sekolah">Kabupaten</label>
					<input type="text" class="form-control" id="nama_sekolah" name="set_kab" value="<?php echo $set->set_kab; ?>">
				</div>
				<div class="form-group">
					<label for="nama_sekolah">Kode Pos</label>
					<input type="text" class="form-control" id="nama_sekolah" name="set_pos" value="<?php echo $set->set_pos; ?>">
				</div>
				<div class="form-group">
					<label for="nama_sekolah">NPSN</label>
					<input type="text" class="form-control" id="nama_sekolah" name="set_npsn" value="<?php echo $set->set_npsn; ?>">
				</div>
				<div class="form-group">
					<label for="nama_sekolah">Nama Kepala Sekolah</label>
					<input type="text" class="form-control" id="nama_sekolah" name="set_kepsek" value="<?php echo $set->set_kepsek; ?>">
				</div>
				<div class="form-group">
					<label for="nama_sekolah">NIP Kepala Sekolah</label>
					<input type="text" class="form-control" id="nama_sekolah" name="set_nip" value="<?php echo $set->set_nip; ?>">
				</div>
				<div class="form-group">
					<input type="submit" name="submit" value="Simpan" class="btn btn-danger" value="<?php echo $set->set_sekolah; ?>">
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">

		<!-- Modal tambah admin -->
		<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-hidden="true">
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
					<form action="<?php echo base_url('index.php/admin/pengaturan_con/admin_add')?>" method="POST" class="form" >
					<div class="modal-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group form-group-default">
										<label>Nama</label>
										<input id="addNama" type="text" class="form-control" name="admin_nama" required="flag" >
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Username</label>
										<input id="adduser" type="text" class="form-control" name="admin_user" required="flag">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group form-group-default">
										<label>Password</label>
										<input id="addpass" type="text" class="form-control" name="admin_pass" required="flag">
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

			<div class="card-header">
				<div class="card-head-row">
					<div class="card-title">Administrator</div>	
					<?php if($this->session->admin_level == 'root') { ?>
					<button class="btn btn-danger btn-round ml-auto" data-toggle="modal" data-target="#addAdmin">
						<i class="fa fa-plus"></i>Tambah
					</button>	
					<?php } ?>							
				</div>
			</div>
			<div class="card-body">
			<?php if($this->session->flashdata('pesan')) { ?>
	                <div class="alert alert-danger" role="alert" style="color:red"><?php echo $this->session->flashdata('pesan') ?></div>
	            <?php } ?>
			<div class="table-responsive">
			<table id="add-row" class="display table table-sm table-striped table-hover table-head-bg-*states" >
				<thead style="background-color: #162447;">
					<tr>
						<th style="width: 5%"><font color="#ffffff">No</th>
						<th style="width: 30%"><font color="#ffffff">Nama Admin</th>
						<th style="width: 30%"><font color="#ffffff">Username</th>
						<th style="width: 15%"><font color="#ffffff">Level</th>
						<?php if($this->session->admin_level == 'root') { ?>
						<th style="width: 10%"><font color="#ffffff">Aksi</th>
						<?php } ?>
					</tr>
				</thead>

				<tbody>
					<?php 
					$no = 1;
					foreach ($admin as $value) { ?>
					<tr>
						<td align="center"><?php echo $no ?></td>
						<td><?php echo $value['admin_nama'] ?></td>
						<td><?php echo $value['admin_user'] ?></td>
						<td><?php echo $value['admin_level'] ?></td>
						<?php if($this->session->admin_level == 'root') { ?>
						<td align="center">
							<button class="btn btn-danger btn-border dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi &nbsp;</button>
							<?php if($value['admin_level'] != 'root') { ?>
							<div class="dropdown-menu">
									<?php $title = $value['admin_nama'] ?>
									<a class="dropdown-item" href="<?php echo base_url('index.php/admin/pengaturan_con/admin_reset')?>?admin_id=<?php echo $value['admin_id'] ?>&admin_nama=<?php echo $value['admin_nama']?>" title="<?php echo $title; ?>">Reset Admin</a>
									<a class="dropdown-item" href="<?php echo base_url('index.php/admin/pengaturan_con/admin_del')?>?admin_id=<?php echo $value['admin_id'] ?>" title="<?php echo $title; ?>" onclick="return confirm('KONFIRMASI : Hapus data..?');">Hapus</a>
							</div>
						    <?php } ?>
						</td>
						<?php } ?>
					</tr>
					<?php $no++; } ?>
				</tbody>
			</table>
		</div>
			</div>
		</div>
	</div>
</div>