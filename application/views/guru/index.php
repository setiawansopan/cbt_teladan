<?php $this->load->view('dependen/header.php');?>
<body data-background-color="bg1">
	<div class="wrapper fullheight-side no-box-shadow-style">
		<!-- include sidebar header -->
		<?php $this->load->view('dependen/sidebar_header.php');?>	

		<!-- include sidebar  -->
		<?php $this->load->view('dependen/sidebar.php');?>	

		<!-- include navbar -->
		<?php $this->load->view('dependen/navbar.php');?>	
		
		
		<div class="main-panel full-height">
			<!-- mulai kontainer -->
			<div class="container">
				<!-- mulai page utama -->
				<div class="page-inner">
					<!-- include judul halaman -->
					<?php $this->load->view('dependen/judul.php');?>	
					<!-- --------------------------------------------------------------- -->
					<!-- batas konten isi disini -->
					<!-- --------------------------------------------------------------- -->
					
					<?php $this->load->view('admin/'.$page.'.php');?>
					
					<!-- --------------------------------------------------------------- -->
					<!-- batas konten isi disini -->
					<!-- --------------------------------------------------------------- -->
				<!-- selesai page utama -->
				</div>

			<!-- selesai kontainer -->
			</div>

			<!-- include file bagian footer -->
			<?php $this->load->view('dependen/footer') ?>
		<!-- akhir main panel -->
		</div>
	<!-- akhir main wrapper -->
	</div>
	<!-- include js file bagian footer -->
	<?php $this->load->view('dependen/js_include') ?>
</body>
</html>