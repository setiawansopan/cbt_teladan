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
									<td width=50% align="center"><h3><strong><font color="#000000">IDENTITAS PESERTA</strong></h3></td>
								</tr>
								</table>
								
								<!-- sampai sini judul header -->
								
							</div>
							</div>
							<!-- judul sampai sini -->
							<div>
							&nbsp;
							</div>
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-4 info-invoice" align="center">
											<!-- <h5 class="sub">FOTO PESERTA</h5> -->
											<?php $filename = 'images/peserta/'.$peserta->peserta_nis.'.jpg';
												if (file_exists($filename)) { ?>
													<img src="<?php echo base_url($filename); ?>" width="265" align="center">
											<?php } else { ?>
												<img src="https://www.auramarine.com/wp-content/uploads/2018/03/man-placeholder-e1520494457998.png" width="265" align="center">
											<?php } ?>
											<br><br>
											<a href="<?php echo base_url('index.php/exam/identitas/foto'); ?>" class="btn btn-sm btn-info"><i class="fa fa-image"></i> Ganti Foto</a>
										</div>
										<div class="col-md-8 info-invoice">
											<!-- <h5 class="sub">IDENTITAS</h5> -->
											<table width="75%" class="table ">
												<tr>
													<td width="35%">Nama</td>
													<td width="3%">:</td>
													<td width="60%"><?php echo $peserta->peserta_nama; ?></td>
												</tr>
												<tr>
													<td width="15%">Kelas</td>
													<td width="5%">:</td>
													<td width="65%"><?php echo $peserta->peserta_kelas; ?></td>
												</tr>
												<tr>
													<td width="15%">NIS</td>
													<td width="5%">:</td>
													<td width="65%"><?php echo $peserta->peserta_nis; ?></td>
												</tr>
												<tr>
													<td width="15%">Jenis Kelamin</td>
													<td width="5%">:</td>
													<td width="65%"><?php echo $peserta->peserta_kelamin; ?></td>
												</tr>
												<tr>
													<td width="15%">Tempat Lahir</td>
													<td width="5%">:</td>
													<td width="65%"><?php echo $peserta->peserta_tmp_lahir; ?></td>
												</tr>
												<tr>
													<td width="15%">Tanggal Lahir</td>
													<td width="5%">:</td>
													<td width="65%"><?php echo tanggal($peserta->peserta_tgl_lahir); ?></td>
												</tr>

											</table>
										</div>
									</div>
									
									<h3 align="center">WAKTU SERVER = <b><?php echo date('H:i:s') ?></b> WIB</h3>
									
									<div class="row">
										<div class="col-md-12">
											<div class="invoice-detail">
												<div class="invoice-top">
													<!-- <h3 class="title"><strong>DAFTAR PENILAIAN</strong></h3> -->
												</div>
												<div class="invoice-item">
													<div class="table-responsive">

												
														<table class="table table-striped tb-ujian" colpadding="4">
															<thead  style="background-color: #002147;">
																<tr>
																	<td class="text-center" style="color: #ffffff; width: 90%;"><strong>DATA PENILAIAN TERSEDIA </strong></td>
																	<td class="text-center" style="color: #ffffff; width: 10%"><strong>AKSI</strong></td>
																</tr>
															</thead>
															<tbody>
																<?php 
																foreach ($ujian as $value) 
																{ 
																if(date('Y-m-d') == $value['ujian_tanggal']) {
																?>
																<tr>
																	<td>
																	<b><?php echo strtoupper($value['ujian_nama'].' - Kelas '.$value['ujian_tingkat']) ?></b> <br>
																	<i class="far fa-file-alt"></i> <?php echo $value['mapel_nama'] ?> ( Penilaian <?php if($value['ujian_jenis'] == 'U') echo "Utama"; else if($value['ujian_jenis'] == 'S') echo "Susulan"; else echo "Remidi"; ?> ) <br>
																	<i class="far fa-calendar-alt"></i> 
																	<?php 
																	$day = date('D', strtotime($value['ujian_tanggal']));
																	echo hari($day).', '.tanggal($value['ujian_tanggal']) 
																	?> 
																	<br>
																	<i class="far fa-clock"></i> <?php echo $value['ujian_mulai'] ?> s/d <?php echo $value['ujian_selesai'] ?> <br>

																	</td>
																	<td class="text-center">
																		<?php if(strtotime('now') > strtotime($value['ujian_tanggal'].' '.$value['ujian_mulai']) && strtotime('now') < strtotime($value['ujian_tanggal'].' '.$value['ujian_selesai'])) { ?>
																			<a href="<?php echo base_url('index.php/exam/identitas/detail')?>?ujian_id=<?php echo $value['ujian_id']?>" class="btn btn-info"><i class="fas fa-pencil-alt"></i> Ambil</a>
																		<?php } else { ?>
																			<button class="btn btn-danger" disabled><i class="fas fa-times"></i> Tutup</button>
																		<?php } ?>
																	</td>
																</tr>
																

																<?php  }
															} ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>	
											<div class="separator-solid  mb-3"></div>
										</div>	
									</div>
								</div>
								<div class="container-fluid" align="center">
									<a href="<?php echo base_url('index.php/exam/login/logout')?>" class="btn btn-danger"><i class="fas fa-door-open"></i>Logout</a>
									
								</div>
								<div>
								&nbsp;
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