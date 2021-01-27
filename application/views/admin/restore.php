<!-- awal kotak info atas -->
<div class="card">
	<div class="card-body">
<form action="<?php echo base_url('index.php/admin/peserta_con/upload_do'); ?>" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="exampleFormControlFile1">Upload database dari file dump</label>
			<input type="file" class="form-control-file" id="exampleFormControlFile1" name="peserta_file" required="flag" >
		</div>

		<div class="form-group">
			<input type="submit" name="submit" value="Restore" class="btn btn-danger">
		</div>
		</form>

		<br>
		<div>
			<p style="font: bold;">Ketentuan Restore Database</p>
			<ol>
				<li>Gunakan file backup hasil dump dari backup sistem.</li>
				<li>Upload file sesuai tanggal ke sistem CBT Teladan</li>
				<li>Ekstensi file upload .sql</li>
			</ol>
		</div>				
	</div>
</div>							
						
