<!-- awal kotak info atas -->
<?php 
function naik($persen){
    if($persen <= 50) $bg = "bg-success";
    else if($persen <= 90) $bg = "bg-warning";
    else $bg = "bg-danger";
    return $bg;
}

function turun($persen){
    if($persen <= 10) $bg = "bg-danger";
    else if($persen <= 50) $bg = "bg-warning";
    else $bg = "bg-success";
    return $bg;
}
?>

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
							<p class="card-category">Jumlah CPU</p>
							<h4 class="card-title"><?php echo num_cpus().PHP_EOL; ?> Core</h4>
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
							<i class="flaticon-technology-1 text-success"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<p class="card-category">Kapasitas RAM</p>
							<h4 class="card-title">16 GB<?php //echo $memavailable; ?></h4>
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
							<i class="flaticon-database text-danger"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<p class="card-category">Kapasitas Disk</p>
							<h4 class="card-title">512 GB<?php //echo $disktotal; ?></h4>
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
							<i class="flaticon-internet text-primary"></i>
						</div>
					</div>
					<div class="col-7 col-stats">
						<div class="numbers">
							<p class="card-category">Mesin Server</p>
							<h4 class="card-title"><?php $srv = explode(' ',$_SERVER['SERVER_SOFTWARE']); echo $srv[0]; ?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- akhir kotak info atas -->
	
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Server Usage</div>
			</div>
			<div class="card-body">
			<!-- pasang disini -->    

                    <div class="progress-card">
                        <div class="progress-status">
                            <span class="text-muted"><i class="fas fa-microchip"></i>&nbsp;&nbsp;CPU Usage</span>
                            <span class="text-muted fw-bold"> 10%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped <?php echo naik(10)?>" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="10%"></div>
                        </div>
                    </div>

			<!-- pasang disini -->

                    <div class="progress-card">
                        <div class="progress-status">
                            <span class="text-muted"><i class="fas fa-memory"></i>&nbsp;&nbsp;RAM Usage</span>
                            <span class="text-muted fw-bold"> 60%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped <?php echo naik(60)?>" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="60%"></div>
                        </div>
                    </div>

                    <div class="progress-card">
                        <div class="progress-status">
                            <span class="text-muted"><i class="fas fa-database"></i>&nbsp;&nbsp;HDD Usage</span>
                            <span class="text-muted fw-bold"> 95%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped <?php echo naik(95)?>" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="95%"></div>
                        </div>
                    </div>
                </div>
		    </div>

	</div>
</div>

<!-- blok ke dua -->

<div class="row">
	<div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Informasi HDD</div>
			</div>
            <div class="card-body">
			<!-- pasang disini -->

                    <div class="progress-card">
                        <div class="progress-status">
                            <span class="text-muted"><i class="fas fa-database"></i>&nbsp;&nbsp;HDD Terpakai</span>
                            <span class="text-muted fw-bold"> 60%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="60%"></div>
                        </div>
                    </div>

                    <div class="progress-card">
                        <div class="progress-status">
                            <span class="text-muted"><i class="fas fa-database"></i>&nbsp;&nbsp;HDD Bebas</span>
                            <span class="text-muted fw-bold"> 60%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="60%"></div>
                        </div>
                    </div>
                </div>
		    </div>   

	</div>

    <div class="col-md-6">
		<div class="card">
			<div class="card-header">
				<div class="card-head-row">
					<div class="card-title">Informasi RAM</div>									
				</div>
			</div>           
            <div class="card-body">
			<!-- pasang disini -->
                <div class="demo">
                    <div class="progress-card">
                        <div class="progress-status">
                            <span class="text-muted"><i class="fas fa-memory"></i>&nbsp;&nbsp;Memory Terpakai</span>
                            <span class="text-muted fw-bold"> 60%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="60%"></div>
                        </div>
                    </div>
                </div>
                    <div class="progress-card">
                        <div class="progress-status">
                            <span class="text-muted"><i class="fas fa-memory"></i>&nbsp;&nbsp;Memory Bebas</span>
                            <span class="text-muted fw-bold"> 60%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="60%"></div>
                        </div>
                    </div>
                </div>
		    </div>
		</div>
</div>

