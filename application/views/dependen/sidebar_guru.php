<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">	
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">

			<ul class="nav nav-warning">
				<li class="nav-item <?php if($sid_active == 'dashboard') echo 'active'?>">
					<a href="<?php echo base_url('index.php/guru/dashboard/dashboard') ?>">
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
					<a href="<?php echo base_url('index.php/guru/peserta/peserta') ?>">
						<i class="fas fa-user-graduate"></i>
						<p>Peserta</p>
					</a>
				</li>

				<li class="nav-item <?php if($sid_active == 'rombel') echo 'active'?>">
					<a href="<?php echo base_url('index.php/guru/rombel/rombel') ?>">
						<i class="fas fa-store-alt"></i>
						<p>Rombel</p>
					</a>
				</li>
				<li class="nav-item <?php if($sid_active == 'mapel') echo 'active'?>">
					<a href="<?php echo base_url('index.php/guru/mapel/mapel') ?>">
						<i class="fas fa-book-open"></i>
						<p>Mata Pelajaran</p>
					</a>
				</li>

				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Sirkulasi</h4>
				</li>
				<li class="nav-item <?php if($sid_active == 'ujian') echo 'active'?>">
					<a href="<?php echo base_url('index.php/guru/ujian/ujian') ?>">
						<i class="far fa-edit"></i>
						<p>Ujian</p>
					</a>
				</li>
				<li class="nav-item <?php if($sid_active == 'laporan') echo 'active'?>">
					<a href="<?php echo base_url('index.php/guru/laporan/laporan') ?>">
						<i class="far fa-chart-bar"></i>
						<p>Laporan</p>
					</a>
				</li>
				
			</ul>
		</div>
	</div>
</div>
		<!-- End Sidebar -->