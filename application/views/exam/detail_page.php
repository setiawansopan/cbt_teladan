<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Identitas Penilaian</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url()?>/assets/img/icon.ico" type="image/x-icon"/>
	
	<!-- Fonts and icons -->
	<script src="<?php echo base_url()?>/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url()?>/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/atlantis.css">

</head>
<body style="background-color: #006391;" >
	<div class="wrapper fullheight-side no-box-shadow-style">
		
		<div class="page-inner">
			<div class="row justify-content-center">
				<div class="col-12 col-lg-10 col-xl-9">

					<h1 style="font: bold; color: #ffffff;"><i class="fas fa-graduation-cap icon-big" style="color: #ffffff;"></i>&nbsp;CBT TELADAN</h1>
					<p style="font: bold; color: #ffffff;"><?php echo strtoupper($sekolah->set_sekolah).', '.$sekolah->set_alamat.' '.$sekolah->set_kab.', '.$sekolah->set_pos; ?></p>

					<div class="page-divider"></div>
					<div class="row">
						<div class="col-md-12">
						<div class="card">
							<br>

							<!-- judul lembar jawab -->
							<div class="card-header">
							<div class="d-flex align-items-center">	
							
							<!-- judul header -->
							<table width=100%>
								<!-- <tr>
										<td colspan="2" align="center"><h3 class="title"><strong><font color="#000000">LEMBAR SOAL CBT</strong></h3></td>
								</tr> -->
								<tr>
									<td width=50% align="center"><h3><strong><font color="#000000">DATA PENILAIAN</strong></h3></td>
								</tr>
								</table>
								
								<!-- sampai sini judul header -->
								
							</div>
							</div>
							<!-- judul sampai sini -->

								<div class="container-fluid">

									<div class="row" style="align-content: center;">

										<div class="col-md-12 info-invoice">
											<!-- <h5 class="sub">IDENTITAS</h5> -->
											<table width="75%" class="table " align="center">
												<tr>
													<td width="35%">Nama Penilaian</td>
													<td width="3%">:</td>
													<td width="60%"><?php echo $ujian->ujian_nama; ?></td>
												</tr>
												<tr>
													<td width="15%">Mata Pelajaran</td>
													<td width="5%">:</td>
													<td width="65%"><?php echo $ujian->mapel_nama; ?></td>
												</tr>
												<tr>
													<td width="15%">Tingkat Kelas</td>
													<td width="5%">:</td>
													<td width="65%"><?php echo $ujian->ujian_tingkat; ?></td>
												</tr>
												<tr>
													<td width="15%">Tanggal</td>
													<td width="5%">:</td>
													<td width="65%"><?php echo tanggal($ujian->ujian_tanggal); ?></td>
												</tr>
												<tr>
													<td width="15%">Waktu</td>
													<td width="5%">:</td>
													<td width="65%"><?php echo $ujian->ujian_mulai.' s/d '.$ujian->ujian_selesai; ?> WIB</td>
												</tr>
												<tr>
													<td width="15%">Durasi</td>
													<td width="5%">:</td>
													<td width="65%"><?php echo $ujian->ujian_durasi; ?> Menit</td>
												</tr>
												<tr>
													<td width="15%">Tampilkan Hasil</td>
													<td width="5%">:</td>
													<td width="65%"><?php if($ujian->ujian_hasil == 1) echo "YA. ( Hasil akan ditampilkan sesaat setelah penilaian berahir )"; else echo "TIDAK. ( Hasil tidak akan ditampilkan sesaat setelah penilaian berahir )"; ?></td>
												</tr>
												<tr>
													<td width="15%">Pinalti Waktu</td>
													<td width="5%">:</td>
													<td width="65%"><?php if($ujian->ujian_pinalti == 1) echo "YA. ( Durasi ujian akan dikurangi dengan waktu keterlembatan )"; else echo "TIDAK. ( Durasi ujian tidak akan dikurangi dengan lama waktu keterlembatan )";?></td>
												</tr>
											</table>
										</div>
									</div>

								</div>

								<div class="container-fluid">
									<div class="form-group col-md-10">

									<?php if($this->session->flashdata('error')) { ?>
					                <div class="alert alert-danger" role="alert" style="color:red"><?php echo $this->session->flashdata('error') ?></div>
					            	<?php } ?> 

									<h4>Pernyataan Kejujuran</h4>
									</div>
									<form action="<?php echo base_url('index.php/exam/identitas/auth')?>" method="POST" >
									<div class="form-group col-md-3">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="pj_ragu" name="pj_ragu" value="" required="flag">
										<label class="custom-control-label" for="pj_ragu">
											Dengan nama ALLAH SWT / Tuhan YME, Saya menyatakan akan mengerjakan penilaian ini dengan JUJUR.
										</label>
									</div>
									</div>
														
									<div class="form-group col-md-3">
										<input type="hidden" name="ujian_id" value="<?php echo $ujian->ujian_id; ?>">
										<input type="text" class="form-control"  name="ujian_token" required="flag" placeholder="MASUKKAN TOKEN">
									</div>
									<div class="form-group col-md-12" align="center">
										<hr>
										<input type="submit" name="submit" value="Mulai Penilaian" class="btn btn-info" >
										<a href="<?php echo base_url('index.php/exam/identitas')?>" class="btn btn-danger"><i class="fas fa-angle-double-left"></i> Kembali</a>
									</div>
								</form>
								<br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="<?php echo base_url()?>/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/core/popper.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="<?php echo base_url()?>/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Bootstrap Toggle -->
	<script src="<?php echo base_url()?>/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<!-- jQuery Scrollbar -->
	<script src="<?php echo base_url()?>/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Atlantis JS -->
	<script src="<?php echo base_url()?>/assets/js/atlantis.min.js"></script>
</html>