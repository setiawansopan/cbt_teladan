	<!--   Core JS Files   -->
	<script src="<?php echo base_url()?>/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/core/popper.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?php echo base_url()?>/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo base_url()?>/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?php echo base_url()?>/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Moment JS -->
	<script src="<?php echo base_url()?>/assets/js/plugin/moment/moment.min.js"></script>

	<!-- Chart JS -->
	<script src="<?php echo base_url()?>/assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="<?php echo base_url()?>/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="<?php echo base_url()?>/assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="<?php echo base_url()?>/assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="<?php echo base_url()?>/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- Bootstrap Toggle -->
	<script src="<?php echo base_url()?>/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

		<!-- Dropzone -->
	<script src="<?php echo base_url()?>/assets/js/plugin/dropzone/dropzone.min.js"></script>

	<!-- Fullcalendar -->
	<script src="<?php echo base_url()?>/assets/js/plugin/fullcalendar/fullcalendar.min.js"></script>

	<!-- DateTimePicker -->
	<script src="<?php echo base_url()?>/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

	<!-- Bootstrap Tagsinput -->
	<script src="<?php echo base_url()?>/assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

	<!-- Bootstrap Wizard -->
	<script src="<?php echo base_url()?>/assets/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>

	<!-- jQuery Validation -->
	<script src="<?php echo base_url()?>/assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>

	<!-- Summernote -->
	<script src="<?php echo base_url()?>/assets/js/plugin/summernote/summernote-bs4.min.js"></script>

	<!-- Select2 -->
	<script src="<?php echo base_url()?>/assets/js/plugin/select2/select2.full.min.js"></script>

	<!-- Sweet Alert -->
	<script src="<?php echo base_url()?>/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Magnific Popup -->
	<script src="<?php echo base_url()?>/assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js"></script>

	<!-- Atlantis JS -->
	<script src="<?php echo base_url()?>/assets/js/atlantis.min.js"></script>
	<?php
	if(!empty($grafik)) {
		foreach ($grafik as $gf) {
		$dataX[]   = $gf['jx'];
		$dataXI[]  = $gf['jxi'];
		$dataXII[] = $gf['jxii'];
		$datatgl[] = '"'.$gf['ujian_tanggal'].'"'; 
		}
	}
	else {
	$dataX   = array(10,30,49,20,58,99,57,89,90,16,28,325);
	$dataXI  = array(145,73,67,134,126,78,23,156,145,56,78,143);
	$dataXII = array(170,300,156,231,137,78,145,57,33,56,134,178);
	$datatgl = array("01","02","03","04");
	}
	?>
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 10,
			});

			$('#ujian_id').change(function(){ 
	            var ujian_id=$(this).val();
	            // alert(ujian_id);
	            $.ajax({
	                url : "<?php echo base_url() ?>index.php/admin/laporan_con/get_kelas_by_ujian",
	                type : "POST",
	                data : {ujian_id: ujian_id},
	                async : true,
	                dataType : 'json',
	                success: function(data){
	                    var html = '';
	                    var i;
	                    for(i=0; i<data.length; i++){
	                        html += '<option value="'+data[i].peserta_kelas+'">'+data[i].peserta_kelas+'</option>';
	                    }
	                    $('#kelas').html(html);

	                }
	            });
	            return false;
	        }); 

		});

		$('#datepicker').datetimepicker({
			format: 'YYYY-MM-DD',
		});
		$('#timepicker2').datetimepicker({
			format: 'hh:mm', 
		});
		$('#basic').select2({
			theme: "bootstrap"
		});
		$('#ujian_id').select2({
			theme: "bootstrap"
		});
		$('#kelas').select2({
			theme: "bootstrap"
		});
		$('#kelas').select2({
			theme: "bootstrap"
		});
		$('#ujian_mapel_id').select2({
			theme: "bootstrap"
		});
		$('#ujian_tingkat').select2({
			theme: "bootstrap"
		});
		$('#ujian_durasi').select2({
			theme: "bootstrap"
		});
		$('#ujian_jenis').select2({
			theme: "bootstrap"
		});
		$('#addKD').select2({
			theme: "bootstrap"
		});

		$('#multiple').select2({
			theme: "bootstrap"
		});

		$('#multiple-states').select2({
			theme: "bootstrap"
		});
		$('#summernote').summernote({
			placeholder : 'Paste soal sekaligus pilihan jawaban dari ms. word atau google docs. Untuk mengetik rumus silahkan gunakan codecog.com/latex/eqneditor.php',
			fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
			tabsize: 2,
			height: 300
		});

		var myMultipleLineChart = new Chart(multipleLineChart, {
			type: 'line',
			data: {
				labels: [<?php echo implode(',', $datatgl) ?>],
				datasets: [{
					label: "Kelas X",
					borderColor: "#1d7af3",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#1d7af3",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: [<?php echo implode(',', $dataX) ?>]
				},{
					label: "Kelas XI",
					borderColor: "#59d05d",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#59d05d",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: [<?php echo implode(',', $dataXI) ?>]
				}, {
					label: "Kelas XII",
					borderColor: "#f3545d",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#f3545d",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: [<?php echo implode(',', $dataXII) ?>]
				}]
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position: 'top',
				},
				tooltips: {
					bodySpacing: 4,
					mode:"nearest",
					intersect: 0,
					position:"nearest",
					xPadding:10,
					yPadding:10,
					caretPadding:10
				},
				layout:{
					padding:{left:15,right:15,top:15,bottom:15}
				}
			},
		});    
	</script>
