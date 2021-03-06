<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?php echo base_url()?>/assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?php echo base_url()?>/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url(); ?>/assets/css/fonts.min.css']},
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
<body class="login">
	<div class="wrapper wrapper-login wrapper-login-full p-0">
		<div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-login" style="background-image: url(<?php echo base_url('images/systems/komputer.jpg'); ?>)">
			<!-- <div style="height: 100%">
				<h1 class="text-center login-title">
	            	SMA NEGERI 1 YOGYAKARTA
	            </h1>
			</div> -->
		</div>
		<div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white login-pg">
			<div class="con-login" style="width: 100%">
				<?php if($this->session->flashdata('success')) { ?>
	                <div class="alert alert-success" role="alert" style="color:green"><?php echo $this->session->flashdata('success') ?></div>
	            <?php } ?> 
				<?php if($this->session->flashdata('error')) { ?>
	                <div class="alert alert-danger" role="alert" style="color:red"><?php echo $this->session->flashdata('error') ?></div>
	            <?php } ?>
	            <h1 class="text-center login-title">
	            	<i class="fas fa-graduation-cap icon-big"></i>&nbsp;CBT TELADAN
	            </h1>
				<br><br> 
				<div class="container container-login animated fadeIn">
				<h3 class="text-center">Login Peserta</h3>
					<div class="login-form">
						<form action="<?php echo base_url('index.php/exam/login/auth') ?>" method="POST">
						<div class="form-group">
							<label for="username" class="placeholder"><b>Nama Pengguna</b></label>
							<input id="username" name="username" type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="password" class="placeholder"><b>Kata Sandi</b></label>
							
							<div class="position-relative">
								<input id="password" name="password" type="password" class="form-control" required>
								<div class="show-password">
									<i class="icon-eye"></i>
								</div>
							</div>
						</div>
						
						<div class="form-group form-action-d-flex mb-3">
							<input type="submit" name="login" value="Login" class="btn btn-primary btn-rounded col align-self-center float-right mt-3 mt-sm-0 fw-bold bt-login">
						</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- <div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<?php if($this->session->flashdata('success')) { ?>
                <div class="alert alert-success" role="alert" style="color:green"><?php echo $this->session->flashdata('success') ?></div>
            <?php } ?> 
			<?php if($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger" role="alert" style="color:red"><?php echo $this->session->flashdata('error') ?></div>
            <?php } ?> 
			<h3 class="text-center">Login Peserta</h3>
			<div class="login-form">
				<form action="<?php echo base_url('index.php/exam/login/auth') ?>" method="POST">
				<div class="form-group">
					<label for="username" class="placeholder"><b>Nama Pengguna</b></label>
					<input id="username" name="username" type="text" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="password" class="placeholder"><b>Kata Sandi</b></label>
					
					<div class="position-relative">
						<input id="password" name="password" type="password" class="form-control" required>
						<div class="show-password">
							<i class="icon-eye"></i>
						</div>
					</div>
				</div>
				
				<div class="form-group form-action-d-flex mb-3">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="rememberme">
						<label class="custom-control-label m-0" for="rememberme">Ingat Saya</label>
					</div>
					<input type="submit" name="login" value="Login" class="btn btn-primary col-md-5 float-right mt-3 mt-sm-0 fw-bold">
				</div>
				</form>
				</div>
		</div>

	</div> -->

	<script src="<?php echo base_url()?>/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/core/popper.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/core/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/atlantis.min.js"></script>
</body>
</html>