<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Penilaian Berbasis Komputer</title>
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
   <style>
      .blink {
      animation: blinker 0.6s linear infinite;
      color: #f53505;
      font-size: 15px;
      font-weight: regular;
      font-family: arial;
      }
      @keyframes blinker {  
      50% { opacity: 0; }
      }
      .blink-one {
      animation: blinker-one 1s linear infinite;
      }
      @keyframes blinker-one {  
      0% { opacity: 0; }
      }
      .blink-two {
      animation: blinker-two 1.4s linear infinite;
      }
      @keyframes blinker-two {  
      100% { opacity: 0; }
      }
    </style>
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
								<br>
								<div class="card-body">
								<br>
									<div class="invoice-top" align="center">
										<h3 class="title"><strong>PENILAIAN BERBASIS KOMPUTER <?php echo date('Y');?></strong></h3>
									</div>
									<div class="row">
										<div class="col-md-12 info-invoice">
											<h5 class="sub float-left">IDENTITAS</h5>
										</div>
									<!-- batas potong sini -->
									</div>
									<div class="row">
										<div class="col-md-10">
											<div class="invoice-detail">
											<table width="100%">
												<tr>
													<td width="30%">Nama Peserta</td>
													<td width="5%">:</td>
													<td width="65%"><?php echo $peserta->peserta_nama; ?></td>
												</tr>
												<tr>
													<td >Kelas / NIS</td>
													<td >:</td>
													<td ><?php echo $peserta->peserta_kelas.' / '.$peserta->peserta_nis; ?></td>
												</tr>
												<tr>
													<td style="width: 30%">Penilaian</td>
													<td style="width: 1%">:</td>
													<td style="width: 60%"><?php echo $review->ujian_nama; ?></td>
												</tr>
												<tr>
													<td >Mata Pelajaran</td>
													<td >:</td>
													<td ><?php echo $review->mapel_nama; ?></td>
												</tr>
												<tr>
													<td >Tanggal</td>
													<td >:</td>
													<td ><?php
													$day = date('D', strtotime($review->ujian_tanggal)); 
													echo hari($day).', '.tanggal($review->ujian_tanggal); ?>
													</td>
												</tr>
												<tr>
													<td >Pukul</td>
													<td >:</td>
													<td ><?php 
													$mulai = explode(' ', $review->pu_mulai); echo $mulai[1]; ?> s/d
													<?php $selesai = explode(' ', $review->pu_selesai); echo $selesai[1];?> WIB 
												</td>
												</tr>				
											</table>	
											</div>										
										</div>	
									<!-- batas potong sini -->
									</div>
								</div>
								<div class="card-body">
									<h6 class="text-uppercase mt-4 mb-3 fw-bold">
										JAWABAN 
									</h6>
									<table width="50%" border="0" cellspacing="0" cellpadding="2">
									<?php
									$no = 0;
									foreach ($lembar_jawab as $value) {
										$lj[] = $value['pj_jawaban'];
									}
									
									for ($i=1; $i<=10 ; $i++) { 
									?>
									<tr>
										<?php
										for ($j=$i; $j<=$this->session->jum_soal; $j+=10) { 
											?>
											<td width="10%" align="center"><?php echo $j ?>. <?php echo $lj[$j-1]; ?></td>
										<?php }
										?>
									</tr>

									<?php }
									?>
									</table>
									<p><font size="1" color="red">*Urutan soal <b>TIDAK SESUAI</b> dengan urutan yang sebenarnya.</font></p>
									<br>
								</div>
							
									<!-- HASIL -->
									<div class="card-body">
									<h6 class="text-uppercase mt-4 mb-3 fw-bold">
										HASIL KOREKSI 
									</h6>
									<?php if($review->ujian_hasil == 1) { ?> 
									
									<table width="30%">
										<tr>
											<td width="30%">Benar</td>
											<td width="5%">:</td>
											<td width="65%"><?php echo $koreksi->benar; ?> Soal</td>
										</tr>
										<tr>
											<td >Salah</td>
											<td >:</td>
											<td ><?php echo $koreksi->salah; ?> Soal</td>
										</tr>
										<tr>
											<td>Nilai</td>
											<td>:</td>
											<td><?php echo $koreksi->nilai; ?>/<?php echo $koreksi->max_skor; ?></td>
										</tr>
									</table>

									<?php } else { ?>
										<p>Hasil penilaian tidak ditampilkan</p>
									<?php } ?>
									<br>	
															
								<hr>
								<div align="center">
								<a href="<?php echo base_url('index.php/exam/identitas')?>" class="btn btn-success"><i class="fas fa-reply"></i> Kembali ke halaman identitas</a>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<button class="btn btn-primary" onclick="window.print()">
									<span class="btn-label">
										<i class="fas fa-print"></i>
									</span>
									&nbsp;Cetak 
								</button>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="<?php echo base_url('index.php/exam/login/logout')?>" class="btn btn-danger"><i class="fas fa-door-open"></i> Logout</a>
								</div>
								<br>
								</div>							
								</div>
								<br>
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

</body>
</html>