<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Data Profil Administrator</div>
			</div>
			<div class="card-body">
				<form action="<?php echo base_url('index.php/admin/profil_con/profil_update')?>" method="POST" class="form">
				<div class="form-group">
					<label for="nama_sekolah">Nama Administrator</label>
					<input type="text" class="form-control" id="admin_nama" name="admin_nama" value="<?php echo $admin->admin_nama; ?>" >
				</div>
				<div class="form-group">
					<label for="nama_sekolah">Username</label>
					<input type="text" class="form-control" id="nama_sekolah" name="admin_username" value="<?php echo $admin->admin_user; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="nama_sekolah">Level Admin</label>
					<input type="text" class="form-control" id="nama_sekolah" name="admin_level" value="<?php echo $admin->admin_level; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="nama_sekolah">Password</label>
					<input type="password" class="form-control" id="nama_sekolah" name="admin_password" value="" required="flags">
				</div>
				<div class="form-group">
					<label for="nama_sekolah">Re-Password</label>
					<input type="password" class="form-control" id="nama_sekolah" name="admin_repassword" value="" required="flags">
				</div>
				
				<div class="form-group">
					<input type="submit" name="submit" value="Update" class="btn btn-danger">
				</div>
				</form>
			</div>
		</div>
	</div>

<div class="col-md-6">
<div class="card">
	<div class="card-header">
		<div class="card-title">Foto Profil</div>
	</div>
	<div class="card-body">
		<div id="foto">
			<img src="<?php echo base_url('images/admin'); ?>/<?php echo $this->session->admin_user; ?>.jpg" width="190" height="260" >
		</div>
		<?php echo form_open_multipart('admin/profil_con/profil_foto')?>
		<div class="form-group">
			<label for="exampleFormControlFile1">Upload foto</label>
			<input type="file" class="form-control-file" id="exampleFormControlFile1" name="userfile" required="flag" >
		</div>

		<div class="form-group">
			<input type="submit" name="submit" value="Upload" class="btn btn-danger">
		</div>
		</form>
		<br>
		<div>
			<p style="font: bold;">Ketentuan Upload Foto</p>
			<ol>
				<li>Tipe File Foto *.JPG, *.JPEG, *.PNG, *.BMP</li>
				<li>Ukuran Foto Maksimal 1 mb</li>
			</ol>
		</div>				
	</div>
</div>	
</div>

<?php 
if ($this->session->flashdata('foto') == 'true') { ?>
<script type='text/javascript'>
  setTimeout(function () {  
	swal("Selamat!", "Foto profil berhasil diperbaharui!", {
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
if ($this->session->flashdata('err_foto') == 'true') { ?>
<script type='text/javascript'>
  setTimeout(function () {  
	swal("Kesalahan!", "Ada kesalahan pada foto yang diupload!", {
			icon : "error",
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
if ($this->session->flashdata('simpan') == 'true') { ?>
<script type='text/javascript'>
  setTimeout(function () {  
	swal("Selamat!", "Data profil berhasil diperbaharui!", {
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
if ($this->session->flashdata('err_pass') == 'true') { ?>
<script type='text/javascript'>
  setTimeout(function () {  
	swal("Kesalahan!", "Data password yang anda masukkan tidak sama!", {
			icon : "error",
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
if ($this->session->flashdata('err_char') == 'true') { ?>
<script type='text/javascript'>
  setTimeout(function () {  
	swal("Kesalahan!", "Data password harus memiliki panjang 8 s/d 15 karakter!", {
			icon : "error",
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
if ($this->session->flashdata('err_space') == 'true') { ?>
<script type='text/javascript'>
  setTimeout(function () {  
	swal("Kesalahan!", "Data password tidak boleh mengandung spasi!", {
			icon : "error",
			buttons: {        			
			confirm: {
			className : 'btn btn-black'
					}
				},
			});  
	},10); 
 </script>
<?php } ?>	