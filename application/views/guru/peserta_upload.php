<!-- awal kotak info atas -->
<div class="card">
	<div class="card-body">
		<form action="<?php echo base_url('index.php/admin/peserta_con/upload_do'); ?>" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="exampleFormControlFile1">Upload file daftar peserta dari dapodik</label>
			<input type="file" class="form-control-file" id="exampleFormControlFile1" name="peserta_file" required="flag" >
		</div>

		<div class="form-group">
			<input type="submit" name="submit" value="Upload" class="btn btn-danger">
		</div>
		</form>
		<br>
		<div>
			<p style="font: bold;">Ketentuan Upload Peserta</p>
			<ol>
				<li>Download daftar siswa dari dapodik (pastikan data sudah 100% kebenarannya)</li>
				<li>Upload file ke sistem CBT Teladan</li>
				<li>Ekstensi file upload .xls atau .xlsx</li>
			</ol>
		</div>				
	</div>
</div>							
						
