<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">	
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">

			<ul class="nav nav-warning">
				<li class="nav-item <?php if($sid_active == 'dashboard') echo 'active'?>">
					<a href="<?php echo base_url('index.php/admin/dashboard_con/dashboard') ?>">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Dependensi</h4>
				</li>
				<li class="nav-item <?php if($sid_active == 'peserta') echo 'active'?>">
					<a href="<?php echo base_url('index.php/admin/peserta_con/peserta') ?>">
						<i class="fas fa-user-graduate"></i>
						<p>Peserta</p>
					</a>
				</li>
				<li class="nav-item <?php if($sid_active == 'guru') echo 'active'?>">
					<a href="<?php echo base_url('index.php/admin/guru_con/guru') ?>">
						<i class="fas fa-user-tie"></i>
						<p>Guru</p>
					</a>
				</li>
				<li class="nav-item <?php if($sid_active == 'rombel') echo 'active'?>">
					<a href="<?php echo base_url('index.php/admin/rombel_con/rombel') ?>">
						<i class="fas fa-store-alt"></i>
						<p>Rombel</p>
					</a>
				</li>
				<li class="nav-item <?php if($sid_active == 'mapel') echo 'active'?>">
					<a href="<?php echo base_url('index.php/admin/mapel_con/mapel') ?>">
						<i class="fas fa-book-open"></i>
						<p>Mata Pelajaran</p>
					</a>
				</li>
				<li class="nav-item <?php if($sid_active == 'pengaturan') echo 'active'?>">
					<a href="<?php echo base_url('index.php/admin/pengaturan_con/pengaturan') ?>">
						<i class="fas fa-user-cog"></i>
						<p>Pengaturan</p>
					</a>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Sirkulasi</h4>
				</li>
				<li class="nav-item <?php if($sid_active == 'ujian') echo 'active'?>">
					<a href="<?php echo base_url('index.php/admin/ujian_con/ujian') ?>">
						<i class="far fa-edit"></i>
						<p>Ujian</p>
					</a>
				</li>
				<li class="nav-item <?php if($sid_active == 'status') echo 'active'?>">
					<a href="<?php echo base_url('index.php/admin/status_con/status') ?>">
						<i class="fas fa-user-edit"></i>
						<p>Status Peserta</p>
						</span>
					</a>
				</li>
				<li class="nav-item <?php if($sid_active == 'laporan') echo 'active'?>">
					<a href="<?php echo base_url('index.php/admin/laporan_con/laporan') ?>">
						<i class="far fa-chart-bar"></i>
						<p>Laporan</p>
					</a>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Database</h4>
				</li>
				<li class="nav-item <?php if($sid_active == 'backup') echo 'active'?>">
					<a href="<?php echo base_url('index.php/admin/backup_con/backup') ?>">
						<i class="fas fa-database"></i>
						<p>Backup</p>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
		<!-- End Sidebar -->