<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">

	<div class="container-fluid">
		<nav class="navbar navbar-line navbar-header-left navbar-expand-lg p-0  d-none d-lg-flex">
			<ul class="navbar-nav page-navigation page-navigation-info">
				<!-- looping navbar -->
				<?php
				foreach ($navbar as $nav) {
				?>
				<li class="nav-item <?php if($nav == $nav_active) echo 'active'; ?>">	
					<a class="nav-link" href="<?php echo base_url('index.php/admin/'.$sid_active.'_con/'.$nav)?>">
						<?php echo ucfirst($nav); ?>
					</a>
				</li>
				<?php } ?>

			</ul>
		</nav>
		<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
			<!--  -->
			<li class="nav-item dropdown hidden-caret">
				<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
					<div class="avatar-sm">
						<img src="<?php echo base_url('images/admin'); ?>/<?php echo $this->session->admin_user; ?>.jpg" alt="..." class="avatar-img rounded-circle">
					</div>
				</a>
				<ul class="dropdown-menu dropdown-user animated fadeIn">
					<div class="dropdown-user-scroll scrollbar-outer">
						<li>
							<div class="user-box">
								<div class="avatar-lg"><img src="<?php echo base_url('images/admin'); ?>/<?php echo $this->session->admin_user; ?>.jpg" alt="image profile" class="avatar-img rounded"></div>
								<div class="u-text">
									<h4>administrator</h4>
									<p class="text-muted">admin pengelola sistem CBT Teladan.</p>
								</div>
							</div>
						</li>
						<li>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo base_url('index.php/admin/profil_con/profil') ?>">Profile</a>
							<!-- <div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Setting</a> -->
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?php echo base_url('index.php/admin/login_con/logout') ?>">Logout</a>
						</li>
					</div>
				</ul>
			</li>
		</ul>
	</div>
</nav>
		<!-- End Navbar -->