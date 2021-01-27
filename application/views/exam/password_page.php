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
<body class="login">

	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<?php if($this->session->flashdata('error')) { ?>
                <div class="alert alert-danger" role="alert" style="color:red"><?php echo $this->session->flashdata('error') ?></div>
            <?php } ?> 
			<h3 class="text-center">Rubah Kata Sandi</h3>
			<div class="login-form">
				<form action="<?php echo base_url('index.php/exam/login/password_update') ?>" method="POST" id="exampleValidation">
				<div class="form-group">
					<label for="password" class="placeholder" ><b>Kata Sandi </b><span class="required-label">*</span></label>
					
					<div class="position-relative">
						<input id="password" name="password" type="password" class="form-control" required>
						<div class="show-password">
							<i class="icon-eye"></i>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="placeholder"><b>Konfirmasi Kata Sandi </b><span class="required-label">*</span> </label>
					
					<div class="position-relative">
						<input id="confirmpassword" name="confirmpassword" type="password" class="form-control" required>
						<div class="show-password">
							<i class="icon-eye"></i>
						</div>
					</div>
				</div>
				<div>&nbsp;</div>
				<div class="form-group form-action-d-flex mb-3">
					<input type="hidden" name="peserta_id" value="<?php echo $this->input->get('peserta_id'); ?>">
					<input type="submit" name="login" value="Simpan Sandi" class="btn btn-primary col-md-12 float-right mt-3 mt-sm-0 fw-bold">
				</div>
				</form>
				</div>
		</div>

	</div>
<!-- js include -->
	<script src="<?php echo base_url()?>/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/core/popper.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/core/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/atlantis.min.js"></script>
</body>
</html>