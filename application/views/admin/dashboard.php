<!-- awal kotak info atas -->

<div class="row">
	<div class="col-sm-6 col-md-3">
		<div class="card card-stats card-round">
			<div class="card-body ">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="flaticon-analytics text-warning"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<p class="card-category">Jumlah Ujian</p>
							<h4 class="card-title"><?php echo $ujian ?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="card card-stats card-round">
			<div class="card-body ">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="flaticon-list text-success"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<p class="card-category">Jumlah Soal</p>
							<h4 class="card-title"><?php echo $soal ?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="card card-stats card-round">
			<div class="card-body">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="flaticon-home text-danger"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<p class="card-category">Jumlah Rombel</p>
							<h4 class="card-title"><?php echo $rombel; ?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-6 col-md-3">
		<div class="card card-stats card-round">
			<div class="card-body">
				<div class="row">
					<div class="col-5">
						<div class="icon-big text-center">
							<i class="flaticon-user-2 text-primary"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<p class="card-category">Jumlah Peserta</p>
							<h4 class="card-title"><?php echo $peserta; ?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- akhir kotak info atas -->
	
<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Grafik Keaktifan Peserta</div>
			</div>
			<div class="card-body">
				<div class="chart-container">
					<canvas id="multipleLineChart"></canvas>
				</div>
				<br>
				<div>
					<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data grafik diambil dari data realtime users per tanggal.</p>

				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<div class="card-head-row">
					<div class="card-title"><?php if(!empty($jumon)) echo $jumon; ?> User online</div>									
				</div>
			</div>
			<div class="card-body">
				<?php foreach ($online as $value) { ?>
				<div class="d-flex">
					<div class="avatar avatar-online">
						<span class="avatar-title rounded-circle border border-white <?php if($value['pu_status'] == 'of') echo 'bg-danger'; else echo 'bg-success' ?>"><?php echo substr($value['peserta_nama'], 0, 1) ?></span>
					</div>
					<div class="flex-1 ml-3 pt-1">
						<h6 class="text-uppercase fw-bold mb-1"><?php echo $value['peserta_nama'] ?>
						<?php if($value['pu_status'] == 'on') { ?>
						<span class="text-success pl-3">mengerjakan</span></h6>
						<?php } ?>
						<?php if($value['pu_status'] == 'of') { ?>
						<span class="text-danger pl-3">selesai</span></h6>
						<?php } ?>
						<span class="text-muted"><?php echo $value['ujian_nama'].' | Kls. '.$value['ujian_tingkat'].' | '.$value['mapel_nama'] ?></span>
					</div>
					<div class="float-right pt-1">
						<small class="text-muted">
							<?php 
							// if($value['pu_status'] == 'on')  { $mulai = explode(' ', $value['pu_mulai']); echo "<font color=green>Open<br>".$mulai[1]."</font>"; }
							// else { $selesai = explode(' ', $value['pu_selesai']); echo "<font color=red>Close<br>".$selesai[1]."</font>"; }

							$mulai = explode(' ', $value['pu_mulai']); echo "<font color=green>Mulai : ".$mulai[1]."</font> <br>";
							$selesai = explode(' ', $value['pu_selesai']); echo "<font color=red>Selesai : ".$selesai[1]."</font>";
							?>
						</small>
					</div>
				</div>
				<div class="separator-dashed"></div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>