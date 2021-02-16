<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Identitas Peserta</title>
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
	<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/style.css">

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
							<div class="card card-invoice">
								<!-- <br>
								<div class="container-fluid" align="center"> 
									<?php //$this->load->view('dependen/kop.php'); ?>
								</div> -->

								<div class="container-fluid">
									<br>
									<div class="invoice-top" align="center">
										<h3 class="title"><strong><font color="#000000">PENILAIAN BERBASIS KOMPUTER <?php echo date('Y');?></strong></font></strong></h3>
									</div>
									<div class="row">
										<div class="col-md-12 info-invoice" align="center">
											<?php if($this->session->flashdata('success_foto')) { ?>
											    <div class="alert alert-success" role="alert" style="color:green"><?php echo $this->session->flashdata('success_foto') ?></div>
											<?php } ?> 
											<?php if($this->session->flashdata('error_foto')) { ?>
											    <div class="alert alert-danger" role="alert" style="color:red"><?php echo $this->session->flashdata('error_foto') ?></div>
											<?php } ?>
											<form action="<?php echo base_url('index.php/exam/identitas/savefoto'); ?>" method="POST" enctype="multipart/form-data">
												<div id="foto">
													<?php $filename = 'images/peserta/'.$peserta->peserta_nis.'.jpg';
														if (file_exists($filename)) { ?>
															<img src="<?php echo base_url($filename); ?>" width="265" align="center">
													<?php } else { ?>
														<img src="https://www.auramarine.com/wp-content/uploads/2018/03/man-placeholder-e1520494457998.png" width="265" align="center">
													<?php } ?>
												</div>
												<div class="form-group">
													<input type="hidden" name="nis" value="<?php echo $peserta->peserta_nis; ?>">
													<input type="file" name="userfile" required="flag" >
													<br>
												</div>
												<div align="left" style="max-width: 300px; text-align: left">
													<p style="font: bold;">Ketentuan Upload Foto</p>
													<ol>
														<li>Tipe File Foto *.JPG, *.JPEG</li>
														<li>Ukuran Foto Maksimal 200 kb</li>
													</ol>
												</div>
												<div class="form-group">
													<input type="submit" name="submit" value="Upload" class="btn btn-primary">
													<a href="<?php echo base_url('index.php/exam/identitas'); ?>" class="btn btn-danger">Batalkan</a>
												</div>
											</form>
											<div class="separator-solid  mb-3"></div>
										</div>
									</div>
									
								</div>
								<div class="container-fluid" align="center">
									<a href="<?php echo base_url('index.php/exam/login/logout')?>" class="btn btn-danger"><i class="fas fa-door-open"></i>Logout</a>
								</div>
								<div>
								&nbsp;
								<div>
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